<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        
        $posts = Post::paginate(3);

        $response = [
            'pagination' => [
                'total' => $posts->total(),
                'per_page' => $posts->perPage(),
                'current_page' => $posts->currentPage(),
                'last_page' => $posts->lastPage(),
                'from' => $posts->firstItem(),
                'to' => $posts->lastItem()
            ],
            'data' => $posts
        ];

        return response()->json($response);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post =  \App\Post::findOrFail($id);
        return view('blog.show', ['post' => $post, 'hescomment' => true ]);
    }

    // PostsController, метод showBySlug:
    public function showBySlug($slug) 
    {
        if (is_numeric($slug)) {
            // Get post for slug.
            $post = Post::findOrFail($slug);
            
            return Redirect::to(route('blog.show', $post->slug), 301); 
            // 301 редирект со старой страницы, на новую.    
        }
        // Get post for slug.
        $post = Post::whereSlug($slug)->firstOrFail();

        return view('blog.show', [
            'post' => $post,
            'hescomment' => true
            ]
        );
    }

    public function getById($id)
    {
        return \App\Post::findOrFail($id);
    }
    
    public function getFirstActive()
    {
        return \App\Post::where('active', 1)->first();
        
    }

    public function getByIds($ids)
    {
        // Также вы можете вызвать метод find с массивом первичных ключей,
        // который вернёт коллекцию подходящих записей:

        return \App\Post::find([1, 2, 3]);

    }

}
