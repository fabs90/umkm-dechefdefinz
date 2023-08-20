<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserReviewRequest;
use App\Models\ReviewRating;
use App\Models\UserImageReview;
use Illuminate\Http\Request;

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

        return view('uji', compact('datas', 'testimoni'));
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
        $user->delete();
        if ($user) {
            return redirect()->back()->withSuccess("Data berhasil dihapus!");
        } else {
            return redirect()->back()->withErrors("Data tidak ditemukan! (coba refresh halaman dan ulangi)");
        }
    }

    public function showMenuKue()
    {
        return view('landing.menukue');
    }

    public function showMenuKueKering()
    {
        return view('landing.menukuekering');
    }

    public function showMenuNasi()
    {
        return view('landing.menuNasi');
    }

    public function showKueTradisional()
    {
        return view('landing.menukuetradisional');
    }
}
