
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;600&display=swap"
    />
    <link
      href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="{{ asset($constants['CSSFILEPATH'].'app.css') }}">

    @yield('styles')
  </head>
  <body>
          <meta name="csrf-token" content="{{ csrf_token() }}">

      @yield('content')
      
      
    <div id="context-menu" class="context-menu">
          <ul>
            <li><a  id="refreshButton" href="#">Refresh</a></li>
            <li><a href="#">Upload File</a></li>
            <hr />
            <li><a id="createFolderdesktop" href="#">New Folder</a></li>
            <li><a href="#">New File</a></li>
            <li><a href="#">Sort by</a></li>
            <li><a href="#">Icon size</a></li>
            <li><a href="#">Attribute</a></li>
            <li><a href="#">More</a></li>
            <li><a href="#">Light app</a></li>
            <li><a href="#">Wallpaper</a></li>
            <li><a href="#">Personal</a></li>
          </ul>
    </div>
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
          //Right Click Functionality
      document.addEventListener("DOMContentLoaded", function () {
        const contextMenu = document.getElementById("context-menu");
        const dashboard = document.querySelector(".dashboard");

        dashboard.addEventListener("contextmenu", function (e) {
          e.preventDefault();

          const dashboardRect = dashboard.getBoundingClientRect();
          const menuWidth = contextMenu.offsetWidth;
          const menuHeight = contextMenu.offsetHeight;
          let top = e.clientY;
          let left = e.clientX;

          if (e.clientY + menuHeight > dashboardRect.bottom) {
            top = dashboardRect.bottom - menuHeight - 10;
          }
          if (e.clientX + menuWidth > dashboardRect.right) {
            left = dashboardRect.right - menuWidth - 10;
          }

          if (top < dashboardRect.top) {
            top = dashboardRect.top + 10;
          }
          if (left < dashboardRect.left) {
            left = dashboardRect.left + 10;
          }

          contextMenu.style.top = `${top}px`;
          contextMenu.style.left = `${left}px`;
          contextMenu.classList.remove("hidden");
        });

        document.addEventListener("click", function (e) {
          if (!contextMenu.contains(e.target)) {
            contextMenu.classList.add("hidden");
          }
        });
      });

   
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
    
     
    document.addEventListener('DOMContentLoaded', function() {
  
        document.querySelectorAll('.openiframe').forEach(function(button) {
            button.addEventListener('dblclick', function() {
                const iframeUrl = this.getAttribute('data-url');
                const iframeTitle = this.getAttribute('data-title');
                const iframeImage = this.getAttribute('data-image');
                openiframe(iframeUrl,iframeTitle,iframeImage);
                
            });
        });
        
       const closeiframeelement = document.getElementById('closeiframe');
        if(closeiframeelement){
            document.getElementById('closeiframe').addEventListener('click', function() {
                
                closeiframe();
            });
        }
        
        const minimiseiframeelement = document.getElementById('closeiframe');
            if(minimiseiframeelement){
            document.getElementById('minimize').addEventListener('click', function() {
                minimise();
               
            });
        }
        
        const maximiseiframeelement = document.getElementById('closeiframe');
        if(maximiseiframeelement){
            document.getElementById('maximize').addEventListener('click', function() {
                
                maximise();
            });
        }
        
        const taskbariframeelement = document.getElementById('closeiframe');
        if(taskbariframeelement){
            document.getElementById('iframeimageid').addEventListener('click', function() {
                 taskbar();
            });
        }
       
        
        function openiframe(iframeUrl,iframeTitle,iframeImage){
                document.getElementById('iframePopup').classList.remove('hidden');
                document.getElementById('iframeimageid').classList.remove('hidden');
                const iframe = document.getElementById('iframe');
                iframe.src = iframeUrl;
                iframe.title = iframeTitle;
                 document.getElementById('iframeheadingid').innerHtml=iframeTitle;
                 const maximizeIcon = document.getElementById('iframeimageid');
                 maximizeIcon.src=iframeImage;
        }
        
         function closeiframe(){
            document.getElementById('iframePopup').classList.add('hidden');
            document.getElementById('iframeimageid').classList.add('hidden');
        }
        
        function minimise(){
            const popup = document.getElementById('iframePopup');
            popup.classList.toggle('minimized');
            
            document.getElementById('iframePopup').classList.add('hidden');
        }
        function maximise(){
            const popup = document.getElementById('iframePopup');
            popup.classList.toggle('maximized');
        }
        function taskbar(){
             //document.getElementById('iframePopup').classList.remove('hidden');
             const popup = document.getElementById('iframePopup');
             popup.classList.toggle('minimized');
             popup.classList.toggle('hidden');
        }
       
       
       
       

       
    });
    </script>
</body>
</html>
