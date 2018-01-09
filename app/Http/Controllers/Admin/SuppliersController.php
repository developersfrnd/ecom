<?php

namespace App\Http\Controllers\Admin;

use App\Supplier;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;

class SuppliersController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return view('admin.suppliers.index',['suppliers'=> Supplier::where('lang',Session::get('language'))->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $supplier = new Supplier();
       return view('admin.suppliers.create',['supplier'=>$supplier]); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $validator = \Validator::make($request->all(), [
            'name' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

       $data = $request->all();
       $data['lang'] = $request->session()->get('language');
       $supplier = Supplier::create($data);
       $supplier->save();
       return redirect($this->ADMIN_URL.'/suppliers'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function show(Supplier $supplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function edit(Supplier $supplier)
    {
      return view('admin.suppliers.create',['supplier'=> Supplier::find($supplier->id)]); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Supplier $supplier)
    {
        $validator = \Validator::make($request->all(), [
            'name' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        
        $supplier = Supplier::find($supplier->id);
        $supplier->name = $request->name;
        $supplier->save();
        return redirect($this->ADMIN_URL.'/suppliers')->with('status', 'Record updated!');; 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supplier $supplier)
    {
        $supplier = Supplier::find($supplier->id);
        $supplier->delete();
        return redirect($this->ADMIN_URL.'/suppliers')->with('status','Deleted Successfully!'); 
    }
}
