<?php

namespace Tests\Feature\Http\Controllers\API;

use App\Http\Controllers\API\UserController;
use Tests\TestCase;

/**
 * Class UserControllerTest.
 *
 * @covers \App\Http\Controllers\API\UserController
 */
class UserControllerTest extends TestCase
{
    /**
     * @var UserController
     */
    protected $userController;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        /** @todo Correctly instantiate tested object to use it. */
        $this->userController = new UserController();
        $this->app->instance(UserController::class, $this->userController);
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->userController);
    }

    public function testIndex(): void
    {
        /** @todo This test is incomplete. */
        $this->getJson('/api/user')
            ->assertStatus(200);
    }

    public function testLogin(): void
    {
        /** @todo This test is incomplete. */
        $this->getJson('/api/user/login')
            ->assertStatus(200);
    }

    public function testLogout(): void
    {
        /** @todo This test is incomplete. */
        $this->getJson('/api/user/logout')
            ->assertStatus(200);
    }

    public function testRegister(): void
    {
        /** @todo This test is incomplete. */
        $this->getJson('/api/user/register')
            ->assertStatus(200);
    }
}
