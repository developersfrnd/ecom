<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Crypt;
use App\Product;
use App\Category;
use Session;

class ProductsController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.products.index',['products'=> Product::where('lang',Session::get('language'))->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {   
        $product = new Product();
        $categories = Category::where('lang',$request->session()->get('language'))
                                  ->where('parent_id',0)
                                  ->get();
                                  // echo "<pre>";
                                  // print_r($categories);die;
        return view('admin.products.create',['product'=>$product,'categories'=>$categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
       $product = new Product;
       $product->lang = $request->session()->get('language');
       $product->category_id = $request->category_id;
       $product->name = $request->name;
       $product->model_no = $request->model_no;
       $product->sku = $request->sku;
       $product->meta_keyword = $request->meta_keyword;
       $product->meta_description = $request->meta_description;
       $product->short_description = $request->short_description;
       $product->description = $request->description;
       
       $product->save();
       return redirect($this->ADMIN_URL.'/products'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,Product $product)
    {
      $categories = Category::where('lang',$request->session()->get('language'))
                        ->where('parent_id',0)
                        ->get();
      $product = Product::find($product->id);
      return view('admin.products.create',['product'=> $product,'categories'=>$categories]); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
       $product = Product::find($product->id);
       $product->category_id = $request->category_id;
       $product->name = $request->name;
       $product->sku = $request->sku;
       $product->model_no = $request->model_no;
       $product->meta_keyword = $request->meta_keyword;
       $product->meta_description = $request->meta_description;
       $product->short_description = $request->short_description;
       $product->description = $request->description;
       $product->save();
       return redirect($this->ADMIN_URL.'/products'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product = Product::find($product->id);
        $product->delete();
        return redirect($this->ADMIN_URL.'/products')->with('status','Deleted Successfully!'); 
    }


    public function getProductSuppliers($product_id){

      $suppliers = \App\Supplier::where(['status'=>'1','lang'=>Session::get('language')])->get();
      $product = Product::find($product_id);

      $product_supplier = [];
      $product_supplier_price = [];
      $default_supplier = '';
      foreach ($product->supplier as $supplier) {

          $product_supplier[] = $supplier->pivot->supplier_id;
          $product_supplier_price[$supplier->pivot->supplier_id] = $supplier->pivot->price;

          if($supplier->pivot->is_default){
              $default_supplier = $supplier->pivot->supplier_id;
          }
      }
      
      if($product->supplier->count() === 0){
          $default_supplier = $suppliers->first()->id;
      }
      
      return view('admin.products.suppliers',compact('suppliers','product','product_supplier','product_supplier_price','default_supplier'));
    }

    public function postProductSuppliers(Request $request,$product_id){
        $product_suppliers = $request->all();
        $product_suppliers_arr = [];
        foreach($product_suppliers['price'] as $key => $val){

          if(in_array($key, $product_suppliers['supplier_id'])){
            $product_suppliers_arr[$key] = ['price' => $val[0],'is_default' => '0'];

            if($key==$product_suppliers['is_default']){
              $product_suppliers_arr[$key]['is_default'] = '1';
            }
          }  
        }

        $product = Product::find($product_id);
        $product->supplier()->detach();
        $product->supplier()->attach($product_suppliers_arr);
        return redirect($this->ADMIN_URL.'/products/product-suppliers/'.$product->id)->with('status','Added Successfully!'); 
    }
}
