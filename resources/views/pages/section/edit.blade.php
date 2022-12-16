<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            User &raquo; {{ $user->name }} &raquo; Edit
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div>
                {{-- Error Handling --}}
                @if ($errors->any())
                    <div class="mb-5" role="alert">
                        <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
                            There's something wrong!
                        </div>
                        <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
                            <p>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            </p>
                        </div>
                    </div>
                @endif

                <form action="{{ route('dashboard.user.update', $user->id) }}" class="w-full" method="POST"
                    enctype="multipart/form-data">
                    @method('PUT')
                    @csrf

                    <div class="flex flex-wrap -mx-3">
                        <div class="w-full px-3 mb-6">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Name
                                <span class="text-red-500">*</span></label>
                            <input value="{{ old('name') ?? $user->name }}" name="name"
                                class="appearance-none block w-full lg:w-1/2 bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                type="text">
                        </div>

                        <div class="w-full px-3 mb-6">
                            <label
                                class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Classroom</label>
                            <input value="{{ old('classroom') ?? $user->classroom }}" name="classroom"
                                class="appearance-none block w-full lg:w-1/2 bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                type="text">
                        </div>

                        <div class="w-full px-3 mb-6 hidden">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Email
                                <span class="text-red-500">*</span></label>
                            <input value="{{ old('email') ?? $user->email }}" name="email"
                                class="appearance-none block w-full lg:w-1/2 bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                type="email">
                        </div>

                        <div class="w-full px-3 mb-6">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Roles
                                <span class="text-red-500">*</span></label>
                            <select name="roles"
                                class="appearance-none block w-full lg:w-1/2 bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                                <option value="{{ $user->roles }}" selected>{{ $user->roles }}</option>
                                <option disabled>--- Pilih Roles ---</option>
                                <option value="GURU">GURU</option>
                                <option value="SISWA">SISWA</option>
                            </select>
                        </div>

                        <div class="w-full px-3 mb-6">
                            <label
                                class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Password</label>

                            <div x-data="{ show: true }">
                                <div class="relative">
                                    <input value="{{ old('password') }}" name="password"
                                        class="appearance-none block w-full lg:w-1/2 bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                        :type="show ? 'password' : 'text'" minlength="8">

                                    <div
                                        class="absolute lg:w-1/2 inset-y-0 right-0 lg:right-10 pr-3 flex items-center text-sm leading-5">
                                        <svg class="h-6 text-gray-700" fill="none" @click="show = !show"
                                            :class="{ 'hidden': !show, 'block': show }"
                                            xmlns="http://www.w3.org/2000/svg" viewbox="0 0 576 512">
                                            <path fill="currentColor"
                                                d="M572.52 241.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 400a144 144 0 1 1 144-144 143.93 143.93 0 0 1-144 144zm0-240a95.31 95.31 0 0 0-25.31 3.79 47.85 47.85 0 0 1-66.9 66.9A95.78 95.78 0 1 0 288 160z">
                                            </path>
                                        </svg>

                                        <svg class="h-6 text-gray-700" fill="none" @click="show = !show"
                                            :class="{ 'block': !show, 'hidden': show }"
                                            xmlns="http://www.w3.org/2000/svg" viewbox="0 0 640 512">
                                            <path fill="currentColor"
                                                d="M320 400c-75.85 0-137.25-58.71-142.9-133.11L72.2 185.82c-13.79 17.3-26.48 35.59-36.72 55.59a32.35 32.35 0 0 0 0 29.19C89.71 376.41 197.07 448 320 448c26.91 0 52.87-4 77.89-10.46L346 397.39a144.13 144.13 0 0 1-26 2.61zm313.82 58.1l-110.55-85.44a331.25 331.25 0 0 0 81.25-102.07 32.35 32.35 0 0 0 0-29.19C550.29 135.59 442.93 64 320 64a308.15 308.15 0 0 0-147.32 37.7L45.46 3.37A16 16 0 0 0 23 6.18L3.37 31.45A16 16 0 0 0 6.18 53.9l588.36 454.73a16 16 0 0 0 22.46-2.81l19.64-25.27a16 16 0 0 0-2.82-22.45zm-183.72-142l-39.3-30.38A94.75 94.75 0 0 0 416 256a94.76 94.76 0 0 0-121.31-92.21A47.65 47.65 0 0 1 304 192a46.64 46.64 0 0 1-1.54 10l-73.61-56.89A142.31 142.31 0 0 1 320 112a143.92 143.92 0 0 1 144 144c0 21.63-5.29 41.79-13.9 60.11z">
                                            </path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <button type="submit"
                                class="bg-teal-500 hover:bg-teal-800 text-white font-bold py-2 px-10 rounded-md shadow-lg">Update</button>

                            <a href="{{ route('dashboard.user.index') }}"
                                class="bg-red-500 hover:bg-red-800 text-white font-bold py-2 px-10 ml-3 rounded-md shadow-lg">
                                Back
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</x-app-layout>
