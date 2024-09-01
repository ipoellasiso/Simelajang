<div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto" id="showlsModal" tabindex="-1" aria-labelledby="large_modal" aria-hidden="true">
    <div class="modal-dialog modal-xl relative w-auto pointer-events-none">
      <div class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding
      rounded-md outline-none text-current">
        <div class="relative bg-white rounded-lg shadow dark:bg-slate-700">
            <div class="grid grid-cols-12 gap-6">

                <div class="lg:col-span-4 col-span-12">
                    <div class="card h-full">
                        <div class="card-body p-6">
                            {{-- isinya --}}

                            {{-- batas isinya --}}
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-8 col-span-12">
                    <div class="card ">
                        <div class="card-body">
                            <div class="card xl:col-span-2">
                                <div class="card-body flex flex-col p-6">
                                    <div class="card-text h-full ">
                                        {{-- isinya --}}
                                        <ul class="list space-y-8">
                                            <li class="flex space-x-3 rtl:space-x-reverse">
                                                <div class="flex-none text-2xl text-slate-600 dark:text-slate-300">
                                                    <iconify-icon icon="heroicons:envelope"></iconify-icon>
                                                </div>
                                                <div class="flex-1">
                                                    <div class="uppercase text-xs text-slate-500 dark:text-slate-300 mb-1 leading-[12px]">
                                                        <br> S P M </br>
                                                    </div>
                                                    <a class="uppercase text-xs text-slate-500 dark:text-slate-300 mb-1 leading-[12px]">
                                                    Tanggal Spm : <input id="edit-tanggal_spm6"><br>
                                                    Nomor Spm : <textarea id="edit-nomor_spm6"></textarea><br>
                                                    Nilai Spm : <input id="edit-nilai_sp2d"><br>
                                                    </a>
                                                </div>
                                            </li>

                                            <li class="flex space-x-3 rtl:space-x-reverse">
                                                <div class="flex-none text-2xl text-slate-600 dark:text-slate-300">
                                                    <iconify-icon icon="heroicons:envelope"></iconify-icon>
                                                </div>
                                                <div class="flex-1">
                                                    <div class="uppercase text-xs text-slate-500 dark:text-slate-300 mb-1 leading-[12px]">
                                                        <br> S P 2 D </br>
                                                    </div>
                                                    <a href="mailto:someone@example.com" class="text-base text-slate-600 dark:text-slate-50">
                                                    Tanggal Sp2d : {{ $item->tanggal_sp2d }} <br>
                                                    Nomor Sp2d : {{ $item->nomor_sp2d }} <br>
                                                    Nilai Sp2d : {{ $item->nilai_sp2d }}<br>
                                                    </a>
                                                </div>
                                            </li>
            
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
                                        </ul>
                                        {{-- batas isinya --}}
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