<x-app-layout >
    <x-slot name="header" >
        <div class="flex justify-between" >

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Posts') }}
        </h2>
            <button type="button" onclick=location.href="{{ route('posts.create') }}"
            class="btn btn-info font-bold text-blue-800">Create</button>
        </div>
    </x-slot>
    <x-posts-list :posts="$posts" />
</x-app-layout>
