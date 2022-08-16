<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\{
    Mail,
    DB
};
use \App\Models\User;

class CronController extends Controller {

    /** + 
     * used to send email by cron job before 5 days of plan expiration
     */
    public function cronForEmailBeforePlanExpiration() {
        $today = date('Y-m-d');
        $notifyDate = date('Y-m-d', strtotime($today . ' + 5 days'));
        $usersData = User::where('plan_end_date', '=', $notifyDate)->where('is_plan_expired', 0)->where('plan_end_date', '!=', NULL)->get();

        if (count($usersData) > 0) {
            $subject = "WatchDog - You plan is about to expire!";
            foreach ($usersData as $row) {
                $planExpiryDate = date('d M, Y', strtotime($row->plan_end_date));
                try {
                    $toEmail = $row->email;
                    //$toEmail = 'kirtik@scalacoders.com';
                    //Send  email to User
                    $emailContent = view('email.plan_expiration_mail', [
                        'name' => $row->first_name . " " . $row->last_name,
                        'login_url' => URL('/login'),
                        'body' => ""
                    ]);
                    $emailHtml = $emailContent->render();

                    // Build the email headers
                    $email_headers = 'From: WatchDog <watchdog@mail.com>' . "\r\n" .
                            'Reply-To: watchdog@mail.com' . "\r\n" .
                            "Content-type:text/html;charset=UTF-8" . "\r\n" .
                            'X-Mailer: PHP/' . phpversion();

                    if (mail($toEmail, $subject, $emailHtml, $email_headers)) {
                        echo "Mail Success";
                    } else {
                        echo "Mail Failed";
                    }
                } catch (Exception $e) {
                    echo "Mail Failed";
                }
            }
        } else {
            echo "No Data Found";
        }
    }

    /** + 
     * used to update user plan validity by cron job
     */
    public function cronForPlanExpiration() {
        $today = date('Y-m-d');
        $usersData = User::where('plan_end_date', '<', $today)->where('is_plan_expired', 0)->get();
        if (count($usersData) > 0) {
            foreach ($usersData as $row) {
                User::where('id', $row->id)->update([
                    'is_plan_expired' => 1,
                    'updated_at' => $today
                ]);
                echo "Success";
            }
        } else {
            echo "No Data Found";
        }
    }

}
