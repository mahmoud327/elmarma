<?php

namespace App\Services;

use App\Models\Post;
use App\Traits\ImageTrait;

class PostService
{
    use ImageTrait;
    public function createPost(array $data)
    {

        $post= Post::create($data);
        if(file($data['image'])){
            $post->image = $this->uploadImage('uploads/posts/', $data['image']);
            $post->save();
        }

        return $post;
    }
    public function deletePost(Post $post)
    {
        $post->delete();
    }
    public function updatePost(array $data)
    {
        $post= Post::create($data);

        return $post;
    }
}
