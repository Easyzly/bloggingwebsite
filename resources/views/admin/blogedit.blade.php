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
                    <form action="{{ route('blog.update', $blog->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="w-full">
                            <p>Titel</p>
                            <input value="{{ $blog->title }}" class="w-full h-12 p-5 mb-4 rounded border-2 border-slate-200 hover:bg-slate-100" type="text" type="text" name="title" id="title" required>
                        </div>

                        <div class="w-full">
                            <p>Korte Beschrijving</p>
                            <input value="{{ $blog->description }}" class="w-full h-12 p-5 mb-4 rounded border-2 border-slate-200 hover:bg-slate-100" type="text" type="text" name="description" id="description" required>
                        </div>

                        <div class="w-full">
                            <p>Content</p>
                            <textarea name="content" id="content" rows="20" class="w-full mb-4 p-5 rounded border-2 border-slate-200 hover:bg-slate-100" required>{{ $blog->content }}</textarea>
                        </div>

                        <div class="w-full">
                            <p>Datum</p>
                            <input type="date" name="date" id="date" class="w-full p-5 mb-4 rounded border-2 border-slate-200 hover:bg-slate-100" value="{{ $blog->date }}" required>
                        </div>

                        <div class="w-full">
                            <p>Foto's / Thumbnail</p>
                            <input value="{{ $blog->imagepath }}" type="file" name="image" id="image" class="w-full p-5 mb-4 rounded border-2 border-slate-200 hover:bg-slate-100">
                        </div>

                        <div class="w-full">
                            <p>Aanmaken</p>
                            <input class="m-auto w-full text-center bg-white h-12 border-slate-200 border-2 hover:bg-slate-100" type="submit" type="submit" value="blog post aanmaken">
                        </div>
                    </form>
                </div>
            </div>
        </div>
</x-app-layout>

