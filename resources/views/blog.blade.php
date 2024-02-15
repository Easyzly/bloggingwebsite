@extends('base')

@section('content')
    <main class="my-16">
        <div class="mt-8 flex justify-between max-w-[90%] m-auto xss:max-w-md xs:max-w-xl s:max-w-2xl m:max-w-4xl ml:max-w-5xl l:max-w-6xl text-3xl mb-3 text-gray-800/95">
            <h1>Blogs</h1>
        </div>

        @foreach($blogs as $blog)
            <div class="grid grid-cols-1 sm:grid-cols-3 bg-slate-100 mb-6 p-4 sm:aspect-[3/1] shadow-sm max-w-[90%] m-auto xss:max-w-md xs:max-w-xl s:max-w-2xl m:max-w-4xl ml:max-w-5xl l:max-w-6xl text-3xl mb-5 text-gray-800/95">
                <div class="bg-slate-500 ">
                    <img src="{{ asset('images/' . $blog->imagepath) }}" class="w-full h-full">
                </div>
                <div class="ml-4 sm:col-span-2">
                    <div class="flex justify-between">
                        <h1 class="text-2xl">{{ $blog->title }}</h1>
                        <p  class="text-sm self-end">{{ $blog->date }}</p>
                    </div>
                    <p class="text-lg">{{ $blog->description }}</p>
                    <textarea class="h-60 sm:h-custom resize-none px-0 pb-0 border-y-2 border-slate-500/10 border-x-0 bg-slate-50/0 w-full" readonly>{{ $blog->content }}</textarea>
                </div>
            </div>
        @endforeach
    </main>
@endsection
