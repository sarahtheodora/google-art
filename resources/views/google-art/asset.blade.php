@extends('layouts.home')
@section('content')
@livewire('google-art.asset', [
    'assetId' => $id
])
@endsection
