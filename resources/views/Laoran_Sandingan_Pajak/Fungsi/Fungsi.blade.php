<script type="text/javascript">
    $(function () {

      /*------------------------------------------
       --------------------------------------------
       Pass Header Token
       --------------------------------------------
       --------------------------------------------*/
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

      /*------------------------------------------
      --------------------------------------------
      Render DataTable
      --------------------------------------------
      --------------------------------------------*/
      // LS
      $(document).ready(function() {

        // ======================================
        // 1️⃣ REGISTER FILTER KHUSUS BULAN & OPD
        // ======================================
        $.fn.dataTable.ext.search.push(function(settings, data) {
            let bulanDipilih = $('#filterBulan').val();
            let opdDipilih   = $('#filterOpd').val().toLowerCase();

            // Ambil nilai kolom dari tabel
            let tanggalSP2D = data[2] || ''; // kolom ke-3 = tanggal_sp2d
            let namaOPD = (data[5] || '').toLowerCase();

            // Default tampil semua
            let cocokBulan = true;
            let cocokOpd = true;

            // ====== Filter Bulan ======
            if (bulanDipilih) {
                // Format di JSON: "2025-01-20"
                let parsed = moment(tanggalSP2D, "YYYY-MM-DD", true);
                if (parsed.isValid()) {
                    let bulanData = parsed.format('MM');
                    console.log("Tanggal:", tanggalSP2D, "→ Bulan:", bulanData); // debug
                    cocokBulan = (bulanData === bulanDipilih);
                } else {
                    console.warn("Tanggal SP2D tidak dikenali:", tanggalSP2D);
                    cocokBulan = false;
                }
            }

            // ====== Filter OPD ======
            if (opdDipilih) {
                cocokOpd = namaOPD.includes(opdDipilih);
            }

            // Harus lolos dua filter sekaligus
            return cocokBulan && cocokOpd;
        });

        // ======================================
        // 2️⃣ INISIALISASI DATATABLES
        // ======================================
        var table = $('.tabelSandinganPajak').DataTable({
            processing: true,
            serverSide: false,
            ajax: {
                url: "{{ route('laporan.pajak.data') }}",
                dataSrc: 'data'
            },
            columns: [
                { data: null, render: (data, type, row, meta) => meta.row + 1 },
                { data: 'nomor_spm' },
                { data: 'tanggal_sp2d' },
                { data: 'nomor_sp2d' },
                { data: 'nilai_sp2d', render: data => new Intl.NumberFormat('id-ID').format(data) },
                { data: 'nama_opd' },
                { data: 'jenis_pajak' },
                { data: 'nilai_pajak_register', render: data => new Intl.NumberFormat('id-ID').format(data) },
                { data: 'nilai_pajak_inputan', render: data => new Intl.NumberFormat('id-ID').format(data) },
                { data: 'selisih', render: data => new Intl.NumberFormat('id-ID').format(data) },
                { data: 'keterangan_sp2d' }
            ],
            responsive: true,
            language: {
                search: "Cari:",
                zeroRecords: "Tidak ada data pajak ditemukan",
                lengthMenu: "Tampilkan _MENU_ data",
                info: "Menampilkan _START_ - _END_ dari _TOTAL_ data",
                paginate: {
                    first: "Awal", last: "Akhir", next: "→", previous: "←"
                }
            },

            // ======================================
            // 2️⃣ TOTAL DI BAGIAN FOOTER
            // ======================================
            footerCallback: function (row, data, start, end, display) {
                var api = this.api();

                var intVal = function (i) {
                    return typeof i === 'string'
                        ? i.replace(/[^\d.-]/g, '') * 1
                        : typeof i === 'number'
                        ? i
                        : 0;
                };

                // Hitung total dari kolom Register, Inputan, dan Selisih (yang terfilter)
                var totalRegister = api.column(7, { search: 'applied' }).data().reduce((a, b) => a + intVal(b), 0);
                var totalInputan = api.column(8, { search: 'applied' }).data().reduce((a, b) => a + intVal(b), 0);
                var totalSelisih = api.column(9, { search: 'applied' }).data().reduce((a, b) => a + intVal(b), 0);

                // Tampilkan total ke footer tabel
                $(api.column(7).footer()).html(new Intl.NumberFormat('id-ID').format(totalRegister));
                $(api.column(8).footer()).html(new Intl.NumberFormat('id-ID').format(totalInputan));
                $(api.column(9).footer()).html(new Intl.NumberFormat('id-ID').format(totalSelisih));
            }

        });

        // ======================================
        // 3️⃣ EVENT HANDLER FILTER
        // ======================================

        // Filter Jenis Pajak
        $('#filterPajak').on('change', function() {
            let val = $(this).val().toLowerCase();
            table.column(6).search(val, true, false).draw();
        });

        // Filter Bulan
        $('#filterBulan').on('change', function() {
            table.draw(); // redraw supaya fungsi custom filter jalan
        });

        // Filter OPD
        $('#filterOpd').on('change', function() {
            table.draw(); // redraw juga
        });

        // Tombol Reset
        $('#resetFilter').on('click', function() {
            $('#filterPajak').val('');
            $('#filterBulan').val('');
            $('#filterOpd').val('');
            table.search('').columns().search('').draw();
        });

        // ======================================
        // 4️⃣ HITUNG REKAP PAJAK OTOMATIS
        // ======================================
        function hitungRekap() {
            let data = table.rows({ search: 'applied' }).data();

            let totalPPN = 0;
            let totalPPh21 = 0;
            let totalPPh22 = 0;
            let totalPPh23 = 0;
            let totalPPh42 = 0; // Pajak Penghasilan Ps 4(2)

            data.each(function(row) {
                let jenis = (row.jenis_pajak || '').trim();
                let nilai = parseFloat(row.nilai_pajak_register) || 0;

                if (jenis === 'Pajak Pertambahan Nilai') {
                    totalPPN += nilai;
                } 
                else if (jenis === 'PPH 21') {
                    totalPPh21 += nilai;
                } 
                else if (jenis === 'Pajak Penghasilan Ps 22') {
                    totalPPh22 += nilai;
                } 
                else if (jenis === 'Pajak Penghasilan Ps 23') {
                    totalPPh23 += nilai;
                } 
                else if (jenis === 'Pajak Penghasilan Ps 4 (2)') {
                    totalPPh42 += nilai;
                }
            });

            let totalSemua = totalPPN + totalPPh21 + totalPPh22 + totalPPh23 + totalPPh42;

            // tampilkan di HTML
            $('#rekapPPN').text(new Intl.NumberFormat('id-ID').format(totalPPN));
            $('#rekapPPH21').text(new Intl.NumberFormat('id-ID').format(totalPPh21));
            $('#rekapPPH22').text(new Intl.NumberFormat('id-ID').format(totalPPh22));
            $('#rekapPPH23').text(new Intl.NumberFormat('id-ID').format(totalPPh23));
            $('#rekapPPH24').text(new Intl.NumberFormat('id-ID').format(totalPPh42));
            $('#rekapTotal').text(new Intl.NumberFormat('id-ID').format(totalSemua));
        }

        // Jalankan setiap kali tabel selesai di-draw
        table.on('draw', hitungRekap);

    });

    // GU
    $(document).ready(function () {

        // ======================================
        // 1️⃣ INISIALISASI DATATABLES
        // ======================================
        var table = $('.tabelSandinganPajakgu').DataTable({
            processing: true,
            serverSide: false,
            ajax: {
                url: "{{ route('laporan.pajakgu.data') }}",
                dataSrc: 'data'
            },
            columns: [
                { data: null, render: (data, type, row, meta) => meta.row + 1 },
                { data: 'nomor_spm' },
                { data: 'tanggal_sp2d' },
                { data: 'nomor_sp2d' },
                { data: 'nilai_sp2d', render: data => new Intl.NumberFormat('id-ID').format(data) },
                { data: 'nama_opd' },
                { data: 'nama_pajak_potongan' },
                { data: 'nilai_pajak_register', render: data => new Intl.NumberFormat('id-ID').format(data) },
                { data: 'nilai_pajak_inputan', render: data => new Intl.NumberFormat('id-ID').format(data) },
                { data: 'selisih', render: data => new Intl.NumberFormat('id-ID').format(data) },
                { data: 'keterangan_sp2d' }
            ],
            responsive: true,
            language: {
                search: "Cari:",
                zeroRecords: "Tidak ada data pajak ditemukan",
                lengthMenu: "Tampilkan _MENU_ data",
                info: "Menampilkan _START_ - _END_ dari _TOTAL_ data",
                paginate: {
                    first: "Awal", last: "Akhir", next: "→", previous: "←"
                }
            },

            // ======================================
            // 2️⃣ TOTAL DI BAGIAN FOOTER
            // ======================================
            footerCallback: function (row, data, start, end, display) {
                var api = this.api();

                var intVal = function (i) {
                    return typeof i === 'string'
                        ? i.replace(/[^\d.-]/g, '') * 1
                        : typeof i === 'number'
                        ? i
                        : 0;
                };

                // Hitung total dari kolom Register, Inputan, dan Selisih (yang terfilter)
                var totalRegister = api.column(7, { search: 'applied' }).data().reduce((a, b) => a + intVal(b), 0);
                var totalInputan = api.column(8, { search: 'applied' }).data().reduce((a, b) => a + intVal(b), 0);
                var totalSelisih = api.column(9, { search: 'applied' }).data().reduce((a, b) => a + intVal(b), 0);

                // Tampilkan total ke footer tabel
                $(api.column(7).footer()).html(new Intl.NumberFormat('id-ID').format(totalRegister));
                $(api.column(8).footer()).html(new Intl.NumberFormat('id-ID').format(totalInputan));
                $(api.column(9).footer()).html(new Intl.NumberFormat('id-ID').format(totalSelisih));
            }
        });

        // ======================================
        // 3️⃣ FILTER KHUSUS BULAN & OPD
        // ======================================
        $.fn.dataTable.ext.search.push(function (settings, data) {
            let bulanDipilih = $('#filterBulan').val();
            let opdDipilih = ($('#filterOpd').val() || '').toLowerCase();
            let tanggalSP2D = data[2] || ''; // kolom ke-3 = tanggal_sp2d
            let namaOPD = (data[5] || '').toLowerCase();

            let cocokBulan = true;
            let cocokOpd = true;

            // Filter Bulan (format tanggal "YYYY-MM-DD")
            if (bulanDipilih) {
                let parsed = moment(tanggalSP2D, "YYYY-MM-DD", true);
                if (parsed.isValid()) {
                    let bulanData = parsed.format('MM');
                    cocokBulan = bulanData === bulanDipilih;
                } else {
                    cocokBulan = false;
                }
            }

            // Filter OPD
            if (opdDipilih) {
                cocokOpd = namaOPD.includes(opdDipilih);
            }

            return cocokBulan && cocokOpd;
        });

        // ======================================
        // 4️⃣ EVENT FILTER
        // ======================================
        $('#filterPajak').on('change', function () {
            let val = $(this).val().toLowerCase();
            table.column(6).search(val, true, false).draw();
        });

        $('#filterBulan').on('change', function () {
            table.draw();
        });

        $('#filterOpd').on('change', function () {
            table.draw();
        });

        $('#resetFilter').on('click', function () {
            $('#filterPajak').val('');
            $('#filterBulan').val('');
            $('#filterOpd').val('');
            table.search('').columns().search('').draw();
        });

        // ======================================
        // 5️⃣ REKAP PAJAK DI CARD ATAS
        // ======================================
        function hitungRekap() {
            let data = table.rows({ search: 'applied' }).data();

            let totalPPN = 0;
            let totalPPh21 = 0;
            let totalPPh22 = 0;
            let totalPPh23 = 0;
            let totalPPh42 = 0;

            data.each(function (row) {
                let jenis = (row.nama_pajak_potongan || '').trim().toLowerCase();
                let nilai = parseFloat(row.nilai_pajak_register) || 0;

                if (jenis.includes('pajak pertambahan nilai') || jenis === 'ppn') totalPPN += nilai;
                else if (jenis.includes('ps 21') || jenis.includes('pph 21')) totalPPh21 += nilai;
                else if (jenis.includes('ps 22') || jenis.includes('pph 22')) totalPPh22 += nilai;
                else if (jenis.includes('ps 23') || jenis.includes('pph 23')) totalPPh23 += nilai;
                else if (jenis.includes('ps 4') || jenis.includes('4 (2)')) totalPPh42 += nilai;
            });

            let totalSemua = totalPPN + totalPPh21 + totalPPh22 + totalPPh23 + totalPPh42;

            $('#rekapPPN').text(new Intl.NumberFormat('id-ID').format(totalPPN));
            $('#rekapPPH21').text(new Intl.NumberFormat('id-ID').format(totalPPh21));
            $('#rekapPPH22').text(new Intl.NumberFormat('id-ID').format(totalPPh22));
            $('#rekapPPH23').text(new Intl.NumberFormat('id-ID').format(totalPPh23));
            $('#rekapPPH24').text(new Intl.NumberFormat('id-ID').format(totalPPh42));
            $('#rekapTotal').text(new Intl.NumberFormat('id-ID').format(totalSemua));
        }

        // Jalankan setiap kali tabel selesai di-draw
        table.on('draw', function () {
            hitungRekap();
        });
    });

});

</script>