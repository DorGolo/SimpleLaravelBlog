<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use App\Models\BlogPost;
use App\Repositories\Interfaces\BlogPostRepositoryInterface;

class BlogPostRepository extends BaseRepository implements BlogPostRepositoryInterface
{

    /**
     * BlogPostRepository constructor.
     *
     * @param BlogPost $model
     */
    public function __construct(BlogPost $model)
    {
        parent::__construct($model);
    }

    /**
     * @param int $onPage
     * 
     * @return JsonResponse
     */
    public function getBlogsOnPage(int $onPage = 5): JsonResponse
    {
        $data = $this->model
        ->latest()
        ->latest('updated_at')
        ->paginate($onPage);
        return response()->json($data);
    }

    /**
     * @param array $details
     * @param int|null $id
     * 
     * @return BlogPost
     */
    public function save(array $details, int $id = null): BlogPost
    {
        if ($blogPost = $this->find($id)) {
            $blogPost->update($details);
        } else {
            $details['user_id'] = Auth::user()->id;
            $blogPost = new BlogPost($details);
            $blogPost->save();
        }
        return $blogPost;
    }
}