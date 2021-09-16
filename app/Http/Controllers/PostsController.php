<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*
            1. 게시글 리스트를 DB에서 읽어와야지
            2. 게시글 목록 만들어주는 blade 에 읽어온 데이터를 전달하고
               실행.
        */
        // select * from posts order by created_at desc
        // $posts = Post::orderBy('created_at','desc')->get();
        // dd($posts);
        $posts = Post::latest()->paginate(8);



        return view('bbs.index', ['posts'=>$posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('bbs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['title'=>'required',
                        'content'=>'required|min:3']);

        $path = null;
        if($request->hasFile('image')){
            $fileName = time().'_'.
            $request->file('image')->getClientOriginalName();
            $path = $request->file('image')->
            storeAs('public/images',$fileName);
        }

        $input = array_merge($request->all(),
                ["user_id"=>Auth::user()->id]);
        if($fileName){
            $input = array_merge($input,['image' => $fileName]);
        }

        Post::create($input);

        // return view('bbs.index', ['posts'=>Post::all()]);
        return redirect()->route('posts.index');
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

        return view('bbs.show',['post'=>$post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
