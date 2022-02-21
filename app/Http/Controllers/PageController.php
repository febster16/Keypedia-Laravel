<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $date = new DateTime();
        return view('login', ['date' => $date]);
    }

    public function home() {
        $categories = Category::all();
        $date = new DateTime();
        return view('home', ['date' => $date, 'categories' => $categories]);
    }

    public function homeManager () {
        $categories = Category::all();
        $date = new DateTime();
        return view('homeManager', ['date' => $date, 'categories' => $categories]);
    }

    public function logout() {
        Auth::logout();
        return redirect('login');
    }

    public function registerForm()
    {
        $date = new DateTime();
        return view('register', ['date' => $date]);
    }


    public function login(Request $request) {
        $date = new DateTime();
        $credential = $request->validate([
            'email' => 'required|email',
            'password'=> 'required',
        ]);


        if(Auth::attempt($credential, true)){
            Session::put('email', $credential['email']);
            if($request->remember) {
                Cookie::queue('email', $credential['email'], 60 * 24 * 7);
                Cookie::queue('password', $credential['password'],  60 * 24 * 7);
            }

            return redirect('home')->with(['date' => $date]);
        }

        return redirect()->back()->withErrors('Wrong Email or Password!');
    }

    public function register(Request $request) {
        $date = new DateTime();
        $data = $request->validate([
            'name'=> 'required|min:5',
            'email' => 'required|email|unique:users',
            'password'=> 'min:8|required_with:confirmPassword|same:confirmPassword',
            'confirmPassword'=> 'min:8',
            'address'=> 'required|min:10',
            'gender'=> 'required',
            'birth'=> 'required',
        ]);

        $users = new User();
        $users->name = $data['name'];
        $users->email = $data['email'];
        $users->password = Hash::make($data['password']);
        $users->address = $data['address'];
        $users->gender = $data['gender'];
        $users->dateOfBirth = $data['birth'];
        $users->role = 'user';

        $users->save();

        return view('login', ['date' => $date]);
    }

    public function changePassword() {
        $categories = Category::all();
        $date = new DateTime();
        return view('changePassword', ['date' => $date, 'categories' => $categories]);
    }

    public function updatePassword(Request $request) {
        $categories = Category::all();
        $date = new DateTime();

        if(!Hash::check($request->currentPassword, Auth::user()->password)) {
            return redirect()->back()->withErrors('Your Current Password is Incorrect');
        }

        $data = $request->validate([
            'newPassword'=> 'min:8|required_with:confirmPassword|same:confirmPassword',
            'confirmPassword' => 'min:8',
        ]);

        $users = User::find(Auth::user()->id);
        $users->password = Hash::make($data['newPassword']);

        $users->save();

        return redirect()->back()->with(['date' => $date, 'categories'=>$categories])->withSuccess("Your Password has been Successfully Changed!");
    }

}
