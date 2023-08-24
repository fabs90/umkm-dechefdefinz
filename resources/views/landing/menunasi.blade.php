<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('umkm-baru/menu-nasi') }}/menunasi2.css" />
    <title>Menu Kami</title>
</head>

<body>
    <div class="menu">
        <div class="heading">
            <h1>Menu Nasi Kami Lainnya</h1>
            <h3>&mdash;Menu&mdash;</h3>
        </div>

        @foreach ($datas as $item)
            <div class="food-items">
                <img src="{{ asset("storage/menu_nasi/$item->image") }}">
                <div class="details">
                    <div class="details-sub">
                        <h3>{{ $item->name }}</h3>
                        <h5 class="Price">Rp.{{ number_format($item->harga_normal, 0, ',', '.') }}</h5>
                    </div>
                    <p>{{ $item->deskripsi }}</p>
                    <a target="_blank" href="https://wa.me/6285694361951" class="btn">Pesan</a>
                </div>

            </div>
        @endforeach



    </div>
    </div>
</body>

</html>
