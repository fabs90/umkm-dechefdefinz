@extends('admin.review.reviewLayouts')
@section('title', 'List Review')
@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col mt-5">
                        <h2 class="text-center judul-tambah-menu">List Review</h2>
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
                            <table id="tabel-review"
                                class="table table-striped table-bordered text-center table-responsive-sm">
                                <caption>List Review</caption>
                                <thead>
                                    <tr>
                                        <th scope="col">No.</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">No. Telp</th>
                                        <th scope="col">Komen</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    @foreach ($datas as $data)
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td>{{ $data->name }}</td>
                                            <td>{{ $data->no_telp }}</td>
                                            <td>{{ $data->comments }}</td>
                                            <td>
                                                <form action="{{ route('listReview.delete', ['id' => $data->id]) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger btn-delete-bahan"
                                                        id="btn-delete">Delete</button>
                                                </form>
                                            </td>
                                            <?php $i++; ?>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{-- Table --}}
                    </div>
                </div>
                <div class="row">
                    <div class="col mt-5">
                        <h2 class="text-center judul-tambah-menu">List Foto Testimoni</h2>
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
                            <table id="tabel-testimoni"
                                class="table table-striped table-bordered text-center table-responsive-sm">
                                <caption>List Foto Testimoni</caption>
                                <thead>
                                    <tr>
                                        <th scope="col">No.</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">No. Telp</th>
                                        <th scope="col">Gambar</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    @foreach ($testimoni as $data)
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td>{{ $data->name }}</td>
                                            <td>{{ $data->no_telp }}</td>
                                            <td>
                                                <img src="{{ asset("storage/testimoni/$data->image") }}" alt="testimoni"
                                                    class="image-nasi">
                                            </td>
                                            <td>
                                                <form action="{{ route('imageReview.delete', ['id' => $data->id]) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger btn-delete-bahan"
                                                        id="btn-delete">Delete</button>
                                                </form>
                                            </td>
                                            <?php $i++; ?>
                                        </tr>
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
