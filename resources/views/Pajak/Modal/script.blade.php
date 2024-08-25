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
      $(document).on('click', '#btn-edit-pajakls', function(){
          let id2 = $(this).data('id2');
          let ebilling2 = $(this).data('ebilling2');
          let akun_pajak = $(this).data('akun_pajak');
          let ntpn = $(this).data('ntpn');
          let jenis_pajak2 = $(this).data('jenis_pajak2');
          let rek_belanja = $(this).data('rek_belanja');
          let nama_npwp = $(this).data('nama_npwp');
          let npwp_pihak_ketiga2 = $(this).data('npwp_pihak_ketiga2');
    
          $('#edit-id2').val(id2);
          $('#edit-ebilling2').val(ebilling2);
          $('#edit-akun_pajak').val(akun_pajak);
          $('#edit-ntpn').val(ntpn);
          $('#edit-jenis_pajak2').val(jenis_pajak2);
          $('#edit-rek_belanja').val(rek_belanja);
          $('#edit-nama_npwp').val(nama_npwp);
          $('#edit-nomor_npwp').val(nomor_npwp);
    
      });
    </script> --}}
    
    <script>
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
    
          $('#edit-id5').val(id5);
          $('#edit-ebilling5').val(ebilling5);
          $('#edit-akun_pajak5').val(akun_pajak5);
          $('#edit-ntpn5').val(ntpn5);
          $('#edit-jenis_pajak5').val(jenis_pajak5);
          $('#edit-rek_belanja5').val(rek_belanja5);
          $('#edit-nama_npwp5').val(nama_npwp5);
          $('#edit-nomor_npwp5').val(nomor_npwp5);
          $('#edit-nilai_pajak').val(nilai_pajak);
    
      });
    </script>