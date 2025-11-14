<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // <-- PENTING: Import DB Facade

class PortfolioController extends Controller
{
    /**
     * Menampilkan halaman utama portofolio dengan semua data.
     */
    public function index()
    {
        // Karena kita tahu ID biodata kita cuma 1 (diri sendiri)
        $id_biodata = 1;

        // 1. Ambil data utama
        // find($id) akan mengambil 1 baris data berdasarkan ID
        $biodata = DB::table('biodata')->find($id_biodata);

        // 2. Ambil data relasi (Pendidikan)
        // where() untuk filter, get() untuk mengambil hasilnya
        $pendidikan = DB::table('pendidikan')
            ->where('biodata_id', $id_biodata)
            ->orderBy('tahun_mulai', 'asc') // <-- INI SOLUSINYA
            ->get();

        // 3. Ambil data relasi (Pengalaman)
        $pengalaman = DB::table('pengalaman')
            ->where('biodata_id', $id_biodata)
            ->orderBy('tahun_selesai', 'desc')
            ->get();

        // 4. Ambil data relasi (Keahlian / What I Offer)
        $keahlian = DB::table('keahlian')
            ->where('biodata_id', $id_biodata)
            ->get();

        // 5. Ambil data relasi (Proyek / Portofolio)
        $proyek = DB::table('proyek')
            ->where('biodata_id', $id_biodata)
            ->get();

        // Jika data biodata tidak ditemukan, tampilkan error 404
        if (!$biodata) {
            abort(404, 'Data biodata tidak ditemukan.');
        }

        // 6. Kirim semua data ke Tampilan (View)
        return view('home', [
            'biodata'     => $biodata,
            'pendidikan'  => $pendidikan,
            'pengalaman'  => $pengalaman,
            'keahlian'    => $keahlian,
            'proyek'      => $proyek,
        ]);
    }
}
