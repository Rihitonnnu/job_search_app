<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            募集内容登録
        </h2>
    </x-slot>

    <form method="POST" action="{{ route('company.registration.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="mt-2 w-1/2 text-center mx-auto">
                            <p class="text-xl font-bold">求人情報登録</p>
                        </div>
                        @if ($errors->any())
                            <div class="alert alert-danger mt-3 text-center">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li class="text-red-500">{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="p-2 w-1/2 mx-auto">
                            <div>
                                <label for="name" class="leading-7 text-sm text-gray-600">求人の見出し ※必須</label>
                                <input type="text" id="headline" name="headline" required
                                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            </div>
                        </div>
                        <div class="p-2 w-1/2 mx-auto">
                            <div>
                                <label for="name" class="leading-7 text-sm text-gray-600">職種名 ※必須</label>
                                <input type="text" id="job_title" name="job_title" required
                                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            </div>
                        </div>

                        <div class="p-2 w-1/2 mx-auto">
                            <div>
                                <label for="name" class="leading-7 text-sm text-gray-600">開発環境 ※必須</label>
                                <div class="flex flex-wrap">
                                    <div class="mr-5">
                                        <input type="checkbox" id="languages" name="languages[]" value=ruby
                                            class="w-5 h-5 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 leading-8 transition-colors duration-200 ease-in-out">Ruby
                                    </div>

                                    <div class="mr-5">
                                        <input type="checkbox" id="languages" name="languages[]" value=javascript
                                            class="w-5 h-5 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 leading-8 transition-colors duration-200 ease-in-out">JavaScript
                                    </div>

                                    <div class="mr-5">
                                        <input type="checkbox" id="languages" name="languages[]" value=java
                                            class="w-5 h-5 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 leading-8 transition-colors duration-200 ease-in-out">Java
                                    </div>
                                    <div class="mr-5">
                                        <input type="checkbox" id="languages" name="languages[]" value=python
                                            class="w-5 h-5 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 leading-8 transition-colors duration-200 ease-in-out">Python
                                    </div>
                                    <div class="mr-5">
                                        <input type="checkbox" id="languages" name="languages[]" value=c
                                            class="w-5 h-5 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 leading-8 transition-colors duration-200 ease-in-out">C
                                    </div>
                                    <div class="mr-5">
                                        <input type="checkbox" id="languages" name="languages[]" value=php
                                            class="w-5 h-5 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 leading-8 transition-colors duration-200 ease-in-out">PHP
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="p-2 w-1/2 mx-auto">
                            <div>
                                <label for="name" class="leading-7 text-sm text-gray-600">紹介文 ※必須</label>
                                <textarea type="text" id="introduce" name="introduce" required
                                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"></textarea>
                            </div>
                        </div>

                        <div class="p-2 w-1/2 mx-auto">
                            <div>
                                <label for="name" class="leading-7 text-sm text-gray-600">募集欄のサムネイル</label>
                                <input type="file" id="thumbnail" name="thumbnail" required
                                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            </div>
                        </div>

                        <div class="p-2 w-full">
                            <button
                                class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">登録する</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</x-app-layout>
