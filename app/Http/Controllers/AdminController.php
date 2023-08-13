<?php

namespace App\Http\Controllers;

use App\Models\Bahan_Baku;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('admin.index');
    }

    public function showUbahHargaBahan()
    {
        $bahan_baku = Bahan_Baku::all();
        return view("calc.bahan.formUbahBahan", compact('bahan_baku'));
    }

}
