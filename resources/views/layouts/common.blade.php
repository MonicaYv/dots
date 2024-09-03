
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1, width=device-width" />
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link href="https://cdn.jsdelivr.net/npm/toastr@2.1.4/build/toastr.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet"/>
    <link href="https://unpkg.com/tailwindcss@^2.2.19/dist/tailwind.min.css" rel="stylesheet"/>
    <link rel="shortcut icon" href="{{ asset($constants['IMAGEFILEPATH'] . 'logo.ico') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset($constants['CSSFILEPATH'].'custom.css') }}" />
    <link rel="stylesheet" href="{{ asset($constants['CSSFILEPATH'].'root.css') }}" />
    <link rel="stylesheet" href="{{ asset($constants['CSSFILEPATH'].'common.css') }}" />
    <!-- <link rel="stylesheet" href="{{ asset($constants['CSSFILEPATH'].'cs.css') }}" /> -->


    @yield('styles')

  </head>
  <body class="w-full h-screen">
    <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Taskbar -->
        <div class="navbar navbarhead h-16 flex items-center w-full absolute">
            <div class="flex justify-center ml-10 w-full relative h-full" id="toolbar">
                <div class="bg absolute w-full  bottom-0">
                    <img id="shelf" class="w-full" src="{{ asset($constants['IMAGEFILEPATH'].'shelf.png')}}"  alt="" loading="lazy">
                </div>
                <header id="iframeheaders" class="mt-1">
                    <div class="flex space-x-4" id="sortable-apps">
                    </div>
                </header>
            </div>
            <div class="flex items-center gap-8 w-48 justify-end pr-5">
                <i id="search-icon" class="ri-search-line icon-color"></i>
                 <i id="pinned" class="ri-pushpin-line"></i>
                <!-- <i id="notification-icon" class="ri-notification-3-line icon-color"></i> -->
            </div>
        </div>
         <!-- Taskbar End -->


         <!-- <header id="iframeheaders" class="transparent p-2 text-white flex justify-center items-center fixed top-0 left-0 right-0 mainiframeiconheader mainscreen"> -->


    <!--///// iframe -->
    <div id="alliframelist">

    </div>

    <!--///// Context Menu -->
    <div id="context-menu" class="context-menu context-menulist hidden bg-c-white">

    </div>

    <div id="app-contextmenu" class="context-menu context-menulist hidden bg-c-white">
    </div>
    <!--//// Context Menu End-->

<!-- Upload popup -->
<div id="popupuploadfiles" class="fixed inset-0 flex z-20 items-center justify-center bg-gray-800 bg-opacity-50 hidden">
    <div class="popup-content bg-white rounded-lg shadow-lg p-6 w-full max-w-2xl">
    <!-- Header -->
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-xl font-bold">Local Upload</h2>
        <button id="close-popup" class="text-2xl">
            <i class="ri-close-line"></i>
        </button>
    </div>

    <div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow-lg">
        <h2 class="text-2xl font-bold mb-4">File Upload</h2>
        <div id="dropzone" class="border-2 border-dashed border-gray-300 p-6 rounded-lg text-center">
            Drag and drop files here or click to upload
        </div>

        <div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow-lg">
            <h2 class="text-2xl font-bold mb-4">File Upload</h2>
            <div id="dropzone" class="border-2 border-dashed border-gray-300 p-6 rounded-lg text-center">
                Drag and drop files here or click to upload
            </div>
            <input type="file" id="file-input" class="hidden" multiple>
            <div id="file-list-container" class="mt-4 space-y-2 hidden">
                <table class="min-w-full bg-white">
                    <thead>
                        <tr >
                            <th class="py-2 px-4 text-left">Name</th>
                            <th class="py-2 px-4 text-left">Size</th>
                            <th class="py-2 px-4 text-left">Progress</th>
                        </tr>
                    </thead>
                    <tbody id="file-list"></tbody>
                </table>
            </div>
        </div>
    </div>
</div>



    @yield('content')
    <!--end here --> 

    <!-- share popup -->
    <div id="shareFilesFolderModal"></div>

<script>
    const desktopapp = @json(route('desktopapp'));
    const contextmenu = @json(route('contextmenu'));
    const createFolderRoute = @json(route('createfolder'));
    const createFileRoute = @json(route('createfile'));
    const showFileDetail = @json(route('showpathdetail'));
    const  renameroute= @json(route('renamefile'));
    const deleteRoute = @json(route('deletefile'));
    const copyRoute =@json(route('copyfile'));
    const pasteRoute =@json(route('pastefile'));
    const closeIframeRoute =@json(route('closeiframe'));
    const openIframeRoute =@json(route('openiframe'));
    const uploadRoute =@json(route('upload'));
    const shareRoute =@json(route('getUrl'));
    const searchFileExploreRoute =@json(route('fileExp-list'));
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/toastr@2.1.4/toastr.min.js"></script>

<script src="{{ asset($constants['JSFILEPATH'].'animation.js') }}" ></script>

<script src="{{ asset($constants['JSFILEPATH'].'common.js') }}" ></script>
<script src="{{ asset($constants['JSFILEPATH'].'taskbar.js') }}" ></script>

@yield('scripts')

<!-- for share -->
<script src="https://cdn.jsdelivr.net/npm/semantic-ui@2.2.13/dist/semantic.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@3.0.1/dist/js/multi-select-tag.js"></script>

@yield('scripts')
<!-- <script src="{{ asset($constants['JSFILEPATH'].'taskbar.js') }}" ></script> -->

<!-- for share -->
<script>
    $(document).ready(function() {
        //For Share Model
        $(document).on('change', '#Users, #Groups, #Roles', function() {
            const targetId = $(this).attr('id');
            if ($(this).is(':checked')) {
                $('#Div' + targetId).show();
            } else {
                $('#Div' + targetId).hide();
            }
        });
        $(document).on('change', '#Everyone', function() {
            if ($(this).is(':checked')) {
                $('#Users, #Groups, #Roles').prop('checked', false);
                $('#DivUsers, #DivGroups, #DivRoles').hide();
            }
        });
        $(document).on('change', '#EditUsers, #EditGroups, #EditRoles', function() {
            const targetId = $(this).attr('id');
            if ($(this).is(':checked')) {
                $('#Div' + targetId).show();
            } else {
                $('#Div' + targetId).hide();
            }
        });
        $(document).on('change', '#EditEveryone', function() {
            if ($(this).is(':checked')) {
                $('#EditUsers, #EditGroups, #EditRoles').prop('checked', false);
                $('#DivUsers, #DivEditGroups, #DivEditRoles').hide();
            }
        });
        $(document).on('click', '#RandomPassword', function() {
            console.log('here');
            const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
            let password = '';
            for (let i = 0; i < 6; i++) {
                const randomIndex = Math.floor(Math.random() * characters.length);
                password += characters.charAt(randomIndex);
            }
            $('#Password').val(password);
        });

        $(document).on('click', '#ClosePopup', function() {
            $('#sharePopup').addClass('hidden');
        });

        //for copy share link
        $(document).on("click", ".ClicktoCopy", function(e) {
            e.preventDefault();
            var copyText = $('input[name="url"]');
            copyText.select();
            document.execCommand('copy');
        });

        //for generate qr
        // $(document).on("click", ".showqrcode", function(e) {
        //     var elText = $('input[name="url"]').val();
        //     var qrcode = new QRCode(document.getElementById("qrcode"), {
        //         width: 100,
        //         height: 100,
        //     });

        //     function makeCode() {
        //         qrcode.makeCode(elText);
        //     }
        //     makeCode();
        //     $('#QrCodeModal').removeClass('hidden');
        // });
        // $(document).on("click", ".hideqrmodal", function(e) {
        //     $('#qrcode').html('');
        //     $('#QrCodeModal').addClass('hidden');
        // });
    });
</script>




</body>
</html>
