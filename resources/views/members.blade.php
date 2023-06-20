<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Members
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
                                <th class="border border-slate-300">Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($members as $member)
                            <tr class="">
                                <td class="border border-slate-300">{{ $member->id }}</td>
                                <td class="border border-slate-300">{{ $member->name }}</td>
                                <td class="border border-slate-300">{{ $member->email }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>