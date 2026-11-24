<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    private const KUNCI_SESSION = 'daftar_buku';

    // ===== Helper: penyimpanan data di session (pengganti database) =====
    private function semuaBuku(): array
    {
        return session(self::KUNCI_SESSION, [
            'BK001' => ['kode' => 'BK001', 'nama' => 'Belajar PHP', 'kategori' => 'Pemrograman', 'lokasi' => 'Rak A1', 'jumlah' => 5, 'kondisi' => 'Baik'],
            'BK002' => ['kode' => 'BK002', 'nama' => 'Dasar Laravel', 'kategori' => 'Pemrograman', 'lokasi' => 'Rak A2', 'jumlah' => 3, 'kondisi' => 'Baik'],
        ]);
    }

    private function simpanSemua(array $data): void
    {
        session([self::KUNCI_SESSION => $data]);
    }

    private function aturan(): array
    {
        return [
            'nama' => 'required|string|max:100',
            'kategori' => 'required|string|max:50',
            'lokasi' => 'required|string|max:50',
            'jumlah' => 'required|integer|min:0',
            'kondisi' => 'required|in:Baik,Rusak,Hilang',
        ];
    }

    private function tidakDitemukan(string $kode): RedirectResponse
    {
        return redirect()->route('buku.index')
            ->with('error', "Buku dengan kode {$kode} tidak ditemukan.");
    }

    // ===== Aksi CRUD =====
    public function index()
    {
        return view('buku.index', ['daftarBuku' => $this->semuaBuku()]);
    }

    public function create()
    {
        return view('buku.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate(['kode' => 'required|alpha_dash|max:20'] + $this->aturan());

        $semua = $this->semuaBuku();
        if (isset($semua[$data['kode']])) {
            return back()->withInput()->withErrors(['kode' => 'Kode sudah dipakai buku lain.']);
        }

        $semua[$data['kode']] = $data;
        $this->simpanSemua($semua);

        return redirect()->route('buku.index')->with('status', 'Buku berhasil ditambahkan.');
    }

    public function show(string $kode)
    {
        $buku = $this->semuaBuku()[$kode] ?? null;
        if ($buku === null) {
            return $this->tidakDitemukan($kode);
        }

        return view('buku.show', ['buku' => $buku]);
    }

    public function edit(string $kode)
    {
        $buku = $this->semuaBuku()[$kode] ?? null;
        if ($buku === null) {
            return $this->tidakDitemukan($kode);
        }

        return view('buku.edit', ['buku' => $buku]);
    }

    public function update(Request $request, string $kode): RedirectResponse
    {
        $semua = $this->semuaBuku();
        if (!isset($semua[$kode])) {
            return $this->tidakDitemukan($kode);
        }

        $data = $request->validate($this->aturan());
        $semua[$kode] = ['kode' => $kode] + $data; // kode tidak berubah
        $this->simpanSemua($semua);

        return redirect()->route('buku.index')->with('status', 'Buku berhasil diperbarui.');
    }

    public function destroy(string $kode): RedirectResponse
    {
        $semua = $this->semuaBuku();
        if (!isset($semua[$kode])) {
            return $this->tidakDitemukan($kode);
        }

        unset($semua[$kode]);
        $this->simpanSemua($semua);

        return redirect()->route('buku.index')->with('status', 'Buku berhasil dihapus.');
    }
}