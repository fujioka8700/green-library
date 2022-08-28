<?php

namespace App\Http\Controllers;

use App\Models\Plant;
use App\Http\Resources\Plant as PlantResource;
use Illuminate\Http\Request;
use App\Http\Requests\StorePlantRequest;

class PlantController extends Controller
{
    public function __construct()
    {
        // 認証が必要
        $this->middleware('auth')->except(['index', 'show']);
    }

    /**
     * リソースのリストを表示します。
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plants = Plant::orderBy('id', 'desc')->paginate();

        return PlantResource::collection($plants);
    }

    /**
     * 新しく作成したリソースをストレージに保存します。
     *
     * @param \App\Http\Resources\Plant as PlantResource $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePlantRequest $request)
    {
        $plant = Plant::create($request->all());

        return new PlantResource($plant);
    }

    /**
     * 指定されたリソースを表示します。
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
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
