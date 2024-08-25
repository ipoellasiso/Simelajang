<div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto" id="tambahpajaksipdls_modal" tabindex="-1" aria-labelledby="large_modal" aria-hidden="true"data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-xl relative w-auto pointer-events-none">
      <div class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding
      rounded-md outline-none text-current">
        <div class="relative bg-white rounded-lg shadow dark:bg-slate-700">
          <!-- Modal header -->
          <div class="flex items-center justify-between p-5 border-b rounded-t dark:border-slate-600 bg-secondary-500">
            <h3 class="text-xl font-medium text-white dark:text-white capitalize">
              Data Pajak LS
            </h3>
            <button type="button" class="text-slate-400 bg-transparent hover:text-slate-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center
                  dark:hover:bg-slate-600 dark:hover:text-white" data-bs-dismiss="modal">
              <svg aria-hidden="true" class="w-5 h-5" fill="#ffffff" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10
                          11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
              </svg>
              <span class="sr-only">Close modal</span>
            </button>
          </div>
  
          <div class=" space-y-5">
            <div class="card">
              <header class=" card-header noborder">
                <h4 class="card-title">Data Pajak SIPD RI
                </h4>
                {{-- <button  data-bs-toggle="modal" data-bs-target="#large_modal" class="btn inline-flex justify-center btn-light btn-sm">Tambah Data</button > --}}
                  {{-- <a href="{{ route('tampilpajakls') }}" class="btn inline-flex justify-center btn-light btn-sm">
                    <span class="flex items-center">
                      <iconify-icon icon="icon-park:back"></iconify-icon>
                        <span>Kembali</span>
                    </span>
                  </a> --}}
              </header>
  
              <div class="card-body px-6 pb-6">
                <div class="overflow-x-auto -mx-6 dashcode-data-table">
                  <span class=" col-span-8  hidden"></span>
                  <span class="  col-span-4 hidden"></span>
                  <div class="inline-block min-w-full align-middle">
                    <div class="overflow-hidden ">
                      
                        <table class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700 data-table" >
                            <thead class="bg-slate-200 dark:bg-slate-700">
                              <tr>
                                <th scope="col" class=" table-th ">
                                  NO
                                </th>
                                <th scope="col" class=" table-th ">
                                  SPM
                                </th>
                                <th scope="col" class=" table-th ">
                                  SP2D
                                {{-- </th>
                                <th scope="col" class=" table-th ">
                                  REKENING BELANJA
                                </th> --}}
                                {{-- <th scope="col" class=" table-th ">
                                  POTONGAN PAJAK
                                </th> --}}
                                <th scope="col" class=" table-th ">
                                  JENIS PAJAK
                                </th>
                                {{-- <th scope="col" class=" table-th ">
                                  NPWP
                                </th> --}}
                                <th scope="col" class=" table-th ">
                                  NILAI PAJAK
                                </th>
                                <th scope="col" class=" table-th ">
                                  BILLING
                                </th>
                                {{-- <th scope="col" class=" table-th ">
                                  NTPN
                                </th> --}}
                                <th scope="col" class=" table-th ">
                                  Action
                                </th>
                              </tr>
                            </thead>
  
                            <body>                                
                              <?php $i=1; function rupiahq($angka){
  
                                      $hasil_rupiah = "Rp " . number_format($angka,0,',','.');
                                      return $hasil_rupiah;
                                    } ?>
                                @foreach ($pajakls as $itemm)
                                  <tr class="hover:bg-slate-200 dark:hover:bg-slate-700">
                                      <td class="table-td"> {{ $i++ }}</td>
  
                                      <td class="table-td">    
                                          <b>Tanggal SPM : </b> {{ $itemm->tanggal_spm }} <br>                                        
                                          <b>Nomor SPM : </b> {{ $itemm->nomor_spm }} <br>
                                          <b>Nilai SPM : </b> {{ rupiahq($itemm->nilai_sp2d) }} <br>
                                       </td>
  
                                      <td class="table-td">
                                          <b>Tanggal SP2D : </b> {{ $itemm->tanggal_sp2d }} <br>                                        
                                          <b>Nomor SP2D : </b> {{ $itemm->nomor_sp2d }} <br>
                                          <b>Nilai SP2D : </b> {{ rupiahq($itemm->nilai_sp2d) }} <br>
                                      </td>
  
                                      <td class="table-td">
                                          {{-- <b>Kode Akun Pajak : </b>{{ $item->akun_pajak }}<br>  --}}
                                          <b>Jenis Pajak : </b> {{ $itemm->jenis_pajak }} <br>
                                      </td>
                                      
                                      <td class="table-td">{{ rupiahq($itemm->nilai_pajak) }}</td>
                                      <td class="table-td">{{ $itemm->ebilling }}</td>
                                      
  
                                  <td class="table-td ">
                                    <div class="flex space-x-3 rtl:space-x-reverse scale" data-tippy-content="Simpan" data-tippy-theme="dark">
                                      <button type="button" class="action-btn" id="btn-edit-pajakls"
                                            data-bs-toggle="modal" data-bs-target="#editpajaksipdls_modal"
                                            data-id2 = "{{ $itemm->id }}"
                                            data-ebilling2 = "{{ $itemm->ebilling }}"
                                            data-jenis_pajak2 = "{{ $itemm->jenis_pajak }}"
                                            data-npwp_pihak_ketiga2 = "{{ $itemm->npwp_pihak_ketiga }}"
                                            >
                                            <iconify-icon icon="solar:download-broken"></iconify-icon>
                                        </button>
                                        
                                      </div>
                                    </td>
                          </tr>
                        @endforeach
                        <body>
  
                        </body>
  
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
  
        </div>
    </div>
  </div>
  </div>