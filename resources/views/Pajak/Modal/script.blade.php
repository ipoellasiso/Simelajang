<script>
    $(document).on('click', '#btn-edit-pajakkpptolak', function(){
        let id = $(this).data('id');
        let ebilling = $(this).data('ebilling');
        let ntpn = $(this).data('ntpn');
    
        $('#edit-id').val(id);
        $('#edit-ebilling').val(ebilling);
        $('#edit-ntpn').val(ntpn);
    
    });
    </script>
    
    <script>
      $(document).on('click', '#btn-edit-pajakkppterima', function(){
          let id1 = $(this).data('id1');
          let ebilling1 = $(this).data('ebilling1');
          let ntpn1 = $(this).data('ntpn1');
    
          $('#edit-id1').val(id1);
          $('#edit-ebilling1').val(ebilling1);
          $('#edit-ntpn1').val(ntpn1);
    
      });
    </script>
    
    {{-- <script>
      $(document).on('click', '#btn-showls', function(){
          let id6 = $(this).data('id6');
          let tanggal_spm6 = $(this).data('tanggal_spm6');
          let nomor_spm6 = $(this).data('nomor_spm6');
          let nilai_sp2d6 = $(this).data('nilai_sp2d6');
          let tanggal_sp2d6 = $(this).data('tanggal_sp2d6');
          let nomor_sp2d6 = $(this).data('nomor_sp2d6');
          let ebilling6 = $(this).data('ebilling6');
          let akun_pajak6 = $(this).data('akun_pajak6');
          let ntpn6 = $(this).data('ntpn6');
          let jenis_pajak6 = $(this).data('jenis_pajak6');
          let rek_belanja6 = $(this).data('rek_belanja6');
          let nama_npwp6 = $(this).data('nama_npwp6');
          let nomor_npwp6 = $(this).data('nama_npwp6');
          let nilai_pajak = $(this).data('nilai_pajak');

          $('#edit-id6').val(id6);
          $('#edit-tanggal_spm6').val(tanggal_spm6);
          $('#edit-nomor_spm6').val(nomor_spm6);
          $('#edit-nilai_sp2d6').val(nilai_sp2d6);
          $('#edit-tanggal_sp2d6').val(tanggal_sp2d6);
          $('#edit-nomor_sp2d6').val(nomor_sp2d6);
          $('#edit-ebilling6').val(ebilling6);
          $('#edit-akun_pajak6').val(akun_pajak6);
          $('#edit-ntpn6').val(ntpn6);
          $('#edit-jenis_pajak6').val(jenis_pajak6);
          $('#edit-rek_belanja6').val(rek_belanja6);
          $('#edit-nama_npwp6').val(nama_npwp6);
          $('#edit-nomor_npwp6').val(nomor_npwp6);
          $('#edit-nilai_pajak').val(nilai_pajak);
    
      });
    </script> --}}
    
    {{-- <script>
      $(document).on('click', '#btn-edit-pajakkpp3', function(){
          let id5 = $(this).data('id5');
          let ebilling5 = $(this).data('ebilling5');
          let akun_pajak5 = $(this).data('akun_pajak5');
          let ntpn5 = $(this).data('ntpn5');
          let jenis_pajak5 = $(this).data('jenis_pajak5');
          let rek_belanja5 = $(this).data('rek_belanja5');
          let nama_npwp5 = $(this).data('nama_npwp5');
          let nomor_npwp5 = $(this).data('nomor_npwp5');
          let nilai_pajak = $(this).data('nilai_pajak');
          let id_potonganls5 = $(this).data('id_potonganls5');
    
          $('#edit-id5').val(id5);
          $('#edit-ebilling5').val(ebilling5);
          $('#edit-akun_pajak5').val(akun_pajak5);
          $('#edit-ntpn5').val(ntpn5);
          $('#edit-jenis_pajak5').val(jenis_pajak5);
          $('#edit-rek_belanja5').val(rek_belanja5);
          $('#edit-nama_npwp5').val(nama_npwp5);
          $('#edit-nomor_npwp5').val(nomor_npwp5);
          $('#edit-nilai_pajak').val(nilai_pajak);
          $('#edit-id_potonganls5').val(id_potonganls5);
    
      });
    </script> --}}

<script type="text/javascript">
  var rupiah = document.getElementById('rupiah');
  rupiah.addEventListener('keyup', function(e){
    rupiah.value = formatRupiah(this.value, '');
  })

  function formatRupiah(angka, prefix){
    var number_string = angka.replace(/[^,\d]/g, '').toString(),
    split = number_string.split(','),
    sisa = split[0].length % 3,
    rupiah = split[0].substr(0, sisa),
    ribuan = split[0].substr(sisa).match(/\d{3}/gi);

    if(ribuan) {
      separator = sisa ? '.' : '';
      rupiah += separator + ribuan.join('.');
    }

    rupiah = split[1] != undefined ? rupiah +','+ split[1] : rupiah;
    return prefix == undefined ? rupiah : (rupiah ? '' + rupiah: '');
  }
</script>

<script>
  function previewImage(){
    var pajakid3 = $(this).attr("data-pajakkppls3");
    const image = document.querySelector('#bukti_pemby');
    const imgPreview = document.querySelector('.img-preview');

    imgPreview.style.display = 'block';

    const oFReader = new FileReader();
    oFReader.readAsDataURL(bukti_pemby.files[0]);

    oFReader.onload = function(oFRevent){
      imgPreview.src = oFRevent.target.result;
    }
  }
</script>
