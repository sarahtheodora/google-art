@extends('layouts.user')
@section('content')
@livewire('google-art.entity', [
    'countryId' => $id
])
<div class="px-12">
    <h1 class="text-2xl text-gray-700">{{ $jumlahPartner['0']->jumlah }} Collections</h1>
</div>
<div class="flex overflow-x-auto scrollbar-hidden py-3">
    @foreach ($partners as $partner)
    <a href="{{ route('partner', $partner->id) }}" class="flex-none w-1/2 md:w-1/3 lg:w-1/3 p-3 relative">
        <img class="rounded-lg" src="{{ $partner->thumbnail }}" alt="">
        <div class="absolute bottom-0 inset-x-0 object-none object-left-bottom bg-white w-auto h-auto mx-10 mb-3 rounded-t-lg">
            <div class="flex flex-wrap justify-center pt-3">
                <img class="w-10" src="{{ $partner->logo }}" alt="">
                <div class="w-full text-gray-900 text-center text-sm">{{ $partner->name }}</div>
                <div class="w-full text-gray-500 text-center text-sm">{{ $partner->country }}</div>
            </div>
        </div>
    </a>
    @endforeach
</div>
<div class="px-12">
    <h1 class="text-2xl text-gray-700">{{ $jumlahExhibit['0']->jumlah }} Stories</h1>
</div>
<div class="flex overflow-x-auto scrollbar-hidden py-1">
    @foreach ($exhibits as $exhibit)
    <a href="{{ route('exhibit', $exhibit->id) }}" class="flex-none w-1/2 md:w-1/3 lg:w-1/5 p-3 relative">
        <img class="rounded-lg" src="{{ $exhibit->background }}" alt="">
        <div class="absolute bottom-0 inset-x-0 object-none object-left-bottom bg-white w-auto h-auto mb-3 rounded-t-lg">
            <div class="w-full text-gray-900 px-3 text-sm">{{ $exhibit->name }}</div>
            <div class="w-full text-gray-500 px-3 text-sm">{{ $exhibit->countryName }}</div>
        </div>
    </a>
    @endforeach
</div>
<style>
    .scrollbar-hidden::-webkit-scrollbar {
        display: none;
    }

    /* Hide scrollbar for IE, Edge and Firefox */
    .scrollbar-hidden {
        -ms-overflow-style: none;
        /* IE and Edge */
        scrollbar-width: none;
        /* Firefox */
    }
</style>
@endsection
