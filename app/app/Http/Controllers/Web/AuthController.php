<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{
    DB,
    Validator,
    Session,
    Hash,
    Auth,
    Redirect
};
use \App\Models\{
    User,
    State,
    TransactionHistory
};

class AuthController extends Controller {

    /** + 
     * used to register user
     * @param Request $request - request type post
     * @return type
     */
    public function register(Request $request) {
        try {
            $getStates = State::all();
            if ($request->isMethod('post')) {
                $validator = Validator::make($request->all(), [
                            'fname' => 'required',
                            'lname' => 'required',
                            'phone' => 'required',
                            'street_address' => 'required',
                            'city' => 'required',
                            'state' => 'required',
                            'zip' => 'required',
                            'email' => 'required|email|unique:users',
                            'password' => 'required',
                ]);

                if ($validator->fails()) {
                    return redirect()->back()->with('error', $validator->errors()->first())->withInput();
                }
                $fname = trim($request->fname);
                $lname = trim($request->lname);
                $email = trim($request->email);
                $phone = trim($request->phone);
                $street_address = trim($request->street_address);
                $apt_unit = trim($request->apt_unit);
                $city = trim($request->city);
                $state = trim($request->state);
                $zip = trim($request->zip);
                $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghjklmnopqrstuvwxyz';
                $user_code = substr(str_shuffle($str_result),
                        0, 5);
                $user = User::create([
                            'user_code' => $user_code,
                            'first_name' => $fname,
                            'last_name' => $lname,
                            'email' => $email,
                            'phone' => $phone,
                            'street_address' => $street_address,
                            'apt_unit' => $apt_unit,
                            'city' => $city,
                            'state' => $state,
                            'zip' => $zip,
                            'email_verified_at' => date('Y-m-d H:i:s'),
                            'password' => Hash::make($request->password)
                ]);
                if ($user->id > 0) {
                    if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                        $user = Auth::user();
                        return Redirect::to('user/dashboard');
                    } else {
                        return Redirect::to('login')->with('error', "Email/Password not valid")->withInput();
                    }
                } else {
                    return redirect()->back()->with('error', "Something went wrong")->withInput();
                }
            } else {
                if (isset(auth()->user()->id) && auth()->user()->id != null) {
                    return Redirect::to('user/dashboard');
                } else {
                    return view('web.register', compact('getStates'));
                }
            }
        } catch (NotFoundHttpException $exception) {
            echo $exception->getMessage();
            die;
        }
    }

    /** + 
     * used to login
     * @param Request $request - request type post
     * @return type
     */
    public function login(Request $request) {
        try {
            if ($request->isMethod('post')) {
                $validator = Validator::make($request->all(), [
                            'email' => 'required|email|exists:users,email',
                            'password' => 'required',
                                ], ['email.exists' => "Email not associate with us"]);

                if ($validator->fails()) {
                    return redirect()->back()->with('error', $validator->errors()->first())->withInput();
                }
                if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                    $user = Auth::user();
                    if ($user->role_id == 1) {
                        return Redirect::to('user/dashboard');
                    } else {
                        Auth::logout();
                        return Redirect::to('login')->with('error', "Email/Password not valid")->withInput();
                    }
                } else {
                    return Redirect::to('login')->with('error', "Email/Password not valid")->withInput();
                }
            } else {
                if (isset(auth()->user()->id) && auth()->user()->id != null) {
                    return Redirect::to('user/dashboard');
                } else {
                    return view('web.login');
                }
            }
        } catch (NotFoundHttpException $exception) {
            echo $exception->getMessage();
            die;
        }
    }

    /** + 
     * 
     * used to logout from user
     * @param Request $request
     * @return type
     */
    public function logout(Request $request) {
        if (Auth::check()) {
            Auth::logout();
            $request->session()->invalidate();
            return Redirect::to('login');
        } else {
            return redirect()->back()->with('error', 'Error in logout');
        }
    }

    /** + 
     * used to request for forgot password
     * @param Request $request - request type get/post
     * @return type
     */
    public function forgotPassword(Request $request) {
        try {
            if ($request->isMethod('post')) {
                $validator = Validator::make($request->all(), [
                            'email' => 'required|email|exists:users,email',
                                ], ['email.exists' => "Email not associate with us"]);

                if ($validator->fails()) {
                    return redirect()->back()->with('error', $validator->errors()->first())->withInput();
                }
                $userDetails = User::where('email', $request->email)->where('role_id', 1)->first();
                if ($userDetails == null) {
                    return redirect()->back()->with('error', "Email not associate with us")->withInput();
                }
                $email = $request->email;
                $str_result = '123456789ABCDEFGHIJKLMNPQRSTUVWXYZabcdefghjklmnpqrstuvwxyz';
                $user_password = substr(str_shuffle($str_result),
                        0, 7);
                User::where('id', $userDetails->id)->update([
                    'password' => Hash::make($user_password),
                    'updated_at' => date('Y-m-d H:i:s')
                ]);
                // Build the email content.

                $emailContent = view('email.forgot_password', [
                    'name' => ucfirst($userDetails->first_name . " " . $userDetails->last_name),
                    'password' => $user_password,
                    'body' => ""
                ]);
                $emailHtml = $emailContent->render();
                // Set the email subject.
                $subject = "WatchDog - Forgot Password";

                // Build the email headers
                $email_headers = 'From: WatchDog <watchdog@mail.com>' . "\r\n" .
                        'Reply-To: watchdog@mail.com' . "\r\n" .
                        "Content-type:text/html;charset=UTF-8" . "\r\n" .
                        'X-Mailer: PHP/' . phpversion();

                // Send the email.
                if (mail($email, $subject, $emailHtml, $email_headers)) {
                    return Redirect::to('forgot-password')->with('success', "New password has been sent on email");
                } else {
                    return Redirect::to('forgot-password')->with('error', "Mail not sent");
                }
            } else {
                return view('web.forgot_password');
            }
        } catch (NotFoundHttpException $exception) {
            echo $exception->getMessage();
            die;
        }
    }

}
