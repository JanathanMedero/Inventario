<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(StoreProductRequest $request)
    {
        $random = Str::random(20);

        if ($request->hasFile('image')) 
        {
            $extension = $request->file('image')->extension();

            $file = $request->file('image');
            $name = $random.'.'.$extension;
            $file->move(public_path().'/imagenes/', $name);

            $image = $name;
        }else
        {
            $image = 'no-image.png';
        }

        Product::create([
            'department'        => $request->department,
            'slug'              => Str::random(25),
            'public_price'      => $request->public_price,       
            'dealers'           => $request->dealers,       
            'description'       => $request->description,       
            'image'             => $image,
            'existence_matriz'  => $request->existence_matriz, 
            'existence_virrey'  => $request->existence_virrey, 
            'existence_general' => $request->existence_general, 
            'pyscom_price'      => $request->pyscom_price,
            'model'             => $request->model,
            'sat_key'           => $request->sat_key,
            'sat_description'   => $request->sat_description,
            'price_2x1'         => $request->price_2x1,
            'gain_2x1'          => $request->gain_2x1,
            'normal_gain'       => $request->normal_gain,
        ]);
        
        return redirect()->route('inventory.index');

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
    public function edit($slug)
    {
        $product = Product::where('slug', $slug)->first();

        return view('auth.product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {

        $product = Product::where('slug', $slug)->first();

        $random = Str::random(20);

        if ($request->hasFile('image')) 
        {
            $extension = $request->file('image')->extension();

            if (file_exists(public_path('imagenes/'.$product->image)))
            {
                if ($product->image != 'no-image.png') {
                    unlink(public_path('imagenes/'.$product->image));
                }
            }

            $file = $request->file('image');
            $name = $random.'.'.$extension;
            $file->move(public_path().'/imagenes/', $name);

            $image = $name;
        }else
        {
            $image = 'no-image.png';
        }

        $product->department        = $request->department;
        $product->slug              = $product->slug;
        $product->public_price      = $request->public_price;
        $product->dealers           = $request->dealers;
        $product->description       = $request->description;
        $product->image             = $image;
        $product->existence_matriz  = $request->existence_matriz;
        $product->existence_virrey  = $request->existence_virrey;
        $product->existence_general = $request->existence_general;
        $product->pyscom_price      = $request->pyscom_price;
        $product->model             = $request->model;
        $product->sat_key           = $request->sat_key;
        $product->sat_description   = $request->sat_description;
        $product->price_2x1         = $request->price_2x1;
        $product->gain_2x1          = $request->gain_2x1;
        $product->normal_gain       = $request->normal_gain;

        $product->save();
        
        return redirect()->route('inventory.index')->with('success', 'Producto actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $product = Product::where('slug', $slug)->first();

        if (Storage::disk('public')->exists($product->image))
        {
            Storage::disk('public')->delete($product->image);
        }

        $product = Product::where('slug', $slug)->delete();

        return back()->with('success', 'Producto eliminado correctamente');
    }
}
