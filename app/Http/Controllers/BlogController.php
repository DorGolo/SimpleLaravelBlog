<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\BlogPostRepositoryInterface;
use App\Models\BlogPost;
use Illuminate\Http\Request;

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
     * @return string
     */
    public function index()
    {
        $posts = $this->blogPostRepository->getBlogsOnPage();
        return $posts;
    }

    public function create()
    {
        return view('blog.create');
    }

   
    public function store(Request $request)
    {
        $newPost = BlogPost::create([
            'title' => $request->title,
            'body' => $request->body,
            'user_id' => 1
        ]);

        return redirect('blog/' . $newPost->id);    }

    /**
     * @param int $blogPostId
     * 
     * @return string
     */
    public function show(int $blogPostId)
    {
        $blogPost = $this->blogPostRepository->find($blogPostId);
        return response()->json($blogPost);
    }

    
    public function edit(int $blogPostId)
    {
        $blogPost = $this->blogPostRepository->find($blogPostId);
        return view('blog.edit', [
            'post' => $blogPost,
        ]);
    }

    
    public function update(Request $request, int $blogPostId)
    {
        $this->blogPostRepository->update($request::input); 

        $blogPost->update([
            'title' => $request->title,
            'body' => $request->body
        ]);

        return redirect("blog/$blogPostId/edit");
    }

    
    public function destroy(int $blogPostId)
    {
        $blogPost->delete();

        return redirect('/blog');
    }
}