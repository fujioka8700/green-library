<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterApiTest extends TestCase
{
    /**
     * 新しいユーザーを作成して返却する
     *
     * @return void
     */
    public function test_新しいユーザーを作成して返却する()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
