<!--begin::Script-->
<!-- datatable script -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script src="https://cdn.datatables.net/2.0.7/js/dataTables.min.js"></script>
<script src="https://cdn.datatables.net/2.0.7/js/dataTables.bootstrap5.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
    crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/2.3.1/js/dataTables.js"></script>
<!-- sweetalert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- end of sweetalert -->
<!-- native JS -->
<script src="<?= base_url('assets-dashboard/js/alert.js') ?>"></script>
<!-- end of native JS -->


<script>
    $(document).ready(function () {
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
                { "data": "nama" },
                { "data": "username" },
                {
                    "data": null,
                    "className": "text-center",
                    "orderable": false,
                    "searchable": false,
                    "render": function (data, type, row) {
                        const editBut = `<button type="button" class="btn btn-warning btn-sm me-1 btn-edit" data-id="${row.id}">Edit</button>`;
                        const delBut = `<button type="button" class="btn btn-danger btn-sm me-1 btn-delete" data-id="${row.id}">Delete</button>`;
                        return `${editBut} ${delBut}`;
                    }
                },
            ],
            "order": [[1, 'asc']],
            "fnRowCallback": function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                var index = iDisplayIndexFull + 1;
                $('td:eq(0)', nRow).html(index);
                return nRow;
            }
        });
        $('#myTable tbody').on('click', '.btn-edit', function () {
            const id = $(this).data('id');
            $.ajax({
                url: `<?= base_url('dashboard/userdata/') ?>${id}`,
                method: 'GET',
                dataType: 'json',
                success: function (data) {
                    if (data) {
                        $('#id_nameID').val(data.id);
                        $('#nameID').val(data.nama);
                        $('#usernameID').val(data.username);

                        $('#editModal form').attr('action', `<?= base_url('dashboard/update/') ?>${data.id}`);
                        $('#editModal').modal('show');
                    } else {
                        alert('Data pengguna tidak ditemukan!');
                    }
                }
            });
        });

        let deleteId = null; // Variabel untuk menyimpan ID yang akan dihapus

        // 1. Saat tombol .btn-delete di tabel diklik
        $('#myTable tbody').on('click', '.btn-delete', function () {
            // Ambil ID dari tombol yang diklik
            deleteId = $(this).data('id');
            // Tampilkan modal konfirmasi
            $('#deleteModal').modal('show');
        });

        // 2. Saat tombol konfirmasi "Ya" di dalam modal diklik
        $('#confirmDeleteBtn').on('click', function () {
            // Dapatkan ID user yang sedang login (disimpan di session)
            // Pastikan Anda sudah mengatur ini di template utama atau view
            const loggedInUserId = <?= session()->get('id') ?? 'null' ?>;

            // Validasi Sisi Klien (Client-side)
            if (deleteId == loggedInUserId) {
                 Swal.fire('Aksi Ditolak', 'Anda tidak dapat menghapus akun yang sedang digunakan!', 'error');
            return;
            }

            // Jika validasi lolos, kirim request hapus ke controller
            // Kita gunakan form dinamis untuk mengirim request POST
            const form = $('<form>', {
                'method': 'POST',
                'action': `<?= base_url('dashboard/delete/') ?>${deleteId}`
            }).appendTo('body');

            // Tambahkan CSRF token jika Anda menggunakannya
            // form.append('<input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">');

            form.submit();
        });
    });
</script>
<!-- end of Script modal -->
 <!-- end of databale script -->
<!-- script waktu untuk welcome -->
<script>
    function updateWaktu() {
        // Buat objek tanggal baru setiap kali fungsi dijalankan
        const sekarang = new Date();

        // Opsi format untuk tanggal (e.g., Senin, 26 Mei 2025)
        const opsiTanggal = {
            weekday: 'long',
            year: 'numeric',
            month: 'long',
            day: 'numeric'
        };

        // Opsi format untuk jam (e.g., 12:47:09)
        const opsiWaktu = {
            hour: '2-digit',
            minute: '2-digit',
            second: '2-digit',
            hour12: false // Gunakan format 24 jam
        };

        // Ubah tanggal & waktu ke format string Bahasa Indonesia
        const tanggalString = sekarang.toLocaleDateString('id-ID', opsiTanggal);
        let waktuString = sekarang.toLocaleTimeString('id-ID', opsiWaktu);

        // Mengganti format titik dari toLocaleTimeString menjadi titik dua
        waktuString = waktuString.replace(/\./g, ':');

        // Masukkan hasilnya ke dalam elemen HTML
        document.getElementById('tanggal-live').innerText = tanggalString;
        document.getElementById('jam-live').innerText = waktuString;
    }

    // Jalankan fungsi updateWaktu() setiap 1000 milidetik (1 detik)
    setInterval(updateWaktu, 1000);

    // Jalankan juga fungsinya sekali saat halaman pertama kali dimuat
    updateWaktu();
</script>
<!-- end of scrupt waktu untuk welcome -->

<!--begin::Third Party Plugin(OverlayScrollbars)-->
<script src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.10.1/browser/overlayscrollbars.browser.es6.min.js"
    integrity="sha256-dghWARbRe2eLlIJ56wNB+b760ywulqK3DzZYEpsg2fQ=" crossorigin="anonymous"></script>
<!--end::Third Party Plugin(OverlayScrollbars)--><!--begin::Required Plugin(popperjs for Bootstrap 5)-->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
    crossorigin="anonymous"></script>
<!--end::Required Plugin(popperjs for Bootstrap 5)--><!--begin::Required Plugin(Bootstrap 5)-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
    integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
    crossorigin="anonymous"></script>
<!--end::Required Plugin(Bootstrap 5)--><!--begin::Required Plugin(AdminLTE)-->
<script src="<?= base_url('assets-dashboard/js/adminlte.js') ?>"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!--end::Required Plugin(AdminLTE)--><!--begin::OverlayScrollbars Configure-->
<script>
    const SELECTOR_SIDEBAR_WRAPPER = '.sidebar-wrapper';
    const Default = {
        scrollbarTheme: 'os-theme-light',
        scrollbarAutoHide: 'leave',
        scrollbarClickScroll: true,
    };
    document.addEventListener('DOMContentLoaded', function () {
        const sidebarWrapper = document.querySelector(SELECTOR_SIDEBAR_WRAPPER);
        if (sidebarWrapper && typeof OverlayScrollbarsGlobal?.OverlayScrollbars !== 'undefined') {
            OverlayScrollbarsGlobal.OverlayScrollbars(sidebarWrapper, {
                scrollbars: {
                    theme: Default.scrollbarTheme,
                    autoHide: Default.scrollbarAutoHide,
                    clickScroll: Default.scrollbarClickScroll,
                },
            });
        }
    });
</script>
<!--end::OverlayScrollbars Configure-->
<!-- OPTIONAL SCRIPTS -->
<!-- sortablejs -->
<script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"
    integrity="sha256-ipiJrswvAR4VAx/th+6zWsdeYmVae0iJuiR+6OqHJHQ=" crossorigin="anonymous"></script>
<!-- sortablejs -->
<script>
    const connectedSortables = document.querySelectorAll('.connectedSortable');
    connectedSortables.forEach((connectedSortable) => {
        let sortable = new Sortable(connectedSortable, {
            group: 'shared',
            handle: '.card-header',
        });
    });

    const cardHeaders = document.querySelectorAll('.connectedSortable .card-header');
    cardHeaders.forEach((cardHeader) => {
        cardHeader.style.cursor = 'move';
    });
</script>
<!-- apexcharts -->
<script src="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.min.js"
    integrity="sha256-+vh8GkaU7C9/wbSLIcwq82tQ2wTf44aOHA8HlBMwRI8=" crossorigin="anonymous"></script>
<!-- ChartJS -->
<script>
    // NOTICE!! DO NOT USE ANY OF THIS JAVASCRIPT
    // IT'S ALL JUST JUNK FOR DEMO
    // ++++++++++++++++++++++++++++++++++++++++++

    const sales_chart_options = {
        series: [
            {
                name: 'Digital Goods',
                data: [28, 48, 40, 19, 86, 27, 90],
            },
            {
                name: 'Electronics',
                data: [65, 59, 80, 81, 56, 55, 40],
            },
        ],
        chart: {
            height: 300,
            type: 'area',
            toolbar: {
                show: false,
            },
        },
        legend: {
            show: false,
        },
        colors: ['#0d6efd', '#20c997'],
        dataLabels: {
            enabled: false,
        },
        stroke: {
            curve: 'smooth',
        },
        xaxis: {
            type: 'datetime',
            categories: [
                '2023-01-01',
                '2023-02-01',
                '2023-03-01',
                '2023-04-01',
                '2023-05-01',
                '2023-06-01',
                '2023-07-01',
            ],
        },
        tooltip: {
            x: {
                format: 'MMMM yyyy',
            },
        },
    };

    const sales_chart = new ApexCharts(
        document.querySelector('#revenue-chart'),
        sales_chart_options,
    );
    sales_chart.render();
</script>
<!-- jsvectormap -->
<script src="https://cdn.jsdelivr.net/npm/jsvectormap@1.5.3/dist/js/jsvectormap.min.js"
    integrity="sha256-/t1nN2956BT869E6H4V1dnt0X5pAQHPytli+1nTZm2Y=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/jsvectormap@1.5.3/dist/maps/world.js"
    integrity="sha256-XPpPaZlU8S/HWf7FZLAncLg2SAkP8ScUTII89x9D3lY=" crossorigin="anonymous"></script>
<!-- jsvectormap -->
<script>
    const visitorsData = {
        US: 398, // USA
        SA: 400, // Saudi Arabia
        CA: 1000, // Canada
        DE: 500, // Germany
        FR: 760, // France
        CN: 300, // China
        AU: 700, // Australia
        BR: 600, // Brazil
        IN: 800, // India
        GB: 320, // Great Britain
        RU: 3000, // Russia
    };

    // World map by jsVectorMap
    const map = new jsVectorMap({
        selector: '#world-map',
        map: 'world',
    });

    // Sparkline charts
    const option_sparkline1 = {
        series: [
            {
                data: [1000, 1200, 920, 927, 931, 1027, 819, 930, 1021],
            },
        ],
        chart: {
            type: 'area',
            height: 50,
            sparkline: {
                enabled: true,
            },
        },
        stroke: {
            curve: 'straight',
        },
        fill: {
            opacity: 0.3,
        },
        yaxis: {
            min: 0,
        },
        colors: ['#DCE6EC'],
    };

    const sparkline1 = new ApexCharts(document.querySelector('#sparkline-1'), option_sparkline1);
    sparkline1.render();

    const option_sparkline2 = {
        series: [
            {
                data: [515, 519, 520, 522, 652, 810, 370, 627, 319, 630, 921],
            },
        ],
        chart: {
            type: 'area',
            height: 50,
            sparkline: {
                enabled: true,
            },
        },
        stroke: {
            curve: 'straight',
        },
        fill: {
            opacity: 0.3,
        },
        yaxis: {
            min: 0,
        },
        colors: ['#DCE6EC'],
    };

    const sparkline2 = new ApexCharts(document.querySelector('#sparkline-2'), option_sparkline2);
    sparkline2.render();

    const option_sparkline3 = {
        series: [
            {
                data: [15, 19, 20, 22, 33, 27, 31, 27, 19, 30, 21],
            },
        ],
        chart: {
            type: 'area',
            height: 50,
            sparkline: {
                enabled: true,
            },
        },
        stroke: {
            curve: 'straight',
        },
        fill: {
            opacity: 0.3,
        },
        yaxis: {
            min: 0,
        },
        colors: ['#DCE6EC'],
    };

    const sparkline3 = new ApexCharts(document.querySelector('#sparkline-3'), option_sparkline3);
    sparkline3.render();
</script>
<!--end::Script-->
</body>
<!--end::Body-->

</html>