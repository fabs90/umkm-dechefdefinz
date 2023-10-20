<?php

namespace App\Http\Controllers;

use App\Models\Promo;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PromoController extends Controller
{
    public function index()
    {
        $promo = Promo::all();

        return view('admin.promo.formTambahPromo', compact(['promo']));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([

            'nama' => ['required', 'min:3', 'max:30', 'unique:promos,nama'],
            'harga' => ['required', 'numeric', 'min:100'],
            'deskripsi' => ['required', 'min:6'],
            'image' => ['required', 'mimes:png,jpg,jpeg', 'max:8092'],
        ],
            [
                'nama.required' => 'Sialakan isi kolom nama',
                'nama.min' => 'Panjang minimal nama adalah 3 karakter',
                'nama.unqiue' => 'Nama menu sudah terpakai, pilih yang lain',
                'deskripsi.required' => 'Silakan isi kolom deskripsi promo!',
                'harga.min' => 'Minimal harga Rp.100',
                'image.mimes' => 'Hanya bisa file img (png,jpg,jpeg)',
                'image.max' => 'Ukuran maksimal foto adalah 9mb',
            ]);

        if ($request->hasFile('image') && $validated) {
            // Ambil nama file
            $fileName = time() . $request->image->getClientOriginalname();
            // Masukan data ke database
            Promo::create([
                'nama' => $request->nama,
                'harga_promo' => $request->harga,
                'deskripsi' => $request->deskripsi,
                'image' => $fileName,
                'slug' => Str::slug($request->nama),
            ]);

            // Pindahkan hardcopy kedalam folder image_review di storage
            $request->image->storeAs('promo', $fileName);
            return redirect()->back()->withSuccess('Promo berhasil ditambah!');

        } else {
            return redirect()->back()->withErrors('Gagal menambahkan promo, terjadi error!');
        }

    }

    public function destroy(string $slug)
    {

        $data = Promo::where('slug', $slug)->first();
        if ($data != null) {
            unlink(public_path('storage/promo/' . $data->image));
            $data->delete();
            return redirect()->route('promo')->withSuccess('Data berhasil di hapus');
        } else {
            return redirect()->route('promo')->withErrors('Data gagal dihapus :(');
        }
    }
}
