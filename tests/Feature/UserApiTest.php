<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserApiTest extends TestCase
{
  use RefreshDatabase;

  public function setUp(): void
  {
      parent::setUp();

      $this->user = User::factory()->create();
  }

  /**
   * ログイン中のユーザーを返却する
   *
   * @return void
   */
  public function test_ログイン中のユーザーを返却する()
  {
    $response = $this->actingAs($this->user)->getJson(route('user'));

    $response->assertStatus(200)->assertJson(['name'=>$this->user->name]);
  }

  /**
   * ログインされていない場合は空文字を返却する
   *
   * @return void
   */
  public function test_ログインされていない場合は空文字を返却する()
  {
    $response = $this->getJson(route('user'));

    $response->assertStatus(200);

    $this->assertEquals('', $response->content());
  }
}
