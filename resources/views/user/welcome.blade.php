<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased">
    <div
        class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
        @if (Route::has('user.login'))
            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                @auth('users')
                    <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">ホーム画面へ</a>
                @else
                    <div class="flex">
                        <div>
                            <a href="{{ route('user.login') }}"
                                class="text-sm text-gray-700 dark:text-gray-500 underline">ログイン</a>
                        </div>
                        <div class="ml-4">
                            <a href="{{ url('/company') }}"
                                class="text-sm text-gray-700 dark:text-gray-500 underline">企業の方はこちらから</a>
                        </div>
                        @if (Route::has('user.register'))
                            <div>
                                <a href="{{ route('user.register') }}"
                                    class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">新規登録</a>

                            </div>
                        @endif
                    </div>
                @endauth
            </div>
        @endif
        <section class="text-gray-600 body-font">
            <div class="container px-5 py-24 mx-auto flex flex-col">
                <div class="lg:w-4/6 mx-auto">
                    <div class="rounded-lg h-64 overflow-hidden">
                        <img src="{{ asset('img/coding.jpg') }}" alt="">
                    </div>
                    <div class="flex flex-col sm:flex-row mt-10">
                        <div
                            class="sm:w-full sm:pl-8 sm:py-8 sm:border-l border-gray-200 sm:border-t-0 border-t mt-4 pt-4 sm:mt-0 text-center sm:text-left">
                        </div>
                    </div>
                    <div role="navigation" aria-label="Main"
                        class="w-full bg-white dark:bg-gray-800 py-5 flex flex-col xl:flex-row items-start xl:items-center justify-between px-5 xl:px-10 shadow rounded-t">
                        <div class="mb-4 sm:mb-0 md:mb-0 lg:mb-0 xl:mb-0 lg:w-1/2">
                            <h1 tabindex="0"
                                class="focus:outline-none  text-gray-800 dark:text-gray-100 text-xl font-bold">
                                エンジニアのための就活アプリ
                            </h1>
                            <p tabindex="0"
                                class="focus:outline-none font-normal text-sm text-gray-600 dark:text-gray-100 mt-1">
                                就活生の方はログインはこちらから</p>
                        </div>
                        <div class="lg:hidden w-full relative mt-2 md:mt-4">
                            <div class="absolute inset-0 m-auto mr-4 z-0 w-6 h-6">
                                <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/grey_tabs_on_right-svg1.svg"
                                    alt="icons">
                            </div>

                        </div>
                        <div role="list" class="hidden lg:flex items-center lg:mt-6 xl:mt-0">
                            @if (Route::has('user.login'))
                                @auth('users')
                                    <a href="{{ url('/dashboard') }}"
                                        class="focus:ring-2 focus:ring-offset-2 focus:ring-gray-400 focus:outline-none cursor-pointer font-normal flex justify-center items-center py-2 px-4 rounded mr-4 sm:mr-0 md:mr-0 lg:mr-0 xl:mr-0 sm:ml-4 md:ml-4 lg:ml-4 xl:ml-4 hover:bg-gray-200 dark:hover:bg-gray-700 text-gray-500 dark:text-gray-400 text-smtext-sm text-gray-700 dark:text-gray-500 underline">ホーム画面へ</a>
                                @endauth
                                <a href="{{ route('user.login') }}" role="listitem" tabindex="0"
                                    class=" focus:ring-2 focus:ring-offset-2 focus:ring-gray-400 focus:outline-none cursor-pointer font-normal flex justify-center items-center py-2 px-4 rounded mr-4 sm:mr-0 md:mr-0 lg:mr-0 xl:mr-0 sm:ml-4 md:ml-4 lg:ml-4 xl:ml-4 hover:bg-gray-200 dark:hover:bg-gray-700 text-gray-500 dark:text-gray-400 text-sm">ログイン</a>
                                <a href="{{ url('/company') }}" role="listitem" tabindex="0"
                                    class="focus:ring-2 focus:ring-offset-2 focus:ring-gray-400 focus:outline-none cursor-pointer font-normal flex justify-center items-center py-2 px-4 rounded mr-4 sm:mr-0 md:mr-0 lg:mr-0 xl:mr-0 sm:ml-4 md:ml-4 lg:ml-4 xl:ml-4 hover:bg-gray-200 dark:hover:bg-gray-700 text-gray-500 dark:text-gray-400 text-sm">企業の方はこちら</a>
                                @if (Route::has('user.register'))
                                    <div>
                                        <a href="{{ route('user.register') }}" role="listitem" tabindex="0"
                                            class=" focus:ring-2 focus:ring-offset-2 focus:ring-gray-400 focus:outline-none cursor-pointer font-normal flex justify-center items-center py-2 px-4 rounded mr-4 sm:mr-0 md:mr-0 lg:mr-0 xl:mr-0 sm:ml-4 md:ml-4 lg:ml-4 xl:ml-4 hover:bg-gray-200 dark:hover:bg-gray-700 text-gray-500 dark:text-gray-400 text-sm">新規登録</a>
                                    </div>
                                @endif
                                </ul>
                            @endif
                        </div>
                    </div>
                </div>
        </section>
    </div>
</body>

</html>
