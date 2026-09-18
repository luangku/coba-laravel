@extends('layouts.main')

@section('container')
    <h1>Halaman About</h1>
    <img src="/img/{{ $image }}" alt="{{ $name }}" width="200">
    <h3>Nama : {{ $name }}</h3>
    <h3>Pekerjaan : {{ $job }}</h3>
@endsection
