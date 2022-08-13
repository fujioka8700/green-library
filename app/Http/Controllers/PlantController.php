<?php

namespace App\Http\Controllers;

use App\Models\Plant;
use App\Http\Resources\Plant as PlantResource;
use Illuminate\Http\Request;

class PlantController extends Controller
{
    /**
     * リソースのリストを表示します。
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plants = Plant::paginate(15);

        return PlantResource::collection($plants);
    }

    /**
     * 新しく作成したリソースをストレージに保存します。
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $plant = Plant::create($request->all());

        return new PlantResource($plant);
    }

    /**
     * 指定されたリソースを表示します。
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $plant = Plant::find($id);

        return new PlantResource($plant);
    }

    /**
     * ストレージ内の指定されたリソースを更新します。
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * 指定されたリソースをストレージから削除します。
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
