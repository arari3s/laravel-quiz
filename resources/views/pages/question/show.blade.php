<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Detail Section &raquo; #{{ $section->id }} {{ $section->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mb-10">
                <a href="{{ route('dashboard.section.index') }}"
                    class="bg-indigo-500 hover:bg-indigo-800 text-white font-bold py-2 px-4 rounded-md shadow-lg">
                    Back
                </a>
            </div>

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
        </div>
    </div>
</x-app-layout>
