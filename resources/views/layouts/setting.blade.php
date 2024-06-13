
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta ="viewport" content="initial-scale=1, width=device-width" />
    <title>@yield('title')</title>
    <link
      href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css"
      rel="stylesheet"
    />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css" />
        <link
      href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css"
      rel="stylesheet"
    />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;600&display=swap"
    />

    <link rel="stylesheet" href="{{ asset($constants['CSSFILEPATH'].'app.css') }}">
    <link rel="stylesheet" href="{{ asset($constants['CSSFILEPATH'].'setting.css') }}">

    @yield('styles')
  </head>
  <body>
    <meta name="csrf-token" content="{{ csrf_token() }}">
        <div class="setting-users-admin-wrapper bg-gray-100 flex flex-col h-screen">
        <!-- Sidebar Toggle Button -->
        <!--<span class="absolute text-white text-4xl top-5 left-4 cursor-pointer" onclick="openSidebar()">-->
        <!--    <i class="bi bi-filter-left px-2 bg-gray-900 rounded-r-md"></i>-->
        <!--</span>-->

        <!-- Sidebar -->
        <div class="p-3 sidebar-bg w-64 lg:w-1/6 h-screen bg-custom-white text-white flex flex-col sidebar fixed top-0 bottom-0 lg:left-0 overflow-y-auto text-center">
            <div class="text-gray-100 text-xl">
                <div class="p-3 mt-1 flex items-center">
                    <a href="{{ route('dashboard')}}"><img class="ml-3" width="96" height="90" src="{{ asset($constants['IMAGEFILEPATH'].'logo.png') }}"></img></a>
                    <!--<i class="bi bi-x cursor-pointer ml-auto" onclick="openSidebar()"></i>-->
                </div>
                <div class="my-2 bg-gray-600 h-[1px]"></div>
            </div>

            <div class="p-3 mt-3 flex items-center rounded-r-md px-4 mt-5 duration-300 cursor-pointer hover:bg-gray-900 text-black hover-color-custom-yellow" onclick="setActive(this)">
                <a href="./404.html"><span class="text-[15px] ml-4">Overview</span></a>
            </div>

            <div class="p-3 mt-3 flex items-center rounded-r-md px-4 duration-300 cursor-pointer hover:bg-gray-900 text-black hover-color-custom-yellow" onclick="setActive(this)">
                <div class="flex justify-between w-full items-center relative">
                    <a href="./system-setting.html" target="content-frame" class="flex items-center w-full">
                        <span class="text-[15px] ml-4">System Settings</span>
                        <span class="text-sm absolute right-0">
                            <i class="ri-arrow-right-s-line"></i>
                        </span>
                    </a>
                </div>
            </div>

            <div class="admin-wrapper">
                <div class="p-3 mt-3 flex items-center rounded-r-md px-4 duration-300 cursor-pointer hover:bg-gray-900 text-black hover-color-custom-yellow active" onclick="setActive(this); dropdown('submenu-admin', 'arrow-admin')">
                    <div class="flex justify-between w-full items-center">
                        <span class="text-[15px] ml-4">Admin & Users</span>
                        <span class="text-sm transform" id="arrow-admin">
                            <i class="ri-arrow-right-s-line"></i>
                        </span>
                    </div>
                </div>

                <div class=" p-3 text-left text-sm mx-auto hidden bg-custom-light rounded-r-md" id="submenu-admin">
                    <h4 class="relative cursor-pointer p-2 pl-4 text-black hover:bg-gray-900 rounded-r-md flex justify-between w-full items-center hover-color-custom-yellow active" onclick="setActive(this)">
                        <a href="./users-and-groups.html" target="content-frame" class="flex items-center w-full">
                            <span class="text-[15px] ml-4">Users and Groups</span>
                            <span class="text-sm rotate-180 absolute right-4">
                                <i class="ri-arrow-right-s-line"></i>
                            </span>
                        </a>
                    </h4>

                    <h4 class="p-3 relative cursor-pointer p-2 pl-4 text-black hover:bg-gray-900 rounded-r-md flex justify-between w-full items-center hover-color-custom-yellow" onclick="setActive(this)">
                        <a href="./404.html" target="content-frame">
                            <span class="text-[15px] ml-4">Role</span>
                            <span class="text-sm rotate-180 absolute right-4">
                                <i class="ri-arrow-right-s-line"></i>
                            </span>
                        </a>
                    </h4>

                    <h4 class="p-3 relative cursor-pointer p-2 pl-4 text-black hover:bg-gray-900 rounded-r-md flex justify-between w-full items-center hover-color-custom-yellow" onclick="setActive(this)">
                        <a href="./404.html" target="content-frame" class="flex items-center w-full">
                            <span class="text-[15px] ml-4">Document Description</span>
                            <span class="text-sm rotate-180 absolute right-4">
                                <i class="ri-arrow-right-s-line"></i>
                            </span>
                        </a>
                    </h4>
                </div>
            </div>

            <div class="storage-files-wrapper">
                <div class="p-3 mt-3 flex items-center rounded-r-md px-4 duration-300 cursor-pointer hover:bg-gray-900 text-black hover-color-custom-yellow" onclick="setActive(this); dropdown('submenu-storage-file', 'arrow-storage-file')">
                    <div class="flex justify-between w-full items-center">
                        
                        <a href="./404.html" target="content-frame" class="flex items-center w-full">
                            <span class="text-[15px] ml-4">Storage / Files</span>
                            <span class="text-sm rotate-180 absolute right-4">
                                <i class="ri-arrow-right-s-line"></i>
                            </span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="p-3 mt-3 flex items-center rounded-r-md px-4 duration-300 cursor-pointer hover:bg-gray-900 text-black hover-color-custom-yellow" onclick="setActive(this)">
                
                <a href="./404.html" target="content-frame" class="flex items-center w-full">
                    <span class="text-[15px] ml-4">Plugin Center</span>
                    <span class="text-sm rotate-180 absolute right-4">
                        <i class="ri-arrow-right-s-line"></i>
                    </span>
                </a>
            </div>

            <div class="safety-control-wrapper">
                <div class="p-3 mt-3 flex items-center rounded-r-md px-4 duration-300 cursor-pointer hover:bg-gray-900 text-black hover-color-custom-yellow" onclick="setActive(this); dropdown('submenu-safety-control', 'arrow-safety-control')">
                    <div class="flex justify-between w-full items-center">
                        
                        <a href="{{ route('logs') }}" target="content-frame" class="flex items-center w-full">
                            <span class="text-[15px] ml-4">Safety Control</span>
                            <span class="text-sm rotate-180 absolute right-4">
                                <i class="ri-arrow-right-s-line"></i>
                            </span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="server-control-wrapper">
                <div class="p-3 mt-3 flex items-center rounded-r-md px-4 duration-300 cursor-pointer hover:bg-gray-900 text-black hover-color-custom-yellow" onclick="setActive(this); dropdown('submenu-server-control', 'arrow-server-control')">
                    <div class="flex justify-between w-full items-center">
                        <a href="./404.html" target="content-frame" class="flex items-center w-full">
                            <span class="text-[15px] ml-4">Server</span>
                            <span class="text-sm rotate-180 absolute right-4">
                                <i class="ri-arrow-right-s-line"></i>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-grow w-full lg:w-10/12 lg:ml-auto overflow-y-auto">
           @yield('content')
         </div>
          <!-- Main Content end -->
    <div>

    <div id="administrator" class="Administrator h-max rounded-md hidden">
          <div class="flex items-center gap-2 p-5">
            <div class="logo">
              <img class="w-16" src="{{ asset($constants['IMAGEFILEPATH'].'profile.png') }}" alt="user image" />
            </div>
            <div class="user-info">
              <h1 class="text-lg underline decoration-yellow-700">
                Administrator
              </h1>
              <h4 class="text-sm">Username</h4>
            </div>
          </div>
          <div class="bottom border-t-2 border-slate-400">
            <div class="features-list p-5">
              <ul>
                <li class="flex items-center gap-5 mb-4">
                  <i class="ri-folder-line"></i>
                  <a href="{{ route('filemanager') }}">File manage</a>
                </li>
                <li class="flex items-center gap-5 mb-4">
                  <i class="ri-bar-chart-fill"></i>
                  <a href="#">Backend</a>
                </li>
                <li class="flex items-center gap-5 mb-4">
                  <i class="ri-user-line"></i>
                  <a href="{{ route('useradmin') }}">User manage</a>
             
                </li>
                <li class="flex items-center gap-5 mb-4">
                  <i class="ri-apps-fill"></i>
                  <a href="#">Plugin</a>
                </li>
                <li class="flex items-center gap-5 mb-4">
                  <i class="ri-global-line"></i>
                  <a href="#">Language</a>
                </li>
                <li class="flex items-center gap-5 mb-4">
                  <i class="ri-fullscreen-line"></i>
                  <a href="#">Full screen</a>
                </li>
                <li class="flex items-center gap-5 mb-4">
                  <i class="ri-information-fill"></i>
                  <a href="#">About</a>
                </li>
                <li class="flex items-center gap-5 mb-4">
                  <i class="ri-download-line"></i>
                  <a href="#">Downloads</a>
                </li>
                <li class="flex items-center gap-5 mb-4">
                  <i class="ri-mail-line"></i>
                  <a href="#">Free edition</a>
                </li>
                <li class="flex items-center gap-5 mb-4">
                  <i class="ri-logout-box-r-line"></i>
                  <!--<a href="#">Logout</a>-->
                  <a  href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                  </form>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div id="tooltip" class="tooltip bubble-bottom-left">
          <div class="bubble">
            <div class="bubble-content">
              <h1>Hello!</h1>
              <p>What are you looking for? &#128522;</p>
            </div>
          </div>
        </div>
        <footer
          class="fixed bottom-0 flex items-center justify-between w-full p-2"
        >
          <a href="{{ route('filemanager') }}"><button
            id="footerButton"
            class="text-black px-5 py-2 rounded-md hover:bg-black hover:text-white"
          >
            File
          </button></a>
          
          <img
            id="footer-logo"
            class="w-12 h-12"
            src="{{ asset($constants['IMAGEFILEPATH'].'logo.png') }}"
            alt="Logo"
          />
        </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    @yield('scripts')
    <script>
    dropdown('submenu-admin', 'arrow-admin');
    function dropdown(submenuId, arrowId) {
            const submenu = document.getElementById(submenuId);
            const arrow = document.getElementById(arrowId);

            submenu.classList.toggle('hidden');
            arrow.classList.toggle('arrow-down');
        }

        function openSidebar() {
            document.querySelector(".sidebar").classList.toggle("hidden");
        }

        function setActive(element) {
            // Remove active class from all sidebar items and their sub-items
            document.querySelectorAll('.sidebar .active').forEach(function (activeItem) {
                activeItem.classList.remove('active');
            });

            // Add active class to the clicked item and its parent if it's a sub-item
            element.classList.add('active');
            if (element.closest('.admin-wrapper, .storage-files-wrapper, .safety-control-wrapper, .server-control-wrapper')) {
                element.closest('.admin-wrapper, .storage-files-wrapper, .safety-control-wrapper, .server-control-wrapper').querySelector('div:first-child').classList.add('active');
            }
        }
    document
        .getElementById("footer-logo")
        .addEventListener("click", function () {
          const administratorDiv = document.getElementById("administrator");
          administratorDiv.classList.toggle("hidden");
        });

      const footerButton = document.getElementById("footerButton");
      const tooltip = document.getElementById("tooltip");

      footerButton.addEventListener("mouseenter", function () {
        tooltip.style.display = "block";
      });

      footerButton.addEventListener("mouseleave", function () {
        tooltip.style.display = "none";
      });
      
      //for dimissing toast
       document.querySelectorAll('[data-dismiss-target]').forEach(function(button) {
        button.addEventListener('click', function() {
            var target = document.querySelector(button.getAttribute('data-dismiss-target'));
            if (target) {
                target.style.display = 'none';
            }
        });
    });
    
     
    </script>
</body>
</html>
