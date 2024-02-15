@extends('base')

@section('content')
    <main class="my-16">
        <div class="flex justify-between max-w-[90%] m-auto xss:max-w-md xs:max-w-xl s:max-w-2xl m:max-w-4xl ml:max-w-5xl l:max-w-6xl text-3xl mb-5 text-gray-800/95">
            <h1>Media</h1>
        </div>
        <div class="columns-1 xsm:columns-2 m:columns-3 m-auto gap-10 max-w-[90%] xss:max-w-md xs:max-w-xl s:max-w-2xl sm:max-w-3xl m:max-w-4xl ml:max-w-5xl l:max-w-6xl">
            @php $count = 0 @endphp
            @foreach ($media as $item)
                @php $count += 1 @endphp
                <img src="{{ asset('images/' . $item->imagepath) }}" class="w-full mb-12">
            @endforeach
        </div>
    </main>
@endsection

