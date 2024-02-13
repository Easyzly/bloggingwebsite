
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/5.0.7/sweetalert2.min.css" rel="stylesheet">
    @vite('resources/css/app.css')
</head>

<body class="bg-slate-200">
<header class="text-slate-100 rounded-bl-lg items-center rounded-br-lg py-5 px-24 bg-gray-800 border-b-4 border-gray-500 flex justify-between shadow-xl flex-col ml:flex-row">
    <a href="{{ route('page.home') }}" class="xs:text-3xl text-xl border-2 hover:border-slate-50/[1] border-slate-50/[0] rounded-lg p-2 hover:bg-slate-100 hover:text-gray-800">Blogwebsite | Jamie van Gulik</a>
    <nav class="text-xl flex justify-between">
        <a class="s:mx-6 ml:ml-24 border-2 hover:border-slate-50/[1] border-slate-50/[0] rounded-lg p-2 hover:bg-slate-100 hover:text-gray-800" href="{{ route('page.home') }}">Home</a>
        <a class="s:mx-6 ml:ml-24 border-2 hover:border-slate-50/[1] border-slate-50/[0] rounded-lg p-2 hover:bg-slate-100 hover:text-gray-800" href="">About me</a>
        @if(auth()->check() && auth()->user()->isAdmin())  <a class="s:mx-6 ml:ml-24 border-2 hover:border-slate-50/[1] border-slate-50/[0] rounded-lg p-2 hover:bg-slate-100 hover:text-gray-800" href="{{ route('page.admin') }}">Admin</a> @endif
    </nav>
</header>

    @yield('content')
</body>
</html>
