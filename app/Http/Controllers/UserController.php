<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function account_maintenance(){
        $users = DB::table('users')->paginate(10);
        return view('maintain_account', compact('users'));
    }

    public function delete_account(Request $request){
        $cart = User::find($request->user_id);
        $cart->delete();

        echo "<script>
                alert('Successfully Delete Account!');
                window.location.href='/account_maintenance';
               </script>";
    }

    public function update_role_form(Request $request){
        $user = User::find($request->user_id);
        return view('role_update', compact('user'));
    }

    public function update_role(Request $request){
        $user = User::find($request->user_id);

        $user->role_id = $request->role_id;

        $user->save();

        echo "<script>
                alert('Successfully update the role!');
                window.location.href='/account_maintenance';
               </script>";
    }

    public function login_form(){
        return view('login');
    }

    public function login_logic(Request $request){
        $validator = Validator::make($request->all(),
        [
           'email' => 'required',
           'password' => 'required'
        ],
        [
            'required' => 'The :attribute field is required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $cred = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        $email = $request->get('email');
        $password = $request->get('password');

        if (auth()->attempt(['email' => $email, 'password' => $password])) {
            if ($request->remember != null) {
                Cookie::queue(Cookie::make('remember', $email, 60));
            }
            Session::put('user', Auth::user());
            return redirect()->route('home');
        } else {
            return redirect()->back()->with('error', 'Credential doesn\'t match.');
        }
    }

    public function register_form(){
        return view('register');
    }

    public function register_logic(Request $request){
        $request->validate([
            'role_id'=>'required',
            'gender_id'=>'required',
            'first_name' => 'required|max:25|alpha_num',
            'last_name' => 'required|max:25|alpha_num',
            'email' => 'required|email|regex:/^.*(?=.*?@.).*$/',
            'password' => 'required|confirmed|min:8|regex:/^.*(?=.*?[0-9]).*$/',
            'password_confirmation' => 'required|min:8',
            'display_picture_link' => 'required|image|mimes:jpg,jpeg,png'
        ]);

        $role_id = $request->get('role_id');
        $gender_id = $request->get('gender_id');
        $first_name = $request->get('first_name');
        $last_name = $request->get('last_name');
        $email = $request->get('email');
        $password = $request->get('password');

        $original_name = $request->file('display_picture_link')->getClientOriginalName();
        $original_ext = $request->file('display_picture_link')->getClientOriginalExtension();
        $product_filename = $original_name . '_' . time() . '.' . $original_ext;
        $request->file('display_picture_link')->storeAs('public/images', $product_filename);

        $new_user = new User();
        $new_user->setAttribute('role_id', $role_id);
        $new_user->setAttribute('gender_id', $gender_id);
        $new_user->setAttribute('first_name', $first_name);
        $new_user->setAttribute('last_name', $last_name);
        $new_user->setAttribute('email', $email);
        $new_user->setAttribute('display_picture_link', $product_filename);
        $new_user->setAttribute('password', Hash::make($password));

        $new_user->save();

        echo "<script>
                alert('Successfully Register your Account. Please Login using Email and Password!');
                window.location.href='/login';
               </script>";
    }

    public function profile(){
        return view('profile');
    }

    public function update_logic(Request $request){
        $request->validate([
            'gender_id'=>'required',
            'first_name' => 'required|max:25|alpha_num',
            'last_name' => 'required|max:25|alpha_num',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8|regex:/^.*(?=.*?[0-9]).*$/',
            'password_confirmation' => 'required|min:8',
            'display_picture_link' => 'image|mimes:jpg,jpeg,png'
        ]);

        $gender_id = $request->get('gender_id');
        $first_name = $request->get('first_name');
        $last_name = $request->get('last_name');
        $email = $request->get('email');
        $password = $request->get('password');
        $image_file = $request->file('display_picture_link');

        $user_update = User::all()->find(Auth::user()->id);
        $user_update->setAttribute('gender_id', $gender_id);
        $user_update->setAttribute('first_name', $first_name);
        $user_update->setAttribute('last_name', $last_name);
        $user_update->setAttribute('email', $email);
        $user_update->setAttribute('password', Hash::make($password));

        // IF image update
        if($image_file){
            $original_name = $image_file->getClientOriginalName();
            $original_ext = $image_file->getClientOriginalExtension();
            $product_filename = $original_name . '_' . time() . '.' . $original_ext;
            $image_file->storeAs('public/images', $product_filename);
            $user_update->setAttribute('display_picture_link', $product_filename);
        }

        $user_update->save();

        return view('save');
    }

    public function logout(){
        auth()->logout();
        Cookie::queue(Cookie::forget('user'));
        Session::invalidate();
        Session::regenerateToken();
        return view('logout');
    }
}
