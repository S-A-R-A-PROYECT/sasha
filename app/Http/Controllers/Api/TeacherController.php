<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TeacherCollection;
use App\Http\Resources\TeacherResource;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @OA\Get(
     *     path="/api/teachers",
     *     summary="Mostrar desarrolladores",
     *     tags={"Teachers"},
     *     @OA\Response(
     *         response=200,
     *         description="Mostrar todos los profesores activos"
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Ha ocurrido un error."
     *     )
     * )
     */
    public function index()
    {
        return new TeacherCollection(Teacher::all());
    }


    /**
     * Display the specified resource.
     *
     *
     *     @OA\Get(
     *     path="/api/teachers/{id}",
     *     summary="Mostrar profesor especifico",
     *     tags={"Teachers"},
     *     @OA\Response(
     *         response=200,
     *         description="Mostrar profesor exacto por ID"
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Ha ocurrido un error."
     *     )
     * )
     */
    public function show(Teacher $teacher)
    {
        return new TeacherResource($teacher);
    }

    // /**
    //  * Update the specified resource in storage.
    //  */
    // public function update(Request $request, Teacher $teacher)
    // {
    //     //
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  */
    // public function store(Request $request) {}

    // /**
    //  * Remove the specified resource from storage.
    //  */
    // public function destroy(Teacher $teacher)
    // {
    //     //
    // }
}
