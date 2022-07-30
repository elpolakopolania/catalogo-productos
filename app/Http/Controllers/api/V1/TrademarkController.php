<?php

namespace App\Http\Controllers\api\V1;


use App\Http\Controllers\Controller;
use App\Http\Resources\V1\TrademarkCollection;
use App\Http\Resources\V1\TrademarkResource;
use App\Models\Product;
use App\Models\Trademark;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

class TrademarkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new TrademarkCollection(Trademark::all());
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
            $trademark = new Trademark();
            $trademark->name = $request->name;
            $trademark->reference = $request->reference;
            $trademark->save();

            return response()->json([
                'message' => 'success',
                'data' => $trademark
            ]);
        } catch (\Throwable $th) {
            return  response()->json([
                'message' => 'Error' .  $th->__toString()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Trademark $trademark)
    {
        return new TrademarkResource($trademark);
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
            $trademark = Trademark::findOrFail($id);
            $trademark->name = $request->name;
            $trademark->reference = $request->reference;
            $trademark->save();

            return response()->json([
                'message' => 'success',
                'data' => $trademark
            ]);
        } catch (\Throwable $th) {
            return  response()->json([
                'message' => 'Error' .  $th->__toString()
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
            if (Product::where('trademarks_id', $id)->exists()) {
                return response()->json([
                    'message' => 'warnign',
                    'info' => 'No se puede eliminar el registro por que ya está relacionado.'
                ]);
            } else {
                Trademark::destroy($id);
                return response()->json([
                    'message' => 'success'
                ]);
            }
        } catch (\Throwable $th) {
            return  response()->json([
                'message' => 'Error' .  $th->__toString()
            ], 500);
        }
    }
}
