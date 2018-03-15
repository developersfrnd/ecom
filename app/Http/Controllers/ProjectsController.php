<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Session;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $projects = Project::where(['lang'=> Session::get('language'),'status'=>'1'])->get();
        return view('projects.index',compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        //
    }

    public function getProjectProducts($project_id){
        $project = Project::find($project_id);
        $products = $project->products()->get();
        $categories_arr = [];
        foreach($products as $product){
            $categories_arr[] = $product->category_id;
        }
        //dd($categories);
        $product_arr = [];
        foreach($products as $product){
        	$product_arr[] = $product->id;	
        }

        $categories_products_arr = [];
        $categories = \App\Category::whereIn('id',$categories_arr)->get();
        foreach($categories as $category){
        	$categories_products_arr[$category->id][] = $category->products()->whereIn('id',$product_arr)->get(); 
        }

         //echo "<pre>";
         //print_r($categories_products_arr);die;
        return view('projects.products',compact('products','project','categories','categories_products_arr'));
    }
}
