<div class="modal fade" id="modalDetailBpjs" tabindex="-1" aria-labelledby="modalDetailBpjsLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">Detail Data BPJS</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <p><strong>E-Billing:</strong> <span id="detailEbilling"></span></p>
                        <p><strong>NTPN:</strong> <span id="detailNtpn"></span></p>
                        <p><strong>Akun Potongan:</strong> <span id="detailAkun"></span></p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Nama NPWP:</strong> <span id="detailNamaNpwp"></span></p>
                        <p><strong>Nomor NPWP:</strong> <span id="detailNomorNpwp"></span></p>
                        <p><strong>Total Nilai Potongan:</strong> <span id="detailTotal"></span></p>
                    </div>
                </div>

                <h6>Rincian Potongan:</h6>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Jenis Pajak</th>
                            <th>Tanggal SP2D</th>
                            <th>Nomor SP2D</th>
                            <th>Nilai SP2D</th>
                            <th>Nilai Potongan</th>
                        </tr>
                    </thead>
                    <tbody id="rincianBpjsBody">
                        <tr>
                            <td colspan="6" class="text-center">Tidak ada rincian potongan</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="modal-footer">
                <button class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
