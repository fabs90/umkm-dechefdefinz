<?php

namespace App\Http\Controllers;

use App\Http\Requests\MenuBahanRequest;
use App\Models\BahanMenuBakery;
use App\Models\BahanMenuCake;
use App\Models\BahanMenuKueTradisional;
use App\Models\BahanMenuNasi;
use App\Models\Bahan_Baku;
use App\Models\Bakery;
use App\Models\KueTradisional;
use App\Models\Menu_Kue;
use App\Models\Menu_Kue_Kering;
use App\Models\Menu_Nasi;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;

class MenuBahanController extends Controller
{
    public function MenuBahanKue()
    {

        $jenisKue = DB::table('jenis_kue')->get();

        return view('admin.menu_bahan.menuBahan', compact('jenisKue'));
    }

    public function findBahan(String $jenis)
    {
        $jenisKue = DB::table('jenis_kue')->get();
        $bahanBaku = Bahan_Baku::all();

        switch ($jenis) {
            case 'kue-kering':
                $kueKering = Menu_Kue_Kering::all();
                return view('admin.menu_bahan.menuBahanKueKering', compact('kueKering', 'jenisKue', 'bahanBaku', 'jenis'));
            case 'cake':
                $cake = Menu_Kue::all();
                return view('admin.menu_bahan.menuBahanCake', compact('cake', 'jenisKue', 'bahanBaku', 'jenis'));
            case 'nasi':
                $nasi = Menu_Nasi::all();
                return view('admin.menu_bahan.menuBahanNasi', compact('nasi', 'jenisKue', 'bahanBaku', 'jenis'));
            case 'bakery':
                $bakery = Bakery::all();
                return view('admin.menu_bahan.menuBahanBakery', compact('bakery', 'jenisKue', 'bahanBaku', 'jenis'));
            case 'kue-tradisional':
                $kueTradisional = KueTradisional::all();
                return view('admin.menu_bahan.menuBahanKueTradisional', compact('kueTradisional', 'jenisKue', 'bahanBaku', 'jenis'));
            default:
                return view('admin.menu_bahan.menuBahan', compact('jenisKue', 'jenisKue', 'bahanBaku', 'jenis'));
        }

    }

    public function postBahanKueKering(MenuBahanRequest $request)
    {
        $validated = $request->validated();

        // Dapetin data menu dari dropdown
        $menu = Menu_Kue_Kering::findOrFail($request->input('select_menu'));

        if (!$menu) {
            return redirect()->back()->withErrors("Data tidak ditemukan");
        }

        if (Menu_Kue_Kering::where('id_bahan', $request->bahans)->count() > 0) {
            return redirect()->back()->withErrors('Data sudah terpakai, silakan lakukan pada menu update');
        }

        // Ambil semua bahan dari checkbox
        $bahans = $request->input('bahans');

        // Loop dan masukan id_bahan ke sebuah array
        $dataToInsert = [];
        foreach ($bahans as $bahan) {
            $dataToInsert[] = [
                'id_menu' => $menu->id,
                'id_bahan' => $bahan,
            ];
        }

        // Insert bahan & id_menu ke dalam database
        $menu->BahanMenuKueKering()->insert($dataToInsert);

        return redirect()->back()->withSuccess('Berhasil Input Bahan Menu');

        /*
    ALTERNATIVE :
    foreach ($bahans as $bahan) {
    $new_bahan = $menu->BahanMenuKueKering()->create([
    'id_menu' => $menu->id,
    'id_bahan' => $bahan,
    ]);
    }
     */
    }

    public function postBahanCake(MenuBahanRequest $request)
    {
        $validated = $request->validated();

        $menu = Menu_Kue::findOrFail($request->input('select_menu'));

        if (!$menu) {
            return redirect()->back()->withErrors("Data tidak ditemukan");
        }

        if (BahanMenuCake::where('id_bahan', $request->bahans)->count() > 0) {
            return redirect()->back()->withErrors('Data sudah terpakai, silakan lakukan pada menu update');
        }
        // Ambil semua bahan dari checkbox
        $bahans = $request->input('bahans');

        // Loop dan masukan id_bahan ke sebuah array
        $dataToInsert = [];
        foreach ($bahans as $bahan) {
            $dataToInsert[] = [
                'id_menu' => $menu->id,
                'id_bahan' => $bahan,
            ];
        }
        // Insert bahan & id_menu ke dalam database
        $menu->BahanMenuCake()->insert($dataToInsert);

        return redirect()->back()->withSuccess('Berhasil Input Bahan Menu');
    }

    public function postBahanKueTradisional(MenuBahanRequest $request)
    {
        $validated = $request->validated();

        $menu = KueTradisional::findOrFail($request->input('select_menu'));

        if (!$menu) {
            return redirect()->back()->withErrors("Data tidak ditemukan");
        }

        if (BahanMenuKueTradisional::where('id_menu', $request->bahans)->count() > 0) {
            return redirect()->back()->withErrors('Data sudah terpakai, silakan lakukan pada menu update');
        }

        // Ambil semua bahan dari checkbox
        $bahans = $request->input('bahans');

        // Loop dan masukan id_bahan ke sebuah array
        $dataToInsert = [];
        foreach ($bahans as $bahan) {
            $dataToInsert[] = [
                'id_menu' => $menu->id,
                'id_bahan' => $bahan,
            ];
        }
        // Insert bahan & id_menu ke dalam database
        $menu->BahanMenuKueTradisional()->insert($dataToInsert);

        return redirect()->back()->withSuccess('Berhasil Input Bahan Menu');
    }

    public function postBahanBakery(MenuBahanRequest $request)
    {
        $validated = $request->validated();

        $menu = Bakery::findOrFail($request->input('select_menu'));

        if (!$menu) {
            return redirect()->back()->withErrors("Data tidak ditemukan");
        }

        if (BahanMenuBakery::where('id_menu', $request->bahans)->count() > 0) {
            return redirect()->back()->withErrors('Data sudah terpakai, silakan lakukan pada menu update');
        }

        // Ambil semua bahan dari checkbox
        $bahans = $request->input('bahans');

        // Loop dan masukan id_bahan ke sebuah array
        $dataToInsert = [];
        foreach ($bahans as $bahan) {
            $dataToInsert[] = [
                'id_menu' => $menu->id,
                'id_bahan' => $bahan,
            ];
        }
        // Insert bahan & id_menu ke dalam database
        $menu->BahanMenuBakery()->insert($dataToInsert);

        return redirect()->back()->withSuccess('Berhasil Input Bahan Menu');
    }
    public function postBahanNasi(MenuBahanRequest $request)
    {
        $validated = $request->validated();

        $menu = Menu_Nasi::findOrFail($request->input('select_menu'));

        if (!$menu) {
            return redirect()->back()->withErrors("Data tidak ditemukan");
        }

        if (BahanMenuNasi::where('id_menu', $request->bahans)->count() > 0) {
            return redirect()->back()->withErrors('Data sudah terpakai, silakan lakukan pada menu update');
        }

        // Ambil semua bahan dari checkbox
        $bahans = $request->input('bahans');

        // Loop dan masukan id_bahan ke sebuah array
        $dataToInsert = [];
        foreach ($bahans as $bahan) {
            $dataToInsert[] = [
                'id_menu' => $menu->id,
                'id_bahan' => $bahan,
            ];
        }
        // Insert bahan & id_menu ke dalam database
        $menu->BahanMenuNasi()->insert($dataToInsert);

        return redirect()->back()->withSuccess('Berhasil Input Bahan Menu');
    }

    public function editPage()
    {
        $jenisKue = DB::table('jenis_kue')->get();

        return view('admin.menu_bahan.update.showMenuBahanEdit', compact('jenisKue'));
    }

    public function editJenis(String $jenis)
    {
        $jenisKue = DB::table('jenis_kue')->get();
        $bahanBaku = Bahan_Baku::all();

        switch ($jenisKue) {
            case 'kue-kering':
                $kueKering = Menu_Kue_Kering::all();
                return view('admin.menu_bahan.update.showMenuBahanKueKering', compact('kueKering', 'jenisKue', 'bahanBaku', 'jenis'));
            case 'cake':
                $cake = Menu_Kue::all();
                return view('admin.menu_bahan.update.showMenuBahanCake', compact('cake', 'jenisKue', 'bahanBaku', 'jenis'));
            case 'nasi':
                $nasi = Menu_Nasi::all();
                return view('admin.menu_bahan.update.showMenuBahanNasi', compact('nasi', 'jenisKue', 'bahanBaku', 'jenis'));
            case 'bakery':
                $bakery = Bakery::all();
                return view('admin.menu_bahan.update.showMenuBahanBakery', compact('bakery', 'jenisKue', 'bahanBaku', 'jenis'));
            case 'kue-tradisional':
                $kueTradisional = KueTradisional::all();
                return view('admin.menu_bahan.update.showMenuBahanKueTradisional', compact('kueTradisional', 'jenisKue', 'bahanBaku', 'jenis'));
            default:
                return view('admin.menu_bahan.menuBahan', compact('jenisKue', 'bahanBaku', 'jenis'));
        }
    }

    public function jenisBakery(Request $request)
    {
        $menu = Bakery::findOrFail($request->input('select_menu'));

        if (!$menu) {
            return redirect()->back()->withErrors("Data tidak ditemukan");
        }

    }

}
