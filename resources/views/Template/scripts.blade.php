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
                    Swal.fire({
                    title: "Terhapus!",
                    text: "Data Telah Dihapus.",
                    icon: "success"
                    });
                }
                });
        });
    });
    
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

