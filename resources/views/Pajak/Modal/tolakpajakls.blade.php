<div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto" id="edittolak_modal" tabindex="-1" aria-labelledby="default_modal" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
  <div class="modal-dialog relative w-auto pointer-events-none">
    <div class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding
    rounded-md outline-none text-current">
      <div class="relative bg-white rounded-lg shadow dark:bg-slate-700">
        <!-- Modal header -->
        <div class="flex items-center justify-between p-5 border-b rounded-t dark:border-slate-600 bg-secondary-500">
          <h3 class="text-xl font-medium text-white dark:text-white capitalize">
            ANDA YAKIN TOLAK PAJAK INI !!
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

    @if ($pajakkpp->Empty())
    
    @else
          <form method="post"a action="{{ route('update-pajakls', $item->id) }}">
                @method('get')
                @csrf
              <div class="card">
                <div class="card-body flex flex-col p-6">

                  <div class="card-text h-full space-y-4">

                    <div class="input-area">
                        <label class="form-label">id</label>
                        <input name="id" type="text" class="form-control" id="edit-id" readonly>
                    </div>

                    <div class="card-text h-full space-y-4">
                          <div class="input-area">
                              <label class="form-label">E-Billing</label>
                              <input name="ebilling" type="text" class="form-control" id="edit-ebilling" readonly>
                          </div>

                    <div class="card-text h-full space-y-4">
                            <div class="input-area">
                                <label class="form-label">NTPN</label>
                                <input name="ntpn" type="text" class="form-control" id="edit-ntpn" readonly>
                            </div>
                    </div>
                    </div>
                  </div>

                </div>
              </div>
              
          <!-- Modal footer -->
          <div class="flex items-center justify-end p-6 space-x-2 border-t border-slate-200 rounded-b dark:border-slate-600">
              <button data-bs-dismiss="modal" class="btn inline-flex justify-center text-white bg-black-500" type="submit">YA</button>
          </div>
        </form>
    @endif

    @if ($pajakkpp->IsNotEmpty())
            <form method="post"a action="{{ route('update-pajakls', $item->id) }}">
              @method('get')
              @csrf
            <div class="card">
              <div class="card-body flex flex-col p-6">

                <div class="card-text h-full space-y-4">

                  <div class="input-area">
                      <label class="form-label">id</label>
                      <input name="id" type="text" class="form-control" id="edit-id" readonly>
                  </div>

                  <div class="card-text h-full space-y-4">
                        <div class="input-area">
                            <label class="form-label">E-Billing</label>
                            <input name="ebilling" type="text" class="form-control" id="edit-ebilling" readonly>
                        </div>

                  <div class="card-text h-full space-y-4">
                          <div class="input-area">
                              <label class="form-label">NTPN</label>
                              <input name="ntpn" type="text" class="form-control" id="edit-ntpn" readonly>
                          </div>
                  </div>
                  </div>
                </div>

              </div>
            </div>
            
        <!-- Modal footer -->
        <div class="flex items-center justify-end p-6 space-x-2 border-t border-slate-200 rounded-b dark:border-slate-600">
            <button data-bs-dismiss="modal" class="btn inline-flex justify-center text-white bg-black-500" type="submit">YA</button>
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