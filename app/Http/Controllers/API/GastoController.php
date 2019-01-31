<?php

namespace App\Http\Controllers\API;

use App\Gasto;
use App\Http\Requests\CadastroGastoRequest;
use App\Http\Resources\Gasto as GastoResource;
use App\Tag;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Facades\DB;

class GastoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return ResourceCollection
     */
    public function index()
    {

        return GastoResource::collection(Gasto::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return GastoResource
     */
    public function store(CadastroGastoRequest $request)
    {
        //DB::beginTransaction();

        try {

            $gasto = new Gasto();
            $gasto->fill($request->all());
            $gasto->save();

            $tag = new Tag();
            $tag->fill($request->all());

            $gasto->tags()->save($tag);

            //DB::commit();

            return new GastoResource($gasto);

        } catch (\Exception $e) {

            //DB::rollBack();

            return response()->json(["message" => "Não foi possível efetuar a operação"], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return GastoResource
     */
    public function show($id)
    {
        try {

            return new GastoResource(Gasto::findOrFail($id));

        } catch (ModelNotFoundException $e) {

            return response()->json(["message" => "Gasto não encontrado"], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
