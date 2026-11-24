@extends('layouts.app')
@section('title', 'Tambah Buku')
@section('judul_halaman', 'Tambah Buku')

@section('content')
    <form method="POST" action="{{ route('buku.store') }}">
        @include('buku._form')
    </form>
@endsection