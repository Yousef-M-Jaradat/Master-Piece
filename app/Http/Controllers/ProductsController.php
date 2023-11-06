<?php

namespace App\Http\Controllers;

use App\Models\categories;
use App\Models\products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function productCategory($id)
    {
        $category = categories::all();
        $product = Products::where('categoryId',$id)->get();

        return view('template.product.product', compact('product','category'));
    }
    public function index()
    {
        $products = Products::all();
        return view('template.pages.products', compact('products'));
    }
    public function allProduct()
    {
        $category = categories::all();
        $product = Products::all();
        return view('template.product.product', compact('product','category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('template.pages.productsCreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $validatedData = $request->validate([
        //     'name' => 'required',
        //     'password' => 'required',
        //     'email' => 'required|email|unique:admins,email,',
        //     'phone' => 'required|numeric',
        //     'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust validation rules as needed
        // ]);

        // Upload and store the image
        $image1 = $request->file('image1');
        $image1Name = time() . '.' . $image1->getClientOriginalExtension();
        $image1->move(public_path('image/mas/img'), $image1Name);

        $image2 = $request->file('image2');
        $image2Name = time() . '.' . $image2->getClientOriginalExtension();
        $image2->move(public_path('image/mas/img'), $image2Name);

        $image3 = $request->file('image3');
        $image3Name = time() . '.' . $image3->getClientOriginalExtension();
        $image3->move(public_path('image/mas/img'), $image3Name);

        // Create a new product with the image filename
        products::create([
            'productName' => $request->name,
            'price' => $request->price,
            'categoryId' => $request->category,
            'Sdescription' => $request->Sdescription,
            'Ldescription' => $request->Ldescription,
            'image1' => $image1Name,
            'image2' => $image2Name,
            'image3' => $image3Name,
        ]);

        return redirect()->route('products.index')->with('success', 'Product Created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\products  $products
     * @return \Illuminate\Http\Response
     */
    public function show(products $products)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\products  $products
     * @return \Illuminate\Http\Response
     */
    public function edit(Products $product)
    {
        // dd($product->);
        return view('template.pages.productsUpdate', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Products $product)
    {
        // $validatedData = $request->validate([
        //     'name' => 'required',
        //     'email' => 'required|email|unique:admins,email,' . $admin->id,
        //     'phone' => 'required|numeric',
        //     'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp', // Adjust validation rules as needed
        // ]);

        // Upload and store the image
        $image1 = $request->file('image1');
        $imageName1 = time() . '.' . $image1->getClientOriginalExtension();
        $image1->move(public_path('image/mas/img'), $imageName1);

        $image2 = $request->file('image2');
        $imageName2 = time() . '.' . $image2->getClientOriginalExtension();
        $image2->move(public_path('image/mas/img'), $imageName2);

        $image3 = $request->file('image3');
        $imageName3 = time() . '.' . $image3->getClientOriginalExtension();
        $image3->move(public_path('image/mas/img'), $imageName3);


        $product->update([
            'productName' => $request->name,
            'price' => $request->price,
            'Sdescription' => $request->Sdescription,
            'Ldescription' => $request->Ldescription,
            'image1' => $imageName1,
            'image2' => $imageName2,
            'image3' => $imageName3,
        ]);

        if (!$product->save()) {
            return redirect()->route('products.index')->with('error', 'Error updating product.');
        }

        return redirect()->route('products.index')->with('success', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\products  $products
     * @return \Illuminate\Http\Response
     */ 
       public function destroy(Products $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('products deleated successfully');
    }

    // public function cat(Request $request)
    // {
    //     // Retrieve the selected price range
    //     $priceRange = $request->input('price_range');

    //     // Initialize min and max price variables
    //     $minPrice = null;
    //     $maxPrice = null;

    //     // Parse the selected price range, if any
    //     if ($priceRange) {
    //         list($minPrice, $maxPrice) = explode('-', $priceRange);
    //     }

    //     // Fetch products based on the selected price range or get all products if no range is selected
    //     $products = ($minPrice !== null && $maxPrice !== null)
    //         ? Products::whereBetween('price', [$minPrice, $maxPrice])->get()
    //         : Products::all();

    //     return view('categories', compact('products'));
    // }


    // public function searchByName(Request $request)
    // {
    //     // Retrieve the user's search input
    //     $searchQuery = $request->input('product_name');

    //     // Filter products based on the name attribute
    //     $products = Products::where('name', 'like', '%' . $searchQuery . '%')->get();

    //     return view('categories', compact('products'));
    // }

}
