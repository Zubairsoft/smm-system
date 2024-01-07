<?php

namespace Tests\Feature\Admins;

use App\Models\Admin;
use Domain\Dashboard\Actions\Sessions\LoginAction;
use Domain\Dashboard\DataTransferToObject\Sessions\LoginData;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SessionControllerTest extends TestCase
{
    use RefreshDatabase;
    
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

        $response->assertOk();

        $response->assertJson([
            'status' => 'success',
            'message' => __('auth.success_login'),
        ]);
    }

    public function test_logout()
    {
        $admin = (new LoginAction)(new LoginData($this->admin->phone, defaultPassword()));
        $headers = ['Authorization' => "Bearer {$admin->token}"];
        $response = $this->postJson($this->url . '/sessions/logout', [], $headers);

        $response->assertValid();

        $response->assertOk();

        $response->assertExactJson([
            'status' => 'success',
            'message' => __('auth.logout'),
            'data' => null
        ]);
    }

    public function test_unauthorized_logout()
    {
        $response=$this->postJson($this->url.'/sessions/logout');

        $response->assertUnauthorized();
    }
}
