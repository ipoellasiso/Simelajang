<div class="modal fade" id="modalTambahBpjs" tabindex="-1" aria-labelledby="modalTambahBpjsLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title">Tambah Data BPJS</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        {{-- FORM --}}
        <div class="row mb-3">
          <div class="col-md-6">
            <label class="form-label">E-Billing</label>
            <input type="text" class="form-control" id="ebilling" required>
          </div>
          <div class="col-md-6">
            <label class="form-label">Rekening Belanja</label>
            <input type="text" class="form-control" id="rek_belanja" required>
          </div>
        </div>

        <div class="row mb-3">
          <div class="col-md-6">
            <label class="form-label">Nama NPWP</label>
            <input type="text" class="form-control" id="nama_npwp" required>
          </div>
          <div class="col-md-6">
            <label class="form-label">Nomor NPWP</label>
            <input type="text" class="form-control" id="nomor_npwp" required>
          </div>
        </div>

        <div class="row mb-3">
          <div class="col-md-6">
            <label class="form-label">NTPN</label>
            <input type="text" class="form-control" id="ntpn" required>
          </div>
          <div class="col-md-6">
            <label class="form-label">Akun Potongan</label>
            <input type="text" class="form-control" id="akun_potongan" required>
          </div>
        </div>

        <div class="mb-3">
          <label class="form-label">Upload Bukti Pembayaran</label>
          <input type="file" class="form-control" id="bukti_pemby">
          <small class="text-muted">Format: JPG, PNG, PDF (Max 5MB)</small>
        </div>

        {{-- TABEL POTONGAN DARI SIPD --}}
        <div class="mt-4">
          <div class="d-flex justify-content-between mb-2">
            <h6>Data Potongan Dari SIPD</h6>
            <button class="btn btn-sm btn-success" id="btnPilihDariSipd">+ Pilih Dari SIPD RI</button>
          </div>
          <table id="tabelPotongan" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>No</th>
                <th>Tanggal SP2D</th>
                <th>Nomor SP2D</th>
                <th>Nilai Potongan</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody></tbody>
          </table>

          <!-- ✅ Tambahkan total di bawah tabel -->
          <div class="text-end mt-2">
              <h6><strong>Total Nilai Potongan: </strong>
                  <span id="totalPotongan" class="text-success">0</span>
              </h6>
          </div>

        </div>
      </div>

      <div class="modal-footer">
        <button class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
        <button class="btn btn-primary" id="btnSimpanBpjs">Simpan</button>
      </div>
    </div>
  </div>
</div>
