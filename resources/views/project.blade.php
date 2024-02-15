@extends('base')


@section('content')
    <main class="my-16">
        <div class="flex justify-between max-w-[90%] m-auto xss:max-w-md xs:max-w-xl s:max-w-2xl m:max-w-4xl ml:max-w-5xl l:max-w-6xl text-3xl mb-5 text-gray-800/95">
            <h1>Projecten</h1>
        </div>
        <div class="grid grid-cols-1 xsm:grid-cols-2 m:grid-cols-3 m-auto gap-10 max-w-[90%] xss:max-w-md xs:max-w-xl s:max-w-2xl sm:max-w-3xl m:max-w-4xl ml:max-w-5xl l:max-w-6xl">
            @foreach ($projects as $project)
                <a href="{{ $project->link }}" class="bg-slate-50 rounded">
                    <img src="{{ asset('images/' . $project->imagepath) }}" class="aspect-[5/6] rounded bg-slate-500 "></img>
                    <div class="m-auto p-2 pb-0.5 flex justify-between align-center">
                        <p class="text-gray-800/95">Project:</p>
                        <p class="text-gray-800/95">{{ $project->title }}</p>
                    </div>

                    <div class="m-auto p-2 flex justify-between align-center">
                        <p class="text-xs text-gray-800/80">Week:</p>
                        <p class="text-xs text-gray-800/80">{{ $project->date }}</p>
                    </div>
                </a>
            @endforeach
        </div>
    </main>
@endsection

