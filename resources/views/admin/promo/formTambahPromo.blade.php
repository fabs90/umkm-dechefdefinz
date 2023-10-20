@extends('admin.promo.promoLayouts')
@section('title', 'Tambah Promo')
@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col mt-5">
                        <h2 class="text-center judul-tambah-menu">Tambah Promo</h2>
                    </div>
                </div>

                <div class="row mt-2 d-flex justify-content-center">
                    <div class="col-12 col-md-8 col-lg-8">
                        <div class="card shadow py-3 mb-5 bg-white rounded mx-auto">
                            <form action="{{ route('promo.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row d-lg-flex align-items-center justify-content-center mx-auto">
                                    {{-- Col --}}
                                    <div class="col-lg-10 mt-4 mb-3 px-5">
                                        <input type="text" name="nama"
                                            class="form-control @error('nama') is-invalid @enderror" id="nama"
                                            aria-describedby="namaHelp" placeholder="Nama Menu" required autocomplete="off"
                                            value="{{ old('nama') }}">
                                        @error('nama')
                                            <div id="validationServer03Feedback" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    {{-- Col --}}
                                    <div class="col-lg-10 mb-3 px-5">
                                        <input type="number" name="harga"
                                            class="form-control @error('harga') is-invalid @enderror" id="harga"
                                            aria-describedby="hargaHelp" placeholder="Harga Promo" required
                                            autocomplete="off" value="{{ old('harga') }}">
                                        @error('harga')
                                            <div id="validationServer03Feedback" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    {{-- Col --}}
                                    <div class="col-lg-10 mb-3 px-5">
                                        <textarea
                                            class="form-control @error('deskripsi')
                                    is-invalid
                                @enderror cols="5"
                                            rows="4" placeholder="Deksripsi Promo" name="deskripsi" required>{{ old('deskripsi') }}</textarea>
                                        @error('no_telp')
                                            <div id="validationServer03Feedback" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    {{-- Col --}}
                                    <div class="col-lg-10 mb-3 px-5">
                                        <label for="image">Gambar : </label>
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
                                        <input class="btn btn-success w-50 btn-block" type="submit" value="Tambah Promo">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="row mt-2 d-flex justify-content-center">
                    <!-- Card Nasi-->
                    <div class="card">
                        <div class="card-header" id="tabel-promo">
                            <h3 class="card-title">
                                <i class="fas fa-dollar-sign mr-1"></i>
                                List Promo
                            </h3>

                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content p-0">
                                <table id="tabelPromo"
                                    class="table table-striped table-bordered text-center table-responsive-sm"
                                    cellpadding="0" cellspacing="0" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th scope="col">No.</th>
                                            <th scope="col">Nama</th>
                                            <th scope="col">Harga Promo</th>
                                            <th scope="col">Deskripsi</th>
                                            <th sscope="col">Image</th>
                                            <th scope="col" class="col-2">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php $i = 1; ?>

                                        @foreach ($promo as $menu)
                                            <tr>
                                                <td>{{ $i }}</td>
                                                <td>{{ $menu->nama }}</td>
                                                <td>Rp.{{ number_format($menu->harga_promo, 2, ',', '.') }}</td>
                                                <td>
                                                    {{ $menu->deskripsi }}
                                                </td>
                                                <td>
                                                    <img src="{{ asset("storage/promo/$menu->image") }}"
                                                        class="image-nasi">
                                                </td>
                                                <td>
                                                    <form action="{{ route('promo.destroy', ['slug' => $menu->slug]) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="btn-hapus btn btn-sm btn-danger">Delete</button>
                                                    </form>
                                                </td>

                                            </tr>
                                            <?php $i++; ?>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </section>
    </div>
@endsection
