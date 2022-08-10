<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LogoutApiTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        $this->user = User::factory()->create();
    }

    /**
     * 認証済みのユーザーをログアウトさせる
     *
     * @return void
     */
    public function test_認証済みのユーザーをログアウトさせる()
    {
        $response = $this->actingAs($this->user)->postJson(route('logout'));

        $response->assertStatus(200);

        $this->assertGuest();
    }
}
