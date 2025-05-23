<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tes DataTables</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.bootstrap5.min.css">
</head>
<body>

<div class="container mt-5">
    <h2>Tes Tabel Pengguna</h2>
    <p>Jika tabel di bawah ini menampilkan data, artinya koneksi dan DataTables sudah berfungsi.</p>

    <table id="myTable" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th class="text-center">No</th>
                <th class="text-center">ID</th>
                <th class="text-center">Nama</th>
                <th class="text-center">Username</th>
            </tr>
        </thead>
        <tbody>
            </tbody>
    </table>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/2.0.7/js/dataTables.min.js"></script>
<script src="https://cdn.datatables.net/2.0.7/js/dataTables.bootstrap5.min.js"></script>

<script>
    $(document).ready(function() {
        $('#myTable').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": "<?= base_url('dashboard/datatable') ?>",
                "type": "GET"
            },
            "columns": [
                { "data": null, "className": "text-center", "orderable": false, "searchable": false },
                { "data": "id", "className": "text-center" },
                { "data": "nama", "className": "text-center" },
                { "data": "username", "className": "text-center" }
            ],
            "order": [[1, 'asc']],
            "fnRowCallback": function( nRow, aData, iDisplayIndex, iDisplayIndexFull ) {
                var index = iDisplayIndexFull + 1;
                $('td:eq(0)',nRow).html(index);
                return nRow;
            }
        });
    });
</script>

</body>
</html>