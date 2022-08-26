<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            募集内容登録
        </h2>
    </x-slot>

    <form method="POST" action="{{ route('company.registration.update',['registration'=>$offer->id]) }}" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mx-2">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="mt-2 w-1/2 text-center mx-auto">
                            <p class="text-xl font-bold">求人情報編集</p>
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
                        <div class="p-2 md:w-1/2 mx-auto">
                            <div>
                                <label for="name" class="leading-7 text-sm text-gray-600">求人の見出し ※必須</label>
                                <input type="text" id="headline" name="headline" value="{{ $offer->headline }}"
                                    required
                                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            </div>
                        </div>
                        <div class="p-2 md:w-1/2 mx-auto">
                            <div>
                                <label for="name" class="leading-7 text-sm text-gray-600">職種名 ※必須</label>
                                <input type="text" id="job_title" name="job_title"
                                    value="{{ $offer->job_title }}" required
                                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            </div>
                        </div>

                        <div class="p-2 md:w-1/2 mx-auto">
                            <div>
                                <label for="name" class="leading-7 text-sm text-gray-600">開発環境 ※必須</label>
                                <div class="flex flex-wrap">
                                    <div class="mr-5">
                                        @if ($language->ruby)
                                            <input type="checkbox" id="languages" name="languages[]" value=ruby checked
                                                class="w-5 h-5 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 leading-8 transition-colors duration-200 ease-in-out">Ruby
                                        @else
                                            <input type="checkbox" id="languages" name="languages[]" value=ruby
                                                class="w-5 h-5 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 leading-8 transition-colors duration-200 ease-in-out">Ruby
                                        @endif
                                    </div>

                                    <div class="mr-5">
                                        @if ($language->javascript)
                                            <input type="checkbox" id="languages" name="languages[]" value=javascript
                                                checked
                                                class="w-5 h-5 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 leading-8 transition-colors duration-200 ease-in-out">JavaScript
                                        @else
                                            <input type="checkbox" id="languages" name="languages[]" value=javascript
                                                class="w-5 h-5 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 leading-8 transition-colors duration-200 ease-in-out">JavaScript
                                        @endif
                                    </div>

                                    <div class="mr-5">
                                        @if ($language->java)
                                            <input type="checkbox" id="languages" name="languages[]" value=java checked
                                                class="w-5 h-5 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 leading-8 transition-colors duration-200 ease-in-out">Java
                                        @else
                                            <input type="checkbox" id="languages" name="languages[]" value=java
                                                class="w-5 h-5 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 leading-8 transition-colors duration-200 ease-in-out">Java
                                        @endif
                                    </div>
                                    <div class="mr-5">
                                        @if ($language->python)
                                            <input type="checkbox" id="languages" name="languages[]" value=python
                                                checked
                                                class="w-5 h-5 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 leading-8 transition-colors duration-200 ease-in-out">Python
                                        @else
                                            <input type="checkbox" id="languages" name="languages[]" value=python
                                                class="w-5 h-5 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 leading-8 transition-colors duration-200 ease-in-out">Python
                                        @endif
                                    </div>
                                    <div class="mr-5">
                                        @if ($language->c)
                                            <input type="checkbox" id="languages" name="languages[]" value=c checked
                                                class="w-5 h-5 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 leading-8 transition-colors duration-200 ease-in-out">C
                                        @else
                                            <input type="checkbox" id="languages" name="languages[]" value=c
                                                class="w-5 h-5 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 leading-8 transition-colors duration-200 ease-in-out">C
                                        @endif
                                    </div>
                                    <div class="mr-5">
                                        @if ($language->php)
                                            <input type="checkbox" id="languages" name="languages[]" value=php checked
                                                class="w-5 h-5 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 leading-8 transition-colors duration-200 ease-in-out">PHP
                                        @else
                                            <input type="checkbox" id="languages" name="languages[]" value=php
                                                class="w-5 h-5 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 leading-8 transition-colors duration-200 ease-in-out">PHP
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="p-2 md:w-1/2 mx-auto">
                            <div>
                                <label for="name" class="leading-7 text-sm text-gray-600">紹介文 ※必須</label>
                                <textarea type="text" id="introduce" name="introduce" required
                                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ $offer->introduce }} </textarea>
                            </div>
                        </div>

                        <div class="p-2 md:w-1/2 mx-auto">
                            <div class="md:w-2/3">
                                <label for="name" class="leading-7 text-sm text-gray-600">募集欄のサムネイル</label>
                                <img class="h-40 rounded w-full object-cover object-center mb-6"
                                    src="{{ asset('storage/' . $offer->thumbnail) }}" alt="content">

                                <input type="file" id="thumbnail" name="thumbnail"
                                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            </div>
                        </div>

                        <div class="p-2 md:w-1/2 mx-auto">
                            <div>
                                <label for="name" class="leading-7 text-sm text-gray-600">募集期間 ※必須</label>
                                <select name="application_period" id="application_period">
                                    <option value="7">1週間</option>
                                    <option value="14">2週間</option>
                                    <option value="31">1ヶ月</option>
                                </select>
                            </div>
                        </div>

                        <div class="p-2 w-full">
                            <button
                                class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">更新する</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</x-app-layout>
