@extends('layouts.main')

@section('title', 'Dashboard Admin')

@section('small-boxes')
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
            <div class="inner">
                <h3>65</h3>
                <p>Jumlah Menu</p>
            </div>
            <div class="icon">
                <i class="ion ion-android-list"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
@endsection
