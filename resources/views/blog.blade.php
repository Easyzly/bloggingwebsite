@extends('base')

<style>
    /* Add your existing styles here */

    .fullscreen-container {
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
        display: none; /* initially hide the fullscreen container */
    }

    .fullscreen-content {
        max-width: 80%;
        max-height: 80%;
        overflow: auto;
        background: #fff;
        padding: 20px;
        border-radius: 8px;
    }

    .fullscreen img {
        max-width: 100%;
        max-height: 100%;
        border: 2px solid #fff;
        box-sizing: border-box;
        cursor: pointer;
    }

    .fullscreen-content{
        white-space: pre-wrap;
    }
</style>

@section('content')
    <main class="my-16">
        <div class="flex justify-between max-w-[90%] m-auto xss:max-w-md xs:max-w-xl s:max-w-2xl m:max-w-4xl ml:max-w-5xl l:max-w-6xl text-3xl mb-5 text-gray-800/95">
            <h1>Blogs</h1>
        </div>
        <div class="grid grid-cols-1 xsm:grid-cols-2 m:grid-cols-3 m-auto gap-10 max-w-[90%] xss:max-w-md xs:max-w-xl s:max-w-2xl sm:max-w-3xl m:max-w-4xl ml:max-w-5xl l:max-w-6xl">
            @foreach ($blogs as $blog)
                <div class="relative">
                    <img src="{{ asset('images/' . $blog->imagepath) }}" class="aspect-[6/4] cursor-pointer"
                         onclick="showFullscreen({{ $loop->index }})">
                    <div class="hidden" id="hiddenContent-{{ $loop->index }}">
                        <h1>{{ $blog->title }}</h1>
                        <p>{{ $blog->description }}</p>
                        <p>{{ $blog->content }}</p>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Fullscreen Container -->
        <div class="fullscreen-container" id="fullscreenContainer">
            <div class="fullscreen-content" id="fullscreenContent"></div>
        </div>
    </main>

    <script>
        function showFullscreen(index) {
            const hiddenContent = document.getElementById('hiddenContent-' + index);
            const fullscreenContainer = document.getElementById('fullscreenContainer');
            const fullscreenContent = document.getElementById('fullscreenContent');

            fullscreenContent.innerHTML = hiddenContent.innerHTML;
            fullscreenContainer.style.display = 'flex';

            document.documentElement.requestFullscreen();

            document.addEventListener('fullscreenchange', function () {
                if (!document.fullscreenElement) {
                    fullscreenContainer.style.display = 'none';
                }
            });
        }
    </script>
@endsection
