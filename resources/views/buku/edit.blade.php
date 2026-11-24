@extends('layouts.app')
@section('title', 'Edit Buku')
@section('judul_halaman', 'Edit Buku')

@section('content')
    <form method="POST" action="{{ route('buku.update', $buku['kode']) }}">
        @method('PUT')
        @include('buku._form')
    </form>
@endsection