<!DOCTYPE html>
<html lang="en">

<head>
    <title>Kalkulator Harga Pokok Produksi Adonan Kue</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('calculator') }}/buttercake.css" />
</head>

<body>
    <div class="calculator">
        <label for="jenis-adonan">Jenis Adonan Kue:</label>
        @include('calc.dropdown-jenis-kue')
    </div>

    <div class="calculator">
        <form action="{{ route('boluGulungKeju.hp') }}" method="post">
            @csrf
            <h1>Bolu Gulung Keju</h1>
            <label for="jumlah">Masukan jumlah pesanan</label>
            <input type="number" name="jumlah_pesanan" id="jumlah_pesanan" placeholder="Masukan jumlah pesanan"
                value="{{ session('input_values.jumlah_pesanan') }}" required />
    </div>
    <div class="calculator">

        <h1>Kalkulator Biaya Bahan Baku</h1>
        <br />
        <label for="harga-bahan">Telur:</label>
        <input type="number" name="telur" id="telur" placeholder="Masukan jumlah butir telur yang dipakai"
            step="any" value="{{ old('telur', session('input_values.telur')) }}" required />

        <label for="harga-bahan">Gula Pasir:</label>
        <input type="number" name="gula_pasir" id="gula_pasir"
            placeholder="Masukan jumlah (gr) gula_pasir yang dipakai" step="any"
            value="{{ old('gula_pasir', session('input_values.gula_pasir')) }}" required />

        <label for="harga-bahan">Tepung Terigu:</label>
        <input type="number" id="tepung_terigu" name="tepung_terigu"
            placeholder="Masukkan jumlah (gr) tepung_terigu yang dipakai" step="any"
            value="{{ old('tepung_terigu', session('input_values.tepung_terigu')) }}" required />

        <label for="maezena">Tepung Maezena:</label>
        <input type="number" id="maezena"
            name="tepung_maezena"placeholder="Masukkan jumlah (gr) tepung maezena yang dipakai" step="any"
            value="{{ old('tepung_maezena', session('input_values.tepung_maezena')) }}" required />

        <label for="harga-bahan">Susu Bubuk:</label>
        <input type="number" id="susu_bubuk" name="susu_bubuk"
            placeholder="Masukkan jumlah (gr) susu bubuk yang dipakai" step="any"
            value="{{ old('susu_bubuk', session('input_values.susu_bubuk')) }}" required />


        <label for="harga-bahan">Cream:</label>
        <input type="number" id="cream" name="cream" placeholder="Masukkan HARGA cream untuk toping!"
            step="any" value="{{ old('cream', session('input_values.cream')) }}" required />

        <label for="harga-bahan">Keju:</label>
        <input type="number" id="keju" name="keju" placeholder="Masukkan HARGA keju untuk toping!"
            step="any" value="{{ old('keju', session('input_values.keju')) }}" required />


        {{-- <button type="submit">Hitung</button> --}}


        <h2>Total Harga Pokok Produksi:</h2>
        <span>Rp.</span>
        <p id="hasilBahanBaku" style="display: inline">
            {{ session('hargaBahanBaku') ? number_format(session('hargaBahanBaku'), 0, ',', '.') : 0 }}
        </p>
        <input type="number" name="resultBahanBaku" id="resultBahanBaku" readonly
            value="{{ session('hargaBahanBaku') ? session('hargaBahanBaku') : 0 }}" />
    </div>

    <!-- Biaya Kemasan -->
    <div class="biayakemasan">

        <h1>Kalkulator biaya kemasan</h1>

        <label for="harga-bahan">Kardus:</label>
        <input type="number" id="kardus" name="kardus" placeholder="Masukkan jumlah kardus" step="any"
            value="{{ old('kardus', session('input_values.kardus')) }}" required />

        <label for="harga-bahan">Harga Kardus:</label>
        <input type="number" id="harga_kardus" name="harga_kardus" placeholder="Masukkan harga satuan toples"
            step="any" value="{{ old('harga_kardus', session('input_values.harga_kardus')) }}" required />
        <br><br>
        <label for="harga-bahan">Paper Doley:</label>
        <input type="number" id="paper_doley" name="paper_doley" placeholder="Masukkan jumlah paper_doley"
            step="any" value="{{ old('paper_doley', session('input_values.paper_doley')) }}" required />

        <label for="harga-bahan">Harga Paper Doley:</label>
        <input type="number" id="harga_paper_doley" name="harga_paper_doley" placeholder="Masukkan harga paper doley"
            step="any" value="{{ old('harga_paper_doley', session('input_values.harga_paper_doley')) }}"
            required />
        <br><br>
        <label for="harga-bahan">Stiker:</label>
        <input type="number" id="stiker" name="stiker" placeholder="Masukkan jumlah stiker yang dipakai"
            step="any" value="{{ old('stiker', session('input_values.stiker')) }}"required />

        <label for="harga-bahan">Harga Stiker:</label>
        <input type="number" id="harga_stiker" name="harga_stiker" placeholder="Masukkan harga solatip"
            step="any" value="{{ old('harga_stiker', session('input_values.harga_stiker')) }}" required />

        {{-- <button type="submit">Hitung</button> --}}

        <h2>Hasil biaya kemasan:</h2>
        <span>Rp.</span>
        <p id="hasilBiayaKemasan" style="display: inline">
            {{ session('biayaKemasan') ? number_format(session('biayaKemasan'), 0, ',', '.') : 0 }}
        </p>
        <input type="number" name="resultKemasan" id="resultKemasan" readonly
            value="{{ session('biayaKemasan') ? session('biayaKemasan') : 0 }}" />
    </div>

    <div class="biayaproduksi">

        <h1>Kalkulator biaya produksi</h1>

        <label for="harga-bahan">Listrik:</label>
        <input type="number" id="listrik" name="listrik" placeholder="Masukkan harga listrik yang digunakan"
            value="{{ old('listrik', session('input_values.listrik')) }}" required />

        <label for="harga-bahan">Gas:</label>
        <input type="number" id="gas" name="gas" placeholder="Masukkan harga gas yang digunakan"
            value="{{ old('gas', session('input_values.gas')) }}" required />

        <label for="harga-bahan">Air Rumah:</label>
        <input type="number" id="air_rumah" name="air_rumah" placeholder="Masukkan harga air rumah yang digunakan"
            value="{{ old('air', session('input_values.air_rumah')) }}" required />

        <label for="harga-bahan">Jumlah Karyawan:</label>
        <input type="number" id="jumlah_karyawan" name="jumlah_karyawan" placeholder="Masukkan jumlah karyawan"
            value="{{ old('jumlah_karyawan', session('input_values.jumlah_karyawan')) }}" required />

        <label for="harga-bahan">Gaji Karyawan:</label>
        <input type="number" id="gaji" name="gaji" placeholder="Masukkan harga gaji karyawan per jam"
            value="{{ old('gaji', session('input_values.gaji')) }}" required />

        <label for="harga-bahan">Jam kerja karyawan:</label>
        <input type="number" id="waktu" name="waktu" placeholder="Masukkan jam kerja karyawan"
            step="any" value="{{ old('waktu', session('input_values.waktu')) }}" required />

        {{-- <button type="submit">Hitung</button> --}}



        <h2>Hasil biaya produksi:</h2>
        <span>Rp.</span>
        <p id="hasilBiayaProduksi" style="display: inline">
            {{ session('biayaProduksi') ? number_format(session('biayaProduksi'), 0, ',', '.') : 0 }}
        </p>
        <input type="number" name="resultProduksi" id="resultProduksi" readonly
            value="{{ session('biayaProduksi') ? session('biayaProduksi') : 0 }}" />
        <h2>Total HPP</h2>
        <span>Rp.</span>
        <p id="hasilHPP" style="display: inline">
            {{ session('hpp') ? number_format(session('hpp'), 2, ',', '.') : 0 }}</p>
        <input type="number" name="resultHPP" id="resultHPP" readonly
            value="{{ session('hpp') ? session('hpp') : 0 }}" />
    </div>

    <div class="calculator">
        <h2>Margin</h2>
        <input type="number" name="margin" id="margin" placeholder="Input margin (otomatis menjadi persen)"
            value="{{ old('margin', session('input_values.margin')) }}" required />
        <p>Margin diinput adalah {{ session('input_values.margin') ? session('input_values.margin') : 0 }}%</p>
        <h2>Harga Jual</h2>
        <span>Rp.</span>
        <p id="hasilHJ" style="display: inline">
            {{ session('hargaJual') ? number_format(session('hargaJual'), 0, ',', '.') : 0 }}</p>
        <input type="number" name="resultHargaJual" id="resultHargaJual" readonly
            value="{{ session('hargaJual') ? session('hargaJual') : 0 }}" />
        <button type="submit">Klik untuk melihat harga jual</button>
        </form>


    </div>
    <script>
        function redirectToPage() {
            var selectElement = document.getElementById("jenis-adonan");
            var selectedValue = selectElement.value;

            if (selectedValue) {
                window.location.href = selectedValue;
            }
        }
    </script>
</body>

</html>
