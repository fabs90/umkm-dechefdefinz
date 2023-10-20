@extends('layouts.main')
@section('title', 'Menu Bahan')
@section('content')
    <div class="content-wrapper">
        {{-- Main-content --}}
        <section class="content">
            <div class="container-fluid">
                <form action="#" method="post">
                    @csrf
                    <div class="row mb-2">
                        <div class="col mt-3">
                            <h3>Bakery</h3>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group mb-3">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Jenis Menu
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    @foreach ($jenisKue as $item)
                                        <a class="dropdown-item"
                                            href="{{ route('editmenubahan.jenis', ['jenis' => $item->jenis]) }}">{{ $item->jenis }}</a>
                                    @endforeach
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <label for="select-menu" class="form-label">Pilih Menu</label>
                                <select name="select_menu" id="select-menu" class="form-select input-select">
                                    <option value="#">-- Option --</option>
                                    @foreach ($bakery as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xxl-8 col-12 col-lg-8">
                            <div class="card">
                                <div class="card-body card-table-bahan" style="display: none">
                                    <table id="tabel-bahan-blade"
                                        class="table table-striped table-bordered text-center table-responsive-sm"
                                        style="width:100%">
                                        <thead>
                                            <tr>
                                                <th scope="col">No.</th>
                                                <th scope="col">Nama Bahan</th>
                                                <th scope="col">Opsi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1; ?>
                                            @foreach ($bahanBaku as $data)
                                                <tr>
                                                    <td>{{ $i }}</td>
                                                    <td>{{ $data->nama_bahan }}</td>
                                                    <td><input type="checkbox" name="bahans[]" value="{{ $data->id }}">
                                                    </td>
                                                </tr>
                                                @php
                                                    $i++;
                                                @endphp
                                            @endforeach
                                        </tbody>
                                    </table>

                                    <button type="submit" class="btn btn-primary mt-3 mx-auto">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>
@endsection
