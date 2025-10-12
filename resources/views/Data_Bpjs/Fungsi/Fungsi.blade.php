<script type="text/javascript">
$(function () {

    $.ajaxSetup({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
    });

    $(document).ready(function() {

        // ================= LIHAT DETAIL BPJS ==================
        $(document).on('click', '.detailBpjs', function() {
            const id = $(this).data('id');

            $.ajax({
                url: '/data-bpjs/detail/'+id,
                type: 'GET',
                success: function(res) {
                    if (res.success) {
                        const d = res.bpjs;
                        const rincian = res.rincian;

                        // Isi data induk BPJS ke modal
                        $('#detailEbilling').text(d.ebilling || '-');
                        $('#detailNtpn').text(d.ntpn || '-');
                        $('#detailAkun').text(d.akun_potongan || '-');
                        $('#detailNamaNpwp').text(d.nama_npwp || '-');
                        $('#detailNomorNpwp').text(d.nomor_npwp || '-');
                        $('#detailTotal').text(parseFloat(d.nilai_potongan).toLocaleString('id-ID'));

                        // Tampilkan rincian
                        let html = '';
                        if (rincian.length > 0) {
                            rincian.forEach((r, i) => {
                                html += `
                                    <tr>
                                        <td>${i + 1}</td>
                                        <td>${r.jenis_pajak ?? '-'}</td>
                                        <td>${r.tanggal_sp2d ? new Date(r.tanggal_sp2d).toLocaleDateString('id-ID') : '-'}</td>
                                        <td>${r.nomor_sp2d ?? '-'}</td>
                                        <td class="text-end">${parseFloat(r.nilai_sp2d || 0).toLocaleString('id-ID')}</td>
                                        <td class="text-end">${parseFloat(r.nilai_pajak || 0).toLocaleString('id-ID')}</td>
                                    </tr>
                                `;
                            });
                        } else {
                            html = `<tr><td colspan="4" class="text-center">Tidak ada rincian potongan</td></tr>`;
                        }

                        $('#rincianBpjsBody').html(html);
                        $('#modalDetailBpjs').modal('show');
                    } else {
                        alert(res.message);
                    }
                }
            });
        });

        // ================= LOAD DATA BPJS ==================
        $('#tabelbpjs').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('data-bpjs.data') }}",
            columns: [
                { data: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'akun_potongan', name: 'akun_potongan' },
                { data: 'nilai_potongan', name: 'nilai_potongan', className: 'text-end' },
                { data: 'ebilling', name: 'ebilling' },
                { data: 'ntpn', name: 'ntpn' },
                { data: 'status', name: 'status' },
                { data: 'action', name: 'action', orderable: false, searchable: false, className: 'text-center' }
            ],
            language: {
                search: "Cari:",
                lengthMenu: "Tampilkan _MENU_ data per halaman",
                info: "Menampilkan _START_ - _END_ dari _TOTAL_ data",
                paginate: { previous: "Sebelumnya", next: "Berikutnya" },
                emptyTable: "Belum ada data BPJS tersimpan"
            },
            pageLength: 10
        });

        // ================= MODAL ==================
        $('#btnTambahBpjs').click(function() {
            $('#modalTambahBpjs').modal('show');
        });

        $('#btnPilihDariSipd').click(function() {
            $('#modalDataSipd').modal('show');
            loadSipdData();
        });

        // ================= LOAD DATA SP2D (SIPD) ==================
        // 🔹 Load Data SP2D
        function loadSipdData() {
            // Cegah DataTable duplikat
            if ($.fn.DataTable.isDataTable('#tabelSipd')) {
                $('#tabelSipd').DataTable().destroy();
            }

            // Inisialisasi DataTable baru
            $('#tabelSipd').DataTable({
                processing: true,
                serverSide: true,
                destroy: true,
                ajax: "{{ route('data-bpjs.sp2d.data') }}", // route dari controller getSp2dAjax
                columns: [
                    { data: 'DT_RowIndex', orderable: false, searchable: false },
                    { data: 'nama_skpd', name: 'nama_skpd' },
                    { data: 'tanggal_sp2d', name: 'tanggal_sp2d' },
                    { data: 'nomor_sp2d', name: 'nomor_sp2d' },
                    { data: 'nilai_sp2d', name: 'nilai_sp2d', className: 'text-end' },
                    { data: 'nilai_potongan', name: 'nilai_potongan', className: 'text-end' },
                    { data: 'action', name: 'action', orderable: false, searchable: false, className: 'text-center' }
                ],
                    language: {
                    search: "Cari:",
                    lengthMenu: "Tampilkan _MENU_ data per halaman",
                    info: "Menampilkan _START_ - _END_ dari _TOTAL_ data",
                    paginate: { previous: "Sebelumnya", next: "Berikutnya" },
                    emptyTable: "Belum ada data SP2D"
                }
            });
        }

        // 🔹 Klik tombol "Pilih SP2D"
        $(document).on('click', '.pilihSp2d', function() {
            const idPotongan = $(this).data('idpotongan');
            const tgl = $(this).data('tgl');
            const no = $(this).data('no');
            const nilai = $(this).data('nilai');

            // ✅ Cek apakah SP2D ini sudah ada di tabel potongan
            let sudahAda = false;
            const idPotonganExisting = $(this).data('idpotongan');
        $('#tabelPotongan tbody tr').each(function() {
            const existingId = $(this).data('idpotongan');
            if (existingId == idPotonganExisting) {
                sudahAda = true;
                return false;
            }
        });

            // ✅ Jika sudah pernah dipilih, tampilkan SweetAlert dan hentikan
            if (sudahAda) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Maaf!',
                    text: 'Data SP2D ini sudah pernah dipilih sebelumnya.',
                    timer: 2000,
                    showConfirmButton: false
                });
                return;
            }

            // ✅ Jika belum ada, tambahkan baris baru
            const row = `
                <tr data-idpotongan="${idPotongan}">
                    <td>${$('#tabelPotongan tbody tr').length + 1}</td>
                    <td>${tgl}</td>
                    <td>${no}</td>
                    <td class="text-end">${parseFloat(nilai).toLocaleString('id-ID')}</td>
                    <td><button class="btn btn-danger btn-sm hapusRow">Hapus</button></td>
                </tr>
            `;
            $('#tabelPotongan tbody').append(row);
            renumberRows();
            hitungTotalPotongan(); // update total
            $('#modalDataSipd').modal('hide');
        });

        // ================= HAPUS ROW ==================
        $(document).on('click', '.hapusRow', function() {
            $(this).closest('tr').remove();
            renumberRows();
            hitungTotalPotongan(); // ✅ update total
        });

        // 🔹 Fungsi untuk menata ulang nomor urut
        function renumberRows() {
            $('#tabelPotongan tbody tr').each(function(index) {
                $(this).find('td:first').text(index + 1);
            });
        }

        function hitungTotalPotongan() {
            let total = 0;
            $('#tabelPotongan tbody tr').each(function() {
                const nilaiText = $(this).find('td:eq(3)').text().replace(/\./g, '').replace(/,/g, '').trim();
                const nilai = parseFloat(nilaiText) || 0;
                total += nilai;
            });

            // tampilkan total dengan format angka Indonesia
            $('#totalPotongan').text(total.toLocaleString('id-ID'));
        }

        // ================= SIMPAN BPJS ==================
        $('#btnSimpanBpjs').click(function() {
            const potongan = [];
            $('#tabelPotongan tbody tr').each(function() {
                const row = $(this).find('td');
                potongan.push({
                    idPotongan: $(this).data('idpotongan') || null,
                    tanggal_sp2d: $(row[1]).text(),
                    nomor_sp2d: $(row[2]).text(),
                    nilai_potongan: $(row[3]).text().replace(/\./g, '').trim()
                });
            });

            if (potongan.length === 0) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Belum ada data potongan!',
                    text: 'Silakan pilih minimal satu potongan dari SIPD terlebih dahulu.'
                });
                return;
            }

            // 🔹 Konfirmasi sebelum simpan
            Swal.fire({
                title: 'Simpan Data BPJS?',
                text: "Pastikan semua data sudah benar!",
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Ya, Simpan!',
                cancelButtonText: 'Batal',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {

                    // 🔹 Tampilkan loading SweetAlert
                    Swal.fire({
                        title: 'Menyimpan data...',
                        text: 'Mohon tunggu sebentar',
                        allowOutsideClick: false,
                        didOpen: () => {
                            Swal.showLoading();
                        }
                    });

                    // 🔹 Proses AJAX simpan data
                    $.ajax({
                        url: "{{ route('data-bpjs.simpan') }}",
                        type: "POST",
                        data: {
                            _token: "{{ csrf_token() }}",
                            potongan: JSON.stringify(potongan),
                            ebilling: $('#ebilling').val(),
                            ntpn: $('#ntpn').val(),
                            akun_potongan: $('#akun_potongan').val(),
                            nama_npwp: $('#nama_npwp').val(),
                            nomor_npwp: $('#nomor_npwp').val(),
                            rek_belanja: $('#rek_belanja').val()
                        },
                        success: function(res) {
                            Swal.close(); // tutup loading

                            if (res.success) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Berhasil!',
                                    text: res.message,
                                    showConfirmButton: false,
                                    timer: 1800
                                });

                                // tutup modal dan reload tabel
                                $('#modalTambahBpjs').modal('hide');
                                setTimeout(() => {
                                    location.reload();
                                }, 1800);
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Gagal!',
                                    text: res.message
                                });
                            }
                        },
                        error: function(xhr, status, error) {
                            Swal.close();
                            Swal.fire({
                                icon: 'error',
                                title: 'Terjadi Kesalahan!',
                                text: xhr.responseJSON?.message || error
                            });
                        }
                    });
                }
            });
        });

        // 🔹 Hapus Data BPJS
        $(document).on('click', '.hapusBpjs', function(e) {
            e.preventDefault();
            const id = $(this).data('id'); // ambil ID dari tombol

            Swal.fire({
                title: 'Hapus Data?',
                text: 'Data BPJS yang dihapus tidak bisa dikembalikan!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    // tampilkan loading
                    Swal.fire({
                        title: 'Menghapus data...',
                        allowOutsideClick: false,
                        didOpen: () => {
                            Swal.showLoading();
                        }
                    });

                    // kirim AJAX delete
                    $.ajax({
                        url: `/data-bpjs/hapus/${id}`,
                        type: 'DELETE',
                        data: {
                            _token: "{{ csrf_token() }}"
                        },
                        success: function(res) {
                            Swal.close();
                            if (res.success) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Berhasil!',
                                    text: res.message,
                                    timer: 1500,
                                    showConfirmButton: false
                                });

                                // reload DataTable
                                $('#tabelbpjs').DataTable().ajax.reload(null, false);
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Gagal!',
                                    text: res.message
                                });
                            }
                        },
                        error: function(xhr) {
                            Swal.close();
                            Swal.fire({
                                icon: 'error',
                                title: 'Terjadi Kesalahan!',
                                text: xhr.responseJSON?.message || 'Gagal menghapus data.'
                            });
                        }
                    });
                }
            });
        });

    });



});
</script>
