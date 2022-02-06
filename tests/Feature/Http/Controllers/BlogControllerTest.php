<?php

namespace Tests\Feature\Http\Controllers;

use App\Http\Controllers\BlogController;
use App\Repositories\Interfaces\BlogPostRepositoryInterface;
use Mockery;
use Mockery\Mock;
use Tests\TestCase;

/**
 * Class BlogControllerTest.
 *
 * @covers \App\Http\Controllers\BlogController
 */
class BlogControllerTest extends TestCase
{
    /**
     * @var BlogController
     */
    protected $blogController;

    /**
     * @var BlogPostRepositoryInterface|Mock
     */
    protected $blogPostRepository;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->blogPostRepository = Mockery::mock(BlogPostRepositoryInterface::class);
        $this->blogController = new BlogController($this->blogPostRepository);
        $this->app->instance(BlogController::class, $this->blogController);
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->blogController);
        unset($this->blogPostRepository);
    }

    public function testIndex(): void
    {
        /** @todo This test is incomplete. */
        $this->get('/path')
            ->assertStatus(200);
    }

    public function testStore(): void
    {
        /** @todo This test is incomplete. */
        $this->post('/path', [ /* data */ ])
            ->assertStatus(200);
    }

    public function testShow(): void
    {
        /** @todo This test is incomplete. */
        $this->get('/path')
            ->assertStatus(200);
    }

    public function testEdit(): void
    {
        /** @todo This test is incomplete. */
        $this->get('/path')
            ->assertStatus(200);
    }

    public function testUpdate(): void
    {
        /** @todo This test is incomplete. */
        $this->put('/path', [ /* data */ ])
            ->assertStatus(200);
    }

    public function testDestroy(): void
    {
        /** @todo This test is incomplete. */
        $this->delete('/path')
            ->assertStatus(200);
    }
}
