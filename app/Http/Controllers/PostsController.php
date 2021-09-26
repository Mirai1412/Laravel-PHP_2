<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;

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
            게시글 리스트를 데이터베이스에서 읽어옴
            게시글 목록을 만들어주는 블레이드에 읽어진 데이터를 전달하고 실행.
        */

        $posts = Post::latest()->paginate(7);
        // dd($posts);

        return view('bbs.index', ['posts'=> $posts]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // dd("Haro!");

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
        $this->validate($request, [
            'title'=>'required',
            'content'=>'required|min:3',
            'image'=>'image',
        ]);

        if ($request->hasFile('image')) {
            $fileName = $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs(
                'public/image',
                $fileName
            );
        }
        // strpos, strrpos
        $input = array_merge($request->all(), ["user_id" => Auth::user()->id]);

        $fileName = null;

        if ($fileName) {
            $input = array_merge($input, ['image' => $fileName]);
        }
        // dd($request->all());

        Post::create($input);

        // return view('bbs.index', ['posts'=>Post::all()]);
        return redirect()->route('posts.index', ['posts' => Post::all()]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $id 에 해당하는 포스트를 데이터베이스에서 인출.
        $post = Post::find($id);

        // 나온 값을 상세보기 뷰로 전달.
        return view('bbs.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //id 에 해당하는 포스트를 수정할 수 있는 페이지를 반환
        $post = Post::find($id);

        return view ('bbs.edit', ['post' => $post]);
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
        $this->validate($request, [
            'title'=>'required',
            'content'=>'required|min:3',
            'image'=>'image',
        ]);

        $post = Post::find($id);

        // $post->title = $request->input['title']; // 1
        // $post->content = $request->content; // 2

        // $post->save();

        // $post->update(['title' => $request->title, // 3
        // 'content' => $request->content]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        //DI, Dependency Injection, 의존성 주입
        // dd($request);

        Post::find($id)->delete();

        return redirect()->route('posts.index');
    }
}
