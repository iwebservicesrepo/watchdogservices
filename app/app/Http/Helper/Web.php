<?php

namespace App\Http\Helper;

use Mail;
use Carbon\Carbon;
use DB;
use App\Models\User;

class Web {

    /** + 
     * used to get total number of users that are not deleted
     * @return type
     */
    public static function getUserTotalCount() {
        $count = User::where('role_id', 1)->count();
        return $count;
    }

    /** + 
     * used to generate random alphanumeric string
     * @param type $length_of_string - length of string
     * @return type
     */
    public static function generateRandomString($length_of_string) {
        // String of all alphanumeric character
        $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghjklmnopqrstuvwxyz';

        return substr(str_shuffle($str_result),
                0, $length_of_string);
    }

    /** + 
     * used to get name of plan
     * @param type $price - price value
     * @return string
     */
    public static function getPlanName($price) {
        if ((int) $price == env('PRICE_1')) {
            $plan_name = "Standard";
            $subscriptionType = "/Month";
        } else if ((int) $price == env('PRICE_2')) {
            $plan_name = "Per Year";
            $subscriptionType = "/Year";
        } else if ((int) $price == env('PRICE_3')) {
            $plan_name = "Package";
            $subscriptionType = "/4 Year";
        } else {
            $plan_name = "N/A";
            $subscriptionType = "";
        }
        return array('subscriptionType' => $subscriptionType, 'plan_name' => $plan_name);
    }

}
