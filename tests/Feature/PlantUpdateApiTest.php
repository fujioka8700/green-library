<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Plant;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PlantUpdateApiTest extends TestCase
{
  use WithFaker;
  use RefreshDatabase;

  public function setUp(): void
  {
      parent::setUp();

      $this->user = User::factory()->create();
  }

  /**
   * 植物データを更新する
   *
   * @return void
   */
  public function test_植物データを更新する()
  {
    Plant::factory()->create();
    $plant = Plant::first();

    $response = $this->actingAs($this->user)->putJson(route('plants.update', [ 'id' => $plant->id ]), [
      'name' => $this->faker->name(),
      'body' => $this->faker->text(200),
    ]);

    // 更新前のデータ
    $before_update_data = [
      'data' => [
        'id' => $plant->id,
        'name' => $plant->name,
        'body' => $plant->body,
      ],
    ];

    $response->assertOk()->assertJsonMissing($before_update_data);
  }
}
