<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //grab the last 5 items and paginate them
        $products = Product::orderBy('id','desc')->simplePaginate(5);
        //return a view with products to display
        return view('products.index')->with('products',$products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //this function handles the creation of a new product
        //first, validate the input
        $validated = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'price' => 'required|numeric'
        ]);

        //create new product
        $product = new Product;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->save();
        //redirect user back to products page with a succees message
        return redirect()->route('products.index')->with('success','Product created successefully !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //retreive the product with the corresponding id
        $product = Product::find($id);
        return view('products.show')->with('product',$product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //retreive the ressource to update wich corresponds to the id parameter
        $product = Product::find($id);
        //return the form allowing user to edit the specified ressource
        return view('products.edit')->with('product',$product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //validate the data coming from the edit form
        $validated = $request->validate([
            'name' => 'required|alpha',
            'description' =>'required',
            'price' => 'required|numeric'
        ]);
        //retreive the ressource that must be updated in storage
        $product = Product::find($id);
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        //save the product to database
        $product->save();
        //flash a succees message to session
        $request->session()->flash('success','the product was succesefully updated !');
        //redirect the user back to the show page to see the new updated product
        return redirect()->route('products.show',$product->id);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        //retreive the ressource to delete
        $product = Product::find($id);
        //delete the product
        $product->delete();
        //redirect the user with a flash message
        $request->session()->flash('success','Product deleted with success !');
        return redirect()->route('products.index');
    }
}
