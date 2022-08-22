<x-app-layout>
    <<div class="text-center m-4">
        <x-flash-message status='info' />
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mx-2">
                <div class="md:p-6 p-4 bg-white border-b border-gray-200">
                    <div class="mt-2 md:w-1/2 text-center mx-auto">
                        <h1 class="text-2xl font-bold">スプレッドシート登録</h1>
                    </div>
                    <div class="mt-3 md:w-1/2 mx-auto border border-indigo-300 md:p-2 border-2 rounded-md bg-indigo-500">
                        <p class="md:text-ms p-2 text-white">
                            募集覧のシートに追加を選択していただくとお使いのgooglespreadsheetに企業の募集情報を記入することができます。</p>
                    </div>
                    <div class="mt-3 md:text-center">
                        <p class="md:text-ms text-red-500 font-bold">※スプレッドシートは無記入の状態で登録して下さい。またシートの編集権限を編集者に設定して下さい。</p>
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
                    <form action="{{ route('user.sheet.store') }}" method="POST">
                        @csrf
                        <div class="p-2 md:w-1/2 mx-auto mt-5 md:mt-3">
                            <div class="align-center mb-4">
                                <div class="pr-2">
                                    <label for="name"
                                        class="leading-7 text-sm text-gray-600">登録するスプレッドシートのURL</label>
                                </div>
                                <div class="md:w-full">
                                    <input type="text" id="name" name="name" required
                                        class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                                <div class="w-full mt-8">
                                    <button
                                        class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">登録する</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</x-app-layout>

@if (Session::has('succsss'))
    <div>
        <p class="bg-warning text-center">{{ Session::get('success') }}</p>
    </div>
@endif
