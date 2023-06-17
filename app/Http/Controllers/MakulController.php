<?php

namespace App\Http\Controllers;

use App\Models\Makul;
use Illuminate\Http\Request;

class MakulController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $makuls = Makul::paginate(10);
        return response()->json([
            'data' => $makuls
        ]);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $makul = Makul::create([
            'makul' => $request->makul,
            'sks' => $request->sks,
            'praktikum' => $request->praktikum,
        ]);
        return response()->json([
            'data' => $makul
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Makul  $makul
     * @return \Illuminate\Http\Response
     */
    public function show(Makul $makul)
    {
        return response()->json([
            'data' => $makul
        ]);
    }

    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Makul  $makul
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Makul $makul)
    {
        $makul->makul = $request->makul;
        $makul->sks = $request->sks;
        $makul->praktikum = $request->praktikum;
        $makul->save();

        return response()->json([
            'data' => $makul
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Makul  $makul
     * @return \Illuminate\Http\Response
     */
    public function destroy(Makul $makul)
    {
        $makul->delete();
        return response()->json([
            'message' => 'makul deleted'
        ], 204);
    }
}
