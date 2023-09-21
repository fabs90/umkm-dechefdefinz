@extends('layouts.main')
@section('title', 'Menu Bahan')
@section('content')
    <div class="content-wrapper">
        {{-- Main-content --}}
        <section class="content">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12 mt-4">
                        <div class="form-group mb-3">
                            {{-- <label for="jenis-menu" class="form-label">Pilih Jenis Menu</label> --}}
                            {{-- <select name="jenis-menu" id="jenis-menu" class="form-select input-select">
                                <option value="">-- Pilih --</option>
                                @foreach ($jenisKue as $item)
                                    <option value="{{ $item->id }}">{{ $item->jenis }}</option>
                                @endforeach
                            </select> --}}
                            <div class="dropdown">
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
                        </div>


                    </div>
                </div>

            </div>
        </section>
    </div>
@endsection
