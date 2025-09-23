<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\DeveloperCollection;
use App\Http\Resources\DeveloperResource;
use App\Models\User as Developer;
use Illuminate\Http\Request;



class DeveloperController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @OA\Get(
     *     path="/api/developers",
     *     summary="Mostrar desarrolladores",
     *     tags={"Developers"},
     *     @OA\Response(
     *         response=200,
     *         description="Mostrar todos los desarolladores activos"
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Ha ocurrido un error."
     *     )
     * )
     */
    public function index()
    {
        return new DeveloperCollection(Developer::all());
    }



    /**
     * Display the specified resource.
     *
     * @OA\Get(
     *     path="/api/developers/{id}",
     *     summary="Mostrar desarrollador especifico",
     *     tags={"Developers"},
     *     @OA\Parameter(
     *         description="Parameter with mutliple examples",
     *         in="path",
     *         name="id",
     *         required=true,
     *         @OA\Schema(type="string"),
     *         @OA\Examples(example="int", value="1", summary="An int value."),
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Mostrar desarrollador especifico"
     *     )
     * )
     *
     */
    public function show(Developer $developer)
    {
        return new DeveloperResource($developer);
    }

    // /**
    //  * Store a newly created resource in storage.
    //  */
    // public function store(Request $request)
    // {
    //     //
    // }


    // /**
    //  * Update the specified resource in storage.
    //  */
    // public function update(Request $request, Developer $user)
    // {
    //     //
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  */
    // public function destroy(Developer $user)
    // {
    //     //
    // }
}
