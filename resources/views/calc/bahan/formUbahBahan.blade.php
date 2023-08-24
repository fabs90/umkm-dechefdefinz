@extends('calc.bahan.ubahBahanLayouts')
@section('title', 'Ubah Bahan')
@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col mt-5">
                        <h2 class="text-center judul-tambah-menu">Ubah Harga Bahan Baku</h2>
                    </div>
                </div>

                <div class="row mt-2 d-flex justify-content-center">
                    <div class="col-12 col-lg-8 col-md-8">
                        @if (session('flash_msg_bahan_baku'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <h4 style="color: white">{{ session('flash_msg_bahan_baku') }}</h4>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        {{-- @if ($errors->any())
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif --}}
                        {{-- Table --}}
                        <div class="tab-content p-0">
                            <table id="tabel-bahan-baku"
                                class="table table-striped table-bordered text-center table-responsive-sm">
                                <thead>
                                    <tr>
                                        <th scope="col">No.</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Harga</th>
                                        <th scope="col">Ubah Harga</th>
                                        <th scope="col" colspan="2">Aksi</th>
                                        <th style="display: none"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    @foreach ($bahan_baku as $menu)
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td>{{ $menu->nama_bahan }}</td>
                                            <td>Rp.{{ number_format($menu->harga, 0, ',', '.') }}</td>
                                            <td>
                                                <form
                                                    action="{{ route('harga-bahan-baku.update', ['nama_bahan' => $menu->nama_bahan]) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <input type="number" name="harga_baru"
                                                        placeholder="Masukan harga baru">
                                            </td>
                                            <td>
                                                <button type="submit" class="btn btn-sm btn-primary update-bahan"
                                                    id="btn-update-bahan">Update</button>
                                                </form>
                                            </td>
                                            <td>
                                                <form
                                                    action="{{ route('harga-bahan-baku.delete', ['nama_bahan' => $menu->nama_bahan]) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="btn btn-sm btn-danger btn-delete-bahan btnHapusBahan"
                                                        id="btn-delete">Delete</button>
                                                </form>
                                            </td>
                                            <td style="display: none"></td>
                                        </tr>
                                        <?php $i++; ?>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{-- Table --}}
                    </div>
                </div>
            </div>
    </div>
    </div>
    </section>
    </div>
@endsection
