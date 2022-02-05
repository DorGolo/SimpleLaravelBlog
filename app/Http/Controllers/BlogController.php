<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\BlogPostRepositoryInterface;
use App\Models\BlogPost;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;

class BlogController extends Controller
{
    /**
     * @var BlogPostRepositoryInterface
     */
    private BlogPostRepositoryInterface $blogPostRepository;
  
    /**
     * @param BlogPostRepositoryInterface $blogPostRepository
     */
    public function __construct(BlogPostRepositoryInterface $blogPostRepository)
    {
        $this->blogPostRepository = $blogPostRepository;
    }

    /**
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $posts = $this->blogPostRepository->getBlogsOnPage();
        return $posts;
    }
     
    /**
     * @param Request $request
     * 
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $blogPost = $this->blogPostRepository->save($request->all());
        return response()->json('Post created!');    
    }

    /**
     * @param int $blogPostId
     * 
     * @return JsonResponse
     */
    public function show(int $blogPostId): JsonResponse
    {
        $blogPost = $this->blogPostRepository->find($blogPostId);
        return response()->json($blogPost);
    }
    
    /**
     * @param int $blogPostId
     * 
     * @return JsonResponse
     */
    public function edit(int $blogPostId): JsonResponse
    {
        $blogPost = $this->blogPostRepository->find($blogPostId);
        return response()->json($blogPost);
    }
    
    /**
     * @param Request $request
     * @param int $blogPostId
     * 
     * @return JsonResponse
     */
    public function update(Request $request, int $blogPostId): JsonResponse
    {
        $blogPost = $this->blogPostRepository->save($request->all(), $blogPostId);
        return response()->json('Post updated!');
    }

    /**
     * @param int $blogPostId
     * 
     * @return JsonResponse
     */
    public function destroy(int $blogPostId): JsonResponse
    {
        $this->blogPostRepository->delete($blogPostId);
        return response()->json('Post deleted!');
    }
}