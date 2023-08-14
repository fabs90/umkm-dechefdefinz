<!DOCTYPE html>
<html>

<head>
    <title>Kalkulator Harga Pokok Produksi Adonan Kue</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('calculator') }}/buttercake.css" />
</head>

<body>
    <div class="calculator">
        <label for="jenis-adonan">Jenis Adonan Kue:</label>
        <select id="jenis-adonan" onchange="redirectToPage()">
            <option value="">PILIH JENIS KUE</option>
            <option value="{{ route('buttercake') }}">Buttercake</option>
            <option value="{{ route('kue-sus-vanilla') }}">Kue Sus Vla Vanilla</option>
            <option value="kue-coklat">Kue Coklat</option>
            <option value="bitterbalen">Bitterbalen</option>
            <option value="kue-vanila">Pastel Bihun Sayur Telur</option>
            <option value="kue-vanila">Brownies Sekat</option>
            <option value="kue-vanila">Bomboloni</option>
            <option value="kue-vanila">Pie Buah</option>
            <option value="kue-vanila">Nagasari Pandan</option>
            <option value="kue-vanila">Marmer Butter Cake</option>
            <option value="kue-vanila">Kue Sus Rasa Coklat</option>
            <option value="kue-vanila">Bolu Kukus Tiramisu</option>
            <option value="kue-vanila">Bolu Gulung Keju</option>
            <option value="kue-vanila">Marmer Pandan Ketan Hitam</option>
            <option value="pie-brownies">Pie Brownies</option>
            <option value="kue-vanila">Kue Pisang Keju</option>
            <option value="kue-vanila">Kue Unicorn</option>
            <!-- Tambahkan opsi lainnya sesuai kebutuhan -->
        </select>
        <br>
        <br>
        <div class="back-home">
            <a href="{{ route('adminPage') }}">Kembali ke admin</a>
        </div>
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
