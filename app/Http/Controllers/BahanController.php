<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateBahanBakuRequest;
use App\Models\Bahan_Baku;
use App\Models\Bahan_Kemasan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BahanController extends Controller
{
    //
    public function createBahan()
    {
        return view('calc.bahan.formTambahBahan');
    }

    public function storeBahan(Request $request)
    {
        $data = $request->validate([

            'nama_bahan' => 'required|min:2|unique:bahan_baku,nama_bahan',
            'harga_bahan' => 'required|numeric',
            'kategori' => 'required',
        ],
            [
                'nama_bahan.required' => 'Nama bahan wajib diisi!',
                'nama_bahan.min' => 'Minimal karakter nama bahan adalah 2',
                'nama_bahan.unique' => 'Nama bahan sudah terdaftar di dalam list',
                'harga_bahan.required' => 'Harga bahan wajib diisi',
                'harga_bahan.numeric' => 'Harga bahan hanya dapat diisi angka!',
                'kategori.required' => 'Kategori wajib diisi!',

            ]);

        $menu = new Bahan_Baku;
        $menu->nama_bahan = Str::slug($request->nama_bahan);
        $menu->harga = $request->harga_bahan;
        $menu->satuan = $request->kategori;
        $menu->save();

        if ($menu) {
            return redirect()->back()->withSuccess('Bahan baku berhasil ditambah!');
        } else {
            return redirect()->back()->withErrors('Terjadi kesalahan, gagal menambah bahan baku');
        }

    }

    public function updateBahanBaku(UpdateBahanBakuRequest $request, String $nama_bahan)
    {
        $data = $request->validated();
        $bahan_baku = Bahan_Baku::where('nama_bahan', $nama_bahan)->first();
        $bahan_baku->harga = $request->harga_baru;
        $bahan_baku->save();
        if ($bahan_baku) {
            return redirect(route('harga-bahan'))->withSuccess("Update harga $nama_bahan berhasil!");

        } else {
            return redirect(route('harga-bahan'))->withErrors("Update harga $nama_bahan gagal!");

        }
    }
    public function updateBahanKemasan(UpdateBahanBakuRequest $request, String $nama_bahan)
    {
        $data = $request->validated();
        $bahan_kemasan = Bahan_Kemasan::where('nama_bahan', $nama_bahan)->first();
        $bahan_kemasan->harga = $request->harga_baru;
        $bahan_kemasan->save();
        if ($bahan_kemasan) {
            return redirect(route('harga-bahan'))->withSuccess("Update harga $nama_bahan berhasil!");

        } else {
            return redirect(route('harga-bahan'))->withErrors("Update harga $nama_bahan gagal!");

        }
    }

    public function deleteBahanBaku(String $nama_bahan)
    {
        $bahan_baku = Bahan_Baku::where('nama_bahan', $nama_bahan)->first();
        if ($bahan_baku != null) {
            $bahan_baku->delete();
            return redirect()->back()->withSuccess('Data berhasil dihapus!');
        } else {
            return redirect()->back()->withErrors('Data gagal dihapus!');

        }
    }

    public function deleteBahanKemasan(String $nama_bahan)
    {
        $bahan_baku = Bahan_Kemasan::where('nama_bahan', $nama_bahan)->first();
        if ($bahan_baku != null) {
            $bahan_baku->delete();
            return redirect()->back()->withSuccess('Data berhasil dihapus!');
        } else {
            return redirect()->back()->withErrors('Data gagal dihapus!');

        }
    }
}
