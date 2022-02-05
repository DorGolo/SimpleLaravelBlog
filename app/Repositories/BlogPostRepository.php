<?php

namespace App\Repositories;

use App\Models\BlogPost;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
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

    public function getBlogsOnPage(int $onPage = 20): JsonResponse
    {
        $data = $this->model::paginate($onPage);
        return response()->json($data);
    }

    public function save(array $details, $id = null): BlogPost
    {
        if ($blogPost = $this->find($id)) {
            $blogPost->update($details);
        } else {
            $blogPost = new BlogPost($details);
            $blogPost->save();
        }
        return $blogPost;
    }
}