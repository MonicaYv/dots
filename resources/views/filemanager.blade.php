<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@400&display=swap"
    />
    <link
      href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="{{ asset($constants['CSSFILEPATH'].'filemanager.css') }}" />

    <title>File Manager</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

  </head>
  <body>
    <div class="file-manager w-full h-screen">
      <div class="file-container w-full bg-no-repeat bg-center bg-cover">
        <nav class="logo-container h-20 px-10 py-3">
          <a href="{{ route('dashboard') }}"><img class="w-12 h-12" src="{{ asset($constants['IMAGEFILEPATH'].'logo.png')}}" alt="logo" /></a>
        </nav>
        <div class="content-container w-full flex">
          <div class="sidebar w-1/4 md:1/4 lg:w-1/6 h-full bg-no-repeat bg-cover bg-center flex flex-col">
            <div class="px-10 py-7 mt-10">
              <h1 class="text-base">Favourites</h1>
            </div>
            <nav class="mt-2">
              <ul class="grid gap-2">
                <li>
                  <a id="link-desktop"
                    class="flex items-center gap-3 rounded-r-md py-2 text-sm hover:text-orange-500 data-[active=true]:text-orange-500 hover:bg-black data-[active=true]:bg-black data-[active=true]:font-semibold"
                    href="desktop.html"
                  >
                    <span class="text-base font-normal px-10">Desktop</span>
                  </a>
                </li>
                <li>
                  <a id="link-recent"
                    class="flex items-center gap-3 rounded-r-md py-2 text-sm hover:text-orange-500 data-[active=true]:text-orange-500 hover:bg-black data-[active=true]:bg-black data-[active=true]:font-semibold"
                    href="Recent.html"
                  >
                    <span
                      class="text-base font-normal px-10"
                    >
                      Recent
                    </span>
                  </a>
                </li>
                <li>
                  <a id="link-downloads"
                    class="flex items-center gap-3 rounded-r-md py-2 text-sm hover:text-orange-500 data-[active=true]:text-orange-500 transition-colors hover:bg-black data-[active=true]:bg-black data-[active=true]:font-semibold"
                    href="downloads.html"
                  >
                    <span
                      class="text-base font-normal px-10"
                    >
                      Downloads
                    </span>
                  </a>
                </li>
                <li>
                  <a  id="link-filemanager"
                    class="flex items-center gap-3 rounded-r-md py-2 text-sm hover:text-orange-500 data-[active=true]:text-orange-500transition-colors hover:bg-black data-[active=true]:bg-black data-[active=true]:font-semibold"
                    href="filemanager.html"
                  >
                    <span
                      class="text-base font-normal px-10"
                    >
                      File
                    </span>
                  </a>
                </li>
                <li>
                  <a id="link-documents"
                    class="flex items-center gap-3 rounded-r-md py-2 text-sm hover:text-orange-500 data-[active=true]:text-orange-500 transition-colors hover:bg-black data-[active=true]:bg-black data-[active=true]:font-semibold"
                    href="documents.html"
                  >
                    <span
                      class="text-base font-normal px-10"
                    >
                      Documents
                    </span>
                  </a>
                </li>
                <li>
                  <a id="link-applications"
                    class="flex items-center gap-3 rounded-r-md  py-2 text-sm hover:text-orange-500 data-[active=true]:text-orange-500 transition-colors hover:bg-black data-[active=true]:bg-black data-[active=true]:font-semibold"
                    href="applications.html"
                  >
                    <span
                      class="text-base font-normal px-10"
                    >
                      Applications
                    </span>
                  </a>
                </li>
              </ul>
            </nav>
          </div>
          <div class="content-showing w-3/4 md:3/4 lg:w-5/6 h-full">
            <div class="yellowbar w-full h-16 bg-no-repeat bg-cover">
              <div class="flex items-center p-4 gap-5 relative">
                <div
                  class="flex flex-2 items-center gap-4 h-8 bg-white p-1 rounded-sm"
                >
                  <i class="ri-arrow-left-line"></i>
                  <i class="ri-arrow-right-line"></i>
                </div>
                <div
                  class="flex items-center justify-between flex-1 h-8 bg-white p-1 rounded-sm"
                >
                  <div class="flex items-center gap-4">
                    <i class="ri-arrow-up-line"></i>
                    <h5>File</h5>
                  </div>
                  <div class="flex items-center gap-4">
                    <i class="ri-star-line"></i>
                    <i class="ri-refresh-line"></i>
                  </div>
                </div>
                <input
                  class="p-1 outline-none rounded-sm"
                  type="search"
                  placeholder="Search"
                />
                <i id="searchicon" class="ri-search-line absolute"></i>
              </div>
            </div>
            <div class="content w-full">
              <div
                class="w-full h-full flex flex-col items-center justify-center"
              >
                <img src="{{ asset($constants['IMAGEFILEPATH'].'Folder.png')}}" alt="Folder" />
                <p>Folder is empty</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <footer id="footer"
        class="fixed bottom-0 flex items-center justify-between w-full px-5 py-2 "
      >
        <button
          id="footerButton"
          class="text-black px-5 py-2 rounded-md hover:bg-black hover:text-white"
        >
          File
        </button>
        <img
          id="footer-logo"
          class="w-12 h-12"
          src="{{ asset($constants['IMAGEFILEPATH'].'logo.png')}}"
          alt="Logo"
        />
      </footer>
    </div>

<!-- right click options  -->
<div id="popupMenu" class="popup-menu">
    <ul>
        <li><a href="#" id="refresh">Refresh</a></li>
        <li><a href="#" id="upload">Upload</a></li>
        <li><a href="#" id="createFolder">Create Folder</a></li>
        <li><a href="#" id="createFile">Create File</a></li>
    </ul>
</div>

<div id="fileOptionsMenu" class="popup-menu file-options">
    <ul>
        <li><a href="#">Text</a></li>
        <li><a href="#">PPT</a></li>
        <li><a href="#">Excel</a></li>
        <li><a href="#">Word</a></li>
    </ul>
</div>

<!-- right click options  end  -->


    <script>
       document.addEventListener("DOMContentLoaded", () => {
        const links = {
          'desktop.html': 'link-desktop',
          'Recent.html': 'link-recent',
          'downloads.html': 'link-downloads',
          'filemanager.html': 'link-filemanager',
          'documents.html': 'link-documents',
          'applications.html': 'link-applications'
        };

        const currentPage = window.location.pathname.split('/').pop();

        const activeLinkId = links[currentPage];
        if (activeLinkId) {
          const activeLink = document.getElementById(activeLinkId);
          if (activeLink) {
            activeLink.classList.add('bg-black', 'text-orange-500', 'font-semibold');
          }
        }
      });


      // right click 
      document.addEventListener('DOMContentLoaded', function() {
    const popupMenu = document.getElementById('popupMenu');
    const fileOptionsMenu = document.getElementById('fileOptionsMenu');

    document.addEventListener('contextmenu', function(event) {
        event.preventDefault();
        popupMenu.style.display = 'block';
        popupMenu.style.top = event.clientY + 'px';
        popupMenu.style.left = event.clientX + 'px';
    });

    document.addEventListener('click', function(event) {
        if (!event.target.closest('.popup-menu')) {
            popupMenu.style.display = 'none';
            fileOptionsMenu.style.display = 'none';
        }
    });

    const fileLinks = document.querySelectorAll('.file-options li a');
    fileLinks.forEach(function(link) {
        link.addEventListener('mouseover', function() {
            fileOptionsMenu.style.display = 'block';
            fileOptionsMenu.style.top = link.offsetTop + 'px';
            fileOptionsMenu.style.left = (link.offsetLeft + link.offsetWidth) + 'px';
        });

        link.addEventListener('mouseout', function() {
            fileOptionsMenu.style.display = 'none';
        });
    });
});

      /// end right click

      /// create folder 
      document.getElementById('createFolder').addEventListener('click', function(event) {
            event.preventDefault();
            const parentFolder = 'desktop';
            createFolderInsideAnother(parentFolder);
        });
     
      

      /// end create folder 
    </script>
  </body>
</html>
