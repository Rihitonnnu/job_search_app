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
                @auth('companies')
                    <a href="{{ url('/company/dashboard') }}"
                        class="text-sm text-gray-700 dark:text-gray-500 underline">ホーム画面へ</a>
                @else
                    <div class="flex">
                        <div>
                            <a href="{{ route('company.login') }}"
                                class="text-sm text-gray-700 dark:text-gray-500 underline">ログイン</a>
                        </div>
                        <div class="ml-4">
                            <a href="{{ url('/') }}"
                                class="text-sm text-gray-700 dark:text-gray-500 underline">ユーザーの方はこちらから</a>
                        </div>
                        @if (Route::has('company.register'))
                            <div>
                                <a href="{{ route('company.register') }}"
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
                        <img alt="content" class="object-cover object-center h-full w-full"
                            src="https://dummyimage.com/1200x500">
                    </div>
                    <div class="flex flex-col sm:flex-row mt-10">
                        <div class="sm:w-1/3 text-center sm:pr-8 sm:py-8">
                            <div
                                class="w-20 h-20 rounded-full inline-flex items-center justify-center bg-gray-200 text-gray-400">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" class="w-10 h-10" viewBox="0 0 24 24">
                                    <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"></path>
                                    <circle cx="12" cy="7" r="4"></circle>
                                </svg>
                            </div>
                            <div class="flex flex-col items-center text-center justify-center">
                                <h2 class="font-medium title-font mt-4 text-gray-900 text-lg">Phoebe Caulfield</h2>
                                <div class="w-12 h-1 bg-indigo-500 rounded mt-2 mb-4"></div>
                                <p class="text-base">Raclette knausgaard hella meggs normcore williamsburg enamel pin
                                    sartorial venmo tbh hot chicken gentrify portland.</p>
                            </div>
                        </div>
                        <div
                            class="sm:w-2/3 sm:pl-8 sm:py-8 sm:border-l border-gray-200 sm:border-t-0 border-t mt-4 pt-4 sm:mt-0 text-center sm:text-left">
                            <p class="leading-relaxed text-lg mb-4">Meggings portland fingerstache lyft, post-ironic
                                fixie
                                man bun banh mi umami everyday carry hexagon locavore direct trade art party. Locavore
                                small
                                batch listicle gastropub farm-to-table lumbersexual salvia messenger bag. Coloring book
                                flannel truffaut craft beer drinking vinegar sartorial, disrupt fashion axe normcore meh
                                butcher. Portland 90's scenester vexillologist forage post-ironic asymmetrical,
                                chartreuse
                                disrupt butcher paleo intelligentsia pabst before they sold out four loko. 3 wolf moon
                                brooklyn.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>

</html>
