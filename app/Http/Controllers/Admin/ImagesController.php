<?php

namespace App\Http\Controllers\Admin;

use App\Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductImagesRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ImagesController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        echo "Hello"; die;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($product_id)
    {   
        $images = Image::where(['product_id'=>$product_id])->get();
        return view('admin.images.create',compact('product_id','images'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductImagesRequest $request)
    {
        foreach ($request->images as $key=>$image) {
            $filename = $image->store('uploads');

            $main_image = '0';
            if($key==0){
                $main_image = '1';
            }

            Image::create([
                'product_id' => $request->product_id,
                'image' => $filename,
                'main_image' => $main_image,
                'display_order' => $key
            ]);
        }
        return redirect($this->ADMIN_URL.'/images/create/'.$request->product_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function show(Image $image)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function edit(Image $image)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Image $image)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        $image = Image::find($id);
        $product_id = $image->product_id;
        $image->delete();
        //Storage::delete(['file1.jpg', 'file2.jpg']);
        return back()->with('status','deleted successfully.');
    }
}
