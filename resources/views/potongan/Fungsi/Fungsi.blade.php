<meta name="csrf-token" content="{{ csrf_token() }}">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script type="text/javascript">
$(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var table = $('.registersp2d').DataTable({
        processing: true,
        serverSide: true,
        ajax: "/tampilregsp2d",
        order: [[1, 'desc']], // ✅ urutkan pakai kolom DB
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable:false, searchable:false},
            {data: 'nomor_spm', name: 'nomor_spm'},
            {data: 'tanggal_sp2d', name: 'tanggal_sp2d'},
            {data: 'nomor_sp2d', name: 'nomor_sp2d'},
            {data: 'nama_skpd', name: 'nama_skpd'},
            {data: 'nama_pihak_ketiga', name: 'nama_pihak_ketiga'},
            {data: 'keterangan_sp2d', name: 'keterangan_sp2d'},
            {data: 'jenis', name: 'jenis'},
            {data: 'nilai_sp2d', name: 'nilai_sp2d'},
            {data: 'aksi', name: 'aksi', orderable:false, searchable:false}
        ]
    });

});

// =================== UBAH STATUS ===================
function ubahStatus(nomor_sp2d)
{
    Swal.fire({
        title: 'Input Pajak?',
        text: 'Status akan berubah menjadi INPUT',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Ya'
    }).then((result) => {
        if(result.isConfirmed){
            $.post("{{ route('potongan.ubahStatus') }}", {
                nomor_sp2d: nomor_sp2d
            }, function(res){
                Swal.fire('Berhasil', res.message, 'success');
                $('.registersp2d').DataTable().ajax.reload(null,false);
            });
        }
    });
}
</script>
