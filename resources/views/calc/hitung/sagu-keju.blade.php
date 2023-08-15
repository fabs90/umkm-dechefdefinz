<!DOCTYPE html>
<html>

<head>
    <title>Kalkulator Harga Pokok Produksi Adonan Kue</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('calculator') }}/buttercake.css" />
</head>

<body>
    <div class="calculator">
        <label for="jenis-adonan">Jenis Adonan Kue:</label>
        @include('calc.dropdown-jenis-kue')
        <br>
        <br>
        <div class="back-home">
            <a href="{{ route('adminPage') }}">Kembali ke admin</a>
        </div>
    </div>

    <div class="calculator">
        <form action="{{ route('sagu-keju.hp') }}" method="post">
            @csrf
            <h1>Sagu Keju</h1>
            <label for="jumlah">Masukan jumlah pesanan</label>
            <input type="number" name="jumlah_pesanan" id="jumlah_pesanan" placeholder="Masukan jumlah pesanan"
                value="{{ session('input_values.jumlah_pesanan') }}" required />
    </div>
    <div class="calculator">

        <h1>Kalkulator Biaya Produksi</h1>
        <br />
        <label for="harga-bahan">Tepung Sagu:</label>
        <input type="number" name="tepung_sagu" id="tepung_sagu"
            placeholder="Masukan jumlah (gr) tepung_sagu yang dipakai" step="any"
            value="{{ old('tepung_sagu', session('input_values.tepung_sagu')) }}" required />
        <label for="harga-bahan">Gula Halus:</label>
        <input type="number" name="gula_halus" id="gula_halus"
            placeholder="Masukan jumlah (gr) gula_halus yang dipakai" step="any"
            value="{{ old('gula_halus', session('input_values.gula_halus')) }}" required />

        <label for="harga-bahan">Keju Parut:</label>
        <input type="number" id="keju_parut" name="keju_parut"
            placeholder="Masukkan jumlah (gr) tepung terigu yang dipakai" step="any"
            value="{{ old('keju_parut', session('input_values.keju_parut')) }}" required />

        <label for="kuning_telur">Kuning Telur:</label>
        <input type="number" id="kuning_telur"
            name="kuning_telur"placeholder="Masukkan jumlah (gr) tepung terigu pro. tinggi yang dipakai" step="any"
            value="{{ old('kuning_telur', session('input_values.kuning_telur')) }}" required />

        <label for="harga-bahan">Margarin:</label>
        <input type="number" id="margarin" name="margarin" placeholder="Masukkan jumlah (gr) gula pasir yang dipakai"
            step="any" value="{{ old('margarin', session('input_values.margarin')) }}" required />

        <label for="harga-bahan">Butter:</label>
        <input type="number" id="butter" name="butter" placeholder="Masukkan jumlah (gr) butter yang dipakai"
            step="any" value="{{ old('butter', session('input_values.butter')) }}" required />

        <label for="harga-bahan">Santan:</label>
        <input type="number" id="santan" name="santan"
            placeholder="Masukkan jumlah (gr) tepung-maezeka yang dipakai" step="any"
            value="{{ old('santan', session('input_values.santan')) }}" required />

        <label for="harga-bahan">Keju Untuk Toping:</label>
        <input type="number" id="keju_toping" name="keju_toping" placeholder="Masukkan harga keju toping yang dipakai"
            step="any" value="{{ old('keju_toping', session('input_values.keju_toping')) }}" required />


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

        <label for="harga-bahan">Toples:</label>
        <input type="number" id="toples" name="toples" placeholder="Masukkan jumlah toples" step="any"
            value="{{ old('toples', session('input_values.toples')) }}" required />

        <label for="harga-bahan">Harga Toples:</label>
        <input type="number" id="harga_toples" name="harga_toples" placeholder="Masukkan harga satuan toples"
            step="any" value="{{ old('harga_toples', session('input_values.harga_toples')) }}" required />
        <br><br>
        <label for="harga-bahan">Paper Doley:</label>
        <input type="number" id="paper_doley" name="paper_doley" placeholder="Masukkan jumlah paper_doley"
            step="any" value="{{ old('paper_doley', session('input_values.paper_doley')) }}" required />

        <label for="harga-bahan">Harga Paper Doley:</label>
        <input type="number" id="harga_paper_doley" name="harga_paper_doley"
            placeholder="Masukkan harga paper doley" step="any"
            value="{{ old('harga_paper_doley', session('input_values.harga_paper_doley')) }}" required />
        <br><br>
        <label for="harga-bahan">Solatip:</label>
        <input type="number" id="solatip" name="solatip" placeholder="Masukkan jumlah solatip yang dipakai"
            step="any" value="{{ old('solatip', session('input_values.solatip')) }}"required />

        <label for="harga-bahan">Harga Solatips:</label>
        <input type="number" id="harga_solatip" name="harga_solatip" placeholder="Masukkan harga solatip"
            step="any" value="{{ old('harga_solatip', session('input_values.harga_solatip')) }}" required />
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

        <label for="harga-bahan">Air:</label>
        <input type="number" id="air" name="air" placeholder="Masukkan harga air yang digunakan"
            value="{{ old('air', session('input_values.air')) }}" required />

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
