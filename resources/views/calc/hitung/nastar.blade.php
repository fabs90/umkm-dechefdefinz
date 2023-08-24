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
        <br>
        <br>
        <div class="back-home">
            <a href="{{ route('adminPage') }}">Kembali ke dashboard</a>
        </div>
    </div>

    <div class="calculator">
        <form action="{{ route('nastar.hp') }}" method="post">
            @csrf
            <h1>Nastar</h1>
            <label for="jumlah">Masukan jumlah pesanan</label>
            <input type="number" name="jumlah_pesanan" id="jumlah_pesanan" placeholder="Masukan jumlah pesanan"
                value="{{ session('input_values.jumlah_pesanan') }}" required />
    </div>
    <div class="calculator">

        <h1>Kalkulator Biaya Bahan Baku</h1>
        <br />
        <label for="harga-bahan">Butter:</label>
        <input type="number" name="butter" id="butter" placeholder="Masukan jumlah (gr) butter yang dipakai"
            step="any" value="{{ old('butter', session('input_values.butter')) }}" required />
        <label for="harga-bahan">Margarin:</label>
        <input type="number" name="margarin" id="margarin" placeholder="Masukan jumlah (gr) margarin yang dipakai"
            step="any" value="{{ old('margarin', session('input_values.margarin')) }}" required />

        <label for="harga-bahan">Telur:</label>
        <input type="number" id="telur" name="telur" placeholder="Masukkan jumlah telur yang dipakai"
            step="any" value="{{ old('telur', session('input_values.telur')) }}" required />

        <label for="gula-halus">Gula Halus:</label>
        <input type="number" id="gula-halus"
            name="gula-halus"placeholder="Masukkan jumlah (gr) gula halus yang dipakai" step="any"
            value="{{ old('gula-halus', session('input_values.gula-halus')) }}" required />

        <label for="harga-bahan">Vanilla:</label>
        <input type="number" id="vanilla" name="vanilla" placeholder="Masukkan jumlah (gr) vanilla yang dipakai"
            step="any" value="{{ old('vanilla', session('input_values.vanilla')) }}" required />

        <label for="harga-bahan">Susu Bubuk:</label>
        <input type="number" id="susu_bubuk" name="susu_bubuk"
            placeholder="Masukkan jumlah sachet susu_bubuk yang dipakai" step="any"
            value="{{ old('susu_bubuk', session('input_values.susu_bubuk')) }}" required />

        <label for="harga-bahan">Tepung Terigu:</label>
        <input type="number" id="tepung_terigu" name="tepung_terigu"
            placeholder="Masukkan jumlah (gr) tepung terigu yang dipakai" step="any"
            value="{{ old('tepung_terigu', session('input_values.tepung_terigu')) }}" required />

        <label for="harga-bahan">Nanas:</label>
        <input type="number" id="nanas" name="nanas" placeholder="Masukkan jumlah nanas yang dipakai"
            step="any" value="{{ old('nanas', session('input_values.nanas')) }}" required />

        <label for="harga-bahan">Gula Pasir:</label>
        <input type="number" id="gula_pasir" name="gula_pasir" placeholder="Masukkan (gr) gula pasir yang dipakai"
            step="any" value="{{ old('gula_pasir', session('input_values.gula_pasir')) }}" required />

        <label for="harga-bahan">Garam:</label>
        <input type="number" id="garam" name="garam" placeholder="Masukkan (sdt) garam yang dipakai"
            step="any" value="{{ old('garam', session('input_values.garam')) }}" required />

        <label for="harga-bahan">Batang Kayu Manis:</label>
        <input type="number" id="batang_kayu" name="batang_kayu" placeholder="Masukkan batang kayu yang dipakai"
            step="any" value="{{ old('batang_kayu', session('input_values.batang_kayu')) }}" required />

        <label for="harga-bahan">Daun Pandan:</label>
        <input type="number" id="daun_pandan" name="daun_pandan" placeholder="Masukkan lembar daun pandan yang dipakai"
            step="any" value="{{ old('daun_pandan', session('input_values.daun_pandan')) }}" required />

        <label for="harga-bahan">Kuning Telur:</label>
        <input type="number" id="kuning_telurr" name="kuning_telurr"
            placeholder="Masukkan butir kuning telur yang dipakai" step="any"
            value="{{ old('kuning_telurr', session('input_values.kuning_telurr')) }}" required />

        <label for="harga-bahan">Susu Cair:</label>
        <input type="number" id="susu_cair" name="susu_cair" placeholder="Masukkan (sdt) susu cair yang dipakai"
            step="any" value="{{ old('susu_cair', session('input_values.susu_cair')) }}" required />

        <label for="harga-bahan">Minyak Sayur:</label>
        <input type="number" id="minyak_sayur" name="minyak_sayur"
            placeholder="Masukkan (sdt) minyak sayur yang dipakai" step="any"
            value="{{ old('minyak_sayur', session('input_values.minyak_sayur')) }}" required />

        <label for="harga-bahan">Pasta Vanilla:</label>
        <input type="number" id="daun_pandan" name="daun_pandan"
            placeholder="Masukkan (sdt) pasta vanilla yang dipakai" step="any"
            value="{{ old('daun_pandan', session('input_values.daun_pandan')) }}" required />

        <label for="harga-bahan">Madu:</label>
        <input type="number" id="madu" name="madu" placeholder="Masukkan (sdt) madu yang dipakai"
            step="any" value="{{ old('madu', session('input_values.madu')) }}" required />


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

        <label for="harga-bahan">Harga Solatip:</label>
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
