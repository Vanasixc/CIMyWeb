<!-- Modal edit -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Account</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form name="portform" method="post" action="">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="id_nameID">ID User</label>
                            <input type="text" class="form-control" name="id_user" id="id_nameID" readonly> 
                        </div>
                        <div class="form-group">
                            <label for="nameID">Nama</label>
                            <input type="text" class="form-control" name="name" id="nameID" placeholder="type name here">
                        </div>
                        <div class="form-group">
                            <label for="usernameID">Username</label>
                            <input type="text" class="form-control" name="username" id="usernameID" placeholder="type username here">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<!-- end of modal edit -->

<!-- Modal Delete -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Hapus Account</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Apakah anda yakin ingin menghapus account ini?</p>
                <div id="modal-content-data"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Ya</button>
            </div>
        </div>
    </div>
</div>
<!-- end of Modal Delete -->