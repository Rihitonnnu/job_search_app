<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mx-2">
                <div class="p-6 bg-white border-b border-gray-200 w-full">
                    <section class="text-gray-600 body-font">
                        <div class="container md:px-5 md:py-14 mx-auto">
                            <div class="flex flex-wrap w-full md:mb-6 justify-between">
                                <div class="lg:w-1/2 w-full mb-6 lg:mb-0">
                                    <h1 class="sm:text-3xl text-2xl font-medium title-font mb-2 text-gray-900">
                                        募集詳細</h1>
                                    <div class="h-1 w-20 bg-indigo-500 rounded"></div>
                                </div>
                            </div>
                            <div class="flex flex-wrap">
                                <div class="py-2 md:w-full md:m-2">
                                    <div class="p-6 rounded-lg md:w-2/3 mx-auto">
                                        <div class="mb-4">
                                            <h3 class="text-gray-800 text-2xl sm:text-3xl font-bold mb-4 md:mb-6">
                                                {{ $offer->job_title }}</h3>
                                        </div>
                                        @if ($offer->thumbnail != null)
                                            <img class="h-40 rounded w-full object-cover object-center mb-6"
                                                src="{{ asset('storage/' . $offer->thumbnail) }}" alt="content">
                                        @else
                                            <img class="h-40 rounded w-full object-cover object-center mb-6"
                                                src="https://dummyimage.com/720x400" alt="content">
                                        @endif
                                        <div class="mb-6">
                                            <h1 class="md:text-xl sm:text-3xl font-bold md:mb-2 md:mb-2">職種</h1>
                                            <h2 class="md:text-lg leading-relaxed text-base mb-4">
                                                {{ $offer->headline }}
                                            </h2>
                                        </div>
                                        <div class="mb-6">
                                            <h2 class="md:text-xl sm:text-3xl font-bold md:mb-2 font-bold">紹介文</h1>
                                                <p class="leading-relaxed text-base mb-4">{{ $offer->introduce }}</p>
                                        </div>
                                        <div>
                                            <h1 class="md:text-xl sm:text-3xl font-bold md:mb-2 font-bold">開発環境</p>
                                            <div class="flex flex-wrap w-full">
                                                @foreach ($languages as $language)
                                                    @if ($offer->company_language->$language)
                                                        <p class="md:text-lg leading-relaxed text-base mr-4">●{{ $language }}
                                                        </p>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="pt-4 w-full">
                                            <button onclick="location.href=' {{ route('user.recruit.create') }} '"
                                                class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-base">応募する</button>
                                        </div>
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
