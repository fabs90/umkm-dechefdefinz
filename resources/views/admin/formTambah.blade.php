@extends('admin.tambahLayouts')
@section('title', 'Tambah Menu')
@section('content')
    <div class="content-wrapper">
        {{-- Main Content --}}
        <section class="content">
            <div class="container-fluid">
                {{-- Title --}}
                <div class="row">
                    <div class="col mt-5">
                        <h2 class="text-center judul-tambah-menu">Form Tambah Menu</h2>
                    </div>
                </div>
                {{-- Title --}}
                <div class="row mt-2 d-flex  justify-content-center">
                    <div class="col-12 col-md-8 col-lg-8">
                        {{-- Card --}}
                        <div class="card mx-lg-0 mx-3 mx-lg-0 shadow p-3 mb-5 bg-white rounded">
                            <form action="{{ route('menu.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
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
                                            placeholder="Nama menu" required value="{{ old('name') }}">
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
                                            name="harga_normal" required value="{{ old('harga_normal') }}">
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
                                                type="radio" name="kategori" id="kue_tradisional" value="kue_tradisional"
                                                @if (old('kategori') == 'kue_tradisional') checked @endif required>
                                            <label class="form-check-label" for="kue_tradisional">
                                                Kue Tradisional (Jajanan Pasar)
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input
                                                class="form-check-input @error('kategori')
                                            is-invalid
                                        @enderror"
                                                type="radio" name="kategori" id="kue" value="kue"
                                                @if (old('kategori') == 'kue') checked @endif required>
                                            <label class="form-check-label" for="kue">
                                                Cake
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="kategori"
                                                value="kue_kering" id="kue_kering"
                                                @if (old('kategori') == 'kue_kering') checked @endif required>
                                            <label class="form-check-label" for="kue_kering">
                                                Kue Kering
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="kategori" value="bakery"
                                                id="bakery" @if (old('kategori') == 'bakery') checked @endif required>
                                            <label class="form-check-label" for="bakery">
                                                Bakery
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="kategori" id="nasi"
                                                value="nasi" @if (old('kategori') == 'nasi') checked @endif required>
                                            <label class="form-check-label" for="nasi">
                                                Nasi
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-10 mb-3 mx-auto">
                                        {{-- <label for="Harga" class="form-label">Harga</label> --}}
                                        <textarea
                                            class="form-control @error('deskripsi')
                                    is-invalid
                                @enderror cols="5"
                                            rows="4" placeholder="Deksripsi Menu" name="deskripsi" required>{{ old('deskripsi') }}</textarea>
                                        @error('deskripsi')
                                            <div id="validationServer03Feedback" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-lg-10 mb-3 mx-auto">
                                        <label for="image" class="form-label">Gambar</label>
                                        <input type="file" class="form-control" name="image" required
                                            accept="image/*">
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
