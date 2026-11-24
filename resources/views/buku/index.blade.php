@extends('layouts.app')
@section('title', 'Daftar Buku')
@section('judul_halaman', 'Daftar Buku')

@section('content')
<p><a href="{{ route('buku.create') }}">+ Tambah Buku</a></p>

<table>
    <tr>
        <th>Kode</th>
        <th>Nama Buku</th>
        <th>Kategori</th>
        <th>Lokasi</th>
        <th>Jumlah</th>
        <th>Kondisi</th>
        <th>Aksi</th>
    </tr>
    @forelse ($daftarBuku as $buku)
    <tr>
        <td>{{ $buku['kode'] }}</td>
        <td>{{ $buku['nama'] }}</td>
        <td>{{ $buku['kategori'] }}</td>
        <td>{{ $buku['lokasi'] }}</td>
        <td>{{ $buku['jumlah'] }}</td>
        <td>{{ $buku['kondisi'] }}</td>
        <td>
            <a href="{{ route('buku.show', $buku['kode']) }}">Detail</a> |
            <a href="{{ route('buku.edit', $buku['kode']) }}">Edit</a> |
            <form method="POST" action="{{ route('buku.destroy', $buku['kode']) }}"
                style="display:inline"
                onsubmit="return confirm('Yakin hapus buku ini?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn">Hapus</button>
            </form>
        </td>
    </tr>
    @empty
    <tr>
        <td colspan="7">Belum ada data buku.</td>
    </tr>
    @endforelse
</table>
@endsection