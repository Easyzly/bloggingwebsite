@extends('base')

<style>
    /* Add your existing styles here */

    .fullscreen {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.8);
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 9999;
    }

    .fullscreen img {
        max-width: 100%;
        max-height: 100%;
        border: 2px solid #fff;
        box-sizing: border-box;
        cursor: pointer;
    }
</style>

@section('content')
    <main class="my-16">
        <div class="flex justify-between max-w-[90%] m-auto xss:max-w-md xs:max-w-xl s:max-w-2xl m:max-w-4xl ml:max-w-5xl l:max-w-6xl text-3xl mb-5 text-gray-800/95">
            <h1>Media</h1>
        </div>
        <div class="grid grid-cols-1 xsm:grid-cols-2 m:grid-cols-3 m-auto gap-10 max-w-[90%] xss:max-w-md xs:max-w-xl s:max-w-2xl sm:max-w-3xl m:max-w-4xl ml:max-w-5xl l:max-w-6xl">
            @php $count = 0 @endphp
            @foreach ($media as $item)
                @php $count += 1 @endphp
                <img src="{{ asset('images/' . $item->imagepath) }}" class="aspect-[6/4]" id="fullscreenImage-{{$count}}">

                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        const fullscreenImage = document.getElementById('fullscreenImage-{{$count}}');

                        fullscreenImage.addEventListener('click', function () {
                            if (!document.fullscreenElement) {
                                fullscreenImage.classList.add('fullscreen');
                                document.documentElement.requestFullscreen();
                            } else {
                                document.exitFullscreen();
                            }
                        });

                        document.addEventListener('fullscreenchange', function () {
                            if (!document.fullscreenElement) {
                                fullscreenImage.classList.remove('fullscreen');
                            }
                        });
                    });
                </script>
            @endforeach
        </div>
    </main>
@endsection

