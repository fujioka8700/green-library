<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TokenRefreshApiTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        $this->user = User::factory()->create();
    }

    /**
     * トークンをリフレッシュする
     *
     * @return void
     */
    public function test_トークンをリフレッシュする()
    {
      $response = $this->actingAs($this->user)->getJson(route('user'));

      $response->assertOk();

      $token = $response->getCookie('XSRF-TOKEN')->getValue();

      $response = $this->getJson('/api/reflesh-token');

      $response->assertOk();

      $new_token = $response->getCookie('XSRF-TOKEN')->getValue();

      $this->assertNotEquals($token, $new_token);
    }
}
