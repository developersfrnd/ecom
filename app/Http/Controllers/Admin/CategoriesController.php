<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use Validator;

class CategoriesController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.categories.index',['categories'=> Category::where('lang',Session::get('language'))->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where('parent_id',0)->where('lang',Session::get('language'))->pluck('title','id');
        $category = new Category();
        return view('admin.categories.create',['category'=>$category,'categories'=>$categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'title' => 'required|max:200',
            ]);    

        if($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }

        $category = new Category;
        $category->lang = $request->session()->get('language');
        $category->title = $request->title;
        $category->parent_id = $request->parent_id;
        $category->save();
        return redirect($this->ADMIN_URL.'/categories'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $categories = Category::where('parent_id',0)
            ->where('lang',Session::get('language'))
            ->pluck('title','id');
        $category = Category::find($category->id);
        return view('admin.categories.create',['category'=> $category,'categories' => $categories]); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $category = Category::find($category->id);
        $category->lang = $request->session()->get('language');
        $category->title = $request->title;
        $category->parent_id = $request->parent_id;
        $category->save();
        return redirect($this->ADMIN_URL.'/categories'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category = Category::find($category->id);
        $category->delete();
        return redirect($this->ADMIN_URL.'/categories')->with('status','Deleted Successfully!'); 
    }
}
