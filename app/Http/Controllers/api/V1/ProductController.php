<?php

namespace App\Http\Controllers\api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\ProductCollecton;
use App\Http\Resources\V1\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new ProductCollecton(Product::all());
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
        try {

            $product = new Product();
            $product->name = $request->name;
            $product->size = $request->size;
            $product->observation = $request->observation;
            $product->trademarks_id = $request->trademarks_id;
            $product->inventory_quantity = $request->inventory_quantity;
            $product->boarding_date = $request->boarding_date;
            $product->save();

            return response()->json([
                'message' => 'success',
                'data' =>  $product
            ]);
        } catch (\Throwable $th) {
            return  response()->json([
                'message' => ' Error ' . $th->__toString()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return new ProductResource($product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        try {
            $product = Product::findOrFail($id);
            $product->name = $request->name;
            $product->size = $request->size;
            $product->observation = $request->observation;
            $product->trademarks_id = $request->trademarks_id;
            $product->inventory_quantity = $request->inventory_quantity;
            $product->boarding_date = $request->boarding_date;
            $product->save();

            return response()->json([
                'message' => 'success',
                'data' => $product
            ]);
        } catch (\Throwable $th) {
            return  response()->json([
                'message' => ' Error ' . $th->__toString()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            Product::destroy($id);
            return response()->json([
                'message' => 'success'
            ]);
        } catch (\Throwable $th) {
            return  response()->json([
                'message' => 'Error' .  $th->__toString()
            ], 500);
        }
    }
}
