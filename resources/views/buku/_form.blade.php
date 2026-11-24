@csrf

<p>
    <label>Kode</label><br>
    @if (isset($buku))
        <input type="text" value="{{ $buku['kode'] }}" disabled>
    @else
        <input type="text" name="kode" value="{{ old('kode') }}">
        @error('kode')<br><span class="kesalahan">{{ $message }}</span>@enderror
    @endif
</p>

<p>
    <label>Nama Buku</label><br>
    <input type="text" name="nama" value="{{ old('nama', $buku['nama'] ?? '') }}">
    @error('nama')<br><span class="kesalahan">{{ $message }}</span>@enderror
</p>

<p>
    <label>Kategori</label><br>
    <input type="text" name="kategori" value="{{ old('kategori', $buku['kategori'] ?? '') }}">
    @error('kategori')<br><span class="kesalahan">{{ $message }}</span>@enderror
</p>

<p>
    <label>Lokasi</label><br>
    <input type="text" name="lokasi" value="{{ old('lokasi', $buku['lokasi'] ?? '') }}">
    @error('lokasi')<br><span class="kesalahan">{{ $message }}</span>@enderror
</p>

<p>
    <label>Jumlah</label><br>
    <input type="number" name="jumlah" min="0" value="{{ old('jumlah', $buku['jumlah'] ?? 1) }}">
    @error('jumlah')<br><span class="kesalahan">{{ $message }}</span>@enderror
</p>

<p>
    <label>Kondisi</label><br>
    <select name="kondisi">
        @foreach (['Baik', 'Rusak', 'Hilang'] as $opsi)
            <option value="{{ $opsi }}" @selected(old('kondisi', $buku['kondisi'] ?? 'Baik') === $opsi)>
                {{ $opsi }}
            </option>
        @endforeach
    </select>
    @error('kondisi')<br><span class="kesalahan">{{ $message }}</span>@enderror
</p>

<button type="submit" class="btn">Simpan</button>
<a href="{{ route('buku.index') }}">Batal</a>