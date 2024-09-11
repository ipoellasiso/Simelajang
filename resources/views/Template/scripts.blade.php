<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="{{ asset('template/assets/js/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('template/assets/js/rt-plugins.js') }}"></script>
<script src="{{ asset('template/assets/js/app.js') }}"></script>
<script src="{{ asset('js/jquery.mask.min.js') }}"></script>
<script src="{{ asset('js/jquery.min.js') }}"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    @if (session('edit'))
        Swal.fire({
          position: "top-center",
          text: "Success",
          icon: "success",
          title: "{{ Session::get('edit') }}",
          showConfirmButton: false,
          timer: 3500
        });
    @endif
</script>

<script>
    @if (session('error'))
        Swal.fire({
          position: "top-center",
          text: "Upss Sorry !",
          icon: "error",
          title: "{{ Session::get('error') }}",
          showConfirmButton: false,
          timer: 5500
        });
    @endif
</script>

<script>
    @if (session('status'))
        Swal.fire({
          position: "top-center",
          text: "Success",
          icon: "success",
          title: "{{ Session::get('status') }}",
          showConfirmButton: false,
          timer: 3500
        });
    @endif
</script>

<script>
    $(".swal-confirm").click(function(){
        var userid = $(this).attr('data-id');
            Swal.fire({
            title: "Yakin ?",
            text: "Anda Ingin Menghapus User dengan id "+userid+" ",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya, Hapus!"
            }).then((result) => {
            if (result.isConfirmed) {
                window.location = "/hapus-user/"+userid+""
                Swal.fire({
                title: "Dihapus!",
                text: "Data Telah Dihapus.",
                icon: "success"   
                }); 
            }
            });
    });
</script>

<script>
    $(function(){
        $(document).on('click','#konfirmlpj', function(e){
            e.preventDefault();
            var lpjid = $(this).attr("data-lpj");
            var lpjid2 = $(this).attr("data-lpj2");
                Swal.fire({
                title: "Anda Yakin?",
                text: "Menyimpan TBP dengan Nomor "+lpjid+" ini",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya"
                }).then((result) => {
                if (result.isConfirmed) {
                    window.location = "{{ route('simpanlpj') }}?id="+lpjid2+""
                    // Swal.fire({
                    // text: "TBP Telah Disimpan.",
                    // title: "Tersimpan!",
                    // icon: "success"
                    // });
                }
                });
        });
    });
    
</script>

<script>
    $(function(){
        $(document).on('click','#deletea', function(e){
            e.preventDefault();
            var userid = $(this).attr("data-idopd");
                Swal.fire({
                title: "Anda Yakin?",
                text: "Menghapus Data ini",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya, Hapus!"
                }).then((result) => {
                if (result.isConfirmed) {
                    window.location = "/hapus-opd/"+userid+""
                    Swal.fire({
                    title: "Terhapus!",
                    text: "User Telah Dihapus.",
                    icon: "success"
                    });
                }
                });
        });
    });
    
</script>

<script>
    $(function(){
        $(document).on('click','#deleteakunpajak', function(e){
            e.preventDefault();
            var userid = $(this).attr("data-akunpajak");
                Swal.fire({
                title: "Anda Yakin?",
                text: "Menghapus Data ini",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya, Hapus!"
                }).then((result) => {
                if (result.isConfirmed) {
                    window.location = "/hapus-akunpajak/"+userid+""
                    Swal.fire({
                    title: "Terhapus!",
                    text: "User Telah Dihapus.",
                    icon: "success"
                    });
                }
                });
        });
    });
    
</script>

<script>
    $(function(){
        $(document).on('click','#deletejenispajak', function(e){
            e.preventDefault();
            var userid = $(this).attr("data-jenispajak");
                Swal.fire({
                title: "Anda Yakin?",
                text: "Menghapus Data ini",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya, Hapus!"
                }).then((result) => {
                if (result.isConfirmed) {
                    window.location = "/hapus-jenispajak/"+userid+""
                    Swal.fire({
                    title: "Terhapus!",
                    text: "User Telah Dihapus.",
                    icon: "success"
                    });
                }
                });
        });
    });
    
</script>

<script>
    $(function(){
        $(document).on('click','#deletepajakkpp', function(e){
            e.preventDefault();
            var pajakid = $(this).attr("data-pajakkpp");
                Swal.fire({
                title: "Anda Yakin?",
                text: "Menghapus Data ini",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya, Hapus!"
                }).then((result) => {
                if (result.isConfirmed) {
                    window.location = "/hapus-pajakls/"+pajakid+""
                    // window.location = "/update-pajakls/"+pajakid+""
                    // Swal.fire({
                    // title: "Terhapus!",
                    // text: "Data Telah Dihapus.",
                    // icon: "success"
                    // });
                }
                });
        });
    });
    
</script>

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

{{-- <script>
    $(document).ready(function(){


    });

    function read(){
            $.get("{{ url('tampilakunpajak') }}",{},function(data, status){

            });
    }

    function createakunpajak(){
            $.get("{{ url('createakunpajak') }}",{},function(data, status){
                $("#page").html(data);
                $("#tambah_modal").modal('show');
            });
        }
    
    function store(){
        var akun_pajak = $("#akun_pajak").val();
        $.ajax({
            type: "get",
            url: "{{ url('simpanakunpajak') }}",
            data: "akun_pajak=" + akun_pajak,
            success: function(data) {
                // $("#page").html(data);
            }
        });
    }

</script> --}}

<script>
    $(function(){
        $(document).on('click','#btn-pajakkpptolak', function(e){
            e.preventDefault();
            var sp2d = $(this).attr("data-sp2d");
            var id = $(this).attr("data-pajakkppls1");
                Swal.fire({
                title: "Anda Yakin?",
                text: "Tolak Pajak dengan Nomor SP2D "+id+" ini",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya"
                }).then((result) => {
                if (result.isConfirmed) {
                    window.location = "update-pajakls/"+id+""
                    // Swal.fire({
                    // text: "TBP Telah Disimpan.",
                    // title: "Tersimpan!",
                    // icon: "success"
                    // });
                }
                });
        });
    });
    
</script>

<script>
    function rupiah($angka){
        $hasil_rupiaha = "" . number_format($angka,0,',','.');
        return $hasil_rupiaha;
    }
</script>

