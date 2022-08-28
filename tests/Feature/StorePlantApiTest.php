<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Plant;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class StorePlantApiTest extends TestCase
{
  use WithFaker;
  use RefreshDatabase;

  use RefreshDatabase;

  public function setUp(): void
  {
      parent::setUp();

      $this->user = User::factory()->create();
  }

  /**
   * 植物を登録する
   *
   * @return void
   */
  public function test_植物を登録する()
  {
    $response = $this->actingAs($this->user)->postJson(route('plant.store'), [
      'name' => $this->faker->name(),
      'body' => $this->faker->text(200),
    ]);

    $plant = Plant::first();

    $response->assertStatus(201)->assertJson([
      'data' => [
        'name' => $plant->name,
        'body' => $plant->body,
      ],
    ]);
  }
}
