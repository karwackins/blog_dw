<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ImagesController extends Controller
{
    public function postImage($id, $size)
    {
        $post = Post::find($id);
        $avatar_path = asset('/storage/posts/'. $id .'/image/'.$post->image);
        $img = Image::make($avatar_path)->fit($size)->response('jpg', '100');

        return $img;
    }

    public function categoryImage($id, $size)
    {
        $category = Category::find($id);
        $avatar_path = asset('/storage/categories/'. $id .'/image/'.$category->avatar);
        $img = Image::make($avatar_path)->fit($size)->response('jpg', '100');

        return $img;
    }


    public function postImageResize($id, $size)
    {
        $post = Post::find($id);
        $avatar_path = asset('/storage/posts/'. $id .'/image/'.$post->image);
        $img = Image::make($avatar_path)->
        resize($size, null, function ($constraint) {
            $constraint->aspectRatio();
        })->response('jpg', '100');

        return $img;
    }

    public function categoryImageResize($id, $size)
    {
        $category = Category::find($id);
        $avatar_path = asset('/storage/categories/'. $id .'/image/'.$category->avatar);
        $img = Image::make($avatar_path)->
        resize($size, null, function ($constraint) {
            $constraint->aspectRatio();
        })->response('jpg', '100');

        return $img;
    }
}
