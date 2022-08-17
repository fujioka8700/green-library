<?php

namespace Tests\Feature;

use App\Models\Plant;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PlantListApiTest extends TestCase
{
  use RefreshDatabase;

  /**
   * 正しい構造のJSONを返却する
   *
   * @return void
   */
  public function test_正しい構造のJSONを返却する()
  {
    Plant::factory(5)->create();

    $response = $this->getJson(route('plant.index'));

    $plants = Plant::orderBy('id', 'desc')->get();

    $expected_data = $plants->map(function($plant) {
      return [
        'data' => [
          'id' => $plant->id,
          'name' => $plant->name,
          'body' => $plant->body,
        ],
      ];
    })->all();

    $response->assertStatus(200)
      ->assertJsonCount(5, 'data')
      ->assertJsonFragment([
        'data' => $expected_data,
    ]);
  }
}
