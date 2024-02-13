
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
</style>

<body class="bg-slate-100">
    <header class="bg-slate-50 shadow-sm">
        <div class="flex align-center sm:max-w-3xl m:max-w-4xl ml:max-w-5xl l:max-w-6xl m-auto text-gray-700/80 text-m">
            <button id="menu-toggle" class="sm:hidden px-2 py-1">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                     xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M4 6h16M4 12h16m-7 6h7"></path>
                </svg>
            </button>

            <div id="menu" class="sm:hidden flex flex-col items-start absolute top-0 left-0 w-full bg-white rounded-lg shadow-lg mt-12">
                <a href="#" class="px-4 py-2 text-gray-800 hover:bg-gray-200">Home</a>
                <a href="#" class="px-4 py-2 text-gray-800 hover:bg-gray-200">Projects</a>
                <a href="#" class="px-4 py-2 text-gray-800 hover:bg-gray-200">Websites</a>
                <a href="#" class="px-4 py-2 text-gray-800 hover:bg-gray-200">Blogs</a>
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

            <div class="hidden sm:flex">
                <a class="hover:scale-105 duration-100 ml-2 self-end px-4 py-4 border-b-2 border-slate-400/0 hover:bg-slate-100/60 hover:border-blue-500 hover:text-gray-800/80">Jamie van Gulik</a>
                <a class="hover:scale-105 duration-100 ml-2 self-end px-4 py-4 border-b-2 border-slate-400/0 hover:bg-slate-100/60 hover:border-blue-500 hover:text-gray-800/80">Projecten</a>
                <a class="hover:scale-105 duration-100 ml-2 self-end px-4 py-4 border-b-2 border-slate-400/0 hover:bg-slate-100/60 hover:border-blue-500 hover:text-gray-800/80">Websites</a>
                <a class="hover:scale-105 duration-100 ml-2 self-end px-4 py-4 border-b-2 border-slate-400/0 hover:bg-slate-100/60 hover:border-blue-500 hover:text-gray-800/80">Blogs</a>
            </div>

            <div class="grow"></div>
            <a class="hover:scale-[1.3] duration-100 scale-125 mx-2 self-end px-4 py-4 border-b-2 border-slate-400/0 hover:bg-slate-100/60"><ion-icon name="calendar-number-outline"></ion-icon></a>
            <a class="hover:scale-[1.3] duration-100 scale-125 mx-2 self-end px-4 py-4 border-b-2 border-slate-400/0 hover:bg-slate-100/60"><ion-icon name="person-outline"></ion-icon></a>
        </div>
    </header>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>
