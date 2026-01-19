<!DOCTYPE html>
<html lang="en">
    <head>
        @include('Template.Head')
    </head>
    <body>
        {{-- <div class='loader'> --}}
            {{-- @include('Template.Loading') --}}
        {{-- </div> --}}

        <div class="page-container">
            @include('Template.Navbar')
            @include('Template.Sidebar')
            
            {{-- ######################### Isi Tampil Pajak LS ########################## --}}
            <div class="page-content">
                <div class="main-wrapper">

                    <div class="row">
                        <nav class="breadcrumb breadcrumb-dash">
                            <a href="#" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>{{ $page_title }}</a>
                            <a class="breadcrumb-item" href="#">{{ $breadcumd1 }}</a>
                            <span class="breadcrumb-item active">{{ $breadcumd2 }}</span>
                        </nav>
                        
                        <div class="col">
                            <div class="card">
                                <div class="card-body table-responsive">
                                    <div class="row mb-5">
                                        <div class="col-8">
                                            <h5 class="card-title">{{ $title }}</h5>
                                        </div>
                                    </div>

                                    <table id="zero-conf" class="registersp2d display table table-hover" style="width:100%">
                                        <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nomor SPM</th>
                                            <th>Tanggal SP2D</th>
                                            <th>Nomor SP2D</th>
                                            <th>Unit SKPD</th>
                                            <th>Nama Penerima</th>
                                            <th>Keterangan</th>
                                            <th>Jenis SP2D</th>
                                            <th>Nilai SP2D</th>
                                            <th>Aksi</th> {{-- ✅ TAMBAHAN --}}
                                        </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- ######################### Batas Isi Tampil Pajak LS ########################## --}}

        </div>

            {{-- ################################# Modal ################################### --}}
            
            

            {{-- ############################## Batas Modal ################################ --}}
            

            {{-- ################################# Fungsi ################################### --}}

            @include('potongan.Fungsi.Fungsi')

            {{-- ############################## Batas Fungsi ################################ --}}
        
        
        <!-- Javascripts -->
        @include('Template.Script')

        

    </body>
</html>