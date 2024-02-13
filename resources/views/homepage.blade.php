@extends('base')


@section('content')
<main class="grid grid-cols-6 mt-6 sm:mt-24">
    @if(isset($selected_blog))
        <a class="col-span-4 col-start-2 flex-col ml:flex-row rounded-3xl grid grid-cols-1 ml:grid-cols-2 bg-slate-100 shadow-2xl">
            <img @if($selected_blog->filename) src="{{ asset('images/' . $selected_blog->filename) }}" style="background-size: contain" @endif class="h-full flex justify-between flex-col rounded-3xl shadow-xl" alt="Imagepath = {{ $selected_blog->filename }}">
            <div class="p-5">
                <h1 class="text-3xl border-b-2 border-slate-900 pb-1">{{ $selected_blog->title }}</h1>
                <div class="flex justify-between  mb-5">
                    <h3>{{ $selected_blog->description }}</h3>
                    <p>{{ date('d-m-Y', strtotime($selected_blog->creationdate)) }}</p>
                </div>
                <p class="text-xs m:text-s l:text-base" style="box-sizing: border-box; white-space: pre-wrap">{{ $selected_blog->content }}</p>
            </div>
        </a>

        <a class="col-span-4 mt-6 p-5 col-start-2 flex-col ml:flex-row rounded-3xl grid bg-slate-100 shadow-2xl">
            <form class="border-2 flex justify-between border-slate-100" action="{{ route('comment.store', $selected_blog->id) }}" method="post">
                @csrf
                <input class="w-4/6" type="text" name="content" id="content" required>
                <input class="w-1/5" type="submit" value="comment!">
            </form>
            <div class="border-2 border-slate-100">
                @foreach($selected_blog->comments as $comment)
                    <p>{{ $comment->content }}</p>
                @endforeach
            </div>
        </a>
    @endif
</main>

<main class="grid grid-cols-6 mt-6 sm:mt-24">
    <section class="col-span-4 s:grid-cols-1 sm:grid-cols-2 m:grid-cols-3 ml:grid-cols-4 l:grid-cols-5 col-start-2 rounded-3xl gap-5 bg-gray-200 grid shadow-xl">
        @foreach($blogs as $blog)
            <a href="{{ route('page.find', $blog->id) }}" style="background-image: url('{{ asset('images/' . $blog->filename) }}');     background-size: cover; background-repeat: no-repeat; background-position: center;" class="hover:bg-slate-900 bg-gray-800 aspect-[1/1] flex justify-between flex-col rounded-xl shadow-xl hover:scale-105 duration-100">
                <div class="flex-auto"></div>
                <div id="info" class="text-slate-100 flex justify-between p-5 ">
                    <p style=" -webkit-text-stroke-width: 1px; -webkit-text-stroke-color: darkorange;" class="text-xl m:text-m l:text-xl">{{ date('d-m-Y', strtotime($blog->creationdate)) }}</p>
                    <p style=" -webkit-text-stroke-width: 1px; -webkit-text-stroke-color: darkorange;" class="text-xl m:text-m l:text-xl">{{ substr($blog->title,0,12).'...' }}</p>
                </div>
            </a>
        @endforeach
    </section>
</main>
@endsection

