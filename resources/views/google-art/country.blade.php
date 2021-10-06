@extends('layouts.home')
@section('content')
<div>
	<h1 class="text-4xl text-center">Places</h1>
	<section>
		<div class="flex justify-around md:justify-center mt-12">
			<span class="active w-full md:w-1/12 text-center">
				<a class="text-center">All</a>
			</span>
			<span class="w-full md:w-1/12 text-center">
				<a class="text-center">A-Z</a>
			</span>
		</div>
	</section>
	<div class="flex flex-wrap md:px-10">
		@foreach ($countries as $country)
		<a href="{{ route('entity', $country['id']) }}" class="w-1/3 md:w-1/4 lg:w-1/5 relative p-1">
			<img class="w-full" src="{{ $country['thumbnail'] }}" alt="image" />
			<span class="absolute bottom-0 left-0 p-3 text-white">
				<div class="shadow-md font-bold">{{ $country['name'] }}</div>
				<div class="shadow-md">{{ $country['items'] }} items</div>
			</span>
		</a>
		@endforeach
	</div>
</div>
@endsection
