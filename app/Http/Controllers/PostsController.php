<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

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

    public function getTitle($id)
    {
        return  DB::table('posts')->where('id', $id)->value('title');
    }


    public function showPost($id)
    {

        $response = \App\Post::findOrFail($id);

        return response()->json($response);

    }
    
    public function getFirstActive()
    {
        // Получить конкретные записи с помощью find или first. 
        // Вместо коллекции моделей эти методы возвращают один экземпляр модели:

        // Получение первой модели, удовлетворяющей условиям...

        return \App\Post::where('active', 1)->first();


    }

    public function getByIds($ids)
    {
        // Также вы можете вызвать метод find с массивом первичных ключей,
        // который вернёт коллекцию подходящих записей:

        return \App\Post::find([1, 2, 3]);

    }

    

}
