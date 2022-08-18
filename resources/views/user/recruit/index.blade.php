<x-app-layout>
    <div class="text-center m-4">
        <x-flash-message status='info' />
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-4">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mx-2">
                <div class="bg-white border-b border-gray-200 w-full">
                    <section class="text-gray-600 body-font">
                        <div class="md:px-3 px-5 py-5 md:py-16 w-full">
                            <div class="flex flex-wrap w-full md:mb-20 justify-between">
                                <div class="lg:w-1/2 w-full mb-6 md:ml-3 lg:mb-0">
                                    <h1 class="sm:text-3xl text-2xl font-medium title-font mb-2 text-gray-900">
                                        募集一覧</h1>
                                    <div class="h-1 w-20 bg-indigo-500 rounded"></div>
                                </div>
                            </div>
                            <div class="md:flex md:flex-wrap">
                                @foreach ($offers as $offer)
                                    <div class="py-2 md:w-96 w-full md:m-2 mx-auto">
                                        <div class="bg-gray-100 p-6 rounded-lg w-full">
                                            @if ($offer->thumbnail != null)
                                                <img class="h-40 rounded w-full object-cover object-center mb-6"
                                                    src="{{ asset('storage/' . $offer->thumbnail) }}" alt="content">
                                            @else
                                                <img class="h-40 rounded w-full object-cover object-center mb-6"
                                                    src="https://dummyimage.com/720x400" alt="content">
                                            @endif
                                            <h2 class="text-md text-gray-900 font-medium title-font mb-2">
                                                {{ $offer->company->company_name }}
                                            </h2>
                                            <h2 class="text-lg text-gray-900 font-medium title-font mb-4">
                                                {{ $offer->headline }}
                                            </h2>
                                            <div class="mb-3">
                                                <p class="text-md text-gray-900 font-medium">職種</p>
                                                <h3
                                                    class="tracking-widest text-indigo-500 text-md font-medium title-font">
                                                    {{ $offer->job_title }}</h3>
                                            </div>
                                            <p class="text-md text-gray-900 font-medium">開発環境</p>
                                            <div class="flex flex-wrap w-full">
                                                @foreach ($languages as $language)
                                                    @if ($offer->language->$language)
                                                        <p class="leading-relaxed text-base mr-2">{{ $language }}
                                                        </p>
                                                    @endif
                                                @endforeach
                                            </div>
                                            <div class="flex pt-4 justify-around md:w-11/12 md:mx-auto">
                                                <div class="pt-4 w-full">
                                                    <button
                                                        onclick="location.href='{{ route('user.sheet.edit', ['sheet' => $offer->id]) }}'"
                                                        class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-base">シートに追加</button>
                                                </div>

                                                <div class="pt-4 w-full">
                                                    <button
                                                        onclick="location.href=' {{ route('user.recruit.show', ['recruit' => $offer->id]) }} '"
                                                        class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-base">詳細を表示</button>
                                                </div>
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
