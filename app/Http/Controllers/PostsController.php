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
        // $posts = DB::table('posts')->get();
        
        // $posts = Post::all();
        
        $posts = \App\Post::all();
        
        // $posts = Post::paginate(10);
        
        // $posts = Post::simplePaginate(10);
        
        return view('blog.index', ['posts' => $posts]);
    }

           
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
        public function store(Request $request)
        {
            DB::insert('insert into posts (title, content, category_id) 
            values (?, ?, ?)', [$request['title'], $request['content'], 1]);
            
        }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $post = DB::table('posts')->where('id', $id)->first();
        
        // $post =  \App\Post::find($id);

        $post =  \App\Post::findOrFail($id);

        return view('blog.show', ['post' => $post, 'hescomment' => true ]);

    }

    public function getTitle($id)
    {
        return  DB::table('posts')->where('id', $id)->value('title');

    }


    public function getById($id)
    {
        // Получить конкретные записи с помощью find или first. 
        // Вместо коллекции моделей эти методы возвращают один экземпляр модели:

        // Получение модели по её первичному ключу...

        return  \App\Post::find($id);

        // return \App\Post::findOrFail($id);

        // return App\Post::where('id', '>', $id)->firstOrFail();

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

    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       return view('posts.create');

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
        $sql = "UPDATE posts SET title= ? content= ? WHERE id= ?";
        DB::update($sql, array($request['title'], $request['content'], 'id' => $id));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('posts')->where('id', '=', $id)->delete();
    }
}
