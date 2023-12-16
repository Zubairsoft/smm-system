<?php

namespace Tests\Feature\Admins;

use App\Models\Admin;
use Domain\Dashboard\Actions\Sessions\LoginAction;
use Domain\Dashboard\DataTransferToObject\Sessions\LoginData;
use Tests\TestCase;

class SessionControllerTest extends TestCase
{
    private $admin;

    private $url;

    public function setUp(): void
    {
        parent::setUp();

        $this->admin = Admin::query()->firstOrCreate([
            'phone' => 777352161,
        ], [
            'first_name' => 'test',
            'last_name' => 'test',
            'phone' => 777352161,
            'password' => defaultPassword()
        ]);

        $this->url = 'api/v1/dashboard';
    }

    /**
     * A basic feature test example.
     */
    public function test_login(): void
    {
        $response = $this->postJson($this->url . '/sessions/login', [
            'phone' => $this->admin->phone,
            'password' => defaultPassword(),
        ]);

        $response->assertStatus(200);
    }

    public function test_logout()
    {
        $token = ((new LoginAction)(new LoginData($this->admin->phone, defaultPassword())))->token;
        $headers = ['Authorization' => "Bearer $token"];
        $response = $this->postJson($this->url . '/sessions/logout', [], $headers);
        $response->assertStatus(200);
    }
}
