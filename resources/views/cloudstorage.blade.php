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
                <li>
                  <a id="link-amazon-s3"
                    class="flex items-center gap-3 rounded-r-md  py-2 text-sm hover:text-orange-500 data-[active=true]:text-orange-500 transition-colors hover:bg-black data-[active=true]:bg-black data-[active=true]:font-semibold bg-black data-[active=true]:bg-black"
                    href="{{route('cloudstore-s3-list')}}"
                  >
                    <span
                      class="text-base font-normal px-10" style="color: yellow;" 
                    >
                      Amazon S3
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
            <div class="content w-full flex">
            <div class=" w-full flex cursor-pointer break-inside mb-6">
             @foreach($contents as $content )
             {{-- To ignore git files--}}
                @if(str_contains($content, 'git'))
                    @php continue;  @endphp
                @endif
                @if(str_contains($content, '.'))
                    <div class="w-full flex flex-col cursor-pointer mb-6">
                        <a href="#" class="folders"> 
                          <img class="current-file w-16" data-file="{{ $content }}" src="https://desktop2.sizaf.com/public/images/Docs.png" alt="New file">
                        </a>
                    <h2 class="text-black text-lg">{{ $content }}</h2>
                   </div>
                @else
                    <div class="w-full flex flex-col cursor-pointer mb-6">
                        <a href="#" class="folders"> 
                          <img class="current-file w-16" data-file="{{ $content }}" src="https://desktop2.sizaf.com/public/images/fileicon/folder.png" alt="New Folder">
                        </a>
                    <h2 class="text-black text-lg">{{ $content }}</h2>
                   </div>
                @endif
             @endforeach
          </div>
        </div>
      </div>
<!-- File Add modal--->
<div id="file-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                  Create File / Folder
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="file-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5 space-y-4">
                <form class="max-w-sm mx-auto" action="{{ route('cloudstore-s3-create-file') }}" method="POST">
                    @csrf
                      <div class="mb-5">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                        <input type="text" name="file_name" id="name" class="p-3 shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="file-name" required value="" />
                      </div>
                      
                      <button type="submit" class="p-3 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Create</button>
                </form>
            </div>
            <!-- Modal footer -->
            <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
            </div>
        </div>
    </div>
</div>
<!-- End group add modal --->




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
        <li><a href="{{route('cloudstore-s3-list')}}" id="refresh">Refresh</a></li>
        <li><a href="#" id="upload">Upload</a></li>
        <li><a href="#" id="createFolder" data-modal-target="file-modal" data-modal-toggle="file-modal">Create Folder</a></li>
        <li><a href="#" id="createFile"data-modal-target="file-modal" data-modal-toggle="file-modal">Create File</a></li>
        <li><a href="#" id="deleteFile">Delete File</a></li>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
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
    //delete S3 folder
      $(".current-file").dblclick(function(){
        var filename = $(this).attr('data-file');
        const deleteroute = @json(route('cloudstore-s3-delete'));
         //alert(filename);
         var r=confirm("Are you sure you want to Delete!");
              if (r==true)
                {
                   x="Delete successful";
                    $.ajax({
                            url: deleteroute,
                            method: 'GET',
                            data: {file:filename},
                            success: function (response) {
                                // Update the app list container with the updated list
                                location.reload();
                            },
                            error: function (xhr, status, error) {
                                console.error(xhr.responseText);
                            }
                        });
                }
               else
                {
                   x="You pressed Cancel!";
                   
                }
      }); 

    </script>
  </body>
</html>
