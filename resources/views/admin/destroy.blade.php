<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <p class="text-xl mb-1">Blogs</p> @if($blogs->isEmpty()) ( No Blogs Found ) @endif
                    <div class="border-slate-500/10 border-y-2 py-2">
                        @foreach($blogs as $blog)
                            <div class="flex align-middle">
                                <form method="GET" action="{{ route('blog.destroy', $blog->id) }}">
                                    @csrf
                                    <input name="_method" type="hidden" value="DELETE">
                                    <span class="flex">{{ $blog->title }} <p class="text-sm mr-1">( {{ substr($blog->description,0,25).'...' }} )</p><button type="submit" class="text-red-500 btn btn-xs btn-danger btn-flat show-alert-delete-box btn-sm" data-toggle="tooltip" title='delete'> Delete</button></span>
                                </form>
                                <p class="mx-1">or</p>
                                <form action="{{ route('blog.edit', $blog->id) }}" method="get">
                                    @csrf
                                    <button type="submit" class="text-blue-500 btn-flat btn-sm" data-toggle="tooltip" title='update'>Edit</button>
                                </form>
                            </div>
                        @endforeach
                    </div>
                    <br><br>
                    <p class="text-xl mb-1">Projects</p> @if($projects->isEmpty()) ( No Projects Found ) @endif
                    <div class="border-slate-500/10 border-y-2 py-2">
                        @foreach($projects as $project)
                            <div class="flex align-middle">
                                <form method="GET" action="{{ route('project.destroy', $project->id) }}">
                                    @csrf
                                    <input name="_method" type="hidden" value="DELETE">
                                    <span class="flex">{{ $project->title }} <p class="text-sm mr-1">( {{ $project->link }} )</p><button type="submit" class="text-red-500 btn btn-xs btn-danger btn-flat show-alert-delete-box btn-sm" data-toggle="tooltip" title='delete'> Delete</button></span>
                                </form>
                                <p class="mx-1">or</p>
                                <form action="{{ route('project.edit', $project->id) }}" method="get">
                                    @csrf
                                    <button type="submit" class="text-blue-500 btn-flat btn-sm" data-toggle="tooltip" title='update'>Edit</button>
                                </form>
                            </div>
                        @endforeach
                    </div>
                    <br><br>
                    <p class="text-xl mb-1">Media</p> @if($media->isEmpty()) ( No Media Found ) @endif
                    <div class="border-slate-500/10 border-y-2 py-2">
                        @foreach($media as $item)
                            <form method="GET" action="{{ route('media.destroy', $item->id) }}">
                                @csrf
                                <input name="_method" type="hidden" value="DELETE">
                                <a href="{{ route('media.show', $item->id) }}" target="_blank" class="image-link">{{ $item->imagepath }}</a>
                                <input type="submit" class="text-red-500 btn btn-xs btn-danger btn-flat show-alert-delete-box btn-sm" data-toggle="tooltip" title='delete' value="Delete">
                            </form>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script type="text/javascript">
        $('.show-alert-delete-box').click(function(event){
            const form =  $(this).closest("form");
            const name = $(this).data("name");
            event.preventDefault();
            swal({
                title: "Confirm Removal?",
                icon: "warning",
                type: "warning",
                buttons: ["Cancel","Ja!"],
                confirmButtonText: 'Ja, Delete!'
            }).then((willDelete) => {
                if (willDelete) {
                    form.submit();
                }
            });
        });
    </script>
</x-app-layout>

