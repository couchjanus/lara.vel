<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;

use App\Post;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $posts = Post::all();
        $posts = Post::paginate(10);

        return view('admin.posts.index')
            ->with('posts', $posts);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $categories = \App\Category::all();

        return view('admin.posts.create')
         ->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {
    //     $this->validate($request, [
    //         'title' => 'required|unique|max:255',
    //         'content' => 'required',
    //     ]);

    //     //
    // }

    /**
     * Сохранить пост в блоге.
     *
     * @param  Request  $request
     * @return Response
     */
    // public function store(Request $request)
    // {
    //     $validator = Validator::make($request->all(), [
    //         'title' => 'required|unique|max:255',
    //         'content' => 'required',
    //     ]);
        

    //     if ($validator->fails())
    //     {
    //         return redirect()->back()->withErrors($v->errors());
    //     }
            // $post = new Post;
            // $post->title = $request->title;
            // $post->content = $request->content;
            // $post->category_id = $request->category_id;

            // $post->save();
            
            // return redirect(route('posts.index'))->with('message','An article has been added');

    // }

    /**
     * Сохранить пост в блоге.
     *
     * @param  StorePostRequest  $request
     * @return Response
     */
    public function store(StorePostRequest $request)
    {
        // Валидация успешно пройдена

        // $post = new Post;
        // $post->title = $request->title;
        // $post->content = $request->content;
        // $post->category_id = $request->category_id;
        // $post->is_active = $request->is_active;
        
        $post = $request->all();
        $post = new Post($post);
        $post->save();
        
        return redirect(route('posts.index'))->with('message', 'An article has been added');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)

    {
        $post = Post::find($id);
        $data = ['post' => $post];
        return view('admin.posts.show',$data);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $post = Post::find($id);
       $categories = \App\Category::pluck('name', 'id');
       $data = ['post' => $post, 'categories' => $categories];
       return view('admin.posts.edit', $data);
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

        $validator = Validator::make($request->all(), [
            'title' => 'required|unique|max:255',
            'content' => 'required',
        ]);

        if ($validator->fails())
        {
            return redirect()->back()->withErrors($v->errors());
        }
    
        $post = Post::find($id);
        $post->title = $request->title;
        $post->content = $request->content;
        $post->category_id = $request->category_id;
        $post->is_active = $request->is_active;
        
        $post->save();
        
        return redirect(route('posts.index'))->with('message', 'An article has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::find($id)->delete();
        return redirect(route('posts.index'))->with('message','An article has been deleted');
    }
}
