@extends('calc.bahan.tambahBahanLayouts')
@section('title', 'Tambah Bahan')
@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col mt-5">
                        <h2 class="text-center judul-tambah-menu">Tambah Bahan Baku</h2>
                    </div>
                </div>

                <div class="row mt-2 d-flex justify-content-center">
                    <div class="col-12 col-md-8 col-lg-8">
                        <div class="card shadow p-3 mb-5 bg-white rounded mx-auto">
                            <form action="{{ route('create-bahan.store') }}" method="post">
                                @csrf
                                <div class="row d-lg-flex align-items-center justify-content-center mx-4 mx-lg-0">
                                    {{-- Col --}}
                                    <div class="col-lg-10 mt-4 mb-3 mx-auto">
                                        <input type="text" name="nama_bahan"
                                            class="form-control @error('nama_bahan') is-invalid @enderror" id="nama_bahan"
                                            aria-describedby="nama_bahanHelp" placeholder="Nama bahan" required
                                            autocomplete="off" value="{{ old('nama_bahan') }}">
                                        @error('nama_bahan')
                                            <div id="validationServer03Feedback" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    {{-- Col --}}
                                    <div class="col-lg-10 mb-3 mx-auto">
                                        <input type="number"
                                            class="form-control @error('harga_bahan') is-invalid @enderror" id="harga_bahan"
                                            aria-describedby="nama_bahanHelp" name="harga_bahan" placeholder="Harga bahan"
                                            required value="{{ old('harga_bahan') }}" step="any" min="0">
                                        @error('harga_bahan')
                                            <div id="validationServer03Feedback" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    {{-- Col satuan --}}
                                    <div class="col-lg-10 mb-3 mx-auto">
                                        <label for="kategori" class="form-label">Per-Satuan</label>
                                        <div class="form-check">
                                            <input
                                                class="form-check-input @error('kategori')
                                            is-invalid
                                        @enderror"
                                                type="radio" name="kategori" id="gram" value="gram"
                                                @if (old('kategori') == 'gram') checked @endif required>
                                            <label class="form-check-label" for="gram">
                                                1 Gram
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="kategori" value="sdm"
                                                id="sdm" @if (old('kategori') == 'sdm') checked @endif required>
                                            <label class="form-check-label" for="sdm">
                                                1 SDM (sendok makan)
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="kategori" id="sdt"
                                                value="sdt" @if (old('kategori') == 'sdt') checked @endif required>
                                            <label class="form-check-label" for="sdt">
                                                1 SDT (sendok teh)
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="kategori" id="telur"
                                                value="telur" @if (old('kategori') == 'telur') checked @endif required>
                                            <label class="form-check-label" for="telur">
                                                Telur (1 telur)
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="kategori" id="ml"
                                                value="ml" @if (old('kategori') == 'ml') checked @endif required>
                                            <label class="form-check-label" for="ml">
                                                1 ml (mililiter)
                                            </label>
                                        </div>
                                    </div>
                                    {{-- End Col Satuan --}}
                                    {{-- Button --}}
                                    <div class="col-lg-10 my-4 d-flex justify-content-center mx-auto">
                                        <input class="btn btn-success w-75 btn-block" type="submit" value="Tambah bahan!">
                                    </div>
                                    <div class="col-lg-10 my-2">
                                        <h6>Catatan:</h6>
                                        <ul>
                                            <li>10 gr = 1 SDM </li>
                                            <li>3-5 gr = 1 SDT </li>
                                        </ul>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
