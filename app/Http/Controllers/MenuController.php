<?php

namespace App\Http\Controllers;

use App\Http\Requests\MenuRequest;
use App\Models\Menu_Kue;
use App\Models\Menu_Kue_Kering;
use App\Models\Menu_Nasi;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.formTambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MenuRequest $request)
    {
        //
        $kategori = $request->input('kategori');

        $validated = $request->validated();

        switch ($kategori) {
            case 'kue':
                // Ambil nama asli file, kl ga pake ini namanya di generate acak sm laravel
                $fileName = $request->image->getClientOriginalname();

                $data = new Menu_Kue;
                $data->name = $request->name;
                $data->image = $fileName;
                $data->harga_normal = $request->harga_normal;
                $data->deskripsi = $request->deskripsi;
                $data->save();

                // Taro hard copy file ke dalam folder thumbnail yg ada di public
                $request->image->storeAs('menu_kue', $fileName);
                return redirect(route('menu.create'))->with('flash_msg', 'Data berhasil ditambah!');

            case 'kue_kering':
                $fileName = $request->image->getClientOriginalname();

                $data = new Menu_Kue_Kering;
                $data->name = $request->name;
                $data->image = $fileName;
                $data->harga_normal = $request->harga_normal;
                $data->deskripsi = $request->deskripsi;
                $data->save();

                // Taro hard copy file ke dalam folder thumbnail yg ada di public
                $request->image->storeAs('menu_kue_kering', $fileName);
                return redirect(route('menu.create'))->with('flash_msg', 'Data berhasil ditambah!');
            case 'nasi':
                $fileName = $request->image->getClientOriginalname();

                $data = new Menu_Nasi;
                $data->name = $request->name;
                $data->image = $fileName;
                $data->harga_normal = $request->harga_normal;
                $data->deskripsi = $request->deskripsi;
                $data->save();

                // Taro hard copy file ke dalam folder thumbnail yg ada di public
                $request->image->storeAs('menu_nasi', $fileName);
                return redirect(route('menu.create'))->with('flash_msg', 'Data berhasil ditambah!');
            default:
                return redirect()->back()->with('flash_msg', 'Kategori yang dimasukan tidak valid, ulangi!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}