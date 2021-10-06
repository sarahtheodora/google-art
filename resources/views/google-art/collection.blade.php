@extends('layouts.home')
@section('content')
<div class="px-12 mx-auto mt-12">
	<h1 class="text-xl text-gray-700 font-bold">{{ $param1['0']->name }} | {{ $param2['0']->name }} | {{ $param3['0']->jumlah }}</h1>
</div>
<div class="px-12 mx-auto mt-12">
	<div class="flex flex-wrap">
		@foreach ($collections as $collection)
		<a href="{{ route('asset', $collection->id) }}" class="p-1 w-full md:w-1/2">
			<div class="bg-cover bg-center bg-no-repeat h-32 sm:h-48 lg:h-64" style="background-image: url('{{ $collection->thumbnail }}')"></div>
		</a>
		@endforeach
	</div>
</div>
@endsection
