<?php

namespace App\Http\Controllers;

use App\Models\Plant;
use App\Http\Resources\Plant as PlantResource;
use Illuminate\Http\Request;
use App\Http\Requests\PlantRequest;

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
     * @return \App\Http\Resources\Plant as PlantResource
     */
    public function index()
    {
        $plants = Plant::orderBy('id', 'desc')->paginate();

        return PlantResource::collection($plants);
    }

    /**
     * 新しく作成したリソースをストレージに保存します。
     *
     * @param \App\Http\Requests\PlantRequest
     * @return \App\Http\Resources\Plant as PlantResource
     */
    public function store(PlantRequest $request)
    {
        $plant = Plant::create($request->all());

        return new PlantResource($plant);
    }

    /**
     * 指定されたリソースを表示します。
     *
     * @param int $id
     * @return \App\Http\Resources\Plant as PlantResource
     */
    public function show(int $id)
    {
        $plant = Plant::find($id);

        return new PlantResource($plant);
    }

    /**
     * ストレージ内の指定されたリソースを更新します。
     *
     * @param App\Http\Requests\PlantRequest
     * @param int $id
     * @return \App\Http\Resources\Plant as PlantResource
     */
    public function update(PlantRequest $request, int $id)
    {
      Plant::where('id', $id)->update($request->all());

      $plant = Plant::find($id);

      return new PlantResource($plant);
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
