<x-app-layout>
    <x-slot name="header">
       <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Permissions') }}
            </h2>
            <a href="{{ route('permissions.create')}}" class="bg-slate-700 text-sm rounded-md text-white px-5 py-3">Create</a>
       </div>
    </x-slot>      

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-message></x-message>
            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr class="border-b">
                        <th class="px-6 py-3 text-left">#</th class="px-6 py-3 text-left">
                        <th class="px-6 py-3 text-left">Name</th>
                        <th class="px-6 py-3 text-left">Created</th>
                        <th class="px-6 py-3 text-center">Action</th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    @if($permissions->isNotEmpty())
                       @foreach($permissions as $permission)
                            <tr class="border-b">
                                <td class="px-6 py-3 text-left">
                                    {{ $permission->id}}
                                </td>
                                <td class="px-6 py-3 text-left">
                                     {{ $permission->name}}
                                </td>
                                <td class="px-6 py-3 text-left">
                                      {{ $permission->created_at}}
                                </td>
                                <td class="px-6 py-3 text-center">
                                       <a href="{{ route('permissions.create')}}" class="bg-slate-700 text-sm rounded-md text-white px-5 py-3">Edit</a>|<a href="{{ route('permissions.create')}}" class="bg-slate-700 text-sm rounded-md text-white px-5 py-3">Delete</a>
                                </td>
                            </tr>
                       @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
