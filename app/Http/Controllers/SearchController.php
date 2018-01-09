<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Project;
use \App\Product;
use \App\Supplier;
use Session;

class SearchController extends Controller
{
    public function index(Request $request){
    	$search_query = $request->query('search');
    	$result['projects'] = Project::where(['lang'=> Session::get('language'),'status'=>'1'])
    	->orWhere('name','like','%'.$search_query.'%')
    	->orWhere('description','like','%'.$search_query.'%')
    	->get();

    	$result['products'] = Product::where(['lang'=> Session::get('language'),'status'=>'1'])
    	->orWhere('name','like','%'.$search_query.'%')
    	->orWhere('description','like','%'.$search_query.'%')
    	->orWhere('model_no','like','%'.$search_query.'%')
    	->orWhere('sku','like','%'.$search_query.'%')
    	->get();

    	$result['suppliers'] = Supplier::where(['lang'=> Session::get('language'),'status'=>'1'])
    	->orWhere('name','like','%'.$search_query.'%')
    	->get();
    	
    	echo "<pre>";
    	print_r($result);die;
    }
}
