<?php

namespace App\Http\Controllers\admin;

use App\Category;
use App\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderBy('id', 'DESC')->paginate(4);

        return view('admin.categories.show', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'desc' => 'required|max:255',
        ]);

        $category = Category::create([
            'name' => $request->name,
            'desc' => $request->desc
        ]);

        $category->save();
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
        $category = Category::findOrFail($id);
        $posts = Post::where('category_id', $id)->paginate(9);
        return view('categories.show', compact('posts', 'category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.categories.single', compact('category'));
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
        $category = Category::findOrFail($id);
        if($request->image)
        {
            $update_path = 'public/categories/'.$id.'/image';
            $path = $request->file('image')->store($update_path);
            $image = str_replace($update_path, '', $path);
        }else
        {
            $image = $category->avatar;
        }
        $category->name = $request->name;
        $category->desc = $request->desc;
        $category->avatar = $image;
        $category->save();

        return redirect('panel/categories')->with('category_edit', 'Kategoria wyedytowana');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect('panel/categories')->with('category_delete', 'Kategoria została usunięta');
    }
}
