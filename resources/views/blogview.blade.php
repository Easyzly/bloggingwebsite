<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
</head>

<style>
    body{
        display: grid;
        width: 100vw;
        height: 100vh;
        background-color: rgb(226 232 240)
    }
</style>
<body class="h-screen flex items-center justify-center">
<main class="m-10 w-1/3 p-4 bg-slate-50 gap-x-2 border-2 border-slate-100 rounded-3xl grid shadow-2xl">
    <div>
        <div class="flex justify-between">
            <h1 class="">Blog: {{ $blog->title }}</h1>
            <div class="flex space-between mb-5"></div>
            <a class="text-blue-400" href="{{ route('homepage') }}">terug</a>
        </div>
            <div>
                <div class="flex space-between mb-5">
                    <h3>Beschrijving: {{ $blog->description }}</h3>
                </div>
                <p>Content</p>
                <div  class="border-2 border-slate-100 flex space-between">
                    <p>{{ $blog->content }}</p>
                </div>
                <p class="mt-8">Comment</p>
                <form class="border-2 flex justify-between border-slate-100" action="{{ route('comment.store', $blog->id) }}" method="post">
                    @csrf
                    <input class="w-4/6" type="text" name="content" id="content">
                    <input class="w-1/5" type="submit" value="comment!">
                </form>
                <div class="border-2 border-slate-100">
                    @foreach($blog->comments as $comment)
                        <p>{{ $comment->content }}</p>
                    @endforeach
                </div>
            </div>
    </div>
</main>
</body>
</html>
