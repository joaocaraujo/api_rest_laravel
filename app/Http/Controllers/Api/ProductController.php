<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Store;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Store $store)
    {
        return $store->products;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Store $store)
    {
        $product = $store->products()->create($request->all());
    
        return $product;
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Store $store, $id)
    {
        $product = $store->products()->findOrFail($id);
    
        return $product;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Store $store
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Store $store, $id)
    {
        $product = $store->products()->findOrFail($id);
        $product->update($request->all());
    
        return $product;
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Store $store, $id)
    {
        $product = $store->products()->findOrFail($id);
        $product->delete();
    
        return "Deleted successfully";
    }
}
