<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            募集一覧
        </h2>
    </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200 flex">
                        <section class="text-gray-600 body-font">
                            <div class="container px-5 py-24 mx-auto">
                                <div class="flex flex-wrap justify-between w-full mb-20">
                                    <div class="lg:w-1/2 w-full mb-6 lg:mb-0 ">
                                        <h1 class="sm:text-3xl text-2xl font-medium title-font mb-2 text-gray-900">
                                            募集一覧</h1>
                                        <div class="h-1 w-20 bg-indigo-500 rounded"></div>
                                    </div>
                                    <div class="p-2">
                                        <button onclick="location.href='{{ route('company.registration.create') }}'"
                                            class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">登録する</button>
                                    </div>
                                </div>
                                <div class="flex flex-wrap -m-4">
                                    <div class="xl:w-1/4 md:w-1/2 p-4">
                                        <div class="bg-gray-100 p-6 rounded-lg">
                                            <img class="h-40 rounded w-full object-cover object-center mb-6"
                                                src="https://dummyimage.com/720x400" alt="content">
                                            <h3 class="tracking-widest text-indigo-500 text-xs font-medium title-font">
                                                SUBTITLE</h3>
                                            <h2 class="text-lg text-gray-900 font-medium title-font mb-4">Chichen Itza
                                            </h2>
                                            <p class="leading-relaxed text-base">Fingerstache flexitarian street art
                                                8-bit waistcoat. Distillery hexagon disrupt edison bulbche.</p>
                                        </div>
                                    </div>
                                    <div class="xl:w-1/4 md:w-1/2 p-4">
                                        <div class="bg-gray-100 p-6 rounded-lg">
                                            <img class="h-40 rounded w-full object-cover object-center mb-6"
                                                src="https://dummyimage.com/721x401" alt="content">
                                            <h3 class="tracking-widest text-indigo-500 text-xs font-medium title-font">
                                                SUBTITLE</h3>
                                            <h2 class="text-lg text-gray-900 font-medium title-font mb-4">Colosseum Roma
                                            </h2>
                                            <p class="leading-relaxed text-base">Fingerstache flexitarian street art
                                                8-bit waistcoat. Distillery hexagon disrupt edison bulbche.</p>
                                        </div>
                                    </div>
                                    <div class="xl:w-1/4 md:w-1/2 p-4">
                                        <div class="bg-gray-100 p-6 rounded-lg">
                                            <img class="h-40 rounded w-full object-cover object-center mb-6"
                                                src="https://dummyimage.com/722x402" alt="content">
                                            <h3 class="tracking-widest text-indigo-500 text-xs font-medium title-font">
                                                SUBTITLE</h3>
                                            <h2 class="text-lg text-gray-900 font-medium title-font mb-4">Great Pyramid
                                                of Giza</h2>
                                            <p class="leading-relaxed text-base">Fingerstache flexitarian street art
                                                8-bit waistcoat. Distillery hexagon disrupt edison bulbche.</p>
                                        </div>
                                    </div>
                                    <div class="xl:w-1/4 md:w-1/2 p-4">
                                        <div class="bg-gray-100 p-6 rounded-lg">
                                            <img class="h-40 rounded w-full object-cover object-center mb-6"
                                                src="https://dummyimage.com/723x403" alt="content">
                                            <h3 class="tracking-widest text-indigo-500 text-xs font-medium title-font">
                                                SUBTITLE</h3>
                                            <h2 class="text-lg text-gray-900 font-medium title-font mb-4">San Francisco
                                            </h2>
                                            <p class="leading-relaxed text-base">Fingerstache flexitarian street art
                                                8-bit waistcoat. Distillery hexagon disrupt edison bulbche.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>
