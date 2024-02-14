
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/5.0.7/sweetalert2.min.css" rel="stylesheet">
    @vite('resources/css/app.css')
</head>

<style>
    #menu {
        display: none;
    }

    a{
        cursor: pointer;
    }

    body{ display:flex; flex-direction:column; }
    main{ flex:1; }
</style>

<body class="bg-slate-200 min-h-screen">
{{--header--}}
    <header class="bg-slate-50 shadow-sm">
        <div class="flex align-center sm:justify-normal justify-between sm:max-w-3xl m:max-w-4xl ml:max-w-5xl l:max-w-6xl m-auto text-gray-800/80 text-m">
            <button id="menu-toggle" class="sm:hidden px-2 py-1">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                     xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M4 6h16M4 12h16m-7 6h7"></path>
                </svg>
            </button>

            <div id="menu" class="sm:hidden flex z-20 flex-col items-start absolute top-0 left-0 w-full bg-white rounded-lg shadow-lg mt-12">
                <a href="#home" class="sm:hidden px-4 w-full z-10 py-2 text-gray-800 hover:bg-gray-200">Home</a>
                <a href="#projects" class="sm:hidden px-4 w-full z-10 py-2 text-gray-800 hover:bg-gray-200">Projects</a>
                <a href="#websites" class="sm:hidden px-4 w-full z-10 py-2 text-gray-800 hover:bg-gray-200">Media</a>
                <a href="#blogs" class="sm:hidden px-4 w-full z-10 py-2 text-gray-800 hover:bg-gray-200">Blogs</a>
            </div>

            <script>
                document.addEventListener("DOMContentLoaded", function () {
                    var menuToggle = document.getElementById("menu-toggle");
                    var menu = document.getElementById("menu");

                    menuToggle.addEventListener("click", function () {
                        if (menu.style.display === "none" || menu.style.display === "") {
                            menu.style.display = "flex";
                        } else {
                            menu.style.display = "none";
                        }
                    });
                });
            </script>
            <a class="my-auto" href="#home"><img class="h-6 my-auto" src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/c5/Target_Corporation_logo_%28vector%29.svg/1200px-Target_Corporation_logo_%28vector%29.svg.png"></a>

            <div class="hidden sm:flex">
                <a href="#home" class="hover:scale-105 duration-100 ml-2 self-end px-4 py-4 border-b-2 border-slate-400/0 hover:bg-slate-100 hover:border-blue-500 hover:text-gray-800">Jamie van Gulik</a>
                <a href="#projects" class="hover:scale-105 duration-100 ml-2 self-end px-4 py-4 border-b-2 border-slate-400/0 hover:bg-slate-100 hover:border-blue-500 hover:text-gray-800">Projecten</a>
                <a href="#websites" class="hover:scale-105 duration-100 ml-2 self-end px-4 py-4 border-b-2 border-slate-400/0 hover:bg-slate-100 hover:border-blue-500 hover:text-gray-800">Media</a>
                <a href="#blogs" class="hover:scale-105 duration-100 ml-2 self-end px-4 py-4 border-b-2 border-slate-400/0 hover:bg-slate-100 hover:border-blue-500 hover:text-gray-800">Blogs</a>
            </div>

            <div class="hidden sm:flex grow"></div>
            <a class="my-auto" href="{{ route('dashboard') }}"><img class="h-6 my-auto" src="https://cdn-icons-png.freepik.com/256/1144/1144760.png"></a>

        </div>
    </header>
{{--Main--}}
    <main class="my-16">
        <div class="flex justify-between max-w-[90%] m-auto xss:max-w-md xs:max-w-xl s:max-w-2xl m:max-w-4xl ml:max-w-5xl l:max-w-6xl text-3xl mb-5 text-gray-800/95">
            <h1>Projecten</h1>
        </div>
        <div class="grid grid-cols-1 xsm:grid-cols-2 m:grid-cols-3 l:grid-cols-4 m-auto gap-10 max-w-[90%] xss:max-w-md xs:max-w-xl s:max-w-2xl sm:max-w-3xl m:max-w-4xl ml:max-w-5xl l:max-w-6xl">
            @for ($x = 0; $x <= 29; $x++)
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

{{--Footer--}}
    <footer class="bg-slate-50 shadow-sm">
        <div class="flex align-center sm:justify-normal justify-between sm:max-w-3xl m:max-w-4xl ml:max-w-5xl l:max-w-6xl m-auto text-gray-700/80 text-sm text-center">
            <a href="#socials" class="px-2 sm:px-4 w-full z-10 py-2 hover:bg-gray-200">Socials</a>
            <a href="{{ route('login') }}" class="px-2 sm:px-4 w-full z-10 py-2 hover:bg-gray-200">Login</a>
            <a href="{{ route('register') }}" class="px-2 sm:px-4 w-full z-10 py-2 hover:bg-gray-200">Register</a>
            <a href="#privacy" class="px-2 sm:px-4 w-full z-10 py-2 hover:bg-gray-200">Privacy</a>
        </div>
    </footer>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>
