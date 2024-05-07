<?php

namespace App\Models;

use CodeIgniter\Model;

class BlogsModel extends Model
{
    protected $table = 'blog';
    protected $allowedFields = ['id', 'title', 'slug', 'body', 'date'];
    
    public function getBlogs($slug = false)
    {
        if ($slug === false) {
            return $this->findAll();
        }

        return $this->where(['slug' => $slug])->first();
    }
}