<?php

namespace App\Http\Controllers;

use App\Http\Requests\MenuUpdateRequest;
use App\Models\Bakery;
use App\Models\KueTradisional;
use App\Models\Menu_Kue;
use App\Models\Menu_Kue_Kering;
use App\Models\Menu_Nasi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
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
        $jumlahKL = Menu_Kue::count();
        $menuKueKering = Menu_Kue_Kering::all();
        $jumlahKK = Menu_Kue_Kering::count();
        $menuNasi = Menu_Nasi::all();
        $jumlahNasi = Menu_Nasi::count();
        $bakery = Bakery::all();
        $jumlahBakery = Bakery::count();
        $kueTradisional = KueTradisional::all();
        $jumlahKueTradisional = KueTradisional::count();

        return view('admin.index', compact('menuKueLoyang', 'menuKueKering', 'menuNasi', 'jumlahKL', 'jumlahKK', 'jumlahNasi', 'bakery', 'jumlahBakery', 'kueTradisional', 'jumlahKueTradisional'));
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
    public function store(Request $request)
    {
        $kategori = $request->input('kategori');
        switch ($kategori) {
            case 'kue':
                $this->storeKue($request);
            case 'kue_kering':
                $this->storeKueKering($request);
            case 'nasi':
                $this->storeNasi($request);
            case "kue_tradisional":
                $this->storeKueTradisional($request);
            case 'bakery':
                $this->storeBakery($request);
            default:
                return redirect(route('menu.create'))->withErrors("Menu gagal ditambah :(");
        }
    }

    public function storeKue(Request $request)
    {
        // Ambil nama asli file, kl ga pake ini namanya di generate acak sm laravel
        $validate = $request->validate([
            'name' => ['required', 'min:3', 'max:100', 'unique:menu_kue,name'],
            'harga_normal' => ['required', 'numeric', 'min:400'],
            'deskripsi' => ['required'],
            'image' => ['required', 'file', 'mimes:png,jpg,jpeg,svg', 'max:8092'],
        ], [
            'name.required' => 'Username wajib diisi',
            'name.min' => 'Minimal 3 huruf',
            'name.max' => 'Maksimal 100 huruf',
            'name.unique' => 'Nama menu sudah pernah terdaftar!',
            'harga_normal.required' => 'Harga wajib diisi',
            'harga_normal.min' => 'Angka yang diinput terlalu kecil! (Minimal Rp.400)',
            'harga_normal.numeric' => 'Masukan angka saja',
            'deskripsi.required' => 'Deskripsi wajib diisi',
            'image.required' => "Mohon upload gambar melalui tombol 'choose file'",
            'image.mimes' => 'Ekstensi yang diperbolehkan hanya:png,jpg,jpeg,svg',
            'image.max' => 'Ukuran maksimum gambar adalah 8mb (8092kb)!',
        ]);
        $fileName = time() . '-' . $request->image->getClientOriginalname();
        $data = new Menu_Kue;
        $data->name = $request->name;
        $data->image = $fileName;
        $data->harga_normal = $request->harga_normal;
        $data->harga_diskon = 0;
        $data->deskripsi = $request->deskripsi;
        $data->slug = Str::slug($request->name);
        $data->save();
        // Taro hard copy file ke dalam folder thumbnail yg ada di public
        $request->image->storeAs('menu_kue_loyang', $fileName);
        return redirect(route('menu.create'))->withSuccess('Menu berhasil ditambah!');
    }

    public function storeKueKering(Request $request)
    {
        $validate = $request->validate([
            'name' => ['required', 'min:3', 'max:100', 'unique:menu_kue_kering,name'],
            'harga_normal' => ['required', 'numeric', 'min:400'],
            'deskripsi' => ['required'],
            'image' => ['required', 'file', 'mimes:png,jpg,jpeg,svg', 'max:8092'],
        ], [
            'name.required' => 'Username wajib diisi',
            'name.min' => 'Minimal 3 huruf',
            'name.max' => 'Maksimal 100 huruf',
            'name.unique' => 'Nama menu sudah pernah terdaftar!',
            'harga_normal.required' => 'Harga wajib diisi',
            'harga_normal.min' => 'Angka yang diinput terlalu kecil! (Minimal Rp.400)',
            'harga_normal.numeric' => 'Masukan angka saja',
            'deskripsi.required' => 'Deskripsi wajib diisi',
            'image.required' => "Mohon upload gambar melalui tombol 'choose file'",
            'image.mimes' => 'Ekstensi yang diperbolehkan hanya:png,jpg,jpeg,svg',
            'image.max' => 'Ukuran maksimum gambar adalah 8mb (8092kb)!',
        ]);
        $fileName = time() . '-' . $request->image->getClientOriginalname();
        $data = new Menu_Kue_Kering;
        $data->name = $request->name;
        $data->image = $fileName;
        $data->harga_normal = $request->harga_normal;
        $data->harga_diskon = 0;
        $data->deskripsi = $request->deskripsi;
        $data->slug = Str::slug($request->name);
        $data->save();
        // Taro hard copy file ke dalam folder thumbnail yg ada di public
        $request->image->storeAs('menu_kue_kering', $fileName);
        return redirect(route('menu.create'))->withSuccess('Menu berhasil ditambah!');
    }

    public function storeNasi(Request $request)
    {
        $validate = $request->validate([
            'name' => ['required', 'min:3', 'max:100', 'unique:menu_nasi,name'],
            'harga_normal' => ['required', 'numeric', 'min:400'],
            'deskripsi' => ['required'],
            'image' => ['required', 'file', 'mimes:png,jpg,jpeg,svg', 'max:8092'],
        ], [
            'name.required' => 'Username wajib diisi',
            'name.min' => 'Minimal 3 huruf',
            'name.max' => 'Maksimal 100 huruf',
            'name.unique' => 'Nama menu sudah pernah terdaftar!',
            'harga_normal.required' => 'Harga wajib diisi',
            'harga_normal.min' => 'Angka yang diinput terlalu kecil! (Minimal Rp.400)',
            'harga_normal.numeric' => 'Masukan angka saja',
            'deskripsi.required' => 'Deskripsi wajib diisi',
            'image.required' => "Mohon upload gambar melalui tombol 'choose file'",
            'image.mimes' => 'Ekstensi yang diperbolehkan hanya:png,jpg,jpeg,svg',
            'image.max' => 'Ukuran maksimum gambar adalah 8mb (8092kb)!',
        ]);
        $fileName = time() . '-' . $request->image->getClientOriginalname();
        $data = new Menu_Nasi;
        $data->name = $request->name;
        $data->image = $fileName;
        $data->harga_normal = $request->harga_normal;
        $data->harga_diskon = 0;
        $data->deskripsi = $request->deskripsi;
        $data->slug = Str::slug($request->name);
        $data->save();
        // Taro hard copy file ke dalam folder thumbnail yg ada di public
        $request->image->storeAs('menu_nasi', $fileName);
        return redirect(route('menu.create'))->withSuccess('Menu berhasil ditambah!');
    }

    public function storeKueTradisional(Request $request)
    {
        $validate = $request->validate([
            'name' => ['required', 'min:3', 'max:100', 'unique:kue_tradisional,name'],
            'harga_normal' => ['required', 'numeric', 'min:400'],
            'deskripsi' => ['required'],
            'image' => ['required', 'file', 'mimes:png,jpg,jpeg,svg', 'max:8092'],
        ], [
            'name.required' => 'Username wajib diisi',
            'name.min' => 'Minimal 3 huruf',
            'name.max' => 'Maksimal 100 huruf',
            'name.unique' => 'Nama menu sudah pernah terdaftar!',
            'harga_normal.required' => 'Harga wajib diisi',
            'harga_normal.min' => 'Angka yang diinput terlalu kecil! (Minimal Rp.400)',
            'harga_normal.numeric' => 'Masukan angka saja',
            'deskripsi.required' => 'Deskripsi wajib diisi',
            'image.required' => "Mohon upload gambar melalui tombol 'choose file'",
            'image.mimes' => 'Ekstensi yang diperbolehkan hanya:png,jpg,jpeg,svg',
            'image.max' => 'Ukuran maksimum gambar adalah 8mb (8092kb)!',
        ]);
        $fileName = time() . '-' . $request->image->getClientOriginalname();
        $data = new KueTradisional;
        $data->name = $request->name;
        $data->image = $fileName;
        $data->harga_normal = $request->harga_normal;
        $data->harga_diskon = 0;
        $data->deskripsi = $request->deskripsi;
        $data->slug = Str::slug($request->name);
        $data->save();
        // Taro hard copy file ke dalam folder thumbnail yg ada di public
        $request->image->storeAs('kue_tradisional', $fileName);
        return redirect(route('menu.create'))->withSuccess('Menu berhasil ditambah!');
    }

    public function storeBakery(Request $request)
    {
        $validate = $request->validate([
            'name' => ['required', 'min:3', 'max:100', 'unique:bakeries,name'],
            'harga_normal' => ['required', 'numeric', 'min:400'],
            'deskripsi' => ['required'],
            'image' => ['required', 'file', 'mimes:png,jpg,jpeg,svg', 'max:8092'],
        ], [
            'name.required' => 'Username wajib diisi',
            'name.min' => 'Minimal 3 huruf',
            'name.max' => 'Maksimal 100 huruf',
            'name.unique' => 'Nama menu sudah pernah terdaftar!',
            'harga_normal.required' => 'Harga wajib diisi',
            'harga_normal.min' => 'Angka yang diinput terlalu kecil! (Minimal Rp.400)',
            'harga_normal.numeric' => 'Masukan angka saja',
            'deskripsi.required' => 'Deskripsi wajib diisi',
            'image.required' => "Mohon upload gambar melalui tombol 'choose file'",
            'image.mimes' => 'Ekstensi yang diperbolehkan hanya:png,jpg,jpeg,svg',
            'image.max' => 'Ukuran maksimum gambar adalah 8mb (8092kb)!',
        ]);
        $fileName = time() . '-' . $request->image->getClientOriginalname();
        $data = new Bakery;
        $data->name = $request->name;
        $data->image = $fileName;
        $data->harga_normal = $request->harga_normal;
        $data->harga_diskon = 0;
        $data->deskripsi = $request->deskripsi;
        $data->slug = Str::slug($request->name);
        $data->save();
        // Taro hard copy file ke dalam folder thumbnail yg ada di public
        $request->image->storeAs('bakery', $fileName);
        return redirect(route('menu.create'))->withSuccess('Menu berhasil ditambah!');
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
            return redirect()->back()->withErrors("Menu tidak ditemukan, silakan coba lagi... :(");
        }

        // Check if kategori not kue loyang
        if ($request->kategori == "kue_kering") {
            // Create the new record in Menu_Kue Table
            $baru = Menu_Kue_Kering::create([
                'name' => $request->input('name', $menu->name),
                'harga_normal' => $request->input('harga_normal', $menu->harga_normal),
                'harga_diskon' => $request->input('harga_diskon', $menu->harga_diskon),
                'image' => $request->input('image', $menu->image),
                'deskripsi' => $request->input('deskripsi', $menu->deskripsi),
                'created_at' => Carbon::now()->timestamp,
                'updated_at' => Carbon::now()->timestamp,
                'slug' => Str::slug($request->input('name', $menu->slug)),
            ]);

            if ($baru) {
                // Move the old file
                File::move(public_path('storage/menu_kue_loyang/' . $menu->image), public_path('storage/menu_kue_kering/' . $menu->image));
                // Delete the old record file
                $menu->delete();
                return redirect(route('menu.showKueKering', ['slug' => $slug]))->withSuccess('Menu berhasil diupdate!');
            } else {
                return redirect()->back()->withErrors("Menu gagal diupdate :(");
            }

        } elseif ($request->kategori == "nasi") {
            $baru = Menu_Nasi::create([
                'name' => $request->input('name', $menu->name),
                'harga_normal' => $request->input('harga_normal', $menu->harga_normal),
                'harga_diskon' => $request->input('harga_diskon', $menu->harga_diskon),
                'deskripsi' => $request->input('deskripsi', $menu->deskripsi),
                'image' => $request->input('image', $menu->image),
                'created_at' => Carbon::now()->timestamp,
                'updated_at' => Carbon::now()->timestamp,
                'slug' => Str::slug($request->input('name', $menu->slug)),
            ]);
            if ($baru) {
                // Move the old file
                File::move(public_path('storage/menu_kue_loyang/' . $menu->image), public_path('storage/menu_nasi/' . $menu->image));
                // Delete the old record file
                $menu->delete();
                return redirect(route('menu.showMenuNasi', ['slug' => $slug]))->withSuccess('Menu berhasil diupdate!');
            } else {
                return redirect()->back()->withErrors("Menu gagal diupdate :(");
            }
        } elseif ($request->kategori == "bakery") {
            $baru = Bakery::create([
                'name' => $request->input('name', $menu->name),
                'harga_normal' => $request->input('harga_normal', $menu->harga_normal),
                'harga_diskon' => $request->input('harga_diskon', $menu->harga_diskon),
                'deskripsi' => $request->input('deskripsi', $menu->deskripsi),
                'image' => $request->input('image', $menu->image),
                'created_at' => Carbon::now()->timestamp,
                'updated_at' => Carbon::now()->timestamp,
                'slug' => Str::slug($request->input('name', $menu->slug)),
            ]);
            if ($baru) {
                // Move the old file
                File::move(public_path('storage/menu_kue_loyang/' . $menu->image), public_path('storage/bakery/' . $menu->image));
                // Delete the old record file
                $menu->delete();
                return redirect(route('menu.showMenuBakery', ["slug" => $slug]))->withSuccess("Data berhasil diupdate!");
            } else {
                return redirect()->back()->withErrors("Menu gagal diupdate :(");
            }
        } elseif ($request->kategori == "kue_tradisional") {
            $baru = KueTradisional::create($menu->toArray());
            if ($baru) {
                // Move the old file
                File::move(public_path('storage/menu_kue_loyang/' . $menu->image), public_path('storage/kue_tradisional/' . $menu->image));
                // Delete the old record file
                $menu->delete();
                return redirect(route('menu.showMenuKueTradisional', ["slug" => $slug]))->withSuccess("Data berhasil diupdate!");
            } else {
                return redirect()->back()->withErrors("Menu gagal diupdate :(");
            }
        }

        // Handle the image update
        if ($request->hasFile('image')) {
            // Delete the old image (optional)
            if (File::exists(public_path('storage/menu_kue_loyang/' . $menu->image))) {
                unlink(public_path('storage/menu_kue_loyang/' . $menu->image));
            }

            // Store and set the new image
            $menu->image = time() . '-' . $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('menu_kue_loyang', $menu->image);
        }

        // Update only the fields that are provided by the user
        $menu->fill([
            'name' => $request->input('name', $menu->name),
            'harga_normal' => $request->input('harga_normal', $menu->harga_normal),
            'harga_diskon' => $request->input('harga_diskon', $menu->harga_diskon),
            'deskripsi' => $request->input('deskripsi', $menu->deskripsi),
            'slug' => Str::slug($request->input('name', $menu->slug)),
        ]);

        $menu->save();

        return redirect()->route('menu.showKueLoyang', ['slug' => $menu->slug])->withSuccess("Data berhasil diupdate!");
    }
    public function updateKueKering(MenuUpdateRequest $request, string $slug)
    {

        // Validasi data
        $validated = $request->validated();
        $menu = Menu_Kue_Kering::where('slug', $slug)->first();

        if (!$menu) {
            // Handle the case when the record with the given slug is not found
            return redirect()->back()->withErrors("Menu gagal diupdate :(");
        }

        // Check if kategori not kue kering
        if ($request->kategori == "cake") {
            // Create the new record in Menu_Kue Table
            $baru = Menu_Kue::create([
                'name' => $request->input('name', $menu->name),
                'harga_normal' => $request->input('harga_normal', $menu->harga_normal),
                'harga_diskon' => $request->input('harga_diskon', $menu->harga_diskon),
                'deskripsi' => $request->input('deskripsi', $menu->deskripsi),
                'image' => $request->input('image', $menu->image),
                'created_at' => Carbon::now()->timestamp,
                'updated_at' => Carbon::now()->timestamp,
                'slug' => Str::slug($request->input('name', $menu->slug)),
            ]);

            // Kalau pembuatan data di tabel baru berhasil
            if ($baru) {
                // Move the old file
                File::move(public_path('storage/menu_kue_kering/' . $menu->image), public_path('storage/menu_kue_loyang/' . $menu->image));
                // Delete the old record file
                $menu->delete();
                return redirect(route('menu.showKueLoyang', ['slug' => $slug]))->withSuccess('Menu berhasil diupdate!');
            } else {
                return redirect()->back()->withErrors("Menu gagal diupdate :(");
            }

        } elseif ($request->kategori == "nasi") {
            $baru = Menu_Nasi::create([
                'name' => $request->input('name', $menu->name),
                'harga_normal' => $request->input('harga_normal', $menu->harga_normal),
                'harga_diskon' => $request->input('harga_diskon', $menu->harga_diskon),
                'deskripsi' => $request->input('deskripsi', $menu->deskripsi),
                'image' => $request->input('image', $menu->image),
                'created_at' => Carbon::now()->timestamp,
                'updated_at' => Carbon::now()->timestamp,
                'slug' => Str::slug($request->input('name', $menu->slug)),
            ]);
            if ($baru) {
                // Move the old file
                File::move(public_path('storage/menu_kue_kering/' . $menu->image), public_path('storage/menu_nasi/' . $menu->image));
                // Delete the old record file
                $menu->delete();
                return redirect(route('menu.showMenuNasi', ['slug' => $slug]))->withSuccess('Menu berhasil diupdate!');
            } else {
                return redirect()->back()->withErrors("Menu gagal diupdate :(");
            }
        } elseif ($request->kategori == "kue_tradisional") {
            $baru = KueTradisional::create([
                'name' => $request->input('name', $menu->name),
                'harga_normal' => $request->input('harga_normal', $menu->harga_normal),
                'harga_diskon' => $request->input('harga_diskon', $menu->harga_diskon),
                'deskripsi' => $request->input('deskripsi', $menu->deskripsi),
                'image' => $request->input('image', $menu->image),
                'created_at' => Carbon::now()->timestamp,
                'updated_at' => Carbon::now()->timestamp,
                'slug' => Str::slug($request->input('name', $menu->slug)),
            ]);
            if ($baru) {
                // Move the old file
                File::move(public_path('storage/menu_kue_kering/' . $menu->image), public_path('storage/kue_tradisional/' . $menu->image));
                // Delete the old record file
                $menu->delete();
                return redirect(route('menu.showMenuKueTradisional', ["slug" => $slug]))->withSuccess("Data berhasil diupdate!");
            } else {
                return redirect()->back()->withErrors("Menu gagal diupdate :(");
            }
        } elseif ($request->kategori == "bakery") {
            $baru = Bakery::create([
                'name' => $request->input('name', $menu->name),
                'harga_normal' => $request->input('harga_normal', $menu->harga_normal),
                'harga_diskon' => $request->input('harga_diskon', $menu->harga_diskon),
                'deskripsi' => $request->input('deskripsi', $menu->deskripsi),
                'image' => $request->input('image', $menu->image),
                'created_at' => Carbon::now()->timestamp,
                'updated_at' => Carbon::now()->timestamp,
                'slug' => Str::slug($request->input('name', $menu->slug)),
            ]);
            if ($baru) {
                // Move the old file
                File::move(public_path('storage/menu_kue_kering/' . $menu->image), public_path('storage/bakery/' . $menu->image));
                // Delete the old record file
                $menu->delete();
                return redirect(route('menu.showMenuBakery', ["slug" => $slug]))->withSuccess("Data berhasil diupdate!");
            } else {
                return redirect()->back()->withErrors("Menu gagal diupdate :(");
            }
        }
        // Handle the image update
        if ($request->hasFile('image')) {
            // Delete the old image (optional)
            if (File::exists(public_path('storage/menu_kue_kering/' . $menu->image))) {
                unlink(public_path('storage/menu_kue_kering/' . $menu->image));
            }

            // Store and set the new image
            $menu->image = time() . '-' . $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('menu_kue_kering', $menu->image);
        }

        // Update only the fields that are provided by the user
        $menu->fill([
            'name' => $request->input('name', $menu->name),
            'harga_normal' => $request->input('harga_normal', $menu->harga_normal),
            'harga_diskon' => $request->input('harga_diskon', $menu->harga_diskon),
            'deskripsi' => $request->input('deskripsi', $menu->deskripsi),
            'slug' => Str::slug($request->input('name', $menu->slug)),

        ]);

        $menu->save();

        return redirect(route('menu.showKueKering', ['slug' => $menu->slug]))->withSuccess("Data berhasil diupdate!");
    }
    public function updateMenuNasi(MenuUpdateRequest $request, string $slug)
    {
        //
        // Validasi data
        $validated = $request->validated();
        $menu = Menu_Nasi::where('slug', $slug)->first();

        if (!$menu) {
            // Handle the case when the record with the given slug is not found
            return redirect()->back()->withErrors("Menu gagal diupdate :(");
        }

        // Check if kategori not nasi
        if ($request->kategori == "cake") {
            // Create the new record in Menu_Kue Table
            $baru = Menu_Kue::create([
                'name' => $request->input('name', $menu->name),
                'harga_normal' => $request->input('harga_normal', $menu->harga_normal),
                'harga_diskon' => $request->input('harga_diskon', $menu->harga_diskon),
                'deskripsi' => $request->input('deskripsi', $menu->deskripsi),
                'image' => $request->input('image', $menu->image),
                'created_at' => Carbon::now()->timestamp,
                'updated_at' => Carbon::now()->timestamp,
                'slug' => Str::slug($request->input('name', $menu->slug)),
            ]);

            // Kalau pembuatan data di tabel baru berhasil
            if ($baru) {
                // Move the old file
                File::move(public_path('storage/menu_nasi/' . $menu->image), public_path('storage/menu_kue_loyang/' . $menu->image));
                // Delete the old record file
                $menu->delete();
                return redirect(route('menu.showKueLoyang', ['slug' => $slug]))->withSuccess("Data berhasil diupdate!");
            } else {
                return redirect()->back()->withErrors("Menu gagal diupdate :(");
            }

        } else if ($request->kategori == "kue_kering") {
            $baru = Menu_Kue_Kering::create([
                'name' => $request->input('name', $menu->name),
                'harga_normal' => $request->input('harga_normal', $menu->harga_normal),
                'harga_diskon' => $request->input('harga_diskon', $menu->harga_diskon),
                'deskripsi' => $request->input('deskripsi', $menu->deskripsi),
                'image' => $request->input('image', $menu->image),
                'created_at' => Carbon::now()->timestamp,
                'updated_at' => Carbon::now()->timestamp,
                'slug' => Str::slug($request->input('name', $menu->slug)),
            ]);
            if ($baru) {
                // Move the old file
                File::move(public_path('storage/menu_nasi/' . $menu->image), public_path('storage/menu_kue_kering/' . $menu->image));
                // Delete the old record file
                $menu->delete();
                return redirect(route('menu.showKueKering', ["slug" => $slug]))->withSuccess("Data berhasil diupdate!");
            } else {
                return redirect()->back()->withErrors("Menu gagal diupdate :(");
            }
        } elseif ($request->kategori == "bakery") {
            $baru = Bakery::create([
                'name' => $request->input('name', $menu->name),
                'harga_normal' => $request->input('harga_normal', $menu->harga_normal),
                'harga_diskon' => $request->input('harga_diskon', $menu->harga_diskon),
                'deskripsi' => $request->input('deskripsi', $menu->deskripsi),
                'image' => $request->input('image', $menu->image),
                'created_at' => Carbon::now()->timestamp,
                'updated_at' => Carbon::now()->timestamp,
                'slug' => Str::slug($request->input('name', $menu->slug)),
            ]);
            if ($baru) {
                // Move the old file
                File::move(public_path('storage/menu_nasi/' . $menu->image), public_path('storage/bakery/' . $menu->image));
                // Delete the old record file
                $menu->delete();
                return redirect(route('menu.showMenuBakery', ["slug" => $slug]))->withSuccess("Data berhasil diupdate!");
            } else {
                return redirect()->back()->withErrors("Menu gagal diupdate :(");
            }
        } elseif ($request->kategori == "kue_tradisional") {
            $baru = KueTradisional::create([
                'name' => $request->input('name', $menu->name),
                'harga_normal' => $request->input('harga_normal', $menu->harga_normal),
                'harga_diskon' => $request->input('harga_diskon', $menu->harga_diskon),
                'deskripsi' => $request->input('deskripsi', $menu->deskripsi),
                'image' => $request->input('image', $menu->image),
                'created_at' => Carbon::now()->timestamp,
                'updated_at' => Carbon::now()->timestamp,
                'slug' => Str::slug($request->input('name', $menu->slug)),
            ]);
            if ($baru) {
                // Move the old file
                File::move(public_path('storage/menu_nasi/' . $menu->image), public_path('storage/kue_tradisional/' . $menu->image));
                // Delete the old record file
                $menu->delete();
                return redirect(route('menu.showMenuKueTradisional', ["slug" => $slug]))->withSuccess("Data berhasil diupdate!");
            } else {
                return redirect()->back()->withErrors("Menu gagal diupdate :(");
            }
        }
        // Handle the image update
        if ($request->hasFile('image')) {
            // Delete the old image (optional)
            if (File::exists(public_path('storage/menu_nasi/' . $menu->image))) {
                unlink(public_path('storage/menu_nasi/' . $menu->image));
            }

            // Store and set the new image
            $menu->image = time() . '-' . $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('menu_nasi', $menu->image);
        }

        // Update only the fields that are provided by the user
        $menu->fill([
            'name' => $request->input('name', $menu->name),
            'harga_normal' => $request->input('harga_normal', $menu->harga_normal),
            'harga_diskon' => $request->input('harga_diskon', $menu->harga_diskon),
            'deskripsi' => $request->input('deskripsi', $menu->deskripsi),
            'slug' => Str::slug($request->input('name', $menu->slug)),

        ]);

        $menu->save();
        return redirect(route('menu.showMenuNasi', ['slug' => $menu->slug]))->withSuccess("Data berhasil diupdate!");

    }
    public function updateMenuBakery(MenuUpdateRequest $request, string $slug)
    {
        // Validasi data
        $validated = $request->validated();
        $menu = Bakery::where('slug', $slug)->first();

        if (!$menu) {
            // Handle the case when the record with the given slug is not found
            return redirect()->back()->withErrors("Menu gagal diupdate :(");
        }

        // Check if kategori not nasi
        if ($request->kategori == "cake") {
            // Create the new record in Menu_Kue Table
            $baru = Menu_Kue::create([
                'name' => $request->input('name', $menu->name),
                'harga_normal' => $request->input('harga_normal', $menu->harga_normal),
                'harga_diskon' => $request->input('harga_diskon', $menu->harga_diskon),
                'deskripsi' => $request->input('deskripsi', $menu->deskripsi),
                'image' => $request->input('image', $menu->image),
                'created_at' => Carbon::now()->timestamp,
                'updated_at' => Carbon::now()->timestamp,
                'slug' => Str::slug($request->input('name', $menu->slug)),
            ]);

            // Kalau pembuatan data di tabel baru berhasil
            if ($baru) {
                // Move the old file
                File::move(public_path('storage/bakery/' . $menu->image), public_path('storage/menu_kue_loyang/' . $menu->image));
                // Delete the old record file
                $menu->delete();
                return redirect(route('menu.showKueLoyang', ['slug' => $slug]))->withSuccess("Data berhasil diupdate!");
            } else {
                return redirect()->back()->withErrors("Menu gagal diupdate :(");
            }

        } elseif ($request->kategori == "kue_kering") {
            $baru = Menu_Kue_Kering::create([
                'name' => $request->input('name', $menu->name),
                'harga_normal' => $request->input('harga_normal', $menu->harga_normal),
                'harga_diskon' => $request->input('harga_diskon', $menu->harga_diskon),
                'deskripsi' => $request->input('deskripsi', $menu->deskripsi),
                'image' => $request->input('image', $menu->image),
                'created_at' => Carbon::now()->timestamp,
                'updated_at' => Carbon::now()->timestamp,
                'slug' => Str::slug($request->input('name', $menu->slug)),
            ]);
            if ($baru) {
                // Move the old file
                File::move(public_path('storage/bakery/' . $menu->image), public_path('storage/menu_kue_kering/' . $menu->image));
                // Delete the old record file
                $menu->delete();
                return redirect(route('menu.showKueKering', ["slug" => $slug]))->withSuccess("Data berhasil diupdate!");
            } else {
                return redirect()->back()->withErrors("Menu gagal diupdate :(");
            }
        } elseif ($request->kategori == "nasi") {
            $baru = Menu_Nasi::create([
                'name' => $request->input('name', $menu->name),
                'harga_normal' => $request->input('harga_normal', $menu->harga_normal),
                'harga_diskon' => $request->input('harga_diskon', $menu->harga_diskon),
                'deskripsi' => $request->input('deskripsi', $menu->deskripsi),
                'image' => $request->input('image', $menu->image),
                'created_at' => Carbon::now()->timestamp,
                'updated_at' => Carbon::now()->timestamp,
                'slug' => Str::slug($request->input('name', $menu->slug)),
            ]);
            if ($baru) {
                // Move the old file
                File::move(public_path('storage/bakery/' . $menu->image), public_path('storage/menu_nasi/' . $menu->image));
                // Delete the old record file
                $menu->delete();
                return redirect(route('menu.showMenuNasi', ["slug" => $slug]))->withSuccess("Data berhasil diupdate!");
            } else {
                return redirect()->back()->withErrors("Menu gagal diupdate :(");
            }
        } elseif ($request->kategori == "kue_tradisional") {
            $baru = KueTradisional::create([
                'name' => $request->input('name', $menu->name),
                'harga_normal' => $request->input('harga_normal', $menu->harga_normal),
                'harga_diskon' => $request->input('harga_diskon', $menu->harga_diskon),
                'deskripsi' => $request->input('deskripsi', $menu->deskripsi),
                'image' => $request->input('image', $menu->image),
                'created_at' => Carbon::now()->timestamp,
                'updated_at' => Carbon::now()->timestamp,
                'slug' => Str::slug($request->input('name', $menu->slug)),
            ]);
            if ($baru) {
                // Move the old file
                File::move(public_path('storage/bakery/' . $menu->image), public_path('storage/kue_tradisional/' . $menu->image));
                // Delete the old record file
                $menu->delete();
                return redirect(route('menu.showMenuKueTradisional', ["slug" => $slug]))->withSuccess("Data berhasil diupdate!");
            } else {
                return redirect()->back()->withErrors("Menu gagal diupdate :(");
            }
        }
        // Handle the image update
        if ($request->hasFile('image')) {
            // Delete the old image (optional)
            if (File::exists(public_path('storage/bakery/' . $menu->image))) {
                unlink(public_path('storage/bakery/' . $menu->image));
            }

            // Store and set the new image
            $menu->image = time() . '-' . $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('bakery', $menu->image);
        }

        // Update only the fields that are provided by the user
        $menu->fill([
            'name' => $request->input('name', $menu->name),
            'harga_normal' => $request->input('harga_normal', $menu->harga_normal),
            'harga_diskon' => $request->input('harga_diskon', $menu->harga_diskon),
            'deskripsi' => $request->input('deskripsi', $menu->deskripsi),
            'slug' => Str::slug($request->input('name', $menu->slug)),
        ]);

        $menu->save();
        return redirect(route('menu.showMenuBakery', ['slug' => $menu->slug]))->withSuccess("Data berhasil diupdate!");
    }

    public function updateKueTradisional(MenuUpdateRequest $request, string $slug)
    {
        // Validasi data
        $validated = $request->validated();
        $menu = KueTradisional::where('slug', $slug)->first();

        if (!$menu) {
            // Handle the case when the record with the given slug is not found
            return redirect()->back()->withErrors("Menu gagal diupdate :(");
        }

        // Check if kategori not nasi
        if ($request->kategori == "cake") {
            // Create the new record in Menu_Kue Table
            $baru = Menu_Kue::create([
                'name' => $request->input('name', $menu->name),
                'harga_normal' => $request->input('harga_normal', $menu->harga_normal),
                'harga_diskon' => $request->input('harga_diskon', $menu->harga_diskon),
                'deskripsi' => $request->input('deskripsi', $menu->deskripsi),
                'image' => $request->input('image', $menu->image),
                'created_at' => Carbon::now()->timestamp,
                'updated_at' => Carbon::now()->timestamp,
                'slug' => Str::slug($request->input('name', $menu->slug)),
            ]);

            // Kalau pembuatan data di tabel baru berhasil
            if ($baru) {
                // Move the old file
                File::move(public_path('storage/kue_tradisional/' . $menu->image), public_path('storage/menu_kue_loyang/' . $menu->image));
                // Delete the old record file
                $menu->delete();
                return redirect(route('menu.showKueLoyang', ['slug' => $slug]))->withSuccess("Data berhasil diupdate!");
            } else {
                return redirect()->back()->withErrors("Menu gagal diupdate :(");
            }

        } elseif ($request->kategori == "kue_kering") {
            $baru = Menu_Kue_Kering::create([
                'name' => $request->input('name', $menu->name),
                'harga_normal' => $request->input('harga_normal', $menu->harga_normal),
                'harga_diskon' => $request->input('harga_diskon', $menu->harga_diskon),
                'deskripsi' => $request->input('deskripsi', $menu->deskripsi),
                'image' => $request->input('image', $menu->image),
                'created_at' => Carbon::now()->timestamp,
                'updated_at' => Carbon::now()->timestamp,
                'slug' => Str::slug($request->input('name', $menu->slug)),
            ]);
            if ($baru) {
                // Move the old file
                File::move(public_path('storage/kue_tradisional/' . $menu->image), public_path('storage/menu_kue_kering/' . $menu->image));
                // Delete the old record file
                $menu->delete();
                return redirect(route('menu.showKueKering', ["slug" => $slug]))->withSuccess("Data berhasil diupdate!");
            } else {
                return redirect()->back()->withErrors("Menu gagal diupdate :(");
            }
        } elseif ($request->kategori == "nasi") {
            $baru = Menu_Nasi::create([
                'name' => $request->input('name', $menu->name),
                'harga_normal' => $request->input('harga_normal', $menu->harga_normal),
                'harga_diskon' => $request->input('harga_diskon', $menu->harga_diskon),
                'deskripsi' => $request->input('deskripsi', $menu->deskripsi),
                'image' => $request->input('image', $menu->image),
                'created_at' => Carbon::now()->timestamp,
                'updated_at' => Carbon::now()->timestamp,
                'slug' => Str::slug($request->input('name', $menu->slug)),
            ]);
            if ($baru) {
                // Move the old file
                File::move(public_path('storage/kue_tradisional/' . $menu->image), public_path('storage/menu_nasi/' . $menu->image));
                // Delete the old record file
                $menu->delete();
                return redirect(route('menu.showMenuNasi', ["slug" => $slug]))->withSuccess("Data berhasil diupdate!");
            } else {
                return redirect()->back()->withErrors("Menu gagal diupdate :(");
            }
        } elseif ($request->kategori == "bakery") {
            $baru = Bakery::create([
                'name' => $request->input('name', $menu->name),
                'harga_normal' => $request->input('harga_normal', $menu->harga_normal),
                'harga_diskon' => $request->input('harga_diskon', $menu->harga_diskon),
                'deskripsi' => $request->input('deskripsi', $menu->deskripsi),
                'image' => $request->input('image', $menu->image),
                'created_at' => Carbon::now()->timestamp,
                'updated_at' => Carbon::now()->timestamp,
                'slug' => Str::slug($request->input('name', $menu->slug)),
            ]);
            if ($baru) {
                // Move the old file
                File::move(public_path('storage/kue_tradisional/' . $menu->image), public_path('storage/bakery/' . $menu->image));
                // Delete the old record file
                $menu->delete();
                return redirect(route('menu.showMenuBakery', ["slug" => $slug]))->withSuccess("Data berhasil diupdate!");
            } else {
                return redirect()->back()->withErrors("Menu gagal diupdate :(");
            }
        }

        // Handle the image update
        if ($request->hasFile('image')) {
            // Delete the old image (optional)
            if (File::exists(public_path('storage/kue_tradisional/' . $menu->image))) {
                unlink(public_path('storage/kue_tradisional/' . $menu->image));
            }

            // Store and set the new image
            $menu->image = time() . '-' . $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('kue_tradisional', $menu->image);

        }

        // Update only the fields that are provided by the user
        $menu->fill([
            'name' => $request->input('name', $menu->name),
            'harga_normal' => $request->input('harga_normal', $menu->harga_normal),
            'harga_diskon' => $request->input('harga_diskon', $menu->harga_diskon),
            'deskripsi' => $request->input('deskripsi', $menu->deskripsi),
            'slug' => Str::slug($request->input('name', $menu->slug)),
        ]);

        $menu->save();
        return redirect(route('menu.showMenuKueTradisional', ['slug' => $menu->slug]))->withSuccess("Data berhasil diupdate!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function hapusMenuNasi($slug)
    {
        //
        $data = Menu_Nasi::where('slug', $slug)->first();

        if ($data != null) {
            unlink(public_path('storage/menu_nasi/' . $data->image));
            $data->delete();
            return redirect()->route('adminPage')->withSuccess('Data berhasil di hapus');
        } else {
            return redirect()->route('adminPage')->withErrors('Data gagal dihapus :(');
        }

    }

    public function hapusMenuKueLoyang($slug)
    {
        $data = Menu_Kue::where('slug', $slug)->first();

        if ($data != null) {
            unlink(public_path('storage/menu_kue_loyang/' . $data->image));
            $data->delete();
            return redirect()->route('adminPage')->withSuccess('Data berhasil di hapus');
        } else {
            return redirect()->route('adminPage')->withErrors('Data gagal dihapus :(');
        }
    }
    public function hapusMenuKueKering($slug)
    {
        $data = Menu_Kue_Kering::where('slug', $slug)->first();

        if ($data != null) {
            unlink(public_path('storage/menu_kue_kering/' . $data->image));

            $data->delete();
            return redirect()->route('adminPage')->withSuccess('Data berhasil di hapus');
        } else {
            return redirect()->route('adminPage')->withErrors('Data gagal dihapus :(');
        }
    }
    public function hapusMenuBakery($slug)
    {
        $data = Bakery::where('slug', $slug)->first();

        if ($data != null) {
            unlink(public_path('storage/bakery/' . $data->image));

            $data->delete();
            return redirect()->route('adminPage')->withSuccess('Data berhasil di hapus');
        } else {
            return redirect()->route('adminPage')->withErrors('Data gagal dihapus :(');
        }
    }

    public function hapusKueTradisional($slug)
    {
        $data = KueTradisional::where('slug', $slug)->first();

        if ($data != null) {
            File::delete(public_path('storage/kue_tradisional/' . $data->image));

            $data->delete();
            return redirect()->route('adminPage')->withSuccess('Data berhasil di hapus');
        } else {
            return redirect()->route('adminPage')->withErrors('Data gagal dihapus :(');
        }
    }

    /**
     * Display the specified resource.
     */
    public function showKueLoyang(string $slug)
    {
        $data = Menu_Kue::where('slug', $slug)->first();
        if (!$data) {
            redirect()->back()->withErrors("Data tidak ditemukan");
        }
        $tableName = $data->getTable();
        return view('admin.formUbah', compact('data', 'tableName'));
    }
    public function showKueKering(string $slug)
    {
        $data = Menu_Kue_Kering::where('slug', $slug)->first();
        if (!$data) {
            redirect()->back()->withErrors("Data tidak ditemukan");
        }
        $tableName = $data->getTable();
        return view('admin.formUbah', compact('data', 'tableName'));
    }
    public function showMenuNasi(string $slug)
    {
        $data = Menu_Nasi::where('slug', $slug)->first();
        if (!$data) {
            redirect()->back()->withErrors("Data tidak ditemukan");
        }
        $tableName = $data->getTable();
        return view('admin.formUbah', compact('data', 'tableName'));
    }
    public function showMenuBakery(string $slug)
    {
        $data = Bakery::where('slug', $slug)->first();
        if (!$data) {
            redirect()->back()->withErrors("Data tidak ditemukan");
        }
        $tableName = $data->getTable();

        return view('admin.formUbah', compact('data', 'tableName'));
    }
    public function showMenuKueTradisional(string $slug)
    {
        $data = KueTradisional::where('slug', $slug)->first();
        if (!$data) {
            redirect()->back()->withErrors("Data tidak ditemukan");
        }
        $tableName = $data->getTable();
        return view('admin.formUbah', compact('data', 'tableName'));
    }
}
