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
    	$search_query = $request->query('q');
        if(empty($search_query)){
            return redirect('/');
        }
        //1:products,2:projects
        if($request->query('t')){

            if($request->query('t')=='2'){
                $projects = Project::where(['lang'=> Session::get('language'),'status'=>'1'])
                    ->orWhere('name','like','%'.$search_query.'%')
                    ->orWhere('description','like','%'.$search_query.'%')
                    ->get();   
            }
            elseif($request->query('t')=='1'){
                $products = Product::where(['lang'=> Session::get('language'),'status'=>'1'])
                    ->orWhere('name','like','%'.$search_query.'%')
                    ->orWhere('description','like','%'.$search_query.'%')
                    ->orWhere('model_no','like','%'.$search_query.'%')
                    ->orWhere('sku','like','%'.$search_query.'%')
                    ->get();   
            }
            else{
                return redirect('/');
            }
        }
        else{
            $products = Product::where(['lang'=> Session::get('language'),'status'=>'1'])
                ->orWhere('name','like','%'.$search_query.'%')
                ->orWhere('description','like','%'.$search_query.'%')
                ->orWhere('model_no','like','%'.$search_query.'%')
                ->orWhere('sku','like','%'.$search_query.'%')
                ->get();   
        }
        
    	// echo "<pre>";
    	// print_r($result);die;
        return view('search.index',compact('products','projects'));
    }
}
