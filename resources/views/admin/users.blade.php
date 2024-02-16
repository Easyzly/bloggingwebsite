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
                    <p class="text-xl mb-1">Users</p> @if($users->isEmpty()) ( No Users Found ) @endif
                    <div class="border-slate-500/10 border-y-2 py-2">
                        @foreach($users as $user)
                            <div class="flex align-middle">
                                <form method="GET" action="{{ route('user.destroy', $user->id) }}">
                                    @csrf
                                    <input name="_method" type="hidden" value="DELETE">
                                    <span class="flex">{{ $user->name }} <p class="text-sm mr-1">( {{ substr($user->email,0,25).'...' }} )</p><button type="submit" class="text-red-500 btn btn-xs btn-danger btn-flat show-alert-delete-box btn-sm" data-toggle="tooltip" title='delete'> Delete</button></span>
                                </form>
                                @if($user->isAdmin === 1)
                                    <p class="mx-1">or</p>
                                    <form action="{{ route('admin.remove', $user->id) }}" method="get">
                                        @csrf
                                        <button type="submit" class="show-alert-remove-admin-box text-blue-500 btn-flat btn-sm" data-toggle="tooltip" title='update'>Remove Admin</button>
                                    </form>
                                @else
                                    <p class="mx-1">or</p>
                                    <form action="{{ route('admin.add', $user->id) }}" method="get">
                                        @csrf
                                        <button type="submit" class="show-alert-add-admin-box text-blue-500 btn-flat btn-sm" data-toggle="tooltip" title='update'>Make Admin</button>
                                    </form>
                                @endif

                            </div>
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

        $('.show-alert-add-admin-box').click(function(event){
            const form =  $(this).closest("form");
            const name = $(this).data("name");
            event.preventDefault();
            swal({
                title: "Adding Admin?",
                icon: "warning",
                type: "warning",
                buttons: ["Cancel","Ja!"],
                confirmButtonText: 'Ja, Cancel!'
            }).then((willDelete) => {
                if (willDelete) {
                    form.submit();
                }
            });
        });

        $('.show-alert-remove-admin-box').click(function(event){
            const form =  $(this).closest("form");
            const name = $(this).data("name");
            event.preventDefault();
            swal({
                title: "Removing admin?",
                icon: "warning",
                type: "warning",
                buttons: ["Cancel","Ja!"],
                confirmButtonText: 'Ja, Cancel!'
            }).then((willDelete) => {
                if (willDelete) {
                    form.submit();
                }
            });
        });
    </script>
</x-app-layout>

