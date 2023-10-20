    <table id="tabel-bahan-blade" class="table table-striped table-bordered text-center table-responsive-sm"
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
                    <td><input type="checkbox" name="bahans[]" value="{{ $data->id }}"></td>
                </tr>
                @php
                    $i++;
                @endphp
            @endforeach
        </tbody>
    </table>
