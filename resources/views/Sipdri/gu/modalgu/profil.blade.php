<div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto" id="profil_modal" tabindex="-1" aria-labelledby="large_modal" aria-hidden="true"data-bs-backdrop="static" data-bs-keyboard="false">
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

          
                    <div class="grid grid-cols-12 gap-6">
                      <div class="lg:col-span-4 col-span-12">
                        <div class="card h-full">
                          <header class="card-header">
                            <h4 class="card-title">Detail TBP SIPD RI</h4>
                          </header>
                          <div class="card-body p-6">
                            <ul class="list space-y-8">
                              <li class="flex space-x-3 rtl:space-x-reverse">
                                <div class="flex-none text-2xl text-slate-600 dark:text-slate-300">
                                  <iconify-icon icon="heroicons:envelope"></iconify-icon>
                                </div>
                                <div class="flex-1">
                                  <div class="uppercase text-xs text-slate-500 dark:text-slate-300 mb-1 leading-[12px]">
                                    EMAIL
                                  </div>
                                  <a href="mailto:someone@example.com" class="text-base text-slate-600 dark:text-slate-50">
                                    info-500@dashcode.com
                                  </a>
                                </div>
                              </li>
                              <!-- end single list -->
                              <li class="flex space-x-3 rtl:space-x-reverse">
                                <div class="flex-none text-2xl text-slate-600 dark:text-slate-300">
                                  <iconify-icon icon="heroicons:phone-arrow-up-right"></iconify-icon>
                                </div>
                                <div class="flex-1">
                                  <div class="uppercase text-xs text-slate-500 dark:text-slate-300 mb-1 leading-[12px]">
                                    PHONE
                                  </div>
                                  <a href="tel:0189749676767" class="text-base text-slate-600 dark:text-slate-50">
                                    +1-202-555-0151
                                  </a>
                                </div>
                              </li>
                              <!-- end single list -->
                              <li class="flex space-x-3 rtl:space-x-reverse">
                                <div class="flex-none text-2xl text-slate-600 dark:text-slate-300">
                                  <iconify-icon icon="heroicons:map"></iconify-icon>
                                </div>
                                <div class="flex-1">
                                  <div class="uppercase text-xs text-slate-500 dark:text-slate-300 mb-1 leading-[12px]">
                                    LOCATION
                                  </div>
                                  <div class="text-base text-slate-600 dark:text-slate-50">
                                    Home# 320/N, Road# 71/B, Mohakhali, Dhaka-1207, Bangladesh
                                  </div>
                                </div>
                              </li>
                              <!-- end single list -->
                            </ul>
                          </div>
                        </div>
                      </div>


                      <div class="lg:col-span-8 col-span-12">
                        <div class="card ">
                          <header class="card-header">
                            <h4 class="card-title">Silahkan Lengkapi Form Input dibawah..!
                            </h4>
                          </header>

                          <div class="card-body">

                            <div class="card xl:col-span-2">
                              <div class="card-body flex flex-col p-6">
                                {{-- // --}}
                          
                                <div class="card-text h-full ">
                          
                            @if ($datalpj->Empty())
                              
                            @else
                                  <form class="space-y-4" method="post"a action="{{ route('simpanlpj') }}?id=<?= $row1['id_tbp']; ?>">
                                      @method('get')
                                            @csrf
                                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-7">
                                                <div class="input-area relative">
                                                  <label class="form-label">Id TBP</label>
                                                  <input name="" value="{{ $row1['id_tbp'] }}" type="text" class="form-control" readonly>
                                                </div>
                                
                                                <div class="input-area relative">
                                                  <label class="form-label">Nomor TBP</label>
                                                  <input name="" value="{{ $row1['nomor_tbp'] }}" type="text" class="form-control" readonly>
                                                </div>
                                
                                                <div class="input-area relative">
                                                    <label class="form-label">Keterangan TBP</label>
                                                    <input name="" value="{{ $row1['keterangan_tbp'] }}" type="text" class="form-control" readonly>
                                                  </div>
                                
                                                <div class="input-area relative">
                                                    <label class="form-label">Tanggal SPM</label>
                                                    <input name="" type="text" class="form-control">
                                                </div> 
                                  
                                                <div class="input-area relative">
                                                    <label class="form-label">Nomor SPM</label>
                                                    <input name="" type="text" class="form-control">
                                                </div>
                                        
                                      </div>  
                                      
                                      <!-- Modal footer -->
                                      <div class="flex items-center justify-end p-6 space-x-2 border-t border-slate-200 rounded-b dark:border-slate-600">
                                          <button data-bs-dismiss="modal" class="btn inline-flex justify-center text-white bg-black-500" type="submit">Tambahkan</button>
                                      </div>
                                </form>
                            @endif
                          
                            @if ($datalpj->IsNotEmpty())
                                    <form class="space-y-4" method="post"a action="{{ route('simpanlpj') }}?id=<?= $row1['id_tbp']; ?>">
                                      @method('get')
                                            @csrf
                                      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-7">
                                        <div class="input-area relative">
                                          <label class="form-label">Id TBP</label>
                                          <input name="" value="{{ $row1['id_tbp'] }}" type="text" class="form-control" readonly>
                                        </div>
                        
                                        <div class="input-area relative">
                                          <label class="form-label">Nomor TBP</label>
                                          <input name="" value="{{ $row1['nomor_tbp'] }}" type="text" class="form-control" readonly>
                                        </div>
                        
                                        <div class="input-area relative">
                                            <label class="form-label">Keterangan TBP</label>
                                            <input name="" value="{{ $row1['keterangan_tbp'] }}" type="text" class="form-control" readonly>
                                          </div>
                        
                                        <div class="input-area relative">
                                            <label class="form-label">Tanggal SPM</label>
                                            <input name="" type="text" class="form-control">
                                        </div> 
                          
                                        <div class="input-area relative">
                                            <label class="form-label">Nomor SPM</label>
                                            <input name="" type="text" class="form-control">
                                        </div>
                                      
                                    </div> 
                                      <!-- Modal footer -->
                                      <div class="flex items-center justify-end p-6 space-x-2 border-t border-slate-200 rounded-b dark:border-slate-600">
                                          <button data-bs-dismiss="modal" class="btn inline-flex justify-center text-white bg-black-500" type="submit">Tambahkan</button>
                                      </div>
                                  </form>
                            @else
                          
                            @endif
                          
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
  </div>
  </div>
  </div>
  
  