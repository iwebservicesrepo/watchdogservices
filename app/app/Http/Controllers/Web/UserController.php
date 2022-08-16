<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\{
    User,
    TransactionHistory
};

class UserController extends Controller {

    /** + 
     * used to show checkout page
     * @param Request $request - request type get
     * @param type $price - price of package
     * @return type
     */
    public function index(Request $request, $price) {
        $decryptPrice = base64_decode($price);
        return view('web.checkout', ['price' => $decryptPrice]);
    }

    /** + 
     * used for paypal payment
     * @param Request $request - request type post
     * @return type
     */
    public function paypalPayment(Request $request) {
        try {
            $user_id = $request->user_id;
            $userDetails = User::find($user_id);
            $txn_id = $request->data['id'];
            $status = ($request->data['status'] == 'COMPLETED') ? 1 : 0;
            $raw = json_encode($request->data);
            $today = date('Y-m-d H:i:s');
            $transactions = TransactionHistory::create([
                        'txn_id' => $txn_id,
                        'status' => $status,
                        'raw' => $raw,
                        'user_id' => $user_id
            ]);
            if ($transactions->id > 0) {
                $success = true;
                $plan_end_date = '';
                $todayDate = date('Y-m-d');
                $price = (int) $request->price;
                if ($price == env('PRICE_1')) {
                    $plan_end_date = date('Y-m-d', strtotime($todayDate . ' + 30 days'));
                    $subscriptionType = "/Month";
                } else if ($price == env('PRICE_2')) {
                    $plan_end_date = date('Y-m-d', strtotime($todayDate . ' + 13 months'));
                    $subscriptionType = "/Year";
                } else if ($price == env('PRICE_3')) {
                    $plan_end_date = date('Y-m-d', strtotime($todayDate . ' +4 years'));
                    $subscriptionType = "/4 Year";
                }
                User::where('id', $user_id)->update([
                    'price' => $request->price,
                    'is_plan_expired' => 0,
                    'plan_start_date' => $todayDate,
                    'plan_end_date' => $plan_end_date,
                    'updated_at' => date('Y-m-d H:i:s')
                ]);
                //Send  email to User
                $emailContent = view('email.user_email_from_admin', [
                    'name' => ucfirst($userDetails->first_name . " " . $userDetails->last_name),
                    'customer_code' => $userDetails->user_code,
                    'body' => ""
                ]);
                $emailHtml = $emailContent->render();
                // Set the email subject.
                $subject = "WatchDog - Welcome to WatchDog Title Services";

                // Build the email headers
                $email_headers = 'From: WatchDog <watchdog@mail.com>' . "\r\n" .
                        'Reply-To: watchdog@mail.com' . "\r\n" .
                        "Content-type:text/html;charset=UTF-8" . "\r\n" .
                        'X-Mailer: PHP/' . phpversion();

                // Send the email.
                $email = $userDetails->email;
                mail($email, $subject, $emailHtml, $email_headers);
                //Send  email to Admin
                $emailContent = view('email.user_email_to_admin', [
                    'name' => ucfirst($userDetails->first_name . " " . $userDetails->last_name),
                    'price' => $price,
                    'subscriptionType' => $subscriptionType,
                    'purchase_date' => date("dS M'y"),
                    'body' => ""
                ]);
                $emailHtml = $emailContent->render();
                // Set the email subject.
                $subject = "WatchDog - New Order";

                // Build the email headers
                $email_headers = 'From: WatchDog <watchdog@mail.com>' . "\r\n" .
                        'Reply-To: watchdog@mail.com' . "\r\n" .
                        "Content-type:text/html;charset=UTF-8" . "\r\n" .
                        'X-Mailer: PHP/' . phpversion();

                // Send the email.
                $admin_email = env('ADMIN_EMAIL');
                mail($admin_email, $subject, $emailHtml, $email_headers);
                $thank_you_url = URL('/user/thank-you') . '/' . base64_encode($txn_id);
            } else {
                $success = false;
            }
            echo json_encode(array('success' => $success, 'status' => $status, 'thank_you_url' => $thank_you_url));
        } catch (Exception $ex) {
            return Redirect::to(URL('/user/dashboard'))->with('error', 'Something went wrong');
        }
    }

    /** + 
     * used to show thank you page
     * @param Request $request - request type get
     * @param type $txn_id - id of transaction
     * @return type
     */
    public function thankYouPage(Request $request, $txn_id) {
        $decryptTxnId = base64_decode($txn_id);
        $checkTxnId = TransactionHistory::where('txn_id', $decryptTxnId)->first();
        if ($checkTxnId == null) {
            return Redirect::to(URL('user/dashboard'));
        } else {
            $txn_id = $decryptTxnId;
            return view('web.thank_you', compact('txn_id'));
        }
    }

}
