<div class="d-flex justify-content-center align-items-center container-fluid mx-auto w-auto">
    <div class="card gap-2 text-center w-auto">
        <div class="card-header">
            <h2>Tambahkan Stok</h2>
        </div>
        <form class="ps-5 pe-5 card-body" action="/stock" method="POST">
            <div class="row mb-2">
                <label for="inputItemName" class="col-sm-4 col-from-label ps-0 pe-0">Nama Barang</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="item_name">
                </div>
            </div>

            <div class="row mb-3">
                <label for="inputItemName" class="col-sm-4 col-from-label ps-0 pe-0">Jumlah Barang</label>
                <div class="col-sm-8">
                    <input type="number" min="0" class="form-control" name="stock" value="0">
                </div>
            </div>
            <div class="d-flex align-items-end justify-content-end mt-2 d-md-flex justify-content-md-end mb-2">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>