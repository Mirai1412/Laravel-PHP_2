<x-app-layout>
    <x-slot name="header" >
        <div class="flex justify-between">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit') }}
        </h2>
            <button type="button" onclick=location.href="{{ route('posts.show', ['post'=>$post->id]) }}"
            class="btn btn-info font-bold text-blue-800">Back</button>
        </div>
    </x-slot>
    <div class="m-4 p-4">
    <form action="{{ route('posts.update',['post'=>$post->id]) }}" method="post" enctype="multipart/form-data">
        @method('patch')
        @csrf
        <div class="form-group">
          <label for="title">Title</label>
          <br>
          <input type="text" class="form-control" id="title" placeholder="Title" name="title" value="{{ $post->title }}">
          @error('title')
             <div class="text-red-800">
                 <span>{{ $message }}</span>
             </div>
          @enderror
        </div>
        <div class="content mt-5">
          <label for="content">Content</label>
          <br>
          <textarea type="text" class="form-control" id="content" placeholder="Content" name="content">
            {{ $post->content }}
          </textarea>

          @error('content')
          <div class="text-red-800">
              <span>{{ $message }}</span>
          </div>
       @enderror
        </div>

        <div class="form-group mt-5">
            @if($post->image)
                <img class="w-20 h-20 rounded-full" src="{{ '/storage/image/'.$post->image }}" class="card-img-top" alt="Card image cap">
            @else
                <span>No Image...</span>
            @endif
            <label for="image">Images</label>
            <br>
            <input type="file" class="form-control" id="img" name="image">
        </div>

        <div class="col-12 mt-5">
            <button type="submit" class="btn btn-primary">Edit</button>
        </div>
    </div>
    </form>

</x-app-layout>
