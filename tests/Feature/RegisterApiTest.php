<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterApiTest extends TestCase
{
    use RefreshDatabase;

    /**
     * 新しいユーザーを作成して返却する
     *
     * @return void
     */
    public function test_新しいユーザーを作成して返却する()
    {
        $data = [
            'name' => 'greenlibrary user',
            'email' => 'dummy@email.com',
            'password' => 'test1234',
            'password_confirmation' => 'test1234',
        ];

        $response = $this->postJson(route('register'), $data);

        $user = User::first();

        $this->assertEquals($data['name'], $user->name);

        $response->assertStatus(201)->assertJson([ 'name' => $user->name ]);
    }
}
