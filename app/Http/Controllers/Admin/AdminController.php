<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
	protected $ADMIN_URL;

    public function __construct(){
    	$this->ADMIN_URL = config('constants.ADMIN_URL');
    }
}
