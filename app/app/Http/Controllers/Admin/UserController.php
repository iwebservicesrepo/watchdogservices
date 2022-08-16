<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use Exception;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Models\TransactionHistory;

class UserController extends Controller {

    /** + 
     * 
     * used get list of users
     * @param Request $request - request type get
     * @return type
     */
    public function index(Request $request) {
        try {
            $userList = User::where('role_id', 1)->with('transactionHistory')->orderBy('users.id', 'desc')->get();
            /* $userList = User::where('role_id', 1)->with(['transactionHistory' => function ($query) {
              $query->orderBy('id', 'DESC');
              }])->get(); */
            return view('admin.pages.users.list', compact('userList'));
        } catch (NotFoundHttpException $exception) {
            return Redirect::to('admin/login')->with('error', $exception);
        }
    }

    /** + 
     * 
     * used to send email to specific user
     * @param type $user_id - id of user
     * @return type
     */
    public function sendEmailToUser($user_id) {
        $userData = User::where('role_id', 1)->where('id', $user_id)->first();
        if ($userData == null) {
            return Redirect::to('users')->with('error', "User not valid");
        }
        try {
            $email = $userData->email;
            //$email = 'kirtik@scalacoders.com';
            /* Mail::send('email.user_email_from_admin',
              [
              'name' => ucfirst($userData->first_name . " " . $userData->last_name),
              'customer_code' => $userData->user_code,
              'body' => ""
              ],
              function ($m) use ($email) {
              $m->to($email)->subject('WatchDog - Plans');
              }); */

            // Build the email content.
            $emailContent = view('email.user_email_from_admin', [
                'name' => ucfirst($userData->first_name . " " . $userData->last_name),
                'customer_code' => $userData->user_code,
                'body' => ""
            ]);
            $emailHtml = $emailContent->render();
            // Set the email subject.
            $subject = "WatchDog - Welcome to WatchDog Title Services";

            // Build the email headers.
            /* $email_headers = '';
              $email_headers .= 'MIME-Version: 1.0' . "\r\n";
              $email_headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
              $email_headers = "From: WatchDog <watchdog@mail.com>\r\n"; */
            $email_headers = 'From: WatchDog <watchdog@mail.com>' . "\r\n" .
                    'Reply-To: watchdog@mail.com' . "\r\n" .
                    "Content-type:text/html;charset=UTF-8" . "\r\n" .
                    'X-Mailer: PHP/' . phpversion();

            // Send the email.
            if (mail($email, $subject, $emailHtml, $email_headers)) {
                return Redirect::to('admin/users')->with('success', "Mail sent successfully");
            } else {
                return Redirect::to('admin/users')->with('error', "Mail not sent");
            }
        } catch (Exception $e) {
            return Redirect::to('admin/users')->with('error', $e->getMessage());
        }
    }

    public function deleteUsers(Request $request) {
        $userIdsArr = $request->data;
        User::whereIn('id', $userIdsArr)->where('role_id', 1)->delete();
        TransactionHistory::whereIn('user_id', $userIdsArr)->delete();
        echo json_encode(array('success' => true));
    }

}
