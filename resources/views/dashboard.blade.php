<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="pt-12 pb-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form class="border-2 border-slate-100" action="{{ route('media.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="w-full">
                            <p>Foto's / Thumbnail</p>
                            <input type="file" multiple name="image" id="image" class="w-full p-5 mb-4 rounded border-2 border-slate-200 hover:bg-slate-100">
                        </div>

                        <div class="w-full">
                            <p>Aanmaken</p>
                            <input class="m-auto w-full text-center p-2 bg-white border-slate-200 border-2 hover:bg-slate-100" type="submit" type="submit" value="media post aanmaken">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
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
                            <p>Datum</p>
                            <input type="date" name="date" id="date" class="w-full h-12 p-5 mb-4 rounded border-2 border-slate-200 hover:bg-slate-100" value="{{ date("Y-m-d") }}" required>
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
        </div>
    </div>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form class="border-2 border-slate-100" action="{{ route('project.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="w-full">
                            <p>Titel</p>
                            <input class="w-full h-12 p-5 mb-4 rounded border-2 border-slate-200 hover:bg-slate-100" type="text" name="title" id="title" placeholder="ex: Learning Laravel, Dag: 1">
                        </div>

                        <div class="w-full">
                            <p>Link</p>
                            <input class="w-full h-12 p-5 mb-4 rounded border-2 border-slate-200 hover:bg-slate-100" type="text" name="link" id="link" placeholder="ex: Learning Laravel, Dag: 1">
                        </div>

                        <div class="w-full">
                            <p>Datum</p>
                            <input type="date" name="date" id="date" class="w-full h-12 p-5 mb-4 rounded border-2 border-slate-200 hover:bg-slate-100" value="{{ date("Y-m-d") }}">
                        </div>

                        <div class="w-full">
                            <p>Thumbnail</p>
                            <input type="file" name="image" id="image" class="w-full p-5 mb-4 rounded border-2 border-slate-200 hover:bg-slate-100">
                        </div>

                        <div class="w-full">
                            <p>Aanmaken</p>
                            <input class="m-auto w-full text-center bg-white h-12 border-slate-200 border-2 hover:bg-slate-100" type="submit" value="project post aanmaken">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <p>Blogs</p> @if($blogs->isEmpty()) ( No Blogs Found ) @endif
                    @foreach($blogs as $blog)
                        <form method="GET" action="{{ route('blog.destroy', $blog->id) }}">
                            @csrf
                            <input name="_method" type="hidden" value="DELETE">
                            <button type="submit" class="text-red-500 btn btn-xs btn-danger btn-flat show-alert-delete-box btn-sm" data-toggle="tooltip" title='Delete'>Delete {{ $blog->title }}</button>
                        </form>
                    @endforeach
                    <p>Projects</p> @if($projects->isEmpty()) ( No Projects Found ) @endif
                    @foreach($projects as $project)
                        <form method="GET" action="{{ route('project.destroy', $project->id) }}">
                            @csrf
                            <input name="_method" type="hidden" value="DELETE">
                            <button type="submit" class="text-red-500 btn btn-xs btn-danger btn-flat show-alert-delete-box btn-sm" data-toggle="tooltip" title='Delete'>Delete {{ $project->title }}</button>
                        </form>
                    @endforeach
                    <p>Media</p> @if($media->isEmpty()) ( No Media Found ) @endif
                    @foreach($media as $item)
                        <form method="GET" action="{{ route('media.destroy', $item->id) }}">
                            @csrf
                            <input name="_method" type="hidden" value="DELETE">
                            <button type="submit" class="text-red-500 btn btn-xs btn-danger btn-flat show-alert-delete-box btn-sm" data-toggle="tooltip" title='Delete'>Delete {{ $item->id }}</button>
                        </form>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

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
</x-app-layout>

