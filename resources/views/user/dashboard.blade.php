<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            ホーム
        </h2>
    </x-slot>
    <div class="text-center m-4">
        <x-flash-message status='info' />
    </div>
    @if (!isset($user) || $user->registration == 0)
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="text-center mb-4">
                    <x-flash-message status='info' />
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200 flex">
                        <div class="mt-2">
                            <p>あなたの就活情報を登録してみましょう！</p>
                        </div>
                        <div class="ml-4">
                            <button onclick="location.href=' {{ route('user.info.create') }} '"
                                class="bg-blue-700 hover:bg-blue-600 text-white rounded px-4 py-2">登録はこちらから</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</x-app-layout>
