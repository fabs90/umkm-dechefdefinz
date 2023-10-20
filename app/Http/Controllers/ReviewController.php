<?php

namespace App\Http\Controllers;

use App\Models\Promo;
use App\Models\Bakery;
use App\Models\Menu_Kue;
use App\Models\Menu_Nasi;
use App\Models\ReviewRating;
use Illuminate\Http\Request;
use App\Models\KueTradisional;
use App\Models\Menu_Kue_Kering;
use App\Models\UserImageReview;
use App\Http\Requests\UserReviewRequest;

class ReviewController extends Controller
{
    //
    public function reviewController(UserReviewRequest $request)
    {
        $validated = $request->validated();

        $insertData = ReviewRating::create($validated);
        if ($insertData) {
            // Data insert successful
            return redirect()->back()->with('flash_msg_success', 'Your review has been submitted Successfully,');

        } else {
            return redirect()->back()->with('flash_msg_error', 'Your review has been submitted Unsuccessfully,');
        }

    }

    public function showReview()
    {
        $testimoni = UserImageReview::all();
        $datas = ReviewRating::all();
        $bakery = Bakery::paginate(3);
        $kueTradisional = KueTradisional::paginate(3);
        $kueKering = Menu_Kue_Kering::paginate(3);
        $nasi = Menu_Nasi::paginate(3);
        $cake = Menu_Kue::paginate(3);
        $promo = Promo::all();

        return view('uji', compact('datas', 'testimoni', 'bakery', 'kueTradisional', 'kueKering', 'nasi', 'cake', 'promo'));
    }

    // Show all review in admin
    public function listReview()
    {
        $datas = ReviewRating::all();
        $testimoni = UserImageReview::all();
        return view('admin.review.listReview', compact('datas', 'testimoni'));
    }

    // Function to delete review
    public function deleteReview($id)
    {
        $user = ReviewRating::find($id);
        $user->delete();
        if ($user) {
            return redirect()->back()->withSuccess("Data berhasil dihapus!");
        } else {
            return redirect()->back()->withErrors("Data tidak ditemukan! (coba refresh halaman dan ulangi)");
        }
    }

    // Function to show form image review
    public function showFormImageReview()
    {
        return view('admin.review.formTambahReviewPhoto');
    }

// Function to add image review in landing page
    public function storeImageReview(Request $request)
    {
        $validated = $request->validate([

            'name' => ['required', 'min:3', 'max:30'],
            'no_telp' => ['required', 'numeric', 'min:6'],
            'image' => ['required', 'mimes:png,jpg,jpeg', 'max:3072'],
        ],
            [
                'name.required' => 'Sialakan isi kolom nama',
                'name.min' => 'Panjang minimal nama adalah 3 karater',
                'no_telp.required' => 'Silakan isi kolom No.Telepon!',
                'no_telp.numeric' => 'Kolom No.Telepon harus angka!',
                'no_telp.min' => 'Minimal No.Telepon adalah 6 angka',
                'image.mimes' => 'Hanya bisa file img (png,jpg,jpeg)',
                'image.max' => 'Ukuran maksimal foto adalah 3mb',
            ]);

        if ($request->hasFile('image') && $validated) {
            // Ambil nama file
            $fileName = time() . $request->image->getClientOriginalname();
            // Masukan data ke database
            UserImageReview::create([
                'name' => $request->name,
                'no_telp' => $request->no_telp,
                'image' => $fileName,
            ]);

            // Pindahkan hardcopy kedalam folder image_review di storage
            $request->image->storeAs('testimoni', $fileName);
            return redirect()->back()->withSuccess('Testimoni berhasil ditambah!');

        } else {
            return redirect()->back()->withErrors('Gagal menambahkan foto, terjadi error!');
        }

    }

    // Delete image testimoni
    public function deleteImageReview($id)
    {
        $user = UserImageReview::find($id);
        unlink(storage_path('app/public/' . $user->image));
        $user->delete();
        if ($user) {
            return redirect()->back()->withSuccess("Review berhasil dihapus!");
        } else {
            return redirect()->back()->withErrors("Data tidak ditemukan! (coba refresh halaman dan ulangi)");
        }
    }

    public function showMenuKue()
    {
        $datas = Menu_Kue::all();
        return view('landing.menukue', compact('datas'));
    }

    public function showMenuKueKering()
    {
        $datas = Menu_Kue_Kering::all();
        return view('landing.menukuekering', compact('datas'));
    }

    public function showMenuNasi()
    {
        $datas = Menu_Nasi::all();
        return view('landing.menunasi', compact('datas'));
    }

    public function showKueTradisional()
    {
        $datas = KueTradisional::all();
        return view('landing.menukuetradisional', compact('datas'));
    }

    public function showBakery()
    {
        $datas = Bakery::all();
        return view('landing.menubakery', compact('datas'));
    }
}