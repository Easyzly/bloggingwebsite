@extends('base')


@section('content')
    <main class="my-16">
        <div class="flex justify-between max-w-[90%] m-auto xss:max-w-md xs:max-w-xl s:max-w-2xl m:max-w-4xl ml:max-w-5xl l:max-w-6xl text-3xl mb-5 text-gray-800/95">
            <h1>Projecten</h1>
        </div>
        <div class="grid grid-cols-1 xsm:grid-cols-2 m:grid-cols-3 l:grid-cols-4 m-auto gap-10 max-w-[90%] xss:max-w-md xs:max-w-xl s:max-w-2xl sm:max-w-3xl m:max-w-4xl ml:max-w-5xl l:max-w-6xl">
            @for ($x = 0; $x <= 23; $x++)
                <a href="#item/{{ $x }}">
                    <div class="aspect-[5/6] bg-green-600 rounded"></div>
                    <div class="m-auto pt-2 pb-0.5 flex justify-between align-center">
                        <p class="text-gray-800/95">Project:</p>
                        <p class="text-gray-800/95">Blogwebsite</p>
                    </div>

                    <div class="m-auto pb-0.5 flex justify-between align-center">
                        <p class="text-xs text-gray-800/80">Week:</p>
                        <p class="text-xs text-gray-800/80">1 t/m 2</p>
                    </div>

                </a>
            @endfor
        </div>
    </main>
@endsection

