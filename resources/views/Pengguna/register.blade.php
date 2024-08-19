<!DOCTYPE html>
<html lang="en" dir="ltr" class="light">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <title>Simelajang - Registrasi</title>
  <link rel="icon" type="image/png" href="{{ asset('template/assets/images/logo/favicon.svg') }}">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('template/assets/css/rt-plugins.css') }}">
  <link href="https://unpkg.com/aos@2.3.0/dist/aos.css" rel="stylesheet">
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="">
  <link rel="stylesheet" href="{{ asset('template/assets/css/app.css') }}">
  <!-- START : Theme Config js-->
  <script src="{{ asset('template/assets/js/settings.js') }}" sync></script>
  <!-- END : Theme Config js-->
</head>

<body class=" font-inter skin-default">
    <!-- [if IE]> <p class="browserupgrade">
              You are using an <strong>outdated</strong> browser. Please
              <a href="https://browsehappy.com/">upgrade your browser</a> to improve
              your experience and security.
          </p> <![endif] -->
  
    <div class="loginwrapper">
      <div class="lg-inner-column">
        <div class="left-column relative z-[1]">
          <div class="max-w-[520px] pt-20 ltr:pl-20 rtl:pr-20">
            <a href="">
              <img src="{{ asset('template/assets/images/logo/logo.svg') }}" alt="" class="mb-10 dark_logo">
              {{-- <img src="{{ asset('template/assets/images/logo/logo-white.svg') }}" alt="" class="mb-10 white_logo"> --}}
            </a>
            <h4>
              Sistem Informasi Manajemen Pelaporan 
              <span class="text-slate-800 dark:text-slate-400 font-bold">
                            Pajak Negara
                          </span>
            </h4>
          </div>
          <div class="absolute left-0 2xl:bottom-[-160px] bottom-[-130px] h-full w-full z-[-1]">
            <img src="{{ asset('template/assets/images/auth/ils1.svg') }}" alt="" class=" h-full w-full object-contain">
          </div>
        </div>
        <div class="right-column  relative">
          <div class="inner-content h-full flex flex-col bg-white dark:bg-slate-800">
            <div class="auth-box h-full flex flex-col justify-center">
              <div class="mobile-logo text-center mb-6 lg:hidden block">
                <a href="index.html">
                  <img src="{{ asset('template/assets/images/logo/logo.svg') }}" alt="" class="mb-10 dark_logo">
                  <img src="{{ asset('template/assets/images/logo/logo-white.svg') }}" alt="" class="mb-10 white_logo">
                </a>
              </div>
              
              <div class="text-center 2xl:mb-10 mb-4">
                <h4 class="font-medium">Tambah Pengguna</h4>
              </div>

              <!-- BEGIN: Login Form -->
              
              <div class="limiter">
                <div class="container-login100">
                  <div class="wrap-login100">
                    <form action="{{ route('registrasi') }}" class="login100-form validate-form" method="POST" enctype="multipart/form-data">
                      @csrf
            
                      @if ($errors->any())
                          <div class="alert alert-danger">
                              <ul>
                                  @foreach ($errors->all() as $item)
                                  <li>{{ $item }}</li>
                                  @endforeach
                              </ul>
                          </div>
                      @endif
            
                      @if (Session::get('success'))
                          <div class="alert alert-success alert-dismissible fade show">
                              <ul>
                                  <li>{{ Session::get('success') }}</li>
                              </ul>
                          </div>
                      @endif

                      <div class="fromGroup">
                        <label class="block capitalize form-label">Nama</label>
                        <div class="relative ">
                          <input type="text" name="fullname" class="  form-control py-2" placeholder="nama" value="">
                        </div>
                      </div>

                      <div class="fromGroup">
                        <label class="block capitalize form-label">Email</label>
                        <div class="relative ">
                          <input type="text" name="email" class="  form-control py-2" placeholder="email" value="">
                        </div>
                      </div>

                      <div class="fromGroup">
                        <label class="block capitalize form-label">Password</label>
                        <div class="relative ">
                          <input type="text" name="password" class="  form-control py-2" placeholder="password" value="">
                        </div>
                      </div>

                      <div class="fromGroup">
                        <label class="block capitalize form-label">Opd</label>
                        <div class="relative ">
                          <input type="text" name="id_opd" class="  form-control py-2" placeholder="id_opd" value="">
                        </div>
                      </div>
            
                      <div class="fromGroup">
                        <label class="block capitalize form-label">Gambar</label>
                            <input class="input100" type="file" name="gambar" id="gambar">
                      </div>			
            
                      <div>
                        <button class="login100-form-btn" >
                          
                        </button>

                        <button class="btn btn-dark block w-full text-center" type="submit">Daftar</button>
                      </div>

                      <div>
                        <button class="login100-form-btn" >
                          
                        </button>

                        <a href="{{ route('controlpengguna') }}" class="btn btn-dark block w-full text-center">Kembali</a>
                      </div>
                      
                      {{-- <div class="text-center p-t-46 p-b-20">
                        <span class="txt2">
                        Akun Anda Sudah Ada <a href="{{ route('auth') }}" class="text-primary">Login</a>
                        </span>
                      </div> --}}
            
                      <div class="login100-form-social flex-c-m">
                        <a href="#" class="login100-form-social-item flex-c-m bg1 m-r-5">
                          <i class="fa fa-facebook-f" aria-hidden="true"></i>
                        </a>
            
                        <a href="#" class="login100-form-social-item flex-c-m bg2 m-r-5">
                          <i class="fa fa-twitter" aria-hidden="true"></i>
                        </a>
                      </div>
                    </form>
            
                    <div class="login100-more" style="background-image: url('images/bg-01.jpg');">
                    </div>
                  </div>
                </div>
              </div>

              <!-- END: Login Form -->
              
            <div class="relative border-b-[#9AA2AF] border-opacity-[16%] border-b pt-6">
                
            </div>
            </div>
            <div class="auth-footer text-center">
              Copyright 2021, Dashcode All Rights Reserved.
            </div>
          </div>
        </div>
      </div>
    </div>

  <!-- scripts -->
  <script src="{{ asset('template/assets/js/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('template/assets/js/rt-plugins.js') }}"></script>
<script src="{{ asset('template/assets/js/app.js') }}"></script>
</body>
</html>