<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginApiTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        $this->user = User::factory()->create();
    }

    /**
     * 登録済みのユーザーを認証して返却する
     *
     * @return void
     */
    public function test_登録済みのユーザーを認証して返却する()
    {
        $this->assertGuest();

        $data = [
            'email' => $this->user->email,
            'password' => 'password',
        ];

        $response = $this->postJson(route('login'), $data);

        $response->assertStatus(200)->assertJson([
            'name' => $this->user->name
        ]);

        $this->assertAuthenticatedAs($this->user);
    }
}
