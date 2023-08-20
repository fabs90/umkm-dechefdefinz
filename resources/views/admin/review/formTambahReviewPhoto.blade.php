@extends('admin.review.reviewLayouts')
@section('title', 'Tambah Review')
@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col mt-5">
                        <h2 class="text-center judul-tambah-menu"> Tambah Gambar Testimoni </h2>
                    </div>
                </div>

                <div class="row mt-2 d-flex justify-content-center">
                    <div class="col-12 col-md-8 col-lg-8">
                        <div class="card shadow py-3 mb-5 bg-white rounded mx-auto">
                            <form action="{{ route('imageReview.add') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row d-lg-flex align-items-center justify-content-center mx-auto">
                                    {{-- Col --}}
                                    <div class="col-lg-10 mt-4 mb-3 px-5">
                                        <input type="text" name="name"
                                            class="form-control @error('name') is-invalid @enderror" id="name"
                                            aria-describedby="nameHelp" placeholder="Nama" required autocomplete="off"
                                            value="{{ old('name') }}">
                                        @error('name')
                                            <div id="validationServer03Feedback" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    {{-- Col --}}
                                    <div class="col-lg-10 mb-3 px-5">
                                        <input type="number" class="form-control @error('no_telp') is-invalid @enderror"
                                            id="no_telp" aria-describedby="nama_bahanHelp" name="no_telp"
                                            placeholder="Nomor Telepon" required value="{{ old('no_telp') }}">
                                        @error('no_telp')
                                            <div id="validationServer03Feedback" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    {{-- Col --}}
                                    <div class="col-lg-10 mb-3 px-5">
                                        <input type="file" class="form-control @error('image') is-invalid @enderror"
                                            id="image" aria-describedby="nama_bahanHelp" name="image"
                                            placeholder="No Telepon" required value="{{ old('image') }}">
                                        @error('image')
                                            <div id="validationServer03Feedback" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    {{-- Button --}}
                                    <div class="col-lg-10  d-flex justify-content-center">
                                        <input class="btn btn-success w-50 btn-block" type="submit" value="Tambah gambar">
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
