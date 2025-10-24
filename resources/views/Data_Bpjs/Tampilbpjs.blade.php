<!DOCTYPE html>
<html lang="en">
<head>
    @include('Template.Head')
</head>
<body>
<div class="page-container">
    @include('Template.Navbar')
    @include('Template.Sidebar')

    {{-- ================== Halaman Utama ================== --}}
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
                        <div class="card-body">
                            <div class="d-flex justify-content-between mb-4">
                                <h5 class="card-title">{{ $title }}</h5>
                                <button class="btn btn-primary" id="btnTambahBpjs">
                                    <i class="fas fa-plus-circle"></i> Tambah Data BPJS
                                </button>
                            </div>

                            <table id="tabelbpjs" class="table table-bordered table-hover align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th>No</th>
                                        <th>Akun Potongan</th>
                                        <th>Nilai Potongan</th>
                                        <th>E-Billing</th>
                                        <th>NTPN</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- ================== MODALS ================== --}}
    @include('Data_Bpjs.Modal.Tambah')     {{-- Modal Input BPJS --}}
    @include('Data_Bpjs.Modal.Databpjs')   {{-- Modal Pilih SIPD --}}
    @include('Data_Bpjs.Modal.Detail')

    {{-- ================== SCRIPT ================== --}}
    @include('Template.Script')
    @include('Data_Bpjs.Fungsi.Fungsi')
</div>
</body>
</html>
