@extends('base')


@section('content')

<style>
    body{
        display: grid;
        width: 100vw;
        height: 100vh;
        background-color: rgb(226 232 240)
    }
</style>

    <main class="m-10 p-4 bg-slate-50 gap-x-2 border-2 border-slate-100 rounded-3xl  shadow-2xl">
        <div class="grid gap-4 s:grid-cols-1 m:grid-cols-2 ml:grid-cols-3">
            <div id="all items">
                <p>Mijn Blogs:</p>
                @if(isset($blogs))
                    <div id="items">
                        @foreach($blogs as $blog)
                            <div class="border-2 border-slate-100 flex space-between">
                                <h3>{{ $blog->title }}</h3>
                                <div class="flex-auto"></div>
                                <span class="flex space-between">
                                    <a class="mr-1 text-green-500" href="{{ route('page.find', $blog->id) }}">See more..</a>
                                    <p> | </p>
                                    <a class="mr-1 text-blue-500" href="{{ route('blog.edit', $blog->id) }}">Edit</a>
                                    <p> | </p>
                                    <form method="GET" action="{{ route('blog.destroy', $blog->id) }}">
                                        @csrf
                                        <input name="_method" type="hidden" value="DELETE">
                                        <button type="submit" class="text-red-500 btn btn-xs btn-danger btn-flat show-alert-delete-box btn-sm" data-toggle="tooltip" title='Delete'>Delete</button>
                                    </form>
                                </span>
                            </div>
                        @endforeach

                    </div>
                @else
                    <p>U heeft nog geen blogs geupload</p>
                @endif
            </div>

            <div id="all comments">
                <p>Comments:</p>
                @if(isset($comments))
                    <div id="items">
                        <div class="border-2 border-slate-100">
                            @foreach($comments as $comment)
                                <span>{{ $comment->blog->title }} |{{ $comment->content }}, <a class="text-blue-400" href="{{ route('page.find', $comment->blog->id) }}">see more</a> or
                                <form method="GET" action="{{ route('comment.destroy', $comment->id) }}">
                                    @csrf
                                    <input name="_method" type="hidden" value="DELETE">
                                    <button type="submit" class="text-red-500 btn btn-xs btn-danger btn-flat show-alert-delete-box btn-sm" data-toggle="tooltip" title='Delete'>Delete</button>
                                </form>
                                </span>
                            @endforeach

                        </div>
                    </div>
                @else
                    <p>U heeft nog geen blogs geupload</p>
                @endif
            </div>

            <div class="col-span-1 m:col-span-2 ml:col-span-1">
                <h1>Nieuwe Blog</h1>
                <form class="border-2 border-slate-100" action="{{ route('blog.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="w-full">
                        <p>Titel</p>
                        <input class="w-full h-12 p-5 mb-4 rounded border-2 border-slate-200 hover:bg-slate-100" type="text" type="text" name="title" id="title" placeholder="ex: Learning Laravel, Dag: 1" required>
                    </div>

                    <div class="w-full">
                        <p>Korte Beschrijving</p>
                        <input class="w-full h-12 p-5 mb-4 rounded border-2 border-slate-200 hover:bg-slate-100" type="text" type="text" name="description" id="description" placeholder="ex: Op dag 1 heb ik software gedownload zoals.." required>
                    </div>

                    <div class="w-full">
                        <p>Content</p>
                        <textarea name="content" id="content" rows="20" class="w-full mb-4 p-5 rounded border-2 border-slate-200 hover:bg-slate-100" placeholder="ex: De start van mijn dag begon met een kopje thee waarna ik verder ging met mijn laravel blog website" required></textarea>
                    </div>

                    <div class="w-full">
                        <p>Datum van de blog dag</p>
                        <input type="date" name="creationdate" id="creationdate" class="w-full h-12 p-5 mb-4 rounded border-2 border-slate-200 hover:bg-slate-100" value="{{ date("Y-m-d") }}" required>
                    </div>

                    <div class="w-full">
                        <p>Foto's / Thumbnail</p>
                        <input type="file" name="image" id="image" class="w-full h-12 p-5 mb-4 rounded border-2 border-slate-200 hover:bg-slate-100">
                    </div>

                    <div class="w-full">
                        <p>Aanmaken</p>
                        <input class="m-auto w-full text-center bg-white h-12 border-slate-200 border-2 hover:bg-slate-100" type="submit" type="submit" value="blog post aanmaken">
                    </div>
                </form>
            </div>
        </div>
    </main>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script type="text/javascript">
    $('.show-alert-delete-box').click(function(event){
        var form =  $(this).closest("form");
        var name = $(this).data("name");
        event.preventDefault();
        swal({
            title: "Zeker weten verwijderen?",
            icon: "warning",
            type: "warning",
            buttons: ["Anuleer","Ja!"],
            confirmButtonText: 'Ja, verwijderen!'
        }).then((willDelete) => {
            if (willDelete) {
                form.submit();
            }
        });
    });
</script>
@endsection
