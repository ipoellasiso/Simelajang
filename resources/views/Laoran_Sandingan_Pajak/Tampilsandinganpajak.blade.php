<!DOCTYPE html>
<html lang="en">
<head>
    @include('Template.Head')
</head>
<body>
    <div class="page-container">
        @include('Template.Navbar')
        @include('Template.Sidebar')

        {{-- ######################### Isi Laporan Sandingan Pajak ########################## --}}
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
                                <div class="row mb-4">
                                    <div class="col-8">
                                        <h5 class="card-title">{{ $title }}</h5>
                                    </div>
                                    <div class="col-4">
                                        <div class="float-end">
                                            <button class="btn btn-success btn-sm" onclick="window.print()">
                                                <i class="fas fa-print"></i> Cetak
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-3">
                                        <label for="filterBulan" class="form-label fw-bold">Filter Bulan</label>
                                        <select id="filterBulan" class="form-select">
                                            <option value="">Semua Bulan</option>
                                            <option value="01">Januari</option>
                                            <option value="02">Februari</option>
                                            <option value="03">Maret</option>
                                            <option value="04">April</option>
                                            <option value="05">Mei</option>
                                            <option value="06">Juni</option>
                                            <option value="07">Juli</option>
                                            <option value="08">Agustus</option>
                                            <option value="09">September</option>
                                            <option value="10">Oktober</option>
                                            <option value="11">November</option>
                                            <option value="12">Desember</option>
                                        </select>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="filterOpd" class="form-label fw-bold">Filter Nama OPD</label>
                                        <select id="filterOpd" class="form-select">
                                            <option value="">Semua OPD</option>
                                            @foreach(DB::table('sp2d')->select('nama_skpd')->distinct()->orderBy('nama_skpd')->get() as $opd)
                                                <option value="{{ $opd->nama_skpd }}">{{ $opd->nama_skpd }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-3">
                                        <label for="filterPajak" class="form-label fw-bold">Filter Jenis Pajak</label>
                                        <select id="filterPajak" class="form-select">
                                            <option value="">Semua Jenis Pajak</option>
                                            <option value="Pajak Pertambahan Nilai">Pajak Pertambahan Nilai</option>
                                            <option value="PPH 21">PPH 21</option>
                                            <option value="Pajak Penghasilan Ps 22">Pajak Penghasilan Ps 22</option>
                                            <option value="Pajak Penghasilan Ps 23">Pajak Penghasilan Ps 23</option>
                                            <option value="Pajak Penghasilan Ps 4 (2)">Pajak Penghasilan Ps 4 (2)</option>
                                        </select>
                                    </div>

                                    <div class="col-md-2 d-flex align-items-end">
                                        <button id="resetFilter" class="btn btn-secondary w-100">
                                            <i class="fas fa-sync-alt"></i> Reset Filter
                                        </button>
                                    </div>
                                </div>
                                <br>

                                <table id="tabelSandinganPajak" class="tabelSandinganPajak display table table-striped table-bordered" style="width:100%">
                                    <thead class="text-center align-middle">
                                        <tr>
                                            <th>No</th>
                                            <th>Nomor SPM</th>
                                            <th>Tanggal SP2D</th>
                                            <th>Nomor SP2D</th>
                                            <th>Nilai SP2D</th>
                                            <th>Nama OPD</th>
                                            <th>Jenis Pajak</th>
                                            <th>Nilai Pajak Register</th>
                                            <th>Nilai Pajak Inputan</th>
                                            <th>Selisih</th>
                                            <th>Keterangan SP2D</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th colspan="7" class="text-end">TOTAL:</th>
                                            <th id="totalRegister">0</th>
                                            <th id="totalInputan">0</th>
                                            <th id="totalSelisih">0</th>
                                            <th></th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-md-4 offset-md-8">
                                <div class="card p-3 shadow-sm">
                                    <h6 class="text-center fw-bold mb-2">Rekapitulasi Pajak</h6>
                                    <p>Pajak Pertambahan Nilai: <span id="rekapPPN" class="float-end">0</span></p>
                                    <p>PPH 21: <span id="rekapPPH21" class="float-end">0</span></p>
                                    <p>Pajak Penghasilan Ps 22: <span id="rekapPPH22" class="float-end">0</span></p>
                                    <p>Pajak Penghasilan Ps 23: <span id="rekapPPH23" class="float-end">0</span></p>
                                    <p>Pajak Penghasilan Ps 24: <span id="rekapPPH24" class="float-end">0</span></p>
                                    <hr>
                                    <p class="fw-bold">Total Pajak: <span id="rekapTotal" class="float-end">0</span></p>
                                </div>
                            </div>
                        </div>

                    </div> {{-- /col --}}
                </div> {{-- /row --}}
            </div> {{-- /main-wrapper --}}
        </div> {{-- /page-content --}}
        {{-- ######################### Batas Isi Laporan Sandingan Pajak ########################## --}}
    </div>

    @include('Laoran_Sandingan_Pajak.Fungsi.Fungsi')

    @include('Template.Script')
</body>
</html>
