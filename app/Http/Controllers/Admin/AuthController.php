<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\App;
use Config;
use Session;
use Auth;

class AuthController extends AdminController
{
    public function getLogin()
	{ 
		if (Auth::check()) {
			// Logged in, go to the dashboard
			return redirect($this->ADMIN_URL.'/dashboard');
		}

		return view('admin.auth.login');
	}

	public function postLogin(){
		$credentials = array('email'=>Input::get('email'),'password'=>Input::get('password'));
		if(Auth::attempt($credentials)){
			return redirect($this->ADMIN_URL.'/dashboard');
		}else{
			return back()->withInput();
		}
	}

	public function dashboard(){
		$projects_count = \App\Project::all()->count();
		$orders_count = \App\Order::all()->count();
		$users_count = \App\User::all()->count();
		return view('admin.auth.dashboard',compact('projects_count','orders_count','users_count'));
	}

	public function logout(){
		Auth::logout();
		return redirect('/'.$this->ADMIN_URL);
	}

	public function switchLang($lang)
    {
        //$language = Session::get('language', Config::get('app.locale'));
        App::setLocale($lang);
        Session::put('language', $lang);
        return redirect($this->ADMIN_URL.'/dashboard');
    }
}
