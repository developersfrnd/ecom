<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\App;
use Config;
use Session;
use Auth;

class AuthController extends Controller
{
    
    public function getLogin()
	{ 	
		if (Auth::check()) {
			// Logged in, go to the dashboard
			return redirect(url('/user'));
		}

		return view('auth.login');
	}

	public function postLogin(){
		$credentials = array('email'=>Input::get('email'),'password'=>Input::get('password'),'status'=>'1');
		if(Auth::attempt($credentials)){
			return redirect()->action('ProjectsController@index');
		}else{
			return back()->withInput()->withErrors(['message1'=>'Invalid username or password.']);
		}
	}


	public function logout(){
		Auth::logout();
		return redirect(url('/login'));
	}

	public function switchLang($lang)
    {
        //$language = Session::get('language', Config::get('app.locale'));
        App::setLocale($lang);
        Session::put('language', $lang);
        return Redirect::to('/');
    }
}
