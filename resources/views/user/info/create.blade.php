<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            ホーム
        </h2>
    </x-slot>

    <form method="POST" action="{{ route('user.info.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="mt-2 w-1/2 text-center mx-auto">
                            <p class="text-xl font-bold">基本情報</p>
                            <p >~自分の情報を入力してみましょう！~</p>
                        </div>
                        <div class="p-2 w-1/2 mx-auto">
                            <div>
                                <label for="name" class="leading-7 text-sm text-gray-600">学年 ※必須</label>
                                <select name="grade" id="grade">
                                    <option value="b_1">大学1年生</option>
                                    <option value="b_2">大学2年生</option>
                                    <option value="b_3">大学3年生</option>
                                    <option value="b_4">大学4年生</option>
                                    <option value="d_1">大学院1年生</option>
                                    <option value="d_2">大学院2年生</option>
                                </select>
                            </div>
                        </div>
                        <div class="p-2 w-1/2 mx-auto">
                            <div>
                                <label for="name" class="leading-7 text-sm text-gray-600">大学名 ※必須</label>
                                <input type="text" id="university" name="university" required
                                class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">    
                            </div>
                        </div>
                        {{--  <div class="p-2 w-1/2 mx-auto">
                            <div>
                                <label for="name" class="leading-7 text-sm text-gray-600">大学名 ※必須</label>
                                <input type="text" id="university" name="university" required
                                class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">    
                            </div>
                        </div>  --}}
                        <div class="p-2 w-1/2 mx-auto">
                            <div>
                                <label for="name" class="leading-7 text-sm text-gray-600">学部名 ※必須</label>
                                <input type="text" id="department" name="department" required
                                class="w-1/2 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">    
                            </div>
                        </div>
                        <div class="p-2 w-1/2 mx-auto">
                            <div>
                                <label for="name" class="leading-7 text-sm text-gray-600">学科名 ※必須</label>
                                <input type="text" id="course" name="course" required
                                class="w-1/2 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">    
                            </div>
                        </div>
                        <div class="p-2 w-1/2 mx-auto">
                            <div>
                                <label for="name" class="leading-7 text-sm text-gray-600">興味のある分野 ※必須</label>
                                <input type="text" id="interest_area"  name="interest_area" required
                                class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">    
                            </div>
                        </div>
                        <div class="p-2 w-1/2 mx-auto">
                            <div>
                                <label for="name" class="leading-7 text-sm text-gray-600">自分の強み ※必須</label>
                                <textarea type="text" id="strong_point" name="strong_point" required
                                class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"></textarea>    
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