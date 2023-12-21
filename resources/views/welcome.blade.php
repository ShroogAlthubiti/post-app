@extends('layouts.app')
@section('home')

    <body class="antialiased">
        <div
            class="flex flex-col pt-9 bg-gray-50 dark:bg-gray-900  items-center justify-center w-screen min-h-screen bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">

            @auth
                <form method="POST" action="{{ route('post.create') }}" class="flex flex-col mt-6 items-center">
                    @csrf
                    <textarea name="content" rows="5" cols="60"
                        class=" block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
                    @error('content')
                        <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                            role="alert">
                            <span class="font-medium">{{ $message }}</span>
                        </div> <br>
                    @enderror

                    <x-primary-button class="mt-6 mb-6 ">Add Post</x-primary-button>
                </form>
            @else
                <h1 class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                    to Add post must be login</h1>
            @endauth

            {{-- Card --}}
            @foreach ($posts as $post)
                <a style='width:35%' href="{{ route('post.show', $post->id) }}">
                    <div class="flex flex-col pl-5 mb-4 pt-24 pb-12 font-sans text-gray-700 bg-gray-200 sm:px-6 lg:px-8">
                        <div class="space-y-8 mb-3">
                            <div class="sticky w-full max-w-xl px-4 py-12 mx-auto space-y-4 bg-white border rounded-lg">
                                <h2 class="mb-4 space-y-1 text-2xl font-bold leading-none text-gray-900">
                                    <span class="block text-lg text-blue-700">{{ $post->user->name }} </span><span
                                        class="text-xs">{{ $post->created_at->since() }}</span>
                                </h2>
                                <p class="text-xl">
                                    {{ $post->content }}
                                </p>
                                <span
                                    class="flex text-sm justify-end font-semibold text-black-900 mt-2">{{ $post->comments->count() }}
                                    comments
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
            <div class="mx-4 py-8">
                {{ $posts->links() }}
            </div>
        </div>
    </body>

@endsection
