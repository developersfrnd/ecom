<?php

namespace App\Http\Controllers\Admin;

use App\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use Validator;

class ProjectsController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.projects.index',['projects'=> Project::where('lang',Session::get('language'))->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $project = new Project();
        $products = \App\Product::where(['status'=>'1','lang'=>Session::get('language')])->get();
        $project_products = [];
        return view('admin.projects.create',['project'=>$project,'products'=>$products,'project_products'=>$project_products]); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $filename = '';
        if(!empty($request->image)){
            $filename = $request->image->store('uploads');
        }

        $project = new Project;
        $project->lang = $request->session()->get('language');
        $project->name = $request->name;
        $project->description = $request->description;
        $project->image = $filename;
        $project->save();

        $project->products()->attach($request->products);
        return redirect($this->ADMIN_URL.'/projects'); 
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
        $project = Project::find($project->id);
        $products = \App\Product::where('status','1')->get();
        $project_products = [];
        foreach($project->products as $product){
            $project_products[] = $product->pivot->product_id;
        }

        return view('admin.projects.create',['project'=> $project,'products'=> $products,'project_products'=>$project_products]); 
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
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $project = Project::find($project->id);
        $project->name = $request->name;
        $project->description = $request->description;

        if(!empty($request->image)){
            $project->image = $request->image->store('uploads');
        }

        $project->save();

        $project_products = [];
        foreach($project->products as $product){
            $project_products[] = $product->pivot->product_id;
        }

        $project->products()->detach();
        $project->products()->attach($request->products);

        return redirect($this->ADMIN_URL.'/projects')->with('status', 'Record updated!'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project = Project::find($project->id);
        $project->delete();
        return redirect($this->ADMIN_URL.'/projects')->with('status','Deleted Successfully!'); 
    }

    public function getUsers($project_id){

      $users = \App\User::where(['status'=>'1','role_id'=>'0'])->get();
      $project = Project::find($project_id);

        $project_user = [];
        foreach ($project->users as $user) {
           $project_user[] = $user->pivot->user_id;
        }
      
      
      //,'product','product_supplier','product_supplier_price','default_supplier'
      return view('admin.projects.users',compact('users','project','project_user'));
    }

    public function postUsers(Request $request,$project_id){
        
        $project = Project::find($project_id);
        $project->users()->detach();
        if(count($request->user_id) > 0){

            $project_users = $request->all();

            $project->users()->attach($project_users['user_id']);
            return back()->with('status','Added Successfully!'); 
        }else{
            return back()->with('status','No Record Added!'); 
        }    
    }
}
