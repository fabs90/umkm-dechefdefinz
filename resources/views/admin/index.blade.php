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
                                <h3>{{ $jumlahKL + $jumlahKK + $jumlahNasi + $jumlahBakery + $jumlahKueTradisional }}</h3>
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
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>
                                    {{ $jumlahKueTradisional }}
                                </h3>
                                <p>Jajanan Tradisional</p>
                            </div>
                            <div class="icon">
                                {{-- <i class="ion ion-bag"></i> --}}
                                <i class="fas fa-seedling"></i>
                            </div>
                            <a href="#menu-kue-loyang" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->

                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>
                                    {{ $jumlahKL }}
                                </h3>
                                <p>Cake</p>
                            </div>
                            <div class="icon">
                                {{-- <i class="ion ion-bag"></i> --}}
                                <i class="fas fa-birthday-cake"></i>
                            </div>
                            <a href="#menu-kue-loyang" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-secondary">
                            <div class="inner">
                                <h3>{{ $jumlahKK }}</h3>
                                {{-- <sup style="font-size: 20px">%</sup> --}}
                                <p>Kue Kering</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-cheese"></i>
                            </div>
                            <a href="#menu_kue_kering" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-primary">
                            <div class="inner">
                                <h3>{{ $jumlahBakery }}</h3>
                                {{-- <sup style="font-size: 20px">%</sup> --}}
                                <p>Bakery</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-bread-slice"></i>
                            </div>
                            <a href="#table-bakery" class="small-box-footer">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3 style="color: white">{{ $jumlahNasi }}</h3>

                                <p style="color: white">Nasi Kotak</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-utensils"></i>
                            </div>
                            <a href="#table-nasi" class="small-box-footer" style="color: white">More info <i
                                    class="fas fa-arrow-circle-right" style="color: white"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->

                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-12">
                        <!-- Card Nasi-->
                        <div class="card">
                            <div class="card-header" id="menu-kue-loyang">
                                <h3 class="card-title">
                                    <i class="fas fa-chart-pie mr-1"></i>
                                    Kue Tradisional (Jajanan Pasar)
                                </h3>

                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <div class="tab-content p-0">
                                    <table id="table-kue-tradisional"
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

                                            @foreach ($kueTradisional as $menu)
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
                                                        <img src="{{ asset("storage/kue_tradisional/$menu->image") }}"
                                                            class="image-kue-loyang">
                                                    </td>
                                                    <td>
                                                        <a class="btn btn-sm btn-success btn-update-kueTradisional"
                                                            href="{{ route('menu.showMenuKueTradisional', ['slug' => $menu->slug]) }}"
                                                            role="button">Ubah</a>
                                                        <form
                                                            action="{{ route('menu.hapusKueTradisional', ['slug' => $menu->slug]) }}"
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
                <!-- /.row -->
                <div class="row">
                    <div class="col-12">
                        <!-- Card Nasi-->
                        <div class="card">
                            <div class="card-header" id="menu-kue-loyang">
                                <h3 class="card-title">
                                    <i class="fas fa-chart-pie mr-1"></i>
                                    Cake
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
                                                        <a class="btn btn-sm btn-success btn-update-cake"
                                                            href="{{ route('menu.showKueLoyang', ['slug' => $menu->slug]) }}"
                                                            role="button">Ubah</a>
                                                        <form
                                                            action="{{ route('menu.hapusMenuKueLoyang', ['slug' => $menu->slug]) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                class="btn btn-sm btn-danger btn-hapus">Delete</button>
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
                        <div class="card" id="menu_kue_kering">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="fas fa-chart-pie mr-1"></i>
                                    Kue Kering
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
                                                        <a class="btn btn-sm btn-success btn-update-kuekering"
                                                            href="{{ route('menu.showKueKering', ['slug' => $menu->slug]) }}"
                                                            role="button" id="btn-update-kuekering">Ubah</a>
                                                        <form
                                                            action="{{ route('menu.hapusMenuKueKering', ['slug' => $menu->slug]) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-sm btn-danger btn-hapus"
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
                        <div class="card" id="menu_nasi">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="fas fa-chart-pie mr-1"></i>
                                    Bakery
                                </h3>

                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <div class="tab-content p-0">
                                    <table id="table-bakery"
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
                                            @foreach ($bakery as $menu)
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
                                                        <img src="{{ asset("storage/bakery/$menu->image") }}"
                                                            class="image-nasi">
                                                    </td>
                                                    <td>
                                                        <a class="btn btn-sm btn-success btn-update-bakery"
                                                            href="{{ route('menu.showMenuBakery', ['slug' => $menu->slug]) }}"
                                                            role="button" id="btn-update-bakery">Ubah</a>
                                                        <form
                                                            action="{{ route('menu.hapusMenuBakery', ['slug' => $menu->slug]) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                class="btn btn-sm btn-danger btnHapusNasi">Delete</button>
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
                <!-- Main row -->
                <div class="row">
                    <section class="col-12">
                        <!-- Card Nasi-->
                        <div class="card" id="menu_nasi">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="fas fa-chart-pie mr-1"></i>
                                    Nasi
                                </h3>

                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <div class="tab-content p-0">
                                    <table id="table-nasi"
                                        class="table table-striped table-bordered text-center table-responsive-sm"
                                        style="width:100%">
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
                                                        <a class="btn btn-sm btn-success btn-update-nasi"
                                                            href="{{ route('menu.showMenuNasi', ['slug' => $menu->slug]) }}"
                                                            role="button">Ubah</a>
                                                        <form
                                                            action="{{ route('menu.hapusMenuNasi', ['slug' => $menu->slug]) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                class="btn btn-sm btn-danger btnHapusNasi">Delete</button>
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
