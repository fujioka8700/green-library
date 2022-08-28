<?php

namespace Tests\Feature;

use App\Models\Plant;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PlantDetailApiTest extends TestCase
{
  use RefreshDatabase;

  /**
   * 正しい構造のJSONを返却する
   *
   * @return void
   */
  public function test_正しい構造のJSONを返却する()
  {
    Plant::factory()->create();
    $plant = Plant::first();

    $response = $this->getJson(route('plant.show', [
      'id' => $plant->id,
    ]));

    $response->assertStatus(200)
      ->assertJsonFragment([
        'data' => [
          'id' => $plant->id,
          'name' => $plant->name,
          'body' => $plant->body,
        ],
      ]);
  }
}
