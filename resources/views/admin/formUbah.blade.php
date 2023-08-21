@extends('admin.ubahLayouts')
@section('title', 'Ubah Menu')
@section('content')
    <div class="content-wrapper">
        {{-- Main Content --}}
        <section class="content">
            <div class="container-fluid">
                {{-- Title --}}
                <div class="row">
                    <div class="col mt-5">
                        <h2 class="text-center judul-tambah-menu">Form Update Menu</h2>
                    </div>
                </div>
                {{-- Title --}}
                <div class="row mt-2 d-flex  justify-content-center">
                    <div class="col-12 col-md-8 col-lg-8">
                        {{-- Card --}}
                        <div class="card mx-lg-0 mx-3 mx-lg-0 shadow p-3 mb-5 bg-white rounded">
                            <form
                                action="@if ($tableName == 'menu_kue') {{ route('menu.prosesUpdateKueLoyang', ['slug' => $data->slug]) }} 
                                @elseif ($tableName == 'menu_kue_kering')
                                {{ route('menu.prosesUpdateKueKering', ['slug' => $data->slug]) }} 
                                @elseif ($tableName == 'menu_nasi') 
                                {{ route('menu.prosesUpdateMenuNasi', ['slug' => $data->slug]) }} 
                                @elseif ($tableName == 'bakeries')
                                {{ route('menu.prosesUpdateBakery', ['slug' => $data->slug]) }} 
                                @elseif($tableName == 'kue_tradisional')
                                {{ route('menu.prosesKueTradisional', ['slug' => $data->slug]) }} @endif"
                                method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                <div class="row d-lg-flex align-items-center justify-content-center mx-4 mx-lg-0">
                                    @if (session('flash_msg'))
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            <h4 style="color: white">{{ session('flash_msg') }}</h4>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    @endif
                                    @if (session('flash_msg_error'))
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <h4 style="color: white">{{ session('flash_msg_error') }}</h4>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    @endif

                                    {{-- Col --}}
                                    <div class="col-lg-10 mt-4 mb-3 mx-auto">
                                        <input type="text"
                                            class="form-control @error('name')
                                        is-invalid
                                    @enderror"
                                            id="nama_menu" aria-describedby="namaMenuHelp" name="name"
                                            placeholder="Nama menu" required value="{{ $data->name }}">
                                        @error('name')
                                            <div id="validationServer03Feedback" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    {{-- End Col --}}
                                    <div class="col-lg-10 mb-3 mx-auto">
                                        {{-- <label for="Harga" class="form-label">Harga</label> --}}
                                        <input type="number"
                                            class="form-control @error('harga_normal')
                                    is-invalid
                                @enderror"
                                            id="Harga" placeholder="Harga menu (Masukan angka tanpa koma)"
                                            name="harga_normal" required value="{{ $data->harga_normal }}">
                                        @error('harga_normal')
                                            <div id="validationServer03Feedback" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-lg-10 mb-3 mx-auto">
                                        <label for="kategori" class="form-label">Kategori</label>
                                        <div class="form-check">
                                            <input
                                                class="form-check-input @error('kategori')
                                        is-invalid
                                    @enderror"
                                                type="radio" name="kategori" id="kue" value="kue"
                                                @if ($tableName == 'menu_kue') checked @endif required>
                                            <label class="form-check-label" for="kue">
                                                Cake
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input
                                                class="form-check-input @error('kategori')
                                        is-invalid
                                    @enderror"
                                                type="radio" name="kategori" id="kue_tradisional" value="kue_tradisional"
                                                @if ($tableName == 'kue_tradisional') checked @endif required>
                                            <label class="form-check-label" for="kue_tradisional">
                                                Kue Tradisional (Jajanan Pasar)
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="kategori"
                                                value="kue_kering" id="kue_kering"
                                                @if ($tableName == 'menu_kue_kering') checked @endif required>
                                            <label class="form-check-label" for="kue_kering">
                                                Kue Kering
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="kategori" id="nasi"
                                                value="nasi" @if ($tableName == 'menu_nasi') checked @endif required>
                                            <label class="form-check-label" for="nasi">
                                                Nasi
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="kategori" id="bakery"
                                                value="bakery" @if ($tableName == 'bakeries') checked @endif required>
                                            <label class="form-check-label" for="bakery">
                                                Bakery
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-10 mb-3 mx-auto">
                                        {{-- <label for="Harga" class="form-label">Harga</label> --}}
                                        <textarea
                                            class="form-control @error('deskripsi')
                                is-invalid
                            @enderror cols="5"
                                            rows="4" placeholder="Deksripsi Menu" name="deskripsi" required>{{ $data->deskripsi }}</textarea>
                                        @error('deskripsi')
                                            <div id="validationServer03Feedback" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-lg-10 mb-3 mx-auto">
                                        <label for="image" class="form-label">Gambar</label>
                                        <div>
                                            @if ($tableName == 'menu_kue')
                                                <img src="{{ asset("storage/menu_kue_loyang/$data->image") }}"
                                                    class="image-nasi">
                                            @elseif ($tableName == 'menu_kue_kering')
                                                <img src="{{ asset("storage/menu_kue_kering/$data->image") }}"
                                                    class="image-nasi">
                                            @elseif ($tableName == 'menu_nasi')
                                                <img src="{{ asset("storage/menu_nasi/$data->image") }}"
                                                    class="image-nasi">
                                            @endif

                                        </div>
                                        <input type="file" class="form-control" name="image" accept="image/*">
                                        @error('image')
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                <ul>
                                                    @foreach ($errors->get('image') as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                                <button type="button" class="close" data-dismiss="alert"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        @enderror
                                        <div class="col-lg-10 my-4 d-flex justify-content-center mx-auto">
                                            <input class="btn btn-success w-75 btn-block" type="submit" value="Submit">
                                        </div>
                                    </div>
                            </form>
                        </div>
                        {{-- Card end --}}
                    </div>
                </div>
            </div>
        </section>
        {{-- End Content --}}
    </div>
@endsection
