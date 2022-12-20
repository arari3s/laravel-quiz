<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Detail Question &raquo; #{{ $question->id }} {{ Str::limit($question->question, 50) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mb-10">
                <a href="{{ route('dashboard.section.index') }}"
                    class="bg-indigo-500 hover:bg-indigo-800 text-white font-bold py-2 px-10 rounded-md shadow-lg">
                    Back
                </a>
            </div>

            <h2 class="font-semibold text-lg text-gray-800 leading-tight mb-5">Question Details</h2>

            <div class="bg-white overflow-hidden shadow sm:rounded-lg mb-10">
                <div class="p6 bg-white border-b border-gray-200">
                    <table class="table-auto w-full">
                        <tbody>
                            <tr>
                                <th class="border px-6 py-4 text-right">Number</th>
                                <td class="border px-6 py-4">
                                    {{ $question->number }}
                                </td>
                            </tr>
                            <tr>
                                <th class="border px-6 py-4 text-right">Question</th>
                                <td class="border px-6 py-4">
                                    {{ $question->question }}
                                </td>
                            </tr>
                            <tr>
                                <th class="border px-6 py-4 text-right">Created By</th>
                                <td class="border px-6 py-4">
                                    {{ $question->user->name }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
