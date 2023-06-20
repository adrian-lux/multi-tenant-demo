<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Organizations
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <table class="table-fixed border-collapse border border-slate-400 p-10 w-full">
                        <thead class="bg-grey-200">
                            <tr>
                                <th class="border border-slate-300">ID</th>
                                <th class="border border-slate-300">Name</th>
                                <th class="border border-slate-300">Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($organizations as $organization)
                            <tr class="">
                                <td class="border border-slate-300">{{ $organization->id }}</td>
                                <td class="border border-slate-300">{{ $organization->name }}</td>
                                <td class="border border-slate-300 text-center">

                                    @if ($organization->id === auth()->user()->active_organization_id)
                                    Current
                                    @else
                                    <form action="switch_organization/{{$organization->id}}" method="put">
                                        @method('PUT')
                                        @csrf()

                                        <button class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">Activate</button>
                                    </form>
                                    @endif


                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>