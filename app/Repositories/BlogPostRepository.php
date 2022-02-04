<?php

namespace App\Repositories;

use App\Models\BlogPost;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

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
    * @return Collection
    */
   public function getFeatured(): Collection
   {
       return $this->model->all();    
   }

   public function getBlogsOnPage(int $page = 1, int $limit = 20): Collection
   {
       return $this->model->all();
   }

   public function save(array $blogPost): BlogPost
   {

   }

}