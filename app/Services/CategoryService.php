<?php

namespace App\Services;

use App\Models\Category;
use App\Models\Post;

class CategoryService
{

    public function getCategory()
    {
        return Category::latest()->paginate(10);
    }
}
