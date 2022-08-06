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
                            <div class="flex flex-wrap w-full mb-20 justify-between">
                                <div class="lg:w-1/2 w-full mb-6 lg:mb-0">
                                    <h1 class="sm:text-3xl text-2xl font-medium title-font mb-2 text-gray-900">
                                        募集一覧</h1>
                                    <div class="h-1 w-20 bg-indigo-500 rounded"></div>
                                </div>
                            </div>
                            <div class="flex flex-wrap m-4">
                                @foreach ($offers as $offer)
                                    <div class="p-4">
                                        <div class="bg-gray-100 p-6 rounded-lg">
                                            <img class="h-40 rounded w-full object-cover object-center mb-6"
                                                src="https://dummyimage.com/720x400" alt="content">
                                            <h3 class="tracking-widest text-indigo-500 text-xs font-medium title-font">
                                                {{ $offer->job_title }}</h3>
                                            <h2 class="text-lg text-gray-900 font-medium title-font mb-4">{{ $offer->headline }}
                                            </h2>
                                            <p class="leading-relaxed text-base mb-4">{{ $offer->introduce }}</p>
                                            <p class="leading-relaxed text-base">開発環境</p>
                                            <div class="flex flex-wrap w-full">
                                                @foreach($languages as $language)
                                                    @if($offer->company_language->$language)
                                                    <p class="leading-relaxed text-base mr-2">{{ $language }}</p>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
