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
                    <form action="{{ route('project.update', $project->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="w-full">
                            <p>Titel</p>
                            <input value="{{ $project->title }}" class="w-full h-12 p-5 mb-4 rounded border-2 border-slate-200 hover:bg-slate-100" type="text" name="title" id="title" placeholder="ex: Learning Laravel, Dag: 1">
                        </div>

                        <div class="w-full">
                            <p>Link</p>
                            <input value="{{ $project->link }}" class="w-full h-12 p-5 mb-4 rounded border-2 border-slate-200 hover:bg-slate-100" type="text" name="link" id="link" placeholder="ex: Learning Laravel, Dag: 1">
                        </div>

                        <div class="w-full">
                            <p>Datum</p>
                            <input type="date" name="date" id="date" class="w-full h-12 p-5 mb-4 rounded border-2 border-slate-200 hover:bg-slate-100" value="{{ $project->date }}">
                        </div>

                        <div class="w-full">
                            <p>Thumbnail</p>
                            <input type="file" name="image" id="image" class="w-full p-5 mb-4 rounded border-2 border-slate-200 hover:bg-slate-100" value="{{ $project->imagepath }}">
                        </div>

                        <div class="w-full">
                            <p>Aanmaken</p>
                            <input class="m-auto w-full text-center bg-white h-12 border-slate-200 border-2 hover:bg-slate-100" type="submit" value="project post editen">
                        </div>
                    </form>
            </div>
        </div>
    </div>
</x-app-layout>

