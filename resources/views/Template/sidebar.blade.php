<div class="sidebar-wrapper group">
    <div id="bodyOverlay" class="w-screen h-screen fixed top-0 bg-slate-900 bg-opacity-50 backdrop-blur-sm z-10 hidden"></div>
    <div class="logo-segment">
      <a class="flex items-center" href="">
        <img src="{{ asset('template/assets/images/logo/133.png') }}" class="black_logo" alt="logo">
        <img src="{{ asset('template/assets/images/logo/133.png') }}" class="white_logo" alt="logo">
        <span class="ltr:ml-3 rtl:mr-3 text-xl font-Inter font-bold text-slate-900 dark:text-white">Simelajang</span>
      </a>
      <!-- Sidebar Type Button -->
      <div id="sidebar_type" class="cursor-pointer text-slate-900 dark:text-white text-lg">
        <span class="sidebarDotIcon extend-icon cursor-pointer text-slate-900 dark:text-white text-2xl">
      <div class="h-4 w-4 border-[1.5px] border-slate-900 dark:border-slate-700 rounded-full transition-all duration-150 ring-2 ring-inset ring-offset-4 ring-black-900 dark:ring-slate-400 bg-slate-900 dark:bg-slate-400 dark:ring-offset-slate-700"></div>
    </span>
        <span class="sidebarDotIcon collapsed-icon cursor-pointer text-slate-900 dark:text-white text-2xl">
      <div class="h-4 w-4 border-[1.5px] border-slate-900 dark:border-slate-700 rounded-full transition-all duration-150"></div>
    </span>
      </div>
      <button class="sidebarCloseIcon text-2xl">
        <iconify-icon class="text-slate-900 dark:text-slate-200" icon="clarity:window-close-line"></iconify-icon>
      </button>
    </div>
    <div id="nav_shadow" class="nav_shadow h-[60px] absolute top-[80px] nav-shadow z-[1] w-full transition-all duration-200 pointer-events-none
    opacity-0"></div>
    <div class="sidebar-menus bg-white dark:bg-slate-800 py-2 px-4 h-[calc(100%-80px)] overflow-y-auto z-50" id="sidebar_menus">
      <ul class="sidebar-menu">
        <li>
          <a href="{{ route('beranda') }}" class="navItem">
            <span class="flex items-center">
          <iconify-icon class="nav-icon" icon="solar:home-bold"></iconify-icon>
          <span>DASHBOARD</span>
            </span>
          </a>
        </li>
        <!-- Apps Area -->
        <li class="sidebar-menu-title">PENGATURAN</li>

        @if (auth()->user()->role=="admin")
        <li class="">
          <a href="javascript:void(0)" class="navItem">
            <span class="flex items-center">
          <iconify-icon class=" nav-icon" icon="solar:settings-minimalistic-bold"></iconify-icon>
          <span>Master Data</span>
            </span>
            <iconify-icon class="icon-arrow" icon="heroicons-outline:chevron-right"></iconify-icon>
          </a>
          <ul class="sidebar-submenu">
            <li>
              <a href="{{ route('tampilopd') }}">OPD</a>
            </li>
            <li>
              <a href="{{ route('tampilakunpajak') }}">Akun Pajak</a>
            </li>
            <li>
              <a href="{{ route('tampiljenispajak') }}">Jenis Pajak</a>
            </li>
            <li>
                @if (auth()->user()->role=="admin")
                <li class="">
                  <a href="javascript:void(0)" class="navItem">
                    <span class="flex items-center">
                  {{-- <iconify-icon class=" nav-icon" icon="material-symbols:file-save-rounded"></iconify-icon> --}}
                  <span>Sp2d Sipd</span>
                    </span>
                    {{-- <iconify-icon class="icon-arrow" icon="heroicons-outline:chevron-right"></iconify-icon> --}}
                  </a>
                  <ul class="sidebar-submenu">
                    <li>
                      <a href="signin-one.html">UP</a>
                    </li>
                    <li>
                      <a href="{{ route('tampilsp2dsipdri') }}?id=1">LS</a>
                    </li>
                    <li>
                      <a href="{{ route('tampilsp2dsipdrigu') }}?id=1">GU</a>
                    </li>
                    <li>
                      <a href="signin-two.html">TU</a>
                    </li>
                  </ul>
                </li>
                @endif
                
              <li>
                <a href="{{ route('tampiltoken') }}">Input Token</a>
              </li>

            </li>
          </ul>
        </li>
        @endif

        @if (auth()->user()->role=="user")
        <li class="">
          <a href="javascript:void(0)" class="navItem">
            <span class="flex items-center">
          <iconify-icon class=" nav-icon" icon="solar:settings-minimalistic-bold"></iconify-icon>
          <span>Master Data</span>
            </span>
            <iconify-icon class="icon-arrow" icon="heroicons-outline:chevron-right"></iconify-icon>
          </a>
          <ul class="sidebar-submenu">
              <li>
                <a href="{{ route('tampiltokengu') }}">Input Token GU</a>
              </li>

            </li>
          </ul>
        </li>
        @endif

        <li class="">
          <a href="javascript:void(0)" class="navItem">
            <span class="flex items-center">
          <iconify-icon class=" nav-icon" icon="solar:settings-bold"></iconify-icon>
        <span>Kelola User</span>
            </span>
            <iconify-icon class="icon-arrow" icon="heroicons-outline:chevron-right"></iconify-icon>
          </a>

          @if (auth()->user()->role=="admin")
          <ul class="sidebar-submenu">
            <li>
              <a href="{{ Route('controlpengguna') }}">List User</a>
            </li>
          </ul>
          @else
          @if (auth()->user()->role=="user")
          <ul class="sidebar-submenu">
            <li>
              <a href="{{ Route('controlpenggunauser') }}">List User</a>
            </li>
          </ul>
          @else
          @if (auth()->user()->role=="verifikasi")
          <ul class="sidebar-submenu">
            <li>
              <a href="{{ Route('controlpengguna') }}">List User</a>
            </li>
          </ul>
          @endif
          @endif
          @endif

          {{-- <ul class="sidebar-submenu">
            <li>
              <a href="project.html">Profil</a>
            </li>
          </ul> --}}
        </li>
        <!-- Pages Area -->
        <li class="sidebar-menu-title">PENATAUSAHAAN</li>
        <!-- Authentication -->
        

        <!-- Utility -->
        <li class="">
          <a href="javascript:void(0)" class="navItem">
            <span class="flex items-center">
          <iconify-icon class=" nav-icon" icon="solar:document-add-bold"></iconify-icon>
          <span>Pajak</span>
            </span>
            <iconify-icon class="icon-arrow" icon="heroicons-outline:chevron-right"></iconify-icon>
          </a>
          <ul class="sidebar-submenu">

            @if (auth()->user()->role=="admin")
                <li>
                  <a href="{{ route('tampilpajakls') }}">LS</a>
                </li>
            @else
            @if (auth()->user()->role=="verifikasi")
                <li>
                  <a href="{{ route('tampilpajakls') }}">LS</a>
                </li>
            @endif
            @endif

            @if (auth()->user()->role=="admin")
                <li>
                  <a href="{{ route('tampilsp2dsipdrigu') }}?id=1">GU</a>
                </li>
            @else
            @if (auth()->user()->role=="user")
                <li>
                  <a href="{{ route('tampilsp2dsipdrigu') }}?id=1">GU</a>
                </li>
            @endif
            @endif
            
            
          </ul>
        </li>

        <li class="">
          @if (auth()->user()->role=="admin")
          <a href="javascript:void(0)" class="navItem">
            <span class="flex items-center">
          <iconify-icon class=" nav-icon" icon="solar:document-add-bold"></iconify-icon>
          <span>Potonga</span>
            </span>
            <iconify-icon class="icon-arrow" icon="heroicons-outline:chevron-right"></iconify-icon>
          </a>
          <ul class="sidebar-submenu">
            <li>
              <a href="{{ route('tampilpotonganbpjs') }}">BPJS</a>
            </li>
            <li>
              <a href="blank-page.html">TASPEN</a>
            </li>
            <li>
              <a href="blank-page.html">Lainnya</a>
            </li>
          </ul>
          @else
          @if (auth()->user()->role=="verifikasi")
          <a href="javascript:void(0)" class="navItem">
            <span class="flex items-center">
          <iconify-icon class=" nav-icon" icon="solar:document-add-bold"></iconify-icon>
          <span>Potonga</span>
            </span>
            <iconify-icon class="icon-arrow" icon="heroicons-outline:chevron-right"></iconify-icon>
          </a>
          <ul class="sidebar-submenu">
            <li>
              <a href="blog.html">BPJS</a>
            </li>
            <li>
              <a href="blank-page.html">TASPEN</a>
            </li>
          </ul>
          @endif
          @endif
        </li>

        <!-- Elements Area -->
        <li class="sidebar-menu-title">LAPORAN</li>
        <!-- Widgets -->
        <li class="">
          <a href="javascript:void(0)" class="navItem">
            <span class="flex items-center">
          <iconify-icon class=" nav-icon" icon="solar:printer-bold"></iconify-icon>
          <span>Pajak</span>
            </span>
            <iconify-icon class="icon-arrow" icon="heroicons-outline:chevron-right"></iconify-icon>
          </a>
          <ul class="sidebar-submenu">

            @if (auth()->user()->role=="admin")
            <li>
              <a href="basic-widgets.html">Pajak LS</a>
            </li>
            @else
            @if (auth()->user()->role=="verifikasi")
            <li>
              <a href="basic-widgets.html">Pajak LS</a>
            </li>
            @endif
            @endif

            @if (auth()->user()->role=="admin")
            <li>
              <a href="basic-widgets.html">Pajak GU</a>
            </li>
            @else
            @if (auth()->user()->role=="user")
            <li>
              <a href="basic-widgets.html">Pajak GU</a>
            </li>
            @endif
            @endif

          </ul>

        </li>

        <!-- Components -->
        @if (auth()->user()->role=="admin")
        <li>
          <a href="javascript:void(0)" class="navItem">
            <span class="flex items-center">
          <iconify-icon class=" nav-icon" icon="solar:printer-bold-duotone"></iconify-icon>
          <span>Potongan</span>
            </span>
            <iconify-icon class="icon-arrow" icon="heroicons-outline:chevron-right"></iconify-icon>
          </a>
          <ul class="sidebar-submenu">
            <li>
              <a href="typography.html">BPJS</a>
            </li>
            <li>
              <a href="colors.html">TASPEN</a>
            </li>
          </ul>
        </li>
        @else
        @if (auth()->user()->role=="verifikasi")
        <li>
          <a href="javascript:void(0)" class="navItem">
            <span class="flex items-center">
          <iconify-icon class=" nav-icon" icon="solar:printer-bold-duotone"></iconify-icon>
          <span>Potongan</span>
            </span>
            <iconify-icon class="icon-arrow" icon="heroicons-outline:chevron-right"></iconify-icon>
          </a>
          <ul class="sidebar-submenu">
            <li>
              <a href="typography.html">BPJS</a>
            </li>
            <li>
              <a href="colors.html">TASPEN</a>
            </li>
          </ul>
        </li>
      @endif
      @endif

      </ul>
      
    </div>
  </div>