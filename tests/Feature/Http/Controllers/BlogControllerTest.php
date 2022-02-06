<?php

namespace Tests\Feature\Http\Controllers;

use App\Http\Controllers\BlogController;
use App\Repositories\Interfaces\BlogPostRepositoryInterface;
use App\Repositories\BlogPostRepository;
use Mockery;
use Mockery\Mock;
use Tests\TestCase;
use Illuminate\Http\JsonResponse;
use App\Models\User;
use App\Models\BlogPost;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Auth;
use Session;

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

        $this->faker = Faker::create();
        $this->user = User::factory()->create();
        $this->blogPost = BlogPost::factory()->create();

        $session = $this->app->make('session');
        $events = $this->app->make('events');
        
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
        $response = $this->getJson('/api/blog');
        $posts = json_decode($response->getContent(), true);
        if (is_array($posts)) {
            foreach ($posts as $post) {
                $response->assertJson([
                    'body' => $post->body,
                    'title' => $post->title
                ]);
            }
        }
        $response->assertStatus(200);
    }

    public function testShow(): void
    {
        $post = BlogPost::factory()->create();
        $this->get("/api/blog/$post->id")
            ->assertStatus(200);
    }

    public function testStore(): void
    {
        $credentials = [
            'email' => $this->user->email,
            'password' => 'password',
        ];
        Auth::attempt($credentials);

        $data = [
            'title' => $this->faker->sentence,
            'body' => $this->faker->paragraph(2)
        ];
        $response = $this->get("/api/blog", $data);
        $response->assertStatus(200);

        Session::flush();
    }

    public function testEdit(): void
    {
        $credentials = [
            'email' => $this->user->email,
            'password' => 'password',
        ];
        Auth::attempt($credentials);

        $id = $this->blogPost->id;
        $this->get("/api/blog/$id")
            ->assertStatus(200);
        
        Session::flush();
    }

    public function testUpdate(): void
    {
        $credentials = [
            'email' => $this->user->email,
            'password' => 'password',
        ];
        Auth::attempt($credentials);
        
        $data = [
            'title' => $this->faker->sentence,
            'body' => $this->faker->paragraph(5)
        ];
        $id = $this->blogPost->id;
        $response = $this->get("/api/blog/$id", $data);
        $response->assertStatus(200);
    
        Session::flush();
    }

    public function testDestroy(): void
    {
        $credentials = [
            'email' => $this->user->email,
            'password' => 'password',
        ];
        Auth::attempt($credentials);

        $id = $this->blogPost->id;
        $response = $this->get("/api/blog/$id");
        $response->assertStatus(200);
            
        Session::flush();
    }
}
