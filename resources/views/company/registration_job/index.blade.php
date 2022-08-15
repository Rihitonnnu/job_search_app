<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            募集一覧
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mx-2 md:py-6 md:px-4">
                <div class="py-6 bg-white border-b border-gray-200 w-full">
                    <section class="text-gray-600 body-font">
                        <div class="container px-2 mx-auto">
                            <div class="md:flex md:flex-wrap md:justify-between w-full">
                                <div class="lg:w-1/2 w-full mb-6 lg:mb-0 md:ml-4">
                                    <h1 class="sm:text-3xl md:text-left text-center text-2xl font-medium title-font mb-2 text-gray-900">
                                        募集一覧</h1>
                                </div>
                                <div class="p-2">
                                    <button onclick="location.href='{{ route('company.registration.create') }}'"
                                        class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">登録する</button>
                                </div>
                            </div>
                            <div class="text-center">
                                <x-flash-message status='info' />
                            </div>
                            <div class="flex flex-wrap">
                                @foreach ($offers as $offer)
                                    <div class="p-4">
                                        <div class="bg-gray-100 px-6 py-4 rounded-lg">
                                            @if ($offer->thumbnail != null)
                                                <img class="h-40 rounded w-full object-cover object-center mb-6"
                                                    src="{{ asset('storage/' . $offer->thumbnail) }}" alt="content">
                                            @else
                                                <img class="h-40 rounded w-full object-cover object-center mb-6"
                                                    src="https://dummyimage.com/720x400" alt="content">
                                            @endif
                                            <h3 class="tracking-widest text-indigo-500 text-xs font-medium title-font md:text-left">
                                                {{ $offer->job_title }}</h3>
                                            <h2 class="text-lg text-gray-900 font-medium title-font mb-4 md:text-left">
                                                {{ $offer->headline }}
                                            </h2>
                                            <p class="leading-relaxed text-base mb-4">{{ $offer->introduce }}</p>
                                            <p class="leading-relaxed text-base md:text-left">開発環境</p>
                                            <div class="flex md:flex-wrap w-full">
                                                @foreach ($languages as $language)
                                                    @if ($offer->company_language->$language)
                                                        <p class="leading-relaxed text-base mr-2">{{ $language }}
                                                        </p>
                                                    @endif
                                                @endforeach
                                            </div>
                                            <div class="flex pt-4 justify-around">
                                                <div class="p-2">
                                                    <button
                                                        onclick="location.href='{{ route('company.registration.edit', ['registration' => $offer->id]) }}'"
                                                        class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-md md:text-lg">編集する</button>
                                                </div>
                                                <form
                                                    action="{{ route('company.registration.destroy',['registration'=>$offer->id])}}" method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <div class="p-2">
                                                        <button type="submit"
                                                            class="flex mx-auto text-white bg-red-500 border-0 py-2 px-8 focus:outline-none hover:bg-red-600 rounded text-md md:text-lg">削除する</button>
                                                    </div>
                                                </form>
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
