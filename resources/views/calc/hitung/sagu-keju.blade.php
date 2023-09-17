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
        <form action="{{ route('nastar.hp') }}" method="post">
            @csrf
            <h1>Sagu Keju</h1>
            <label for="jumlah">Masukan jumlah pesanan</label>
            <input type="number" name="jumlah_pesanan" id="jumlah_pesanan" placeholder="Masukan jumlah pesanan"
                value="{{ session('input_values.jumlah_pesanan') }}" required />
    </div>
    <div class="calculator">

        <h1>Kalkulator Biaya Bahan Baku</h1>
        <br />
        <label for="harga-bahan">Air:</label>
        <input type="number" name="air" id="air" placeholder="Masukan jumlah (ml) air yang dipakai"
            step="any" value="{{ old('air', session('input_values.air')) }}" required />
        <label for="harga-bahan">Margarin:</label>
        <input type="number" name="margarin" id="margarin" placeholder="Masukan jumlah (gr) margarin yang dipakai"
            step="any" value="{{ old('margarin', session('input_values.margarin')) }}" required />

        <label for="harga-bahan">Tepung Terigu:</label>
        <input type="number" id="tepung_terigu" name="tepung_terigu"
            placeholder="Masukkan jumlah (gr) tepung terigu yang dipakai" step="any"
            value="{{ old('tepung_terigu', session('input_values.tepung_terigu')) }}" required />

        <label for="tepung_terigu_pro_tinggi">Tepung Terigu Pro. Tinggi:</label>
        <input type="number" id="tepung_terigu_pro_tinggi"
            name="tepung_terigu_pro_tinggi"placeholder="Masukkan jumlah (gr) tepung terigu pro. tinggi yang dipakai"
            step="any"
            value="{{ old('tepung_terigu_pro_tinggi', session('input_values.tepung_terigu_pro_tinggi')) }}" required />

        <label for="harga-bahan">Gula Pasir:</label>
        <input type="number" id="gula_pasir" name="gula_pasir"
            placeholder="Masukkan jumlah (gr) gula pasir yang dipakai" step="any"
            value="{{ old('gula_pasir', session('input_values.gula_pasir')) }}" required />

        <label for="harga-bahan">Garam:</label>
        <input type="number" id="garam" name="garam" placeholder="Masukkan jumlah (gr) garam yang dipakai"
            step="any" value="{{ old('garam', session('input_values.garam')) }}" required />

        <label for="harga-bahan">Tepung Maezena:</label>
        <input type="number" id="tepung_maezena" name="tepung_maezena"
            placeholder="Masukkan jumlah (gr) tepung-maezeka yang dipakai" step="any"
            value="{{ old('tepung_maezena', session('input_values.tepung_maezena')) }}" required />

        <label for="harga-bahan">Susu Cair:</label>
        <input type="number" id="susu_cair" name="susu_cair" placeholder="Masukkan jumlah (ml) susu cair yang dipakai"
            step="any" value="{{ old('susu_cair', session('input_values.susu_cair')) }}" required />

        <label for="harga-bahan">Kuning Telur</label>
        <input type="number" id="kuning_telur" name="kuning_telur"
            placeholder="Masukkan jumlah (butir) kuning telur yang dipakai" step="any"
            value="{{ old('kuning_telur', session('input_values.kuning_telur')) }}" required />

        <label for="harga-bahan">Butter:</label>
        <input type="number" id="butter" name="butter" placeholder="Masukkan jumlah (gr) butter yang dipakai"
            step="any" value="{{ old('butter', session('input_values.butter')) }}" required />

        <label for="harga-bahan">Vanilla:</label>
        <input type="number" id="vanilla" name="vanilla" placeholder="Masukkan jumlah (sdt) Vanilla yang dipakai"
            step="any" value="{{ old('vanilla', session('input_values.vanilla')) }}" required />


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

        <label for="harga-bahan">Paper Cup:</label>
        <input type="number" id="paper" name="paper_cup" placeholder="Masukkan jumlah paper" step="any"
            value="{{ old('paper_cup', session('input_values.paper_cup')) }}" required />

        <label for="harga-bahan">Harga Paper:</label>
        <input type="number" id="harga_paper_cup" name="harga_paper_cup"
            placeholder="Masukkan harga satuan paper cup" step="any"
            value="{{ old('harga-paper', session('input_values.harga-paper')) }}" required />
        <br><br>
        <label for="harga-bahan">Kardus:</label>
        <input type="number" id="kardus" name="kardus" placeholder="Masukkan jumlah kardus" step="any"
            value="{{ old('kardus', session('input_values.kardus')) }}" required />

        <label for="harga-bahan">Harga Kardus:</label>
        <input type="number" id="harga-kardus" name="harga_kardus" placeholder="Masukkan harga satuan kardus"
            step="any" value="{{ old('harga_kardus', session('input_values.harga_kardus')) }}" required />
        <br><br>
        <label for="harga-bahan">Label:</label>
        <input type="number" id="label" name="label" placeholder="Masukkan jumlah label" step="any"
            value="{{ old('label', session('input_values.label')) }}"required />

        <label for="harga-bahan">Harga Label:</label>
        <input type="number" id="harga-label" name="harga_label" placeholder="Masukkan harga satuan label"
            step="any" value="{{ old('harga_label', session('input_values.harga_label')) }}" required />

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
