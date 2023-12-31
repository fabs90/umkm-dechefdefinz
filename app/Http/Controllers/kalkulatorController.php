<?php

namespace App\Http\Controllers;

use App\Models\Bahan_Baku;
use App\Models\Bahan_Kemasan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;

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

    public function show()
    {
        return view('calc.jenis-adonan');
    }

    public function buttercake()
    {
        return view('calc.hitung.buttercake');
    }

    public function buttercakeHP(Request $request)
    {
        // Buat session nilai yang diinput user tadi
        $request->session()->flash('input_values', $request->all());

        $bahanBaku = [
            'harga_butter' => $request->butter * $this->getHargaBahan('butter'),
            'harga_margarin' => $request->margarin * $this->getHargaBahan('margarin'),
            'harga_gula_halus' => $request->gula_halus * $this->getHargaBahan('gula_halus'),
            'harga_tepung_terigu' => $request->tepung_terigu * $this->getHargaBahan("tepung_terigu"),
            'harga_susu_bubuk' => $request->susu_bubuk * $this->getHargaBahan("susu_bubuk"),
            'harga_butik_telur' => $request->butik_telur * $this->getHargaBahan('butik_telur'),
            'harga_coklat_bubuk' => $request->coklat_bubuk * $this->getHargaBahan('coklat_bubuk'),
            'harga_vanilla' => $request->vanilla * $this->getHargaBahan('vanilla'),
        ];

        $bahanBaku = array_sum($bahanBaku);

        $biayaKemasan = [
            'harga_paper' => $request->paper * $request->harga_paper,
            'harga_kardus' => $request->kardus * $request->harga_kardus,
            'harga_label' => $request->label * $request->harga_label,
        ];

        $biayaKemasan = array_sum($biayaKemasan);

// Menghitung biaya produksi
        $hargaGajiKaryawan = $request->gaji;
        $hargaPerjam = $request->waktu;

        $biayaProduksi = [
            'harga_listrik' => $request->listrik,
            'harga_gas' => $request->gas,
            'harga_air_rumah' => $request->air_rumah,
            'harga_total_gaji' => $hargaGajiKaryawan * $hargaPerjam,
        ];

        $biayaProduksi = array_sum($biayaProduksi);

        // Menghitung HPP
        $biayaHPP = ($bahanBaku + $biayaKemasan + $biayaProduksi) / $request->jumlah_pesanan;

        // Hitung harga jual
        $hargaJual = $biayaHPP + (($request->margin / 100) * $biayaHPP);

        // Simpan nilai  kedalam session
        session([
            'hargaBahanBaku' => $bahanBaku,
            'biayaKemasan' => $biayaKemasan,
            'biayaProduksi' => $biayaProduksi,
            'hpp' => $biayaHPP,
            'hargaJual' => $hargaJual,
        ]);

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

        // (Bahan Baku)
        $bahanBaku = [
            'harga_air' => $request->air * $this->getHargaBahan('air'),
            'harga_margarin' => $request->margarin * $this->getHargaBahan('margarin'),
            'harga_tepung_terigu' => $request->tepung_terigu * $this->getHargaBahan('tepung-terigu'),
            'harga_tepung_terigu_pro_tinggi' => $request->tepung_terigu_pro_tinggi * $this->getHargaBahan('tepung-terigu-pro-tinggi'),
            'harga_gula_pasir' => $request->gula_pasir * $this->getHargaBahan('gula-pasir'),
            'harga_garam' => $request->garam * $this->getHargaBahan('garam'),
            'harga_tepung_maezena' => $request->tepung_maezena * $this->getHargaBahan('tepung-maezena'),
            'harga_susu_cair' => $request->susu_cair * $this->getHargaBahan('susu-cair'),
            'harga_kuning_telur' => $request->kuning_telur * $this->getHargaBahan('kuning-telur'),
            'harga_butter' => $request->butter * $this->getHargaBahan('butter'),
            'harga_vanilla' => $request->vanilla * $this->getHargaBahan('vanilla'),
        ];

        $totalBahanBaku = array_sum($bahanBaku);
        // (Biaya Kemasan)
        $biayaKemasan = [
            'harga_paper_cup' => $request->paper_cup * $request->harga_paper_cup,
            'harga_kardus' => $request->kardus * $request->harga_kardus,
            'harga_label' => $request->label * $request->harga_label,
        ];

        $biayaKemasan = array_sum($biayaKemasan);

        // (Biaya Produksi)
        $hargaGajiKaryawan = $request->gaji;
        $hargaPerjam = $request->waktu;

        $biayaProduksi = [
            'harga_listrik' => $request->listrik,
            'harga_gas' => $request->gas,
            'harga_air_rumah' => $request->air_rumah,
            'harga_total_gaji' => $hargaGajiKaryawan * $hargaPerjam,
        ];

        $biayaProduksi = array_sum($biayaProduksi);
        // menghitung hpp
        $biayaHPP = ($totalBahanBaku + $biayaKemasan + $biayaProduksi) / $request->jumlah_pesanan;

        // Hitung harga jual
        $hargaJual = $biayaHPP + (($request->margin / 100) * $biayaHPP);

        // Simpan nilai $buttercakeHP dalam session
        session([
            'hargaBahanBaku' => $totalBahanBaku,
            'biayaKemasan' => $biayaKemasan,
            'biayaProduksi' => $biayaProduksi,
            'hpp' => $biayaHPP,
            'hargaJual' => $hargaJual,
        ]);

        return redirect()->back();
    }

    public function saguKeju()
    {
        return view('calc.hitung.sagu-keju');
    }

    public function saguKejuHP(Request $request)
    {
        // Buat session nilai yang diinput user tadi
        $request->session()->flash('input_values', $request->all());

        // (HP)
        $bahanBaku = [
            'harga_tepung_terigu' => $request->tepung_sagu * $this->getHargaBahan('tepung-sagu'),
            'harga_gula_halus' => $request->gula_halus * $this->getHargaBahan('gula_halus'),
            'harga_keju_parut' => $request->keju_parut * $this->getHargaBahan('keju_parut'),
            'harga_kuning_telur' => $request->kuning_telur * $this->getHargaBahan('kuning_telur'),
            'harga_margarin' => $request->margarin * $this->getHargaBahan('margarin'),
            'harga_butter' => $request->butter * $this->getHargaBahan('butter'),
            'harga_santan' => $request->santan * $this->getHargaBahan('santan'),
            'harga_keju_toping' => $request->harga_keju_toping,

        ];

        $bahanBaku = array_sum($bahanBaku);

        // (BK)
        $biayaKemasan = [
            'harga_toples' => $request->toples * $request->harga_toples,
            'harga_paper_doley' => $request->paper_doley * $request->harga_paper_doley,
            'harga_solatip' => $request->solatip * $request->harga_solatip,
            'harga_stiker' => $request->stiker * $request->harga_stiker,
        ];

        $biayaKemasan = array_sum($biayaKemasan);

        // (BP)
        $hargaGajiKaryawan = $request->gaji;
        $hargaPerjam = $request->waktu;

        $biayaProduksi = [
            'harga_listrik' => $request->listrik,
            'harga_gas' => $request->gas,
            'harga_air_rumah' => $request->air_rumah,
            'harga_total_gaji' => $hargaGajiKaryawan * $hargaPerjam,
        ];

        $biayaProduksi = array_sum($biayaProduksi);
        // Menghitung HPP
        $biayaHPP = ($bahanBaku + $biayaKemasan + $biayaProduksi) / $request->jumlah_pesanan;

        // Hitung harga jual
        $hargaJual = $biayaHPP + (($request->margin / 100) * $biayaHPP);

        // Simpan nilai kedalam session
        session([
            'hargaBahanBaku' => $bahanBaku,
            'biayaKemasan' => $biayaKemasan,
            'biayaProduksi' => $biayaProduksi,
            'hpp' => $biayaHPP,
            'hargaJual' => $hargaJual,
        ]);

        return redirect()->back();
    }

    public function nastar()
    {
        return view('calc.hitung.nastar');
    }

    public function nastarHP(Request $request)
    {
        // Buat session nilai yang diinput user tadi
        $request->session()->flash('input_values', $request->all());

        // (HP)
        $bahanBaku = [
            'butter' => $request->butter * $this->getHargaBahan('butter'),
            'margarin' => $request->margarin * $this->getHargaBahan('margarin'),
            'telur' => $request->telur * $this->getHargaBahan('telur'),
            'gula_halus' => $request->gula_halus * $this->getHargaBahan('gula_halus'),
            'vanilla' => $request->vanilla * $this->getHargaBahan('vanilla'),
            'susu-bubuk' => $request->susu_bubuk * $this->getHargaBahan('susu-bubuk-sachet'),
            'tepung-terigu' => $request->tepung_terigu * $this->getHargaBahan('tepung-terigu'),
            'nanas' => $request->nanas * $this->getHargaBahan('nanas'),
            'gula-pasir' => $request->gula_pasir * $this->getHargaBahan('gula-pasir'),
            'garam' => $request->garam * $this->getHargaBahan('gula-pasir'),
            'batang-kayu-manis' => $request->batang_kayu_manis * $this->getHargaBahan('batang-kayu-manis'),
            'daun-pandan' => $request->daun_pandan * $this->getHargaBahan('daun-pandan'),
            'kuning-telur' => $request->kuning_telur * $this->getHargaBahan('kuning-telur'),
            'susu-cair' => $request->susu_cair * $this->getHargaBahan('susu-cair'),
            'minyak-sayur' => $request->minyak_sayur * $this->getHargaBahan('minyak-sayur'),
            'pasta-vanilla' => $request->pasta_vanilla * $this->getHargaBahan('pasta-vanilla'),
            'madu' => $request->madu * $this->getHargaBahan('madu'),

        ];

        $bahanBaku = array_sum($bahanBaku);

        // (BK)
        $biayaKemasan = [
            'harga_toples' => $request->toples * $request->harga_toples,
            'harga_paper_doley' => $request->paper_doley * $request->harga_paper_doley,
            'harga_solatip' => $request->solatip * $request->harga_solatip,
            'harga_stiker' => $request->stiker * $request->harga_stiker,
        ];

        $biayaKemasan = array_sum($biayaKemasan);

        // (BP)
        $hargaGajiKaryawan = $request->gaji;
        $hargaPerjam = $request->waktu;

        $biayaProduksi = [
            'harga_listrik' => $request->listrik,
            'harga_gas' => $request->gas,
            'harga_air_rumah' => $request->air_rumah,
            'harga_total_gaji' => $request->jumlah_karyawan * ($hargaGajiKaryawan * $hargaPerjam),
        ];

        $biayaProduksi = array_sum($biayaProduksi);
        // Menghitung HPP
        $biayaHPP = ($bahanBaku + $biayaKemasan + $biayaProduksi) / $request->jumlah_pesanan;

        // Hitung harga jual
        $hargaJual = $biayaHPP + (($request->margin / 100) * $biayaHPP);

        // Simpan nilai kedalam session
        session([
            'hargaBahanBaku' => $bahanBaku,
            'biayaKemasan' => $biayaKemasan,
            'biayaProduksi' => $biayaProduksi,
            'hpp' => $biayaHPP,
            'hargaJual' => $hargaJual,
        ]);

        return redirect()->back();
    }

    public function boluGulungKeju()
    {
        return view('calc.hitung.boluGulungKeju');
    }

    public function boluGulungKejuHP(Request $request)
    {
        // Buat session nilai yang diinput user tadi
        $request->session()->flash('input_values', $request->all());

        // Bahan Baku
        $bahanBaku = [
            'telur' => $request->telur * $this->getHargaBahan('telur'),
            'gulaPasir' => $request->gula_pasir * $this->getHargaBahan('gula-pasir'),
            'tepungTerigu' => $request->tepung_terigu * $this->getHargaBahan('tepung-terigu'),
            'tepung-maezena' => $request->tepung_maezena * $this->getHargaBahan('tepung-maezena'),
            'susuBubuk' => $request->susu_bubuk * $this->getHargaBahan('susu-bubuk'),
            'cream' => $request->cream,
            'keju' => $request->keju,
        ];

        $bahanBaku = array_sum($bahanBaku);

        // (BK)
        $biayaKemasan = [
            'harga_kardus' => $request->kardus * $request->harga_kardus,
            'harga_paper_doley' => $request->paper_doley * $request->harga_paper_doley,
            'harga_stiker' => $request->stiker * $request->harga_stiker,
        ];

        $biayaKemasan = array_sum($biayaKemasan);

        // (BP)
        $hargaGajiKaryawan = $request->gaji;
        $hargaPerjam = $request->waktu;

        $biayaProduksi = [
            'harga_listrik' => $request->listrik,
            'harga_gas' => $request->gas,
            'harga_air' => $request->air, 'harga_air_rumah' => $request->air_rumah,
            'harga_total_gaji' => $request->jumlah_karyawan * ($hargaGajiKaryawan * $hargaPerjam),
        ];

        $biayaProduksi = array_sum($biayaProduksi);
        // Menghitung HPP
        $biayaHPP = ($bahanBaku + $biayaKemasan + $biayaProduksi) / $request->jumlah_pesanan;

        // Hitung harga jual
        $hargaJual = $biayaHPP + (($request->margin / 100) * $biayaHPP);

        // Simpan nilai kedalam session
        session([
            'hargaBahanBaku' => $bahanBaku,
            'biayaKemasan' => $biayaKemasan,
            'biayaProduksi' => $biayaProduksi,
            'hpp' => $biayaHPP,
            'hargaJual' => $hargaJual,
        ]);

        return redirect()->back();
    }

}
