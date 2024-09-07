<!DOCTYPE html>
<!-- Template Name: DashCode - HTML, React, Vue, Tailwind Admin Dashboard Template Author: Codeshaper Website: https://codeshaper.net Contact: support@codeshaperbd.net Like: https://www.facebook.com/Codeshaperbd Purchase: https://themeforest.net/item/dashcode-admin-dashboard-template/42600453 License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project. -->
<html lang="zxx" dir="ltr" class="light">

<head>
 @include('template.head')
</head>

<body class=" font-inter dashcode-app" id="body_class">
  <!-- [if IE]> <p class="browserupgrade"> You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security. </p> <![endif] -->
  <main class="app-wrapper">
    <!-- BEGIN: Sidebar -->
    <!-- BEGIN: Sidebar -->
    @include('template.sidebar')
    <!-- End: Sidebar -->
    <!-- End: Sidebar -->
    <!-- BEGIN: Settings -->

    <!-- BEGIN: Settings -->
    <!-- Settings Toggle Button -->
    <button class="fixed ltr:md:right-[-29px] ltr:right-0 rtl:left-0 rtl:md:left-[-29px] top-1/2 z-[888] translate-y-1/2 bg-slate-800 text-slate-50 dark:bg-slate-700 dark:text-slate-300 cursor-pointer transform rotate-90 flex items-center text-sm font-medium px-2 py-2 shadow-deep ltr:rounded-b rtl:rounded-t" data-bs-toggle="offcanvas" data-bs-target="#offcanvas" aria-controls="offcanvas">
      <iconify-icon class="text-slate-50 text-lg animate-spin" icon="material-symbols:settings-outline-rounded"></iconify-icon>
      <span class="hidden md:inline-block ltr:ml-2 rtl:mr-2">Atur Tampilan</span>
    </button>

    <!-- BEGIN: Settings Modal -->
    <div class="offcanvas offcanvas-end fixed bottom-0 flex flex-col max-w-full bg-white dark:bg-slate-800 invisible bg-clip-padding shadow-sm outline-none transition duration-300 ease-in-out text-gray-700 top-0 ltr:right-0 rtl:left-0 border-none w-96" tabindex="-1" id="offcanvas" aria-labelledby="offcanvas">
      <div class="offcanvas-header flex items-center justify-between p-4 pt-3 border-b border-b-slate-300">
        <div>
          <h3 class="block text-xl font-Inter text-slate-900 font-medium dark:text-[#eee]">
            Theme customizer
          </h3>
          <p class="block text-sm font-Inter font-light text-[#68768A] dark:text-[#eee]">Customize & Preview in Real Time</p>
        </div>
        <button type="button" class="box-content text-2xl w-4 h-4 p-2 pt-0 -my-5 -mr-2 text-black dark:text-white border-none rounded-none opacity-100 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline" data-bs-dismiss="offcanvas"><iconify-icon icon="line-md:close"></iconify-icon></button>
      </div>
      <div class="offcanvas-body flex-grow overflow-y-auto">
        <div class="settings-modal">
          <div class="p-6">

            <h3 class="mt-4">Theme</h3>
            <form class="input-area flex items-center space-x-8 rtl:space-x-reverse" id="themeChanger">
              <div class="input-group flex items-center">
                <input type="radio" id="light" name="theme" value="light" class="themeCustomization-checkInput">
                <label for="light" class="themeCustomization-checkInput-label">Light</label>
              </div>
              <div class="input-group flex items-center">
                <input type="radio" id="dark" name="theme" value="dark" class="themeCustomization-checkInput">
                <label for="dark" class="themeCustomization-checkInput-label">Dark</label>
              </div>
              <div class="input-group flex items-center">
                <input type="radio" id="semiDark" name="theme" value="semiDark" class="themeCustomization-checkInput">
                <label for="semiDark" class="themeCustomization-checkInput-label">Semi Dark</label>
              </div>
            </form>
          </div>
          <div class="divider"></div>
          <div class="p-6">

            <div class="flex items-center justify-between mt-5">
              <h3 class="!mb-0">Rtl</h3>
              <label id="rtl_ltr" class="relative inline-flex h-6 w-[46px] items-center rounded-full transition-all duration-150 cursor-pointer">
                <input type="checkbox" value="" class="sr-only peer">
                <span class="w-11 h-6 bg-gray-200 peer-focus:outline-none ring-0 rounded-full peer dark:bg-gray-900 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-black-600"></span>
              </label>
            </div>
          </div>
          <div class="divider"></div>
          <div class="p-6">
            <h3>Content Width</h3>
            <div class="input-area flex items-center space-x-8 rtl:space-x-reverse">
              <div class="input-group flex items-center">
                <input type="radio" id="fullWidth" name="content-width" value="fullWidth" class="themeCustomization-checkInput">
                <label for="fullWidth" class="themeCustomization-checkInput-label ">Full Width</label>
              </div>
              <div class="input-group flex items-center">
                <input type="radio" id="boxed" name="content-width" value="boxed" class="themeCustomization-checkInput">
                <label for="boxed" class="themeCustomization-checkInput-label ">Boxed</label>
              </div>
            </div>
            <h3 class="mt-4">Menu Layout</h3>
            <div class="input-area flex items-center space-x-8 rtl:space-x-reverse">
              <div class="input-group flex items-center">
                <input type="radio" id="vertical_menu" name="menu_layout" value="vertical" class="themeCustomization-checkInput">
                <label for="vertical_menu" class="themeCustomization-checkInput-label ">Vertical</label>
              </div>
              <div class="input-group flex items-center">
                <input type="radio" id="horizontal_menu" name="menu_layout" value="horizontal" class="themeCustomization-checkInput">
                <label for="horizontal_menu" class="themeCustomization-checkInput-label ">Horizontal</label>
              </div>
            </div>
            <div id="menuCollapse" class="flex items-center justify-between mt-5">
              <h3 class="!mb-0">Menu Collapsed</h3>
              <label class="relative inline-flex h-6 w-[46px] items-center rounded-full transition-all duration-150 cursor-pointer">
                <input type="checkbox" value="" class="sr-only peer">
                <span class="w-11 h-6 bg-gray-200 peer-focus:outline-none ring-0 rounded-full peer dark:bg-gray-900 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-black-500"></span>
              </label>
            </div>
            <div id="menuHidden" class="!flex items-center justify-between mt-5">
              <h3 class="!mb-0">Menu Hidden</h3>
              <label id="menuHide" class="relative inline-flex h-6 w-[46px] items-center rounded-full transition-all duration-150 cursor-pointer">
                <input type="checkbox" value="" class="sr-only peer">
                <span class="w-11 h-6 bg-gray-200 peer-focus:outline-none ring-0 rounded-full peer dark:bg-gray-900 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-black-500"></span>
              </label>
            </div>
          </div>
          <div class="divider"></div>
          <div class="p-6">
            <h3>Navbar Type</h3>
            <div class="input-area flex flex-wrap items-center space-x-4 rtl:space-x-reverse">
              <div class="input-group flex items-center">
                <input type="radio" id="nav_floating" name="navbarType" value="floating" class="themeCustomization-checkInput">
                <label for="nav_floating" class="themeCustomization-checkInput-label ">Floating</label>
              </div>
              <div class="input-group flex items-center">
                <input type="radio" id="nav_sticky" name="navbarType" value="sticky" class="themeCustomization-checkInput">
                <label for="nav_sticky" class="themeCustomization-checkInput-label ">Sticky</label>
              </div>
              <div class="input-group flex items-center">
                <input type="radio" id="nav_static" name="navbarType" value="static" class="themeCustomization-checkInput">
                <label for="nav_static" class="themeCustomization-checkInput-label ">Static</label>
              </div>
              <div class="input-group flex items-center">
                <input type="radio" id="nav_hidden" name="navbarType" value="hidden" class="themeCustomization-checkInput">
                <label for="nav_hidden" class="themeCustomization-checkInput-label ">Hidden</label>
              </div>
            </div>
            <h3 class="mt-4">Footer Type</h3>
            <div class="input-area flex items-center space-x-4 rtl:space-x-reverse">
              <div class="input-group flex items-center">
                <input type="radio" id="footer_sticky" name="footerType" value="sticky" class="themeCustomization-checkInput">
                <label for="footer_sticky" class="themeCustomization-checkInput-label ">Sticky</label>
              </div>
              <div class="input-group flex items-center">
                <input type="radio" id="footer_static" name="footerType" value="static" class="themeCustomization-checkInput">
                <label for="footer_static" class="themeCustomization-checkInput-label ">Static</label>
              </div>
              <div class="input-group flex items-center">
                <input type="radio" id="footer_hidden" name="footerType" value="hidden" class="themeCustomization-checkInput">
                <label for="footer_hidden" class="themeCustomization-checkInput-label ">Hidden</label>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- END: Settings Modal -->
    <!-- END: Settings -->

    <!-- End: Settings -->
    <div class="flex flex-col justify-between min-h-screen">
      <div>
        <!-- BEGIN: Header -->
        <!-- BEGIN: Header -->
        <div class="z-[9]" id="app_header">
          <div class="app-header z-[999] ltr:ml-[248px] rtl:mr-[248px] bg-white dark:bg-slate-800 shadow-sm dark:shadow-slate-700">
            <div class="flex justify-between items-center h-full">
              <div class="flex items-center md:space-x-4 space-x-2 xl:space-x-0 rtl:space-x-reverse vertical-box">
                <a href="index.html" class="mobile-logo xl:hidden inline-block">
                  <img src="assets/images/logo/logo-c.svg" class="black_logo" alt="logo">
                  <img src="assets/images/logo/logo-c-white.svg" class="white_logo" alt="logo">
                </a>
                <button class="smallDeviceMenuController hidden md:inline-block xl:hidden">
                  <iconify-icon class="leading-none bg-transparent relative text-xl top-[2px] text-slate-900 dark:text-white" icon="heroicons-outline:menu-alt-3"></iconify-icon>
                </button>
                <button class="flex items-center xl:text-sm text-lg xl:text-slate-400 text-slate-800 dark:text-slate-300 px-1
        rtl:space-x-reverse search-modal" data-bs-toggle="modal" data-bs-target="#searchModal">
                  <iconify-icon icon="heroicons-outline:search"></iconify-icon>
                  <span class="xl:inline-block hidden ml-3">Search...
    </span>
                </button>

              </div>
              <!-- end vertcial -->
              <div class="items-center space-x-4 rtl:space-x-reverse horizental-box">
                <a href="index.html">
                  <span class="xl:inline-block hidden">
        <img src="assets/images/logo/logo.svg" class="black_logo " alt="logo">
        <img src="assets/images/logo/logo-white.svg" class="white_logo" alt="logo">
    </span>
                  <span class="xl:hidden inline-block">
        <img src="assets/images/logo/logo-c.svg" class="black_logo " alt="logo">
        <img src="assets/images/logo/logo-c-white.svg" class="white_logo " alt="logo">
    </span>
                </a>
                <button class="smallDeviceMenuController  open-sdiebar-controller xl:hidden inline-block">
                  <iconify-icon class="leading-none bg-transparent relative text-xl top-[2px] text-slate-900 dark:text-white" icon="heroicons-outline:menu-alt-3"></iconify-icon>
                </button>

              </div>
              <!-- end horizental -->



              <div class="main-menu">
                <ul>

                  <li class="
             menu-item-has-children 
              ">
                    <!--  Single menu -->

                    <!-- has dropdown -->



                    <a href="javascript:void()">
                      <div class="flex flex-1 items-center space-x-[6px] rtl:space-x-reverse">
                        <span class="icon-box">
                    <iconify-icon icon=heroicons-outline:home > </iconify-icon>
                  </span>
                        <div class="text-box">Dashboard</div>
                      </div>
                      <div class="flex-none text-sm ltr:ml-3 rtl:mr-3 leading-[1] relative top-1">
                        <iconify-icon icon="heroicons-outline:chevron-down"> </iconify-icon>
                      </div>
                    </a>

                    <!-- Dropdown menu -->



                    <ul class="sub-menu">



                      <li>
                        <a href=index.html>
                          <div class="flex space-x-2 items-start rtl:space-x-reverse">
                            <iconify-icon icon=heroicons:presentation-chart-line class="leading-[1] text-base"> </iconify-icon>
                            <span class="leading-[1]">
                          Analytics Dashboard
                        </span>
                          </div>
                        </a>
                      </li>



                      <li>
                        <a href=ecommerce-dashboard.html>
                          <div class="flex space-x-2 items-start rtl:space-x-reverse">
                            <iconify-icon icon=heroicons:shopping-cart class="leading-[1] text-base"> </iconify-icon>
                            <span class="leading-[1]">
                          Ecommerce Dashboard
                        </span>
                          </div>
                        </a>
                      </li>



                      <li>
                        <a href=project-dashboard.html>
                          <div class="flex space-x-2 items-start rtl:space-x-reverse">
                            <iconify-icon icon=heroicons:briefcase class="leading-[1] text-base"> </iconify-icon>
                            <span class="leading-[1]">
                          Project Dashboard
                        </span>
                          </div>
                        </a>
                      </li>



                      <li>
                        <a href=crm-dashboard.html>
                          <div class="flex space-x-2 items-start rtl:space-x-reverse">
                            <iconify-icon icon=ri:customer-service-2-fill class="leading-[1] text-base"> </iconify-icon>
                            <span class="leading-[1]">
                          CRM Dashboard
                        </span>
                          </div>
                        </a>
                      </li>



                      <li>
                        <a href=banking-dashboard.html>
                          <div class="flex space-x-2 items-start rtl:space-x-reverse">
                            <iconify-icon icon=heroicons:wrench-screwdriver class="leading-[1] text-base"> </iconify-icon>
                            <span class="leading-[1]">
                          Banking Dashboard
                        </span>
                          </div>
                        </a>
                      </li>

                    </ul>

                    <!-- Megamenu -->


                  </li>

                  <li class="
             menu-item-has-children 
              ">
                    <!--  Single menu -->

                    <!-- has dropdown -->



                    <a href="javascript:void()">
                      <div class="flex flex-1 items-center space-x-[6px] rtl:space-x-reverse">
                        <span class="icon-box">
                    <iconify-icon icon=heroicons-outline:chip > </iconify-icon>
                  </span>
                        <div class="text-box">App</div>
                      </div>
                      <div class="flex-none text-sm ltr:ml-3 rtl:mr-3 leading-[1] relative top-1">
                        <iconify-icon icon="heroicons-outline:chevron-down"> </iconify-icon>
                      </div>
                    </a>

                    <!-- Dropdown menu -->



                    <ul class="sub-menu">



                      <li>
                        <a href=chat.html>
                          <div class="flex space-x-2 items-start rtl:space-x-reverse">
                            <iconify-icon icon=heroicons-outline:chat class="leading-[1] text-base"> </iconify-icon>
                            <span class="leading-[1]">
                          Chat
                        </span>
                          </div>
                        </a>
                      </li>



                      <li>
                        <a href=email.html>
                          <div class="flex space-x-2 items-start rtl:space-x-reverse">
                            <iconify-icon icon=heroicons-outline:mail class="leading-[1] text-base"> </iconify-icon>
                            <span class="leading-[1]">
                          Email
                        </span>
                          </div>
                        </a>
                      </li>



                      <li>
                        <a href=calender>
                          <div class="flex space-x-2 items-start rtl:space-x-reverse">
                            <iconify-icon icon=heroicons-outline:calendar class="leading-[1] text-base"> </iconify-icon>
                            <span class="leading-[1]">
                          Calendar
                        </span>
                          </div>
                        </a>
                      </li>



                      <li>
                        <a href=kanban>
                          <div class="flex space-x-2 items-start rtl:space-x-reverse">
                            <iconify-icon icon=heroicons-outline:view-boards class="leading-[1] text-base"> </iconify-icon>
                            <span class="leading-[1]">
                          Kanban
                        </span>
                          </div>
                        </a>
                      </li>



                      <li>
                        <a href=todo>
                          <div class="flex space-x-2 items-start rtl:space-x-reverse">
                            <iconify-icon icon=heroicons-outline:clipboard-check class="leading-[1] text-base"> </iconify-icon>
                            <span class="leading-[1]">
                          Todo
                        </span>
                          </div>
                        </a>
                      </li>



                      <li>
                        <a href=projects>
                          <div class="flex space-x-2 items-start rtl:space-x-reverse">
                            <iconify-icon icon=heroicons-outline:document class="leading-[1] text-base"> </iconify-icon>
                            <span class="leading-[1]">
                          Projects
                        </span>
                          </div>
                        </a>
                      </li>

                    </ul>

                    <!-- Megamenu -->


                  </li>

                  <li class="
              menu-item-has-children has-megamenu
            ">
                    <!--  Single menu -->

                    <!-- has dropdown -->



                    <a href="javascript:void()">
                      <div class="flex flex-1 items-center space-x-[6px] rtl:space-x-reverse">
                        <span class="icon-box">
                    <iconify-icon icon=heroicons-outline:view-boards > </iconify-icon>
                  </span>
                        <div class="text-box">Pages</div>
                      </div>
                      <div class="flex-none text-sm ltr:ml-3 rtl:mr-3 leading-[1] relative top-1">
                        <iconify-icon icon="heroicons-outline:chevron-down"> </iconify-icon>
                      </div>
                    </a>

                    <!-- Dropdown menu -->


                    <!-- Megamenu -->



                    <div class="rt-mega-menu">
                      <div class="flex flex-wrap space-x-8 justify-between rtl:space-x-reverse">



                        <div>
                          <!-- mega menu title -->
                          <div class="text-sm font-medium text-slate-900 dark:text-white mb-2 flex space-x-1 items-center">

                            <span> Authentication</span>
                          </div>
                          <!-- single menu item* -->



                          <a href=signin-one.html>

                            <div class="flex items-center space-x-2 text-[15px] leading-6 rtl:space-x-reverse">
                              <span
                                class="h-[6px] w-[6px] rounded-full border border-slate-600 dark:border-white inline-block flex-none"
                              ></span>
                              <span
                                class="capitalize text-slate-600 dark:text-slate-300"
                              >
                                Signin One
                              </span>
                            </div>

                          </a>



                          <a href=signin-two.html>

                            <div class="flex items-center space-x-2 text-[15px] leading-6 rtl:space-x-reverse">
                              <span
                                class="h-[6px] w-[6px] rounded-full border border-slate-600 dark:border-white inline-block flex-none"
                              ></span>
                              <span
                                class="capitalize text-slate-600 dark:text-slate-300"
                              >
                                Signin Two
                              </span>
                            </div>

                          </a>



                          <a href=signin-three.html>

                            <div class="flex items-center space-x-2 text-[15px] leading-6 rtl:space-x-reverse">
                              <span
                                class="h-[6px] w-[6px] rounded-full border border-slate-600 dark:border-white inline-block flex-none"
                              ></span>
                              <span
                                class="capitalize text-slate-600 dark:text-slate-300"
                              >
                                Signin Three
                              </span>
                            </div>

                          </a>



                          <a href=signup-one.html>

                            <div class="flex items-center space-x-2 text-[15px] leading-6 rtl:space-x-reverse">
                              <span
                                class="h-[6px] w-[6px] rounded-full border border-slate-600 dark:border-white inline-block flex-none"
                              ></span>
                              <span
                                class="capitalize text-slate-600 dark:text-slate-300"
                              >
                                Signup One
                              </span>
                            </div>

                          </a>



                          <a href=signup-two.html>

                            <div class="flex items-center space-x-2 text-[15px] leading-6 rtl:space-x-reverse">
                              <span
                                class="h-[6px] w-[6px] rounded-full border border-slate-600 dark:border-white inline-block flex-none"
                              ></span>
                              <span
                                class="capitalize text-slate-600 dark:text-slate-300"
                              >
                                Signup Two
                              </span>
                            </div>

                          </a>



                          <a href=signup-three.html>

                            <div class="flex items-center space-x-2 text-[15px] leading-6 rtl:space-x-reverse">
                              <span
                                class="h-[6px] w-[6px] rounded-full border border-slate-600 dark:border-white inline-block flex-none"
                              ></span>
                              <span
                                class="capitalize text-slate-600 dark:text-slate-300"
                              >
                                Signup Three
                              </span>
                            </div>

                          </a>



                          <a href=forget-password-one.html>

                            <div class="flex items-center space-x-2 text-[15px] leading-6 rtl:space-x-reverse">
                              <span
                                class="h-[6px] w-[6px] rounded-full border border-slate-600 dark:border-white inline-block flex-none"
                              ></span>
                              <span
                                class="capitalize text-slate-600 dark:text-slate-300"
                              >
                                Forget Password One
                              </span>
                            </div>

                          </a>



                          <a href=forget-password-two.html>

                            <div class="flex items-center space-x-2 text-[15px] leading-6 rtl:space-x-reverse">
                              <span
                                class="h-[6px] w-[6px] rounded-full border border-slate-600 dark:border-white inline-block flex-none"
                              ></span>
                              <span
                                class="capitalize text-slate-600 dark:text-slate-300"
                              >
                                Forget Password Two
                              </span>
                            </div>

                          </a>



                          <a href=forget-password-three.html>

                            <div class="flex items-center space-x-2 text-[15px] leading-6 rtl:space-x-reverse">
                              <span
                                class="h-[6px] w-[6px] rounded-full border border-slate-600 dark:border-white inline-block flex-none"
                              ></span>
                              <span
                                class="capitalize text-slate-600 dark:text-slate-300"
                              >
                                Forget Password Three
                              </span>
                            </div>

                          </a>



                          <a href=lock-screen-one.html>

                            <div class="flex items-center space-x-2 text-[15px] leading-6 rtl:space-x-reverse">
                              <span
                                class="h-[6px] w-[6px] rounded-full border border-slate-600 dark:border-white inline-block flex-none"
                              ></span>
                              <span
                                class="capitalize text-slate-600 dark:text-slate-300"
                              >
                                Lock Screen One
                              </span>
                            </div>

                          </a>



                          <a href=lock-screen-two.html>

                            <div class="flex items-center space-x-2 text-[15px] leading-6 rtl:space-x-reverse">
                              <span
                                class="h-[6px] w-[6px] rounded-full border border-slate-600 dark:border-white inline-block flex-none"
                              ></span>
                              <span
                                class="capitalize text-slate-600 dark:text-slate-300"
                              >
                                Lock Screen Two
                              </span>
                            </div>

                          </a>



                          <a href=lock-screen-three.html>

                            <div class="flex items-center space-x-2 text-[15px] leading-6 rtl:space-x-reverse">
                              <span
                                class="h-[6px] w-[6px] rounded-full border border-slate-600 dark:border-white inline-block flex-none"
                              ></span>
                              <span
                                class="capitalize text-slate-600 dark:text-slate-300"
                              >
                                Lock Screen Three
                              </span>
                            </div>

                          </a>

                        </div>



                        <div>
                          <!-- mega menu title -->
                          <div class="text-sm font-medium text-slate-900 dark:text-white mb-2 flex space-x-1 items-center">

                            <span> Components</span>
                          </div>
                          <!-- single menu item* -->



                          <a href=typography.html>

                            <div class="flex items-center space-x-2 text-[15px] leading-6 rtl:space-x-reverse">
                              <span
                                class="h-[6px] w-[6px] rounded-full border border-slate-600 dark:border-white inline-block flex-none"
                              ></span>
                              <span
                                class="capitalize text-slate-600 dark:text-slate-300"
                              >
                                typography
                              </span>
                            </div>

                          </a>



                          <a href=colors.html>

                            <div class="flex items-center space-x-2 text-[15px] leading-6 rtl:space-x-reverse">
                              <span
                                class="h-[6px] w-[6px] rounded-full border border-slate-600 dark:border-white inline-block flex-none"
                              ></span>
                              <span
                                class="capitalize text-slate-600 dark:text-slate-300"
                              >
                                colors
                              </span>
                            </div>

                          </a>



                          <a href=alert.html>

                            <div class="flex items-center space-x-2 text-[15px] leading-6 rtl:space-x-reverse">
                              <span
                                class="h-[6px] w-[6px] rounded-full border border-slate-600 dark:border-white inline-block flex-none"
                              ></span>
                              <span
                                class="capitalize text-slate-600 dark:text-slate-300"
                              >
                                alert
                              </span>
                            </div>

                          </a>



                          <a href=button.html>

                            <div class="flex items-center space-x-2 text-[15px] leading-6 rtl:space-x-reverse">
                              <span
                                class="h-[6px] w-[6px] rounded-full border border-slate-600 dark:border-white inline-block flex-none"
                              ></span>
                              <span
                                class="capitalize text-slate-600 dark:text-slate-300"
                              >
                                button
                              </span>
                            </div>

                          </a>



                          <a href=card.html>

                            <div class="flex items-center space-x-2 text-[15px] leading-6 rtl:space-x-reverse">
                              <span
                                class="h-[6px] w-[6px] rounded-full border border-slate-600 dark:border-white inline-block flex-none"
                              ></span>
                              <span
                                class="capitalize text-slate-600 dark:text-slate-300"
                              >
                                card
                              </span>
                            </div>

                          </a>



                          <a href=carousel.html>

                            <div class="flex items-center space-x-2 text-[15px] leading-6 rtl:space-x-reverse">
                              <span
                                class="h-[6px] w-[6px] rounded-full border border-slate-600 dark:border-white inline-block flex-none"
                              ></span>
                              <span
                                class="capitalize text-slate-600 dark:text-slate-300"
                              >
                                carousel
                              </span>
                            </div>

                          </a>



                          <a href=dropdown.html>

                            <div class="flex items-center space-x-2 text-[15px] leading-6 rtl:space-x-reverse">
                              <span
                                class="h-[6px] w-[6px] rounded-full border border-slate-600 dark:border-white inline-block flex-none"
                              ></span>
                              <span
                                class="capitalize text-slate-600 dark:text-slate-300"
                              >
                                dropdown
                              </span>
                            </div>

                          </a>



                          <a href=image.html>

                            <div class="flex items-center space-x-2 text-[15px] leading-6 rtl:space-x-reverse">
                              <span
                                class="h-[6px] w-[6px] rounded-full border border-slate-600 dark:border-white inline-block flex-none"
                              ></span>
                              <span
                                class="capitalize text-slate-600 dark:text-slate-300"
                              >
                                image
                              </span>
                            </div>

                          </a>



                          <a href=modal.html>

                            <div class="flex items-center space-x-2 text-[15px] leading-6 rtl:space-x-reverse">
                              <span
                                class="h-[6px] w-[6px] rounded-full border border-slate-600 dark:border-white inline-block flex-none"
                              ></span>
                              <span
                                class="capitalize text-slate-600 dark:text-slate-300"
                              >
                                modal
                              </span>
                            </div>

                          </a>



                          <a href=progress-bar.html>

                            <div class="flex items-center space-x-2 text-[15px] leading-6 rtl:space-x-reverse">
                              <span
                                class="h-[6px] w-[6px] rounded-full border border-slate-600 dark:border-white inline-block flex-none"
                              ></span>
                              <span
                                class="capitalize text-slate-600 dark:text-slate-300"
                              >
                                Progress bar
                              </span>
                            </div>

                          </a>



                          <a href=placeholder.html>

                            <div class="flex items-center space-x-2 text-[15px] leading-6 rtl:space-x-reverse">
                              <span
                                class="h-[6px] w-[6px] rounded-full border border-slate-600 dark:border-white inline-block flex-none"
                              ></span>
                              <span
                                class="capitalize text-slate-600 dark:text-slate-300"
                              >
                                Placeholder
                              </span>
                            </div>

                          </a>



                          <a href=tab-accordion.html>

                            <div class="flex items-center space-x-2 text-[15px] leading-6 rtl:space-x-reverse">
                              <span
                                class="h-[6px] w-[6px] rounded-full border border-slate-600 dark:border-white inline-block flex-none"
                              ></span>
                              <span
                                class="capitalize text-slate-600 dark:text-slate-300"
                              >
                                Tab &amp; Accordion
                              </span>
                            </div>

                          </a>

                        </div>



                        <div>
                          <!-- mega menu title -->
                          <div class="text-sm font-medium text-slate-900 dark:text-white mb-2 flex space-x-1 items-center">

                            <span> Forms</span>
                          </div>
                          <!-- single menu item* -->



                          <a href=input.html>

                            <div class="flex items-center space-x-2 text-[15px] leading-6 rtl:space-x-reverse">
                              <span
                                class="h-[6px] w-[6px] rounded-full border border-slate-600 dark:border-white inline-block flex-none"
                              ></span>
                              <span
                                class="capitalize text-slate-600 dark:text-slate-300"
                              >
                                Input
                              </span>
                            </div>

                          </a>



                          <a href=input-group.html>

                            <div class="flex items-center space-x-2 text-[15px] leading-6 rtl:space-x-reverse">
                              <span
                                class="h-[6px] w-[6px] rounded-full border border-slate-600 dark:border-white inline-block flex-none"
                              ></span>
                              <span
                                class="capitalize text-slate-600 dark:text-slate-300"
                              >
                                Input group
                              </span>
                            </div>

                          </a>



                          <a href=input-layout.html>

                            <div class="flex items-center space-x-2 text-[15px] leading-6 rtl:space-x-reverse">
                              <span
                                class="h-[6px] w-[6px] rounded-full border border-slate-600 dark:border-white inline-block flex-none"
                              ></span>
                              <span
                                class="capitalize text-slate-600 dark:text-slate-300"
                              >
                                Input layout
                              </span>
                            </div>

                          </a>



                          <a href=form-validation.html>

                            <div class="flex items-center space-x-2 text-[15px] leading-6 rtl:space-x-reverse">
                              <span
                                class="h-[6px] w-[6px] rounded-full border border-slate-600 dark:border-white inline-block flex-none"
                              ></span>
                              <span
                                class="capitalize text-slate-600 dark:text-slate-300"
                              >
                                Form validation
                              </span>
                            </div>

                          </a>



                          <a href=form-wizard.html>

                            <div class="flex items-center space-x-2 text-[15px] leading-6 rtl:space-x-reverse">
                              <span
                                class="h-[6px] w-[6px] rounded-full border border-slate-600 dark:border-white inline-block flex-none"
                              ></span>
                              <span
                                class="capitalize text-slate-600 dark:text-slate-300"
                              >
                                Wizard
                              </span>
                            </div>

                          </a>



                          <a href=input-mask.html>

                            <div class="flex items-center space-x-2 text-[15px] leading-6 rtl:space-x-reverse">
                              <span
                                class="h-[6px] w-[6px] rounded-full border border-slate-600 dark:border-white inline-block flex-none"
                              ></span>
                              <span
                                class="capitalize text-slate-600 dark:text-slate-300"
                              >
                                Input mask
                              </span>
                            </div>

                          </a>



                          <a href=file-input>

                            <div class="flex items-center space-x-2 text-[15px] leading-6 rtl:space-x-reverse">
                              <span
                                class="h-[6px] w-[6px] rounded-full border border-slate-600 dark:border-white inline-block flex-none"
                              ></span>
                              <span
                                class="capitalize text-slate-600 dark:text-slate-300"
                              >
                                File input
                              </span>
                            </div>

                          </a>



                          <a href=form-repeater.html>

                            <div class="flex items-center space-x-2 text-[15px] leading-6 rtl:space-x-reverse">
                              <span
                                class="h-[6px] w-[6px] rounded-full border border-slate-600 dark:border-white inline-block flex-none"
                              ></span>
                              <span
                                class="capitalize text-slate-600 dark:text-slate-300"
                              >
                                Form repeater
                              </span>
                            </div>

                          </a>



                          <a href=textarea.html>

                            <div class="flex items-center space-x-2 text-[15px] leading-6 rtl:space-x-reverse">
                              <span
                                class="h-[6px] w-[6px] rounded-full border border-slate-600 dark:border-white inline-block flex-none"
                              ></span>
                              <span
                                class="capitalize text-slate-600 dark:text-slate-300"
                              >
                                Textarea
                              </span>
                            </div>

                          </a>



                          <a href=checkbox.html>

                            <div class="flex items-center space-x-2 text-[15px] leading-6 rtl:space-x-reverse">
                              <span
                                class="h-[6px] w-[6px] rounded-full border border-slate-600 dark:border-white inline-block flex-none"
                              ></span>
                              <span
                                class="capitalize text-slate-600 dark:text-slate-300"
                              >
                                Checkbox
                              </span>
                            </div>

                          </a>



                          <a href=radio-button.html>

                            <div class="flex items-center space-x-2 text-[15px] leading-6 rtl:space-x-reverse">
                              <span
                                class="h-[6px] w-[6px] rounded-full border border-slate-600 dark:border-white inline-block flex-none"
                              ></span>
                              <span
                                class="capitalize text-slate-600 dark:text-slate-300"
                              >
                                Radio button
                              </span>
                            </div>

                          </a>



                          <a href=switch.html>

                            <div class="flex items-center space-x-2 text-[15px] leading-6 rtl:space-x-reverse">
                              <span
                                class="h-[6px] w-[6px] rounded-full border border-slate-600 dark:border-white inline-block flex-none"
                              ></span>
                              <span
                                class="capitalize text-slate-600 dark:text-slate-300"
                              >
                                Switch
                              </span>
                            </div>

                          </a>

                        </div>



                        <div>
                          <!-- mega menu title -->
                          <div class="text-sm font-medium text-slate-900 dark:text-white mb-2 flex space-x-1 items-center">

                            <span> Utility</span>
                          </div>
                          <!-- single menu item* -->



                          <a href=invoice.html>

                            <div class="flex items-center space-x-2 text-[15px] leading-6 rtl:space-x-reverse">
                              <span
                                class="h-[6px] w-[6px] rounded-full border border-slate-600 dark:border-white inline-block flex-none"
                              ></span>
                              <span
                                class="capitalize text-slate-600 dark:text-slate-300"
                              >
                                Invoice
                              </span>
                            </div>

                          </a>



                          <a href=pricing.html>

                            <div class="flex items-center space-x-2 text-[15px] leading-6 rtl:space-x-reverse">
                              <span
                                class="h-[6px] w-[6px] rounded-full border border-slate-600 dark:border-white inline-block flex-none"
                              ></span>
                              <span
                                class="capitalize text-slate-600 dark:text-slate-300"
                              >
                                Pricing
                              </span>
                            </div>

                          </a>



                          <a href=faq.html>

                            <div class="flex items-center space-x-2 text-[15px] leading-6 rtl:space-x-reverse">
                              <span
                                class="h-[6px] w-[6px] rounded-full border border-slate-600 dark:border-white inline-block flex-none"
                              ></span>
                              <span
                                class="capitalize text-slate-600 dark:text-slate-300"
                              >
                                FAQ
                              </span>
                            </div>

                          </a>



                          <a href=blank-page.html>

                            <div class="flex items-center space-x-2 text-[15px] leading-6 rtl:space-x-reverse">
                              <span
                                class="h-[6px] w-[6px] rounded-full border border-slate-600 dark:border-white inline-block flex-none"
                              ></span>
                              <span
                                class="capitalize text-slate-600 dark:text-slate-300"
                              >
                                Blank page
                              </span>
                            </div>

                          </a>



                          <a href=blog.html>

                            <div class="flex items-center space-x-2 text-[15px] leading-6 rtl:space-x-reverse">
                              <span
                                class="h-[6px] w-[6px] rounded-full border border-slate-600 dark:border-white inline-block flex-none"
                              ></span>
                              <span
                                class="capitalize text-slate-600 dark:text-slate-300"
                              >
                                Blog
                              </span>
                            </div>

                          </a>



                          <a href=404.html>

                            <div class="flex items-center space-x-2 text-[15px] leading-6 rtl:space-x-reverse">
                              <span
                                class="h-[6px] w-[6px] rounded-full border border-slate-600 dark:border-white inline-block flex-none"
                              ></span>
                              <span
                                class="capitalize text-slate-600 dark:text-slate-300"
                              >
                                404 page
                              </span>
                            </div>

                          </a>



                          <a href=comming-soon.html>

                            <div class="flex items-center space-x-2 text-[15px] leading-6 rtl:space-x-reverse">
                              <span
                                class="h-[6px] w-[6px] rounded-full border border-slate-600 dark:border-white inline-block flex-none"
                              ></span>
                              <span
                                class="capitalize text-slate-600 dark:text-slate-300"
                              >
                                Coming Soon
                              </span>
                            </div>

                          </a>



                          <a href=under-maintanance.html>

                            <div class="flex items-center space-x-2 text-[15px] leading-6 rtl:space-x-reverse">
                              <span
                                class="h-[6px] w-[6px] rounded-full border border-slate-600 dark:border-white inline-block flex-none"
                              ></span>
                              <span
                                class="capitalize text-slate-600 dark:text-slate-300"
                              >
                                Under Maintanance page
                              </span>
                            </div>

                          </a>

                        </div>

                      </div>
                    </div>

                  </li>

                  <li class="
             menu-item-has-children 
              ">
                    <!--  Single menu -->

                    <!-- has dropdown -->



                    <a href="javascript:void()">
                      <div class="flex flex-1 items-center space-x-[6px] rtl:space-x-reverse">
                        <span class="icon-box">
                    <iconify-icon icon=heroicons-outline:view-grid-add > </iconify-icon>
                  </span>
                        <div class="text-box">Widgets</div>
                      </div>
                      <div class="flex-none text-sm ltr:ml-3 rtl:mr-3 leading-[1] relative top-1">
                        <iconify-icon icon="heroicons-outline:chevron-down"> </iconify-icon>
                      </div>
                    </a>

                    <!-- Dropdown menu -->



                    <ul class="sub-menu">



                      <li>
                        <a href=basic-widgets.html>
                          <div class="flex space-x-2 items-start rtl:space-x-reverse">
                            <iconify-icon icon=heroicons-outline:document-text class="leading-[1] text-base"> </iconify-icon>
                            <span class="leading-[1]">
                          Basic
                        </span>
                          </div>
                        </a>
                      </li>



                      <li>
                        <a href=statistics-widgets.html>
                          <div class="flex space-x-2 items-start rtl:space-x-reverse">
                            <iconify-icon icon=heroicons-outline:document-text class="leading-[1] text-base"> </iconify-icon>
                            <span class="leading-[1]">
                          Statistic
                        </span>
                          </div>
                        </a>
                      </li>

                    </ul>

                    <!-- Megamenu -->


                  </li>

                  <li class="
             menu-item-has-children 
              ">
                    <!--  Single menu -->

                    <!-- has dropdown -->



                    <a href="javascript:void()">
                      <div class="flex flex-1 items-center space-x-[6px] rtl:space-x-reverse">
                        <span class="icon-box">
                    <iconify-icon icon=heroicons-outline:template > </iconify-icon>
                  </span>
                        <div class="text-box">Extra</div>
                      </div>
                      <div class="flex-none text-sm ltr:ml-3 rtl:mr-3 leading-[1] relative top-1">
                        <iconify-icon icon="heroicons-outline:chevron-down"> </iconify-icon>
                      </div>
                    </a>

                    <!-- Dropdown menu -->



                    <ul class="sub-menu">



                      <li>
                        <a href=basic-table.html>
                          <div class="flex space-x-2 items-start rtl:space-x-reverse">
                            <iconify-icon icon=heroicons-outline:table class="leading-[1] text-base"> </iconify-icon>
                            <span class="leading-[1]">
                          Basic Table
                        </span>
                          </div>
                        </a>
                      </li>



                      <li>
                        <a href=advance-table.html>
                          <div class="flex space-x-2 items-start rtl:space-x-reverse">
                            <iconify-icon icon=heroicons-outline:table class="leading-[1] text-base"> </iconify-icon>
                            <span class="leading-[1]">
                          Advanced table
                        </span>
                          </div>
                        </a>
                      </li>



                      <li>
                        <a href=apex-chart.html>
                          <div class="flex space-x-2 items-start rtl:space-x-reverse">
                            <iconify-icon icon=heroicons-outline:chart-bar class="leading-[1] text-base"> </iconify-icon>
                            <span class="leading-[1]">
                          Apex chart
                        </span>
                          </div>
                        </a>
                      </li>



                      <li>
                        <a href=chartjs.html>
                          <div class="flex space-x-2 items-start rtl:space-x-reverse">
                            <iconify-icon icon=heroicons-outline:chart-bar class="leading-[1] text-base"> </iconify-icon>
                            <span class="leading-[1]">
                          Chart js
                        </span>
                          </div>
                        </a>
                      </li>



                      <li>
                        <a href=map.html>
                          <div class="flex space-x-2 items-start rtl:space-x-reverse">
                            <iconify-icon icon=heroicons-outline:map class="leading-[1] text-base"> </iconify-icon>
                            <span class="leading-[1]">
                          Map
                        </span>
                          </div>
                        </a>
                      </li>

                    </ul>

                    <!-- Megamenu -->


                  </li>

                </ul>
              </div>
              <!-- end top menu -->
              <div class="nav-tools flex items-center lg:space-x-5 space-x-3 rtl:space-x-reverse leading-0">

                <!-- BEGIN: Language Dropdown  -->

                <div class="relative">
                  <button class="text-slate-800 dark:text-white focus:ring-0 focus:outline-none font-medium rounded-lg text-sm text-center
            inline-flex items-center" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    {{-- <iconify-icon icon="circle-flags:uk" class="mr-0 md:mr-2 rtl:ml-2 text-xl"></iconify-icon>
                    <span class="text-sm md:block hidden font-medium text-slate-600 dark:text-slate-300">
            En</span> --}}
                  </button>
                  <!-- Language Dropdown menu -->
                  <div class="dropdown-menu z-10 hidden bg-white divide-y divide-slate-100 shadow w-44 dark:bg-slate-800 border dark:border-slate-900 !top-[25px] rounded-md
            overflow-hidden">
                    <ul class="py-1 text-sm text-slate-800 dark:text-slate-200">

                    </ul>
                  </div>
                </div>
                <!-- Theme Changer -->
                <!-- END: Language Dropdown -->

                <!-- BEGIN: Toggle Theme -->
                <div>
                  <button id="themeMood" class="h-[28px] w-[28px] lg:h-[32px] lg:w-[32px] lg:bg-gray-500-f7 bg-slate-50 dark:bg-slate-900 lg:dark:bg-slate-900 dark:text-white text-slate-900 cursor-pointer rounded-full text-[20px] flex flex-col items-center justify-center">
                    <iconify-icon class="text-slate-800 dark:text-white text-xl dark:block hidden" id="moonIcon" icon="line-md:sunny-outline-to-moon-alt-loop-transition"></iconify-icon>
                    <iconify-icon class="text-slate-800 dark:text-white text-xl dark:hidden block" id="sunIcon" icon="line-md:moon-filled-to-sunny-filled-loop-transition"></iconify-icon>
                  </button>
                </div>
                <!-- END: TOggle Theme -->

                <!-- BEGIN: gray-scale Dropdown -->
                <div>
                  <button id="grayScale" class="lg:h-[32px] lg:w-[32px] lg:bg-slate-100 lg:dark:bg-slate-900 dark:text-white text-slate-900 cursor-pointer
            rounded-full text-[20px] flex flex-col items-center justify-center">
                    <iconify-icon class="text-slate-800 dark:text-white text-xl" icon="mdi:paint-outline"></iconify-icon>
                  </button>
                </div>
                <!-- END: gray-scale Dropdown -->

                <!-- BEGIN: Profile Dropdown -->
                <!-- Profile DropDown Area -->
                <div class="md:block hidden w-full">
                  <button class="text-slate-800 dark:text-white focus:ring-0 focus:outline-none font-medium rounded-lg text-sm text-center
      inline-flex items-center" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="lg:h-8 lg:w-8 h-7 w-7 rounded-full flex-1 ltr:mr-[10px] rtl:ml-[10px]">
                      <img src="{{ asset('template/assets/images/all-img/user.png') }}" alt="" class="block w-full h-full object-cover rounded-full">
                    </div>
                    <span class="flex-none text-slate-600 dark:text-white text-sm font-normal items-center lg:flex hidden overflow-hidden text-ellipsis whitespace-nowrap">{{ auth()->user()->fullname }}</span>
                    <svg class="w-[16px] h-[16px] dark:text-white hidden lg:inline-block text-base inline-block ml-[10px] rtl:mr-[10px]" aria-hidden="true" fill="none" stroke="currentColor" viewbox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                  </button>
                  <!-- Dropdown menu -->
                  <div class="dropdown-menu z-10 hidden bg-white divide-y divide-slate-100 shadow w-44 dark:bg-slate-800 border dark:border-slate-700 !top-[23px] rounded-md
      overflow-hidden">
                    <ul class="py-1 text-sm text-slate-800 dark:text-slate-200">
                      <li>
                        <a href="settings.html" class="block px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600 dark:hover:text-white font-inter text-sm text-slate-600
            dark:text-white font-normal">
                          <iconify-icon icon="heroicons-outline:cog" class="relative top-[2px] text-lg ltr:mr-1 rtl:ml-1"></iconify-icon>
                          <span class="font-Inter">Settings</span>
                        </a>
                      </li>
                        <a href="{{ Route('logout') }}" class="block px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600 dark:hover:text-white font-inter text-sm text-slate-600
            dark:text-white font-normal">
                          <iconify-icon icon="heroicons-outline:login" class="relative top-[2px] text-lg ltr:mr-1 rtl:ml-1"></iconify-icon>
                          <span class="font-Inter">Logout</span>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
                <!-- END: Header -->
                <button class="smallDeviceMenuController md:hidden block leading-0">
                  <iconify-icon class="cursor-pointer text-slate-900 dark:text-white text-2xl" icon="heroicons-outline:menu-alt-3"></iconify-icon>
                </button>
                <!-- end mobile menu -->
              </div>
              <!-- end nav tools -->
            </div>
          </div>
        </div>

        <!-- BEGIN: Search Modal -->
        <div class="modal fade fixed top-0 left-0 hidden w-full h-full outline-none overflow-x-hidden overflow-y-auto" id="searchModal" tabindex="-1" aria-labelledby="searchModalLabel" aria-hidden="true">
          <div class="modal-dialog relative w-auto pointer-events-none top-1/4">
            <div class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white dark:bg-slate-900 bg-clip-padding rounded-md outline-none text-current">
              <form>
                <div class="relative">
                  <input type="text" class="form-control !py-3 !pr-12" placeholder="Search">
                  <button class="absolute right-0 top-1/2 -translate-y-1/2 w-9 h-full border-l text-xl border-l-slate-200 dark:border-l-slate-600 dark:text-slate-300 flex items-center justify-center">
                    <iconify-icon icon="heroicons-solid:search"></iconify-icon>
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <!-- END: Search Modal -->
        <!-- END: Header -->
        <!-- END: Header -->

        <!-- Dasboard Tengah -->
        <div class="content-wrapper transition-all duration-150 ltr:ml-[248px] rtl:mr-[248px]" id="content_wrapper">
            <div class="page-content">
              <div class="transition-all duration-150 container-fluid" id="page_layout">
                <div id="content_layout">
  
                      <!-- BEGIN: Breadcrumb -->
                                  <div class="mb-5">
                                      <ul class="m-0 p-0 list-none">
                                        <li class="inline-block relative top-[3px] text-base text-primary-500 font-Inter ">
                                          <a href="index.html">
                                            <iconify-icon icon="heroicons-outline:home"></iconify-icon>
                                            <iconify-icon icon="heroicons-outline:chevron-right" class="relative text-slate-500 text-sm rtl:rotate-180"></iconify-icon>
                                          </a>
                                        </li>
                                        <li class="inline-block relative text-sm text-primary-500 font-Inter ">
                                          Pajak
                                          <iconify-icon icon="heroicons-outline:chevron-right" class="relative top-[3px] text-slate-500 rtl:rotate-180"></iconify-icon>
                                        </li>
                                        <li class="inline-block relative text-sm text-slate-500 font-Inter dark:text-white">
                                          Pembuatan </li>
                                      </ul>
                                  </div>
                  
                  <div class="card">
                    <div class="card-body flex flex-col p-6">
                      <header class="flex mb-5 items-center border-b border-slate-100 dark:border-slate-700 pb-5 -mx-6 px-6">
                        <div class="flex-1">
                          <div class="card-title text-slate-900 dark:text-white">Data Pajak LS</div>
                        </div>
                      </header>
                      <div class="card-text h-full">
                        <div>

                          <ul class="nav nav-tabs flex flex-col md:flex-row flex-wrap list-none border-b-0 pl-0 mb-4" id="tabs-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                              <a href="#tabs-home-withIcon" class="nav-link w-full flex items-center font-medium text-sm font-Inter leading-tight capitalize border-x-0 border-t-0 border-b border-transparent px-4 pb-2 my-2 hover:border-transparent focus:border-transparent active dark:text-slate-300" id="tabs-home-withIcon-tab" data-bs-toggle="pill" data-bs-target="#tabs-home-withIcon" role="tab" aria-controls="tabs-home-withIcon" aria-selected="true">
                              <iconify-icon icon="material-symbols:right-click-rounded"></iconify-icon>
                                Triwulan I</a>
                            </li>
                            <li class="nav-item" role="presentation">
                              <a href="#tabs-profile-withIcon" class="nav-link w-full flex items-center font-medium text-sm font-Inter leading-tight capitalize border-x-0 border-t-0 border-b border-transparent px-4 pb-2 my-2 hover:border-transparent focus:border-transparent dark:text-slate-300" id="tabs-profile-withIcon-tab" data-bs-toggle="pill" data-bs-target="#tabs-profile-withIcon" role="tab" aria-controls="tabs-profile-withIcon" aria-selected="false">
                              <iconify-icon icon="material-symbols:right-click-rounded"></iconify-icon>
                                Triwulan II</a>
                            </li>
                            <li class="nav-item" role="presentation">
                              <a href="#tabs-messages-withIcon" class="nav-link w-full flex items-center font-medium text-sm font-Inter leading-tight capitalize border-x-0 border-t-0 border-b border-transparent px-4 pb-2 my-2 hover:border-transparent focus:border-transparent dark:text-slate-300" id="tabs-messages-withIcon-tab" data-bs-toggle="pill" data-bs-target="#tabs-messages-withIcon" role="tab" aria-controls="tabs-messages-withIcon" aria-selected="false">
                              <iconify-icon icon="material-symbols:right-click-rounded"></iconify-icon>
                                Triwulan III</a>
                            </li>
                            <li class="nav-item" role="presentation">
                              <a href="#tabs-settings-withIcon" class="nav-link w-full flex items-center font-medium text-sm font-Inter leading-tight capitalize border-x-0 border-t-0 border-b border-transparent px-4 pb-2 my-2 hover:border-transparent focus:border-transparent dark:text-slate-300" id="tabs-settings-withIcon-tab" data-bs-toggle="pill" data-bs-target="#tabs-settings-withIcon" role="tab" aria-controls="tabs-settings-withIcon" aria-selected="false">
                              <iconify-icon icon="material-symbols:right-click-rounded"></iconify-icon>
                                Triwulan IV</a>
                            </li>
                          </ul>


                          <div class="tab-content" id="tabs-tabContent">
                            <div class="tab-pane fade show active" id="tabs-home-withIcon" role="tabpanel" aria-labelledby="tabs-home-withIcon-tab">
                            
                            <!-- tw I -->
                            <div class=" space-y-5">
                                        <div class="card">
                                          <header class=" card-header noborder">
                                            <h4 class="card-title">
                                            </h4>
                                            {{-- <button  data-bs-toggle="modal" data-bs-target="#tambahpajaksipdls_modal" class="action-btn scale btn inline-flex justify-center btn-outline-primary mr-3" data-tippy-content="Tambah Data" data-tippy-theme="secondary">
                                              <iconify-icon icon="heroicons:pencil-square"></iconify-icon>
                                            </button> --}}
                                              <a href="{{ route('tampilpajaksipdri') }}" class="btn inline-flex justify-center btn-light btn-sm scale " data-tippy-content="Click" data-tippy-theme="secondary">Tambah Data</a>
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
                                                            </th>
                                                            <th scope="col" class=" table-th ">
                                                              JENIS PAJAK
                                                            </th>
                                                            <th scope="col" class=" table-th ">
                                                              NPWP
                                                            </th>
                                                            <th scope="col" class=" table-th ">
                                                              NILAI PAJAK
                                                            </th>
                                                            <th scope="col" class=" table-th ">
                                                              BILLING
                                                            </th>
                                                            <th scope="col" class=" table-th ">
                                                              NTPN
                                                            </th>
                                                            <th scope="col" class=" table-th ">
                                                              Action
                                                            </th>
                                                          </tr>
                                                        </thead>
                          
                                                        <body>                                
                                                          <?php $i=1; function rupiah($angka){
                              
                                                                  $hasil_rupiah = "Rp " . number_format($angka,0,',','.');
                                                                  return $hasil_rupiah;
                                                                } ?>
                                                            @foreach ($pajakkpp as $item)
                                                              <tr class="hover:bg-slate-200 dark:hover:bg-slate-700">
                                                                  <td class="table-td"> {{ $i++ }}</td>
                          
                                                                  <td class="table-td">    
                                                                      <b>Tanggal SPM : </b> {{ $item->tanggal_spm }} <br>                                        
                                                                      <b>Nomor SPM : </b> {{ $item->nomor_spm }} <br>
                                                                      <b>Nilai SPM : </b> {{ rupiah($item->nilai_sp2d) }} <br>
                                                                  </td>
                          
                                                                  <td class="table-td">
                                                                      <b>Tanggal SP2D : </b> {{ $item->tanggal_sp2d }} <br>                                        
                                                                      <b>Nomor SP2D : </b> {{ $item->nomor_sp2d }} <br>
                                                                      <b>Nilai SP2D : </b> {{ rupiah($item->nilai_sp2d) }} <br>
                                                                      <b>Rek. Belanja : </b> {{ $item->rek_belanja }} <br>
                                                                  </td>
                          
                                                                  <td class="table-td">
                                                                      <b>Akun Pajak : </b>{{ $item->akun_pajak }}<br> 
                                                                      <b>Jenis Pajak : </b> {{ $item->jenis_pajak }} <br>
                                                                  </td>
                          
                                                                  <td class="table-td">
                                                                      <b>Nama NPWP : </b> {{ $item->nama_npwp }} <br>
                                                                      <b>Nomor NPWP : </b> {{ $item->nomor_npwp }} <br> 
                                                                  </td>
                                                                  
                                                                  <td class="table-td">{{ rupiah($item->nilai_pajak) }}</td>
                                                                  <td class="table-td">{{ $item->ebilling }}</td>
                                                                  <td class="table-td">{{ $item->ntpn }}</td>
                                                                  
                    
                                                              <td class="table-td ">
                                                                <div class="flex space-x-3 rtl:space-x-reverse">
                    
                                                                  @if ($item->status1 == '1')

                                                                  <a class="action-btn scale" data-tippy-content="Preview" data-tippy-theme="info" data-pajakkpp="{{ $item->id }}" id="deletepajakkpp">
                                                                    <button type="submit" class="action-btn">
                                                                      <iconify-icon icon="icon-park-outline:preview-open"></iconify-icon>
                                                                    </button>
                                                                  </a>
                    
                                                                      <button type="button" class="action-btn scale" data-tippy-content="Ubah" data-tippy-theme="primary" id="btn-edit-pajakkpp3"
                                                                          data-bs-toggle="modal" data-bs-target="#editpajakkpp3_modal"
                                                                          data-id5 = "{{ $item->id }}"
                                                                          data-ebilling5 = "{{ $item->ebilling }}"
                                                                          data-ntpn5 = "{{ $item->ntpn }}"
                                                                          data-jenis_pajak5 = "{{ $item->jenis_pajak }}"
                                                                          data-akun_pajak5 = "{{ $item->akun_pajak }}"
                                                                          data-rek_belanja5 = "{{ $item->rek_belanja }}"
                                                                          data-nama_npwp5 = "{{ $item->nama_npwp }}"
                                                                          data-nomor_npwp5 = "{{ $item->nomor_npwp }}"
                                                                          data-nilai_pajak = "{{ rupiah($item->nilai_pajak) }}"
                                                                          >
                                                                          <iconify-icon icon="heroicons:pencil-square"></iconify-icon>
                                                                      </button>
                    
                                                                      <button type="button" class="action-btn scale" data-tippy-content="tolak" data-tippy-theme="danger" id="btn-edit-pajakkpptolak"
                                                                          data-bs-toggle="modal" data-bs-target="#edittolak_modal"
                                                                          data-id = "{{ $item->id }}"
                                                                          data-ebilling = "{{ $item->ebilling }}"
                                                                          data-ntpn = "{{ $item->ntpn }}"
                                                                          >
                                                                          <iconify-icon icon="fxemoji:cancellationx"></iconify-icon>
                                                                      </button>
                    
                                                                  @else
                                                                      <a class="action-btn scale" data-tippy-content="hapus" data-tippy-theme="danger" data-pajakkpp="{{ $item->id }}" id="deletepajakkpp">
                                                                          <button type="submit" class="action-btn">
                                                                              <iconify-icon icon="heroicons:trash"></iconify-icon>
                                                                          </button>
                                                                      </a>
                                                                      <button type="button" class="action-btn scale" data-tippy-content="terima" data-tippy-theme="success" id="btn-edit-pajakkppterima"
                                                                          data-bs-toggle="modal" data-bs-target="#editterima_modal"
                                                                          data-id1 = "{{ $item->id }}"
                                                                          data-ebilling1 = "{{ $item->ebilling }}"
                                                                          data-ntpn1 = "{{ $item->ntpn }}"
                                                                          >
                                                                          <iconify-icon icon="fluent-mdl2:accept-medium"></iconify-icon>
                                                                      </button>
                                                                  @endif
                                                                  </div>
                                                                </td>
                                                            </tr>
                                                          @endforeach
                                                    </table>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                        
                                        </div>
                                      </div>
                                <!-- batas tw I -->

                          </div>
                            <div class="tab-pane fade" id="tabs-profile-withIcon" role="tabpanel" aria-labelledby="tabs-profile-withIcon-tab">
                              <!-- tw II -->
                            <div class=" space-y-5">
                                        <div class="card">
                                          <header class=" card-header noborder">
                                            <h4 class="card-title">
                                            </h4>
                                            {{-- <button  data-bs-toggle="modal" data-bs-target="#tambahpajaksipdls_modal" class="action-btn scale btn inline-flex justify-center btn-outline-primary mr-3" data-tippy-content="Tambah Data" data-tippy-theme="secondary">
                                              <iconify-icon icon="heroicons:pencil-square"></iconify-icon>
                                            </button> --}}
                                              <a href="{{ route('tampilpajaksipdri') }}" class="btn inline-flex justify-center btn-light btn-sm scale " data-tippy-content="Click" data-tippy-theme="secondary">Tambah Data</a>
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
                                                            </th>
                                                            <th scope="col" class=" table-th ">
                                                              JENIS PAJAK
                                                            </th>
                                                            <th scope="col" class=" table-th ">
                                                              NPWP
                                                            </th>
                                                            <th scope="col" class=" table-th ">
                                                              NILAI PAJAK
                                                            </th>
                                                            <th scope="col" class=" table-th ">
                                                              BILLING
                                                            </th>
                                                            <th scope="col" class=" table-th ">
                                                              NTPN
                                                            </th>
                                                            <th scope="col" class=" table-th ">
                                                              Action
                                                            </th>
                                                          </tr>
                                                        </thead>
                          
                                                        <body>                                
                                                          <?php $i=1; function rupiaha($angka){
                              
                                                                  $hasil_rupiah = "Rp " . number_format($angka,0,',','.');
                                                                  return $hasil_rupiah;
                                                                } ?>
                                                            @foreach ($pajakkpp2 as $item)
                                                              <tr class="hover:bg-slate-200 dark:hover:bg-slate-700">
                                                                  <td class="table-td"> {{ $i++ }}</td>
                          
                                                                  <td class="table-td">    
                                                                      <b>Tanggal SPM : </b> {{ $item->tanggal_spm }} <br>                                        
                                                                      <b>Nomor SPM : </b> {{ $item->nomor_spm }} <br>
                                                                      <b>Nilai SPM : </b> {{ rupiaha($item->nilai_sp2d) }} <br>
                                                                  </td>
                          
                                                                  <td class="table-td">
                                                                      <b>Tanggal SP2D : </b> {{ $item->tanggal_sp2d }} <br>                                        
                                                                      <b>Nomor SP2D : </b> {{ $item->nomor_sp2d }} <br>
                                                                      <b>Nilai SP2D : </b> {{ rupiaha($item->nilai_sp2d) }} <br>
                                                                      <b>Rek. Belanja : </b> {{ $item->rek_belanja }} <br>
                                                                  </td>
                          
                                                                  <td class="table-td">
                                                                      <b>Akun Pajak : </b>{{ $item->akun_pajak }}<br> 
                                                                      <b>Jenis Pajak : </b> {{ $item->jenis_pajak }} <br>
                                                                  </td>
                          
                                                                  <td class="table-td">
                                                                      <b>Nama NPWP : </b> {{ $item->nama_npwp }} <br>
                                                                      <b>Nomor NPWP : </b> {{ $item->nomor_npwp }} <br> 
                                                                  </td>
                                                                  
                                                                  <td class="table-td">{{ rupiaha($item->nilai_pajak) }}</td>
                                                                  <td class="table-td">{{ $item->ebilling }}</td>
                                                                  <td class="table-td">{{ $item->ntpn }}</td>
                                                                  
                    
                                                              <td class="table-td ">
                                                                <div class="flex space-x-3 rtl:space-x-reverse">
                    
                                                                  @if ($item->status1 == '1')

                                                                  <a class="action-btn scale" data-tippy-content="Preview" data-tippy-theme="info" data-pajakkpp="{{ $item->id }}" id="deletepajakkpp">
                                                                    <button type="submit" class="action-btn">
                                                                      <iconify-icon icon="icon-park-outline:preview-open"></iconify-icon>
                                                                    </button>
                                                                  </a>
                    
                                                                      <button type="button" class="action-btn scale" data-tippy-content="Ubah" data-tippy-theme="primary" id="btn-edit-pajakkpp3"
                                                                          data-bs-toggle="modal" data-bs-target="#editpajakkpp3_modal"
                                                                          data-id5 = "{{ $item->id }}"
                                                                          data-ebilling5 = "{{ $item->ebilling }}"
                                                                          data-ntpn5 = "{{ $item->ntpn }}"
                                                                          data-jenis_pajak5 = "{{ $item->jenis_pajak }}"
                                                                          data-akun_pajak5 = "{{ $item->akun_pajak }}"
                                                                          data-rek_belanja5 = "{{ $item->rek_belanja }}"
                                                                          data-nama_npwp5 = "{{ $item->nama_npwp }}"
                                                                          data-nomor_npwp5 = "{{ $item->nomor_npwp }}"
                                                                          data-nilai_pajak = "{{ rupiah($item->nilai_pajak) }}"
                                                                          >
                                                                          <iconify-icon icon="heroicons:pencil-square"></iconify-icon>
                                                                      </button>
                    
                                                                      <button type="button" class="action-btn scale" data-tippy-content="tolak" data-tippy-theme="danger" id="btn-edit-pajakkpptolak"
                                                                          data-bs-toggle="modal" data-bs-target="#edittolak_modal"
                                                                          data-id = "{{ $item->id }}"
                                                                          data-ebilling = "{{ $item->ebilling }}"
                                                                          data-ntpn = "{{ $item->ntpn }}"
                                                                          >
                                                                          <iconify-icon icon="fxemoji:cancellationx"></iconify-icon>
                                                                      </button>
                    
                                                                  @else
                                                                      <a class="action-btn scale" data-tippy-content="hapus" data-tippy-theme="danger" data-pajakkpp="{{ $item->id }}" id="deletepajakkpp">
                                                                          <button type="submit" class="action-btn">
                                                                              <iconify-icon icon="heroicons:trash"></iconify-icon>
                                                                          </button>
                                                                      </a>
                                                                      <button type="button" class="action-btn scale" data-tippy-content="terima" data-tippy-theme="success" id="btn-edit-pajakkppterima"
                                                                          data-bs-toggle="modal" data-bs-target="#editterima_modal"
                                                                          data-id1 = "{{ $item->id }}"
                                                                          data-ebilling1 = "{{ $item->ebilling }}"
                                                                          data-ntpn1 = "{{ $item->ntpn }}"
                                                                          >
                                                                          <iconify-icon icon="fluent-mdl2:accept-medium"></iconify-icon>
                                                                      </button>
                                                                  @endif
                                                                  </div>
                                                                </td>
                                                            </tr>
                                                          @endforeach
                                                    </table>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                        
                                        </div>
                                      </div>
                                <!-- batas tw II -->
                            </div>

                            <div class="tab-pane fade" id="tabs-messages-withIcon" role="tabpanel" aria-labelledby="tabs-messages-withIcon-tab">
                              <!-- tw III -->
                            <div class=" space-y-5">
                                        <div class="card">
                                          <header class=" card-header noborder">
                                            <h4 class="card-title">
                                            </h4>
                                            {{-- <button  data-bs-toggle="modal" data-bs-target="#tambahpajaksipdls_modal" class="action-btn scale btn inline-flex justify-center btn-outline-primary mr-3" data-tippy-content="Tambah Data" data-tippy-theme="secondary">
                                              <iconify-icon icon="heroicons:pencil-square"></iconify-icon>
                                            </button> --}}
                                              <a href="{{ route('tampilpajaksipdri') }}" class="btn inline-flex justify-center btn-light btn-sm scale " data-tippy-content="Click" data-tippy-theme="secondary">Tambah Data</a>
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
                                                            </th>
                                                            <th scope="col" class=" table-th ">
                                                              JENIS PAJAK
                                                            </th>
                                                            <th scope="col" class=" table-th ">
                                                              NPWP
                                                            </th>
                                                            <th scope="col" class=" table-th ">
                                                              NILAI PAJAK
                                                            </th>
                                                            <th scope="col" class=" table-th ">
                                                              BILLING
                                                            </th>
                                                            <th scope="col" class=" table-th ">
                                                              NTPN
                                                            </th>
                                                            {{-- <th scope="col" class=" table-th ">
                                                              BUKTI BAYAR
                                                            </th> --}}
                                                            <th scope="col" class=" table-th ">
                                                              Action
                                                            </th>
                                                          </tr>
                                                        </thead>
                          
                                                        <body>                                
                                                          <?php $i=1; function rupiahaa($angka){
                              
                                                                  $hasil_rupiah = "Rp " . number_format($angka,0,',','.');
                                                                  return $hasil_rupiah;
                                                                } ?>
                                                            @foreach ($pajakkpp3 as $item1)
                                                              <tr class="hover:bg-slate-200 dark:hover:bg-slate-700">
                                                                  <td class="table-td"> {{ $i++ }}</td>
                          
                                                                  <td class="table-td">    
                                                                      <b>Tanggal SPM : </b> {{ $item1->tanggal_spm }} <br>                                        
                                                                      <b>Nomor SPM : </b> {{ $item1->nomor_spm }} <br>
                                                                      <b>Nilai SPM : </b> {{ rupiahaa($item1->nilai_sp2d) }} <br>
                                                                  </td>
                          
                                                                  <td class="table-td">
                                                                      <b>Tanggal SP2D : </b> {{ $item1->tanggal_sp2d }} <br>                                        
                                                                      <b>Nomor SP2D : </b> {{ $item1->nomor_sp2d }} <br>
                                                                      <b>Nilai SP2D : </b> {{ rupiahaa($item1->nilai_sp2d) }} <br>
                                                                      <b>Rek. Belanja : </b> {{ $item1->rek_belanja }} <br>
                                                                  </td>
                          
                                                                  <td class="table-td">
                                                                      <b>Akun Pajak : </b>{{ $item1->akun_pajak }}<br> 
                                                                      <b>Jenis Pajak : </b> {{ $item1->jenis_pajak }} <br>
                                                                  </td>
                          
                                                                  <td class="table-td">
                                                                      <b>Nama NPWP : </b> {{ $item1->nama_npwp }} <br>
                                                                      <b>Nomor NPWP : </b> {{ $item1->nomor_npwp }} <br> 
                                                                  </td>
                                                                  
                                                                  <td class="table-td">{{ rupiahaa($item1->nilai_pajak) }}</td>
                                                                  <td class="table-td">{{ $item1->ebilling }}</td>
                                                                  <td class="table-td">{{ $item1->ntpn }}</td>
                                                                  {{-- <td class="table-td">
                                                                    <a src="dokumen/{{ $item->bukti_pemby }}" width="100%">
                                                                  </td> --}}
                                                                  
                    
                                                              <td class="table-td ">
                                                                <div class="flex space-x-3 rtl:space-x-reverse">
                    
                                                                  @if ($item1->status1 == '1')
                                                                  
                                                                  <a href="dokumen/{{ $item1->bukti_pemby }}"><button class="action-btn scale" data-tippy-content="Preview Bukti Pembayaran" data-tippy-theme="dark" type="button"><iconify-icon icon="icon-park-outline:preview-open"></iconify-icon></button></a>
                    
                                                                  <button type="button" class="action-btn scale"      data-tippy-content="Ubah" data-tippy-theme="primary" data-bs-toggle="modal" data-bs-target="#editpajakkpp31_modal{{ $item1->id }}"><iconify-icon icon="heroicons:pencil-square"></iconify-icon>
                                                                  </button>
                    
                                                                      <button type="button" class="action-btn scale" data-tippy-content="tolak" data-tippy-theme="danger" id="btn-edit-pajakkpptolak"
                                                                          data-bs-toggle="modal" data-bs-target="#edittolak_modal"
                                                                          data-id = "{{ $item1->id }}"
                                                                          data-ebilling = "{{ $item1->ebilling }}"
                                                                          data-ntpn = "{{ $item1->ntpn }}"
                                                                          >
                                                                          <iconify-icon icon="fxemoji:cancellationx"></iconify-icon>
                                                                      </button>
                    
                                                                  @else
                                                                      <a class="action-btn scale" data-tippy-content="hapus" data-tippy-theme="danger" data-pajakkpp="{{ $item1->id }}" id="deletepajakkpp">
                                                                          <button type="submit" class="action-btn">
                                                                              <iconify-icon icon="heroicons:trash"></iconify-icon>
                                                                          </button>
                                                                      </a>
                                                                      <button type="button" class="action-btn scale" data-tippy-content="terima" data-tippy-theme="success" id="btn-edit-pajakkppterima"
                                                                          data-bs-toggle="modal" data-bs-target="#editterima_modal"
                                                                          data-id1 = "{{ $item1->id }}"
                                                                          data-ebilling1 = "{{ $item1->ebilling }}"
                                                                          data-ntpn1 = "{{ $item1->ntpn }}"
                                                                          >
                                                                          <iconify-icon icon="fluent-mdl2:accept-medium"></iconify-icon>
                                                                      </button>
                                                                  @endif
                                                                  </div>
                                                                </td>
                                                            </tr>
                                                          @endforeach
                                                    </table>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                        
                                        </div>
                                      </div>
                                <!-- batas tw III -->
                                 
                            </div>

                            

                            <div class="tab-pane fade" id="tabs-settings-withIcon" role="tabpanel" aria-labelledby="tabs-settings-withIcon-tab">
                              <!-- tw IV -->
                            <div class=" space-y-5">
                                        <div class="card">
                                          <header class=" card-header noborder">
                                            <h4 class="card-title">
                                            </h4>
                                            {{-- <button  data-bs-toggle="modal" data-bs-target="#tambahpajaksipdls_modal" class="action-btn scale btn inline-flex justify-center btn-outline-primary mr-3" data-tippy-content="Tambah Data" data-tippy-theme="secondary">
                                              <iconify-icon icon="heroicons:pencil-square"></iconify-icon>
                                            </button> --}}
                                              <a href="{{ route('tampilpajaksipdri') }}" class="btn inline-flex justify-center btn-light btn-sm scale " data-tippy-content="Click" data-tippy-theme="secondary">Tambah Data</a>
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
                                                            </th>
                                                            <th scope="col" class=" table-th ">
                                                              JENIS PAJAK
                                                            </th>
                                                            <th scope="col" class=" table-th ">
                                                              NPWP
                                                            </th>
                                                            <th scope="col" class=" table-th ">
                                                              NILAI PAJAK
                                                            </th>
                                                            <th scope="col" class=" table-th ">
                                                              BILLING
                                                            </th>
                                                            <th scope="col" class=" table-th ">
                                                              NTPN
                                                            </th>
                                                            <th scope="col" class=" table-th ">
                                                              Action
                                                            </th>
                                                          </tr>
                                                        </thead>
                          
                                                        <body>                                
                                                          <?php $i=1; function rupiahaaa($angka){
                              
                                                                  $hasil_rupiah = "Rp " . number_format($angka,0,',','.');
                                                                  return $hasil_rupiah;
                                                                } ?>
                                                            @foreach ($pajakkpp4 as $item)
                                                              <tr class="hover:bg-slate-200 dark:hover:bg-slate-700">
                                                                  <td class="table-td"> {{ $i++ }}</td>
                          
                                                                  <td class="table-td">    
                                                                      <b>Tanggal SPM : </b> {{ $item->tanggal_spm }} <br>                                        
                                                                      <b>Nomor SPM : </b> {{ $item->nomor_spm }} <br>
                                                                      <b>Nilai SPM : </b> {{ rupiahaaa($item->nilai_sp2d) }} <br>
                                                                  </td>
                          
                                                                  <td class="table-td">
                                                                      <b>Tanggal SP2D : </b> {{ $item->tanggal_sp2d }} <br>                                        
                                                                      <b>Nomor SP2D : </b> {{ $item->nomor_sp2d }} <br>
                                                                      <b>Nilai SP2D : </b> {{ rupiahaaa($item->nilai_sp2d) }} <br>
                                                                      <b>Rek. Belanja : </b> {{ $item->rek_belanja }} <br>
                                                                  </td>
                          
                                                                  <td class="table-td">
                                                                      <b>Akun Pajak : </b>{{ $item->akun_pajak }}<br> 
                                                                      <b>Jenis Pajak : </b> {{ $item->jenis_pajak }} <br>
                                                                  </td>
                          
                                                                  <td class="table-td">
                                                                      <b>Nama NPWP : </b> {{ $item->nama_npwp }} <br>
                                                                      <b>Nomor NPWP : </b> {{ $item->nomor_npwp }} <br> 
                                                                  </td>
                                                                  
                                                                  <td class="table-td">{{ rupiahaaa($item->nilai_pajak) }}</td>
                                                                  <td class="table-td">{{ $item->ebilling }}</td>
                                                                  <td class="table-td">{{ $item->ntpn }}</td>
                                                                  
                    
                                                              <td class="table-td ">
                                                                <div class="flex space-x-3 rtl:space-x-reverse">
                    
                                                                  @if ($item->status1 == '1')

                                                                      <a class="action-btn scale" data-tippy-content="Preview" data-tippy-theme="info" data-pajakkpp="{{ $item->id }}" id="deletepajakkpp">
                                                                        <button type="submit" class="action-btn">
                                                                          <iconify-icon icon="icon-park-outline:preview-open"></iconify-icon>
                                                                        </button>
                                                                      </a>
                    
                                                                      <button type="button" class="action-btn scale" data-tippy-content="Ubah" data-tippy-theme="primary" id="btn-edit-pajakkpp3"
                                                                          data-bs-toggle="modal" data-bs-target="#editpajakkpp3_modal"
                                                                          data-id5 = "{{ $item->id }}"
                                                                          data-ebilling5 = "{{ $item->ebilling }}"
                                                                          data-ntpn5 = "{{ $item->ntpn }}"
                                                                          data-jenis_pajak5 = "{{ $item->jenis_pajak }}"
                                                                          data-akun_pajak5 = "{{ $item->akun_pajak }}"
                                                                          data-rek_belanja5 = "{{ $item->rek_belanja }}"
                                                                          data-nama_npwp5 = "{{ $item->nama_npwp }}"
                                                                          data-nomor_npwp5 = "{{ $item->nomor_npwp }}"
                                                                          data-nilai_pajak = "{{ $item->nilai_pajak }}"
                                                                          >
                                                                          <iconify-icon icon="heroicons:pencil-square"></iconify-icon>
                                                                      </button>
                    
                                                                      <button type="button" class="action-btn scale" data-tippy-content="tolak" data-tippy-theme="danger" id="btn-edit-pajakkpptolak"
                                                                          data-bs-toggle="modal" data-bs-target="#edittolak_modal"
                                                                          data-id = "{{ $item->id }}"
                                                                          data-ebilling = "{{ $item->ebilling }}"
                                                                          data-ntpn = "{{ $item->ntpn }}"
                                                                          >
                                                                          <iconify-icon icon="fxemoji:cancellationx"></iconify-icon>
                                                                      </button>
                    
                                                                  @else
                                                                      <a class="action-btn scale" data-tippy-content="hapus" data-tippy-theme="danger" data-pajakkpp="{{ $item->id }}" id="deletepajakkpp">
                                                                          <button type="submit" class="action-btn">
                                                                              <iconify-icon icon="heroicons:trash"></iconify-icon>
                                                                          </button>
                                                                      </a>
                                                                      <button type="button" class="action-btn scale" data-tippy-content="terima" data-tippy-theme="success" id="btn-edit-pajakkppterima"
                                                                          data-bs-toggle="modal" data-bs-target="#editterima_modal"
                                                                          data-id1 = "{{ $item->id }}"
                                                                          data-ebilling1 = "{{ $item->ebilling }}"
                                                                          data-ntpn1 = "{{ $item->ntpn }}"
                                                                          >
                                                                          <iconify-icon icon="fluent-mdl2:accept-medium"></iconify-icon>
                                                                      </button>
                                                                  @endif
                                                                  </div>
                                                                </td>
                                                            </tr>
                                                          @endforeach
                                                    </table>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                        
                                        </div>
                                      </div>
                                <!-- batas tw IV -->
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


<!-- tw I -->
@include('Pajak.Modal.tolakpajakls')                      
@include('Pajak.Modal.terimapajakls')
@include('Pajak.Modal.tampilpajaksipdls')
@include('Pajak.Modal.tambahpajakls')
@include('Pajak.Modal.editpajakls')




<!-- END: Dashboard Tengah -->
      <!-- BEGIN: Footer For Desktop and tab -->
      @include('template.footer')
      <!-- END: Footer For Desktop and tab -->

      <div class="bg-white bg-no-repeat custom-dropshadow footer-bg dark:bg-slate-700 flex justify-around items-center
    backdrop-filter backdrop-blur-[40px] fixed left-0 bottom-0 w-full z-[9999] bothrefm-0 py-[12px] px-4 md:hidden">
        <a href="chat.html">
          <div>
            <span class="relative cursor-pointer rounded-full text-[20px] flex flex-col items-center justify-center mb-1 dark:text-white
          text-slate-900 ">
        <iconify-icon icon="heroicons-outline:mail"></iconify-icon>
        <span class="absolute right-[5px] lg:hrefp-0 -hrefp-2 h-4 w-4 bg-red-500 text-[8px] font-semibold flex flex-col items-center
            justify-center rounded-full text-white z-[99]">
          10
        </span>
            </span>
            <span class="block text-[11px] text-slate-600 dark:text-slate-300">
        Messages
      </span>
          </div>
        </a>
        <a href="profile.html" class="relative bg-white bg-no-repeat backdrop-filter backdrop-blur-[40px] rounded-full footer-bg dark:bg-slate-700
      h-[65px] w-[65px] z-[-1] -mt-[40px] flex justify-center items-center">
          <div class="h-[50px] w-[50px] rounded-full relative left-[0px] hrefp-[0px] custom-dropshadow">
            <img src="assets/images/users/user-1.jpg" alt="" class="w-full h-full rounded-full border-2 border-slate-100">
          </div>
        </a>
        <a href="#">
          <div>
            <span class=" relative cursor-pointer rounded-full text-[20px] flex flex-col items-center justify-center mb-1 dark:text-white
          text-slate-900">
        <iconify-icon icon="heroicons-outline:bell"></iconify-icon>
        <span class="absolute right-[17px] lg:hrefp-0 -hrefp-2 h-4 w-4 bg-red-500 text-[8px] font-semibold flex flex-col items-center
            justify-center rounded-full text-white z-[99]">
          2
        </span>
            </span>
            <span class=" block text-[11px] text-slate-600 dark:text-slate-300">
        Notifications
      </span>
          </div>
        </a>
      </div>
    </div>
  </main>

  <!-- scripts -->
@include('template.scripts')
  <!--END : scripts -->

@include('Pajak.Modal.script')


</body>
</html>


