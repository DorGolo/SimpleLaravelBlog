<?php   

namespace App\Repositories;   

use App\Repositories\Interfaces\BaseRepositoryInterface; 
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class BaseRepository implements BaseRepositoryInterface 
{     
    /**      
     * @var Model      
     */     
     protected Model $model;       

    /**      
     * BaseRepository constructor.      
     *      
     * @param Model $model      
     */     
    public function __construct(Model $model)     
    {         
        $this->model = $model;
    }
 
    /**
    * @param array $attributes
    *
    * @return Model
    */
    public function create(array $attributes): Model
    {
        return $this->model->create($attributes);
    }
 
    /**
    * @param $id
    * @return Model
    */
    public function find($id): ?Model
    {
        return $this->model->find($id);
    }

    public function getCollection(): Collection
    {
        return $this->model->all();
    }

    public function delete(int $id) {
        $this->model->find($id)->delete();
    }
}