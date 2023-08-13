<?php

namespace App\Http\Controllers;

use App\Models\Bahan_Baku;
use App\Models\Bahan_Kemasan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class kalkulatorController extends Controller
{
    public $hpp;

    public function getHargaBahan($namaBahan)
    {
        return Cache::remember('harga_bahan' . $namaBahan, 10, function () use ($namaBahan) {
            return Bahan_Baku::where('nama_bahan', $namaBahan)->value('harga');
        });
    }
    public function getHargaKemasan($namaBahan)
    {
        return Cache::remember('harga_bahan' . $namaBahan, 10, function () use ($namaBahan) {
            return Bahan_Kemasan::where('nama_bahan', $namaBahan)->value('harga');
        });
    }

    public function buttercake()
    {
        return view('calc.hitung.buttercake');
    }

    public function buttercakeHP(Request $request)
    {
        // Buat session nilai yang diinput user tadi
        $request->session()->flash('input_values', $request->all());

        // Mengalikan semua inputan user dengan harga didalam database
        $harga_butter = $request->butter * $this->getHargaBahan('butter');
        $harga_margarin = $request->margarin * $this->getHargaBahan('margarin');
        $harga_gula_halus = $request->gula_halus * $this->getHargaBahan('gula_halus');
        $harga_tepung_terigu = $request->tepung_terigu * $this->getHargaBahan("tepung_terigu");
        $harga_susu_bubuk = $request->susu_bubuk * $this->getHargaBahan("susu_bubuk");
        $harga_butik_telur = $request->butik_telur * $this->getHargaBahan('butik_telur');

        $harga_coklat_bubuk = $request->coklat_bubuk * $this->getHargaBahan('coklat_bubuk');
        $harga_vanilla = $request->vanilla * $this->getHargaBahan('vanilla');

        $buttercakeHP = ($harga_butter + $harga_margarin + $harga_gula_halus + $harga_tepung_terigu + $harga_susu_bubuk + $harga_butik_telur + $harga_coklat_bubuk + $harga_vanilla);

        $harga_paper = $request->paper * $this->getHargaKemasan('paper_doilies');
        $harga_kardus = $request->kardus * $this->getHargaKemasan('kardus');
        $harga_label = $request->label * $this->getHargaKemasan('label');

        $buttercakeBK = ($harga_kardus + $harga_label + $harga_paper);

        $harga_listrik = $request->listrik;
        $harga_gas = $request->gas;
        $harga_air = $request->air;
        $harga_gaji_karyawan = $request->gaji;
        $harga_perjam = $request->waktu;
        $harga_total_gaji = $harga_gaji_karyawan * $harga_perjam;
        $buttercakeBP = ($harga_listrik + $harga_gas + $harga_air + $harga_gaji_karyawan + $harga_total_gaji);

        // Hitung HPP
        $this->hpp = ($buttercakeBK + $buttercakeBK + $buttercakeHP) / $request->jumlah_pesanan;

        // Hitung harga jual
        $hargaJual = $this->hpp + (($request->margin / 100) * $this->hpp);

        // Simpan nilai $buttercakeHP dalam session
        session(['buttercakeHP' => $buttercakeHP, 'buttercakeBK' => $buttercakeBK, 'buttercakeBP' => $buttercakeBP, 'hpp' => $this->hpp, 'hargaJual' => $hargaJual]);

        return redirect()->back();

    }

    public function kueSusVanilla()
    {
        return view('calc.hitung.kue_sus_vanilla');
    }

    public function kueSusVanillaHP(Request $request)
    {
// Buat session nilai yang diinput user tadi
        $request->session()->flash('input_values', $request->all());

        // (HP)
        // Mengalikan semua inputan user dengan harga didalam database
        $harga_air = $request->air * $this->getHargaBahan('air');
        $harga_margarin = $request->margarin * $this->getHargaBahan('margarin');
        $harga_tepung_terigu = $request->tepung_terigu * $this->getHargaBahan('tepung-terigu');
        $harga_tepung_terigu_pro_tinggi = $request->tepung_terigu_pro_tinggi * $this->getHargaBahan('tepung-terigu-pro-tinggi');
        $harga_gula_pasir = $request->gula_pasir * $this->getHargaBahan('gula-pasir');
        $harga_garam = $request->garam * $this->getHargaBahan('garam');
        $harga_tepung_maezeka = $request->tepung_maezeka * $this->getHargaBahan('tepung-maezeka');
        $harga_susu_cair = $request->susu_cair * $this->getHargaBahan('susu-cair');
        $harga_kuning_telur = $request->kuning_telur * $this->getHargaBahan('kuning_telur');
        $harga_butter = $request->butter * $this->getHargaBahan('butter');
        $harga_vanilla = $request->vanilla * $this->getHargaBahan('vanilla');

        $bahanBaku = $harga_air + $harga_margarin + $harga_tepung_terigu + $harga_tepung_terigu_pro_tinggi + $harga_gula_pasir + $harga_garam + $harga_tepung_maezeka + $harga_susu_cair + $harga_kuning_telur + $harga_butter + $harga_vanilla;

        // (BK)
        $harga_paper_cup = $request->paper_cup * $request->harga_paper_cup;
        $harga_kardus = $request->kardus * $request->harga_kardus;
        $harga_label = $request->label * $request->harga_label;

        $biayaKemasan = $harga_paper_cup + $harga_kardus + $harga_label;

        // (BP)
        $harga_listrik = $request->listrik;
        $harga_gas = $request->gas;
        $harga_air = $request->air;
        $harga_gaji_karyawan = $request->gaji;
        $harga_perjam = $request->waktu;
        $harga_total_gaji = $harga_gaji_karyawan * $harga_perjam;

        $biayaProduksi = ($harga_listrik + $harga_gas + $harga_air + $harga_gaji_karyawan + $harga_total_gaji);
        // menghitung hpp
        $hpp = ($bahanBaku + $biayaKemasan + $biayaProduksi) / $request->jumlah_pesanan;

        // Hitung harga jual
        $hargaJual = $hpp + (($request->margin / 100) * $hpp);

        // Simpan nilai $buttercakeHP dalam session
        session([
            'hargaBahanBaku' => $bahanBaku,
            'biayaKemasan' => $biayaKemasan,
            'biayaProduksi' => $biayaProduksi,
            'hpp' => $hpp,
            'hargaJual' => $hargaJual,
        ]);

        return redirect()->back();
    }

}