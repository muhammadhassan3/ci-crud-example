<div class="d-flex justify-content-between mb-3 ms-3 me-3">
    <h2>{heading}</h2>
    <button onclick="location.href ='/stock/create'" class="btn btn-primary my-auto">Tambah</button>
</div>
<div class="table-responsive ms-3 me-3">
    <table class="table table-stripped table-sm">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Barang</th>
                <th scope="col">Stok</th>
                <th scope="col">Opsi</th>
            </tr>
        </thead>
        <tbody>
            {list}
            <tr>
                <td>{no}</td>
                <td>{nama_barang}</td>
                <td>{stok}</td>
                <td>
                    <div class="btn-group" role="group" aria-label="actions group">
                        <button type="button" class="btn btn-outline-info" onclick="location.href='{edit_url}'">Ubah</button>
                        <button type="button" class="btn btn-outline-danger" onclick="location.href='{delete_url}'">Hapus</button>
                    </div>
                </td>
            </tr>
            {/list}
        </tbody>
    </table>
</div>