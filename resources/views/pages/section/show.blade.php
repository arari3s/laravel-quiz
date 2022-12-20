<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Detail Section &raquo; #{{ $section->id }} {{ $section->name }}
        </h2>
    </x-slot>

    <x-slot name="script">
        <script>
            // AJAX DataTable
            var datatable = $('#crudTable').DataTable({
                rowReorder: {
                    selector: 'td:nth-child(2)'
                },
                responsive: true,

                ajax: {
                    url: '{!! url()->current() !!}'
                },

                columns: [{
                        // data: 'DT_RowIndex',
                        // name: 'DT_RowIndex',
                        // orderable: false,
                        // searchable: false,
                        data: 'id',
                        name: 'id',
                        width: '5%'
                    },
                    {
                        data: 'question',
                        name: 'question'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false,
                        width: '10%'
                    }
                ]
            })
        </script>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mb-10">
                <a href="{{ route('dashboard.section.index') }}"
                    class="bg-indigo-500 hover:bg-indigo-800 text-white font-bold py-2 px-10 rounded-md shadow-lg">
                    Back
                </a>
            </div>

            <h2 class="font-semibold text-lg text-gray-800 leading-tight mb-5">Section Details</h2>

            <div class="bg-white overflow-hidden shadow sm:rounded-lg mb-10">
                <div class="p6 bg-white border-b border-gray-200">
                    <table class="table-auto w-full">
                        <tbody>
                            <tr>
                                <th class="border px-6 py-4 text-right">Name Section Quiz</th>
                                <td class="border px-6 py-4">
                                    {{ $section->name }}
                                </td>
                            </tr>
                            <tr>
                                <th class="border px-6 py-4 text-right">Name Section</th>
                                <td class="border px-6 py-4">
                                    {{ $section->description }}
                                </td>
                            </tr>
                            <tr>
                                <th class="border px-6 py-4 text-right">Published</th>
                                <td class="border px-6 py-4">
                                    @if ($section->is_active == '1')
                                        Yes
                                    @else
                                        No
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th class="border px-6 py-4 text-right">Details</th>
                                <td class="border px-6 py-4">
                                    {{ $section->details }}
                                </td>
                            </tr>
                            <tr>
                                <th class="border px-6 py-4 text-right">Created By</th>
                                <td class="border px-6 py-4">
                                    {{ $section->user->name }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <h2 class="font-semibold text-lg text-gray-800 leading-tight mb-5">Question Details</h2>

            <div class="bg-white overflow-hidden shadow sm:rounded-lg">
                <div class="px-4 py-5 sm:p-6">
                    <table id="crudTable" class="display nowrap" style="width: 100%">
                        <thead class="text-left">
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
