@include('layouts.navigation')

<div style="height: 15%" class="px-6 py-4 mt-4 bg-white-100 dark:bg-gray-900">
    <p class="mb-6 text-gray-700 text-base">{{ $posts->user->name }}</p>
    <p class="font-bold text-xl mb-2">
        {{ $posts->content }}
    </p>
    <div class="mt-4 ">
        <span
            class="inline-block bg-gray-200 rounded-full  text-sm font-semibold text-black-900  mb-4">{{ $posts->created_at->since() }}</span>
    </div>
</div>
<div
    class="flex flex-col p-4 mt-4 relative sm:flex  min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 ">
    @auth
        <form method="POST" action="{{ route('post.comment.store', $posts->id) }}">
            @csrf
            <textarea name="content" rows="5" cols="60"
                class=" block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
            @error('content')
                <span class="text-red-600  font-medium">{{ $message }}</span>
                <br>
            @enderror

            <x-primary-button class="mt-6 mb-6 ">Add Comment</x-primary-button>
        </form>
    @else
        <h1 class="font-bold text-lg ">too Add comment must be login</h1>
    @endauth
    @foreach ($posts->comments as $comment)
        <div class="mb-3 max-w-sm rounded overflow-hidden shadow-lg">
            <div class=" px-6 py-4">
                <p class="mb-6 text-gray-700 text-base">{{ $posts->user->name }}</p>
                <p class="font-bold text-xl mb-2">
                    {{ $comment->content }}
                </p>
            </div>
            <div class="mb-6 px-6 pt-4 pb-2">

                <span
                    class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-black-900 mr-2">{{ $comment->created_at->since() }}</span>
            </div>
        </div>

    @endforeach

</div>
</div>
@include('layouts.footer')
