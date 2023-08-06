@extends('layouts.main')

@section('title', 'Dashboard Admin')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">List Menu</h1>
                    </div><!-- /.col -->

                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">

                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>60</h3>
                                <p>Jumlah Menu</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-android-list"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->

                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>20</h3>

                                <p>Kue Loyang</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>25</h3>
                                {{-- <sup style="font-size: 20px">%</sup> --}}
                                <p>Kue Kering</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3 style="color: white">15</h3>

                                <p>Nasi Kotak</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->

                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-12">
                        <!-- Card Nasi-->
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="fas fa-chart-pie mr-1"></i>
                                    Menu Kue Loyang
                                </h3>

                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <div class="tab-content p-0">
                                    <table id="table-kue-loyang"
                                        class="table table-striped table-bordered text-center table-responsive-sm"
                                        cellpadding="0" cellspacing="0" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th scope="col">No.</th>
                                                <th scope="col">Nama</th>
                                                <th scope="col">Harga Normal</th>
                                                <th scope="col">Harga diskon</th>
                                                <th scope="col">Deskripsi</th>
                                                <th scope="col">Image</th>
                                                <th scope="col" class="col-2">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php $i = 1; ?>

                                            @foreach ($menuKueLoyang as $menu)
                                                <tr>
                                                    <td>{{ $i }}</td>
                                                    <td>{{ $menu->name }}</td>
                                                    <td>Rp.{{ number_format($menu->harga_normal, 2, ',', '.') }}</td>
                                                    <td>
                                                        @if ($menu->harga_diskon > 0)
                                                            {{ $menu->harga_diskon }}
                                                        @else
                                                            0
                                                        @endif
                                                    </td>
                                                    <td>
                                                        {{ $menu->deskripsi }}
                                                    </td>
                                                    <td>
                                                        <img src="{{ asset("storage/menu_kue_loyang/$menu->image") }}"
                                                            class="image-kue-loyang">
                                                    </td>
                                                    <td>
                                                        <a class="btn btn-sm btn-success"
                                                            href="{{ route('menu.showKueLoyang', ['slug' => $menu->slug]) }}"
                                                            role="button">Ubah</a>
                                                        | <form
                                                            action="{{ route('menu.hapusMenuKueLoyang', ['slug' => $menu->slug]) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-sm btn-danger"
                                                                id="btn-delete">Delete</button>
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

                <div class="row">
                    <div class="col-12">
                        <!-- Card Nasi-->
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="fas fa-chart-pie mr-1"></i>
                                    Menu Kue Kering
                                </h3>

                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <div class="tab-content p-0">
                                    <table id="table-kue-kering"
                                        class="table table-striped table-bordered text-center table-responsive-sm"
                                        cellpadding="0" cellspacing="0" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th scope="col">No.</th>
                                                <th scope="col">Nama</th>
                                                <th scope="col">Harga Normal</th>
                                                <th scope="col">Harga diskon</th>
                                                <th scope="col">Deskripsi</th>
                                                <th scope="col">Image</th>
                                                <th scope="col" class="col-2">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1; ?>

                                            @foreach ($menuKueKering as $menu)
                                                <tr>
                                                    <td>{{ $i }}</td>
                                                    <td>{{ $menu->name }}</td>
                                                    <td>Rp.{{ number_format($menu->harga_normal, 2, ',', '.') }}</td>
                                                    <td>
                                                        @if ($menu->harga_diskon > 0)
                                                            {{ $menu->harga_diskon }}
                                                        @else
                                                            0
                                                        @endif
                                                    </td>
                                                    <td>
                                                        {{ $menu->deskripsi }}
                                                    </td>
                                                    <td>
                                                        <img src="{{ asset("storage/menu_kue_kering/$menu->image") }}"
                                                            class="image-kue-kering">
                                                    </td>
                                                    <td>
                                                        <a class="btn btn-sm btn-success"
                                                            href="{{ route('menu.showKueKering', ['slug' => $menu->slug]) }}"
                                                            role="button">Ubah</a>
                                                        | <form
                                                            action="{{ route('menu.hapusMenuKueKering', ['slug' => $menu->slug]) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-sm btn-danger"
                                                                id="btn-delete">Delete</button>
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
                <!-- /.row (main row) -->

                <!-- Main row -->
                <div class="row">
                    <section class="col-12">
                        <!-- Card Nasi-->
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="fas fa-chart-pie mr-1"></i>
                                    Menu Nasi
                                </h3>

                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <div class="tab-content p-0">
                                    <table id="table-nasi"
                                        class="table table-striped table-bordered text-center table-responsive-sm"
                                        cellpadding="0" cellspacing="0" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th scope="col">No.</th>
                                                <th scope="col">Nama</th>
                                                <th scope="col">Harga Normal</th>
                                                <th scope="col">Harga diskon</th>
                                                <th scope="col">Deskripsi</th>
                                                <th scope="col">Image</th>
                                                <th scope="col" class="col-2">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1; ?>
                                            @foreach ($menuNasi as $menu)
                                                <tr>
                                                    <td>{{ $i }}</td>
                                                    <td>{{ $menu->name }}</td>
                                                    <td>Rp.{{ number_format($menu->harga_normal, 2, ',', '.') }}</td>
                                                    <td>
                                                        @if ($menu->harga_diskon > 0)
                                                            {{ $menu->harga_diskon }}
                                                        @else
                                                            0
                                                        @endif
                                                    </td>
                                                    <td>
                                                        {{ $menu->deskripsi }}
                                                    </td>
                                                    <td>
                                                        <img src="{{ asset("storage/menu_nasi/$menu->image") }}"
                                                            class="image-nasi">
                                                    </td>
                                                    <td>
                                                        <a class="btn btn-sm btn-success"
                                                            href="{{ route('menu.showMenuNasi', ['slug' => $menu->slug]) }}"
                                                            role="button">Ubah</a>
                                                        | <form
                                                            action="{{ route('menu.hapusMenuNasi', ['slug' => $menu->slug]) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-sm btn-danger"
                                                                id="btn-delete">Delete</button>
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
                    </section>
                </div>
                <!-- /.row (main row) -->

            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
