<?php

namespace App\Http\Controllers;

use App\Http\Requests\MenuRequest;
use App\Http\Requests\MenuUpdateRequest;
use App\Models\Menu_Kue;
use App\Models\Menu_Kue_Kering;
use App\Models\Menu_Nasi;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $menuKueLoyang = Menu_Kue::all();
        $menuKueKering = Menu_Kue_Kering::all();
        $menuNasi = Menu_Nasi::all();
        return view('admin.index', compact('menuKueLoyang', 'menuKueKering', 'menuNasi'));
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
                $data->slug = Str::slug($request->name);
                $data->save();

                // Taro hard copy file ke dalam folder thumbnail yg ada di public
                $request->image->storeAs('menu_kue_loyang', $fileName);
                return redirect(route('menu.create'))->with('flash_msg', 'Data berhasil ditambah!');

            case 'kue_kering':
                $fileName = $request->image->getClientOriginalname();

                $data = new Menu_Kue_Kering;
                $data->name = $request->name;
                $data->image = $fileName;
                $data->harga_normal = $request->harga_normal;
                $data->deskripsi = $request->deskripsi;
                $data->slug = Str::slug($request->name);
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
                $data->slug = Str::slug($request->name);
                $data->save();

                // Taro hard copy file ke dalam folder thumbnail yg ada di public
                $request->image->storeAs('menu_nasi', $fileName);
                return redirect(route('menu.create'))->with('flash_msg', 'Data berhasil ditambah!');
            default:
                return redirect(route('menu.create'))->with('flash_msg_error', 'Data gagal ditambah!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function showKueLoyang(string $slug)
    {
        $data = Menu_Kue::where('slug', $slug)->first();
        $tableName = $data->getTable();
        return view('admin.formUbah', compact('data', 'tableName'));
    }
    public function showKueKering(string $slug)
    {
        $data = Menu_Kue_Kering::where('slug', $slug)->first();
        $tableName = $data->getTable();
        return view('admin.formUbah', compact('data', 'tableName'));
    }
    public function showMenuNasi(string $slug)
    {
        $data = Menu_Nasi::where('slug', $slug)->first();
        $tableName = $data->getTable();
        return view('admin.formUbah', compact('data', 'tableName'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateKueLoyang(MenuUpdateRequest $request, string $slug)
    {
        // Validasi data
        $validated = $request->validated();
        $menu = Menu_Kue::where('slug', $slug)->first();

        if (!$menu) {
            // Handle the case when the record with the given slug is not found
            return redirect()->back()->with('flash_msg_error', 'Menu tidak ditemukan!');
        }

        // Update only the fields that are provided by the user
        $menu->fill([
            'name' => $request->input('name', $menu->name),
            'harga_normal' => $request->input('harga_normal', $menu->harga_normal),
            'deskripsi' => $request->input('deskripsi', $menu->deskripsi),
        ]);

        // Handle the image update
        if ($request->hasFile('image')) {
            // Delete the old image (optional)
            unlink(public_path('storage/menu_kue_loyang/' . $menu->image));

            // Store and set the new image
            $menu->image = $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('menu_kue_loyang', $menu->image);
        }

        $menu->save();

        return redirect(route('menu.showKueLoyang', ['slug' => $slug]))->with('flash_msg', 'Data berhasil diupdate!');
    }
    public function updateKueKering(Request $request, string $slug)
    {
        // Validasi data
        $validated = $request->validated();
        $menu = Menu_Kue_Kering::where('slug', $slug)->first();

        if (!$menu) {
            // Handle the case when the record with the given slug is not found
            return redirect()->back()->with('flash_msg_error', 'Menu tidak ditemukan!');
        }

        // Update only the fields that are provided by the user
        $menu->fill([
            'name' => $request->input('name', $menu->name),
            'harga_normal' => $request->input('harga_normal', $menu->harga_normal),
            'deskripsi' => $request->input('deskripsi', $menu->deskripsi),
        ]);

        // Handle the image update
        if ($request->hasFile('image')) {
            // Delete the old image (optional)
            unlink(public_path('storage/menu_kue_kering/' . $menu->image));

            // Store and set the new image
            $menu->image = $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('menu_kue_kering', $menu->image);
        }

        $menu->save();

        return redirect(route('menu.showKueKering', ['slug' => $slug]))->with('flash_msg', 'Data berhasil diupdate!');
    }
    public function updateMenuNasi(Request $request, string $slug)
    {
        //
        // Validasi data
        $validated = $request->validated();
        $menu = Menu_Nasi::where('slug', $slug)->first();

        if (!$menu) {
            // Handle the case when the record with the given slug is not found
            return redirect()->back()->with('flash_msg_error', 'Menu tidak ditemukan!');
        }

        // Update only the fields that are provided by the user
        $menu->fill([
            'name' => $request->input('name', $menu->name),
            'harga_normal' => $request->input('harga_normal', $menu->harga_normal),
            'deskripsi' => $request->input('deskripsi', $menu->deskripsi),
        ]);

        // Handle the image update
        if ($request->hasFile('image')) {
            // Delete the old image (optional)
            unlink(public_path('storage/menu_nasi/' . $menu->image));

            // Store and set the new image
            $menu->image = $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('menu_nasi', $menu->image);
        }

        $menu->save();

        return redirect(route('menu.showKueLoyang', ['slug' => $slug]))->with('flash_msg', 'Data berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function hapusMenuNasi($slug)
    {
        //
        $data = Menu_Nasi::find($slug);
        unlink(public_path('storage/menu_nasi/' . $data->image));

        $data->delete();

        return redirect()->route('adminPage');
    }

    public function hapusMenuKueLoyang($slug)
    {
        $data = Menu_Kue::find($slug);
        unlink(public_path('storage/menu_kue_loyang/' . $data->image));

        $data->delete();

        return redirect()->route('adminPage');
    }
    public function hapusMenuKueKering($slug)
    {
        $data = Menu_Kue_Kering::find($slug);
        unlink(public_path('storage/menu_kue_kering/' . $data->image));

        $data->delete();

        return redirect()->route('adminPage');
    }
}
