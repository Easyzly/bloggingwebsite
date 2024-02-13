<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
</head>

<style>
    body{
        display: grid;
        width: 100vw;
        height: 100vh;
        background-color: rgb(226 232 240)
    }
</style>
<body class="h-screen flex items-center justify-center">
<main class="m-10 w-1/3 p-4 bg-slate-50 gap-x-2 border-2 border-slate-100 rounded-3xl grid shadow-2xl">
    <div>
        <div class="justify-between flex">
            <p>Post Editen</p>
            <div class="flex space-between mb-5"></div>
            <a class="text-blue-400" href="{{ route('page.admin') }}">Terug, Admin(section)</a>
        </div>
        <form class="border-2 border-slate-100" action="{{ route('blog.update', $blog->id) }}" method="post">
            @csrf
            <div class="w-full">
                <p>Titel</p>
                <input class="w-full h-12 p-5 mb-4 rounded border-2 border-slate-200 hover:bg-slate-100" type="text" type="text" name="title" id="title" placeholder="ex: Learning Laravel, Dag: 1" value="{{ $blog->title }}">
            </div>

            <div class="w-full">
                <p>Korte Beschrijving</p>
                <input class="w-full h-12 p-5 mb-4 rounded border-2 border-slate-200 hover:bg-slate-100" type="text" type="text" name="description" id="description" placeholder="ex: Op dag 1 heb ik software gedownload zoals.." value="{{ $blog->description }}">
            </div>

            <div class="w-full">
                <p>Content</p>
                <textarea name="content" id="content" rows="20" class="w-full mb-4 p-5 rounded border-2 border-slate-200 hover:bg-slate-100" placeholder="ex: De start van mijn dag begon met een kopje thee waarna ik verder ging met mijn laravel blog website">{{ $blog->content }}</textarea>
            </div>

            <div class="w-full">
                <p>Datum van de blog dag</p>
                <input type="date" name="creationdate" id="creationdate" class="w-full h-12 p-5 mb-4 rounded border-2 border-slate-200 hover:bg-slate-100" value="{{ $blog->creationdate }}">
            </div>

            <div class="w-full">
                <p>blog updaten</p>
                <input class="m-auto w-full text-center bg-white h-12 border-slate-200 border-2 hover:bg-slate-100" type="submit" type="submit" value="update">
            </div>
        </form>
    </div>
</main>
</body>
</html>
