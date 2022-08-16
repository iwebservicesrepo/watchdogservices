<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Mail;
use App\Http\Helper\Web;

class AuthController extends Controller {

    /** + 
     * 
     * used to login in admin
     * @param Request $request
     * @return type
     */
    public function login(Request $request) {
        try {
            if ($request->isMethod('post')) {
                $validator = Validator::make($request->all(), [
                            'email' => 'required|email',
                            'password' => 'required',
                ]);

                if ($validator->fails()) {
                    return Redirect::to('admin/login')->with('error', $validator->errors()->first())->withInput();
                }
                try {
                    $user = User::where('email', $request->email)->first();
                    if ($user == null) {
                        return Redirect::to('admin/login')->with('error', "Email is not associated with this app")->withInput();
                    }
                    if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                        $user = Auth::user();
                        $role_id = (int) $user->role_id;
                        if ($role_id != 2) {
                            Auth::logout();
                            return Redirect::to('admin/login')->with('error', "Access Denied")->withInput();
                        } else {
                            return Redirect::to('admin/users');
                        }
                    } else {
                        return Redirect::to('admin/login')->with('error', "Email/Password not valid")->withInput();
                    }
                } catch (Exception $ex) {
                    return Redirect::to('admin/login')->with('error', $ex->getMessage())->withInput();
                }
            } else {
                return view('admin.login');
            }
        } catch (NotFoundHttpException $exception) {
            Session::flash('error', $exception);
            return view('admin.login');
        }
    }

    /** + 
     * 
     * used to logout from admin
     * @param Request $request
     * @return type
     */
    public function logout(Request $request) {
        if (Auth::check()) {
            Auth::logout();
            $request->session()->invalidate();
            return Redirect::to('admin/login');
        } else {
            return redirect()->back()->with('error', 'Error in logout');
        }
    }

    public function forgotPassword(Request $request) {
        try {
            if ($request->isMethod('post')) {
                $validator = Validator::make($request->all(), [
                            'email' => 'required|email',
                ]);

                if ($validator->fails()) {
                    return Redirect::to('admin/admin-forgot-password')->with('error', $validator->errors()->first())->withInput();
                }
                try {
                    $user = User::where('email', $request->email)->where('role_id', 2)->first();
                    if ($user == null) {
                        return Redirect::to('admin/admin-forgot-password')->with('error', "Email is not associated with this app")->withInput();
                    }
                    $password = Web::generateRandomString(7);
                    $email = $request->email;
                    Mail::send('email.forgot_password',
                            [
                                'name' => ucfirst($user->first_name . " " . $user->last_name),
                                'password' => $password,
                                'body' => "New password"
                            ],
                            function ($m) use ($email) {
                                $m->to($email)->subject('WatchDog - Forgot Password');
                            });
                    User::where('id', $user->id)->update([
                        'password' => Hash::make($password),
                        'updated_at' => date('Y-m-d H:i:s')
                    ]);
                    return Redirect::to('admin/admin-forgot-password')->with('success', "New password sent to your email");
                } catch (Exception $ex) {
                    return Redirect::to('admin/admin-forgot-password')->with('error', $ex->getMessage())->withInput();
                }
            } else {
                return view('admin.forgot_password');
            }
        } catch (NotFoundHttpException $exception) {
            Session::flash('error', $exception);
            return view('admin.login');
        }
    }

    /** + 
     * 
     * used to update admin profile
     * @param Request $request - request type get/post
     * @return type
     */
    public function updateProfile(Request $request) {
        try {
            if ($request->isMethod('post')) {
                $validator = Validator::make($request->all(), [
                            'email' => 'required|email',
                ]);

                if ($validator->fails()) {
                    return Redirect::to('admin/profile')->with('error', $validator->errors()->first())->withInput();
                }
                try {
                    $user = auth()->user();
                    $user->email = $request->email;
                    if ($request->password != '') {
                        $user->password = Hash::make($request->password);
                    }
                    $user->save();
                    return Redirect::to('admin/profile')->with('success', "Profile updated successfully");
                } catch (Exception $ex) {
                    return Redirect::to('admin/profile')->with('error', $ex->getMessage())->withInput();
                }
            } else {
                return view('admin.pages.admin_profile');
            }
        } catch (NotFoundHttpException $exception) {
            Session::flash('error', $exception);
            return view('admin.login');
        }
    }

}
