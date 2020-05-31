<?php

namespace App\Http\Controllers\admin;

use App\Category;
use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('id', 'DESC')->paginate(9);
        return view('admin.posts.show', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::get();
        return view('admin.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_id = Auth::id();
        $request->publish == 'on'?$publish = 1:$publish = 0;

        $validatedData = $request->validate([
            'title' => 'required',
            'trailer' => 'required',
            'content' => 'required',
            'recipe' => 'required',
        ]);

        $post = Post::create([
            'title' => $request->title,
            'trailer' => $request->trailer,
            'content' => $request->content,
            'recipe' => $request->recipe,
            'user_id' => $user_id,
            'category_id' => $request->category_id,
            'publish' => $publish,
            'image' => 'default.jpg'
        ]);
        $post->save();

        return back()->with('wpis_dodany', 'Wpis dodany');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::get();
        $post = Post::find($id);
        $gallery = json_decode($post->gallery);
        return view('admin.posts.single', compact(['post', 'categories', 'gallery']));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::find($id);

        if($request->image)
        {
            $update_path = 'public/posts/'.$id.'/image';
            $path = $request->file('image')->store($update_path);
            $image = str_replace($update_path, '', $path);
        }else
        {
            $image = $post->image;
        }


        $request->publish == 'on'?$publish = 1:$publish = 0;

        $post->title = $request->title;
        $post->trailer = $request->trailer;
        $post->content = $request->content;
        $post->recipe = $request->recipe;
        $post->category_id = $request->category_id;
        $post->publish = $publish;
        $post->image = $image;
        $post->save();
        return redirect('panel/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();

        return redirect('panel/posts');
    }

    /**
     * create/store gallery in post.
     *
     * @param  int  $id
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function galleryStore(Request $request, $id)
    {
        $post = Post::find($id);
        $update_path = 'public/posts/'.$id.'/gallery';
        $gallery = [];
        $i =0;
        if(!empty($request->gallery))
            foreach ($request->gallery as $image) {
                Storage::put($update_path.'/'.$image->getClientOriginalName(), file_get_contents($image));

                $gallery[$i]['name'] = $image->getClientOriginalName();
                $i++;
            }
        $post->gallery = json_encode($gallery);
        $post->save();

        return back();
    }
}
