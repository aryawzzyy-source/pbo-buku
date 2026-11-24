@extends('layouts.app')
@section('title', 'Detail Buku')
@section('judul_halaman', 'Detail Buku')

@section('content')
    <table>
        <tr><th>Kode</th><td>{{ $buku['kode'] }}</td></tr>
        <tr><th>Nama Buku</th><td>{{ $buku['nama'] }}</td></tr>
        <tr><th>Kategori</th><td>{{ $buku['kategori'] }}</td></tr>
        <tr><th>Lokasi</th><td>{{ $buku['lokasi'] }}</td></tr>
        <tr><th>Jumlah</th><td>{{ $buku['jumlah'] }}</td></tr>
        <tr><th>Kondisi</th><td>{{ $buku['kondisi'] }}</td></tr>
    </table>
    <p>
        <a href="{{ route('buku.edit', $buku['kode']) }}">Edit</a> |
        <a href="{{ route('buku.index') }}">Kembali ke daftar</a>
    </p>
@endsection