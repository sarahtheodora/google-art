@extends('layouts.user')
@section('content')
@livewire('google-art.exhibit', [
    'exhibitId' => $id
])
@endsection
