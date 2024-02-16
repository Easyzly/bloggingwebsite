@extends('base')


@section('content')
    <main class="my-16">
        <div class="flex justify-between max-w-[90%] m-auto xss:max-w-md xs:max-w-xl s:max-w-2xl m:max-w-4xl ml:max-w-5xl l:max-w-6xl text-3xl mb-3 text-gray-800/95">
            <h1>Homepage</h1>
        </div>
        <div class="bg-slate-100 mb-6 p-4 min-h-72 shadow-sm max-w-[90%] m-auto xss:max-w-md xs:max-w-xl s:max-w-2xl m:max-w-4xl ml:max-w-5xl l:max-w-6xl text-3xl mb-5 text-gray-800/95">
            <h2 class="text-2xl mb-2">About me</h2>
            <p class="text-lg border-y-2 border-slate-500/10">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Tortor condimentum lacinia quis vel eros donec ac odio tempor. Lacus luctus accumsan tortor posuere. Orci phasellus egestas tellus rutrum tellus pellentesque eu tincidunt tortor. Maecenas ultricies mi eget mauris pharetra et ultrices. Tincidunt eget nullam non nisi est sit amet facilisis. Nulla facilisi nullam vehicula ipsum a arcu cursus vitae. Pulvinar pellentesque habitant morbi tristique senectus. Tincidunt nunc pulvinar sapien et ligula ullamcorper malesuada proin libero. Arcu ac tortor dignissim convallis aenean et tortor. Laoreet suspendisse interdum consectetur libero id faucibus nisl tincidunt eget. Mattis nunc sed blandit libero volutpat. Etiam tempor orci eu lobortis elementum nibh tellus. Varius morbi enim nunc faucibus a pellentesque sit amet. In est ante in nibh mauris. Convallis aenean et tortor at. Porttitor massa id neque aliquam vestibulum morbi blandit. Sollicitudin aliquam ultrices sagittis orci a scelerisque purus semper eget. Pharetra diam sit amet nisl suscipit adipiscing bibendum.</p>
        </div>

        @if($latestblog)
            <div class="mt-8 flex justify-between max-w-[90%] m-auto xss:max-w-md xs:max-w-xl s:max-w-2xl m:max-w-4xl ml:max-w-5xl l:max-w-6xl text-3xl mb-3 text-gray-800/95">
                <h1>Recent Blog</h1>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-3 bg-slate-100 mb-6 p-4 sm:aspect-[3/1] shadow-sm max-w-[90%] m-auto xss:max-w-md xs:max-w-xl s:max-w-2xl m:max-w-4xl ml:max-w-5xl l:max-w-6xl text-3xl mb-5 text-gray-800/95">
                <div class="bg-slate-200 aspect-[1/1.2] my-auto">
                    <img src="{{ asset('images/' . $latestblog->imagepath) }}" class="w-full h-full">
                </div>
                <div class="ml-4 sm:flex sm:flex-col sm:col-span-2">
                    <div class="flex justify-between">
                        <h1 class="text-2xl">{{ $latestblog->title }}</h1>
                        <p  class="text-sm self-end">{{ $latestblog->date }}</p>
                    </div>
                    <p class="text-lg">{{ $latestblog->description }}</p>
                    <textarea class="h-96 sm:grow resize-none px-0 pb-0 border-y-2 border-slate-500/10 border-x-0 bg-slate-50/0 w-full" readonly>{{ $latestblog->content }}</textarea>
                </div>
            </div>
        @endif

    </main>
@endsection
