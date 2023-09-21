@extends('layouts.main')
@section('title', 'Menu Bahan')
@section('content')
    <div class="content-wrapper">
        {{-- Main-content --}}
        <section class="content">
            <div class="container-fluid">
                <form action="{{ route('menubahan.post.bakery') }}" method="post">
                    @csrf
                    <div class="row mb-2">
                        <div class="col mt-3">
                            <h3>{{ $jenis }}</h3>
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
                                            href="{{ route('menubahan.jenis', ['jenis' => $item->jenis]) }}">{{ $item->jenis }}</a>
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
                                    @include('admin.menu_bahan.table-bahan')
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
