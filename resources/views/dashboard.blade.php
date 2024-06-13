<!DOCTYPE html>
@extends('layouts.common')
@section('title', 'Dashboard')
@section('styles')
    <!--<link rel="stylesheet" href="{{ asset($constants['CSSFILEPATH'].'app.css') }}">-->
@endsection
@section('content')
    <div class="w-full h-screen">
      <div class="dashboard w-full h-full bg-no-repeat">
        <div
          class="navbar flex items-center justify-end gap-8 p-2 md:p-4 lg:p-3"
        >
          <i class="ri-search-line text-white text-2xl" id="search-icon"></i>
          <i
            id="notification-icon"
            class="ri-notification-line text-white text-2xl"
          ></i>
          <i class="ri-wifi-line text-white text-2xl"></i>
          <i class="ri-volume-up-line text-white text-2xl"></i>
          <i class="ri-battery-fill text-white text-2xl"></i>
        </div>

          <div id="desktopapps" class="desktop-apps w-0 gap-5 flex flex-col flex-wrap p-5">
        
        </div>
        <div class="clock" id="clock"></div>
       <div id="search" class="Search hidden relative overflow-hidden">
    <i class="fa-solid fa-magnifying-glass search-icon absolute"></i>
    <input
        type="search"
        id="search-input"
        class="search-input py-3 px-10 outline-none border-b-2"
        placeholder="Search"
    />
    <div
            class="search-data w-full min-h-12 flex flex-col gap-2 px-6 py-4 hidden"
         id="searchData"  >
            
          </div>
 

</div>



        <div id="toast-success" class="flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800 float-right" role="alert">
    <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
        </svg>
        <span class="sr-only">Check icon</span>
    </div>
    <div class="ms-3 text-sm font-normal">Logged in Successfully!!</div>
    <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-success" aria-label="Close">
        <span class="sr-only" id="close">Close</span>
        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
        </svg>
    </button>
        </div>
        <div class="sidebar w-16 h-max p-1 rounded-lg">
            @foreach ($apps as $app)
                <a href="#" class="{{ $app->app_function=='add_app' ? 'openiframe' :''}}" data-title="{{ $app->name }}" data-url="{{ url('/') }}/lightapp" data-image="{{ asset($constants['APPFILEPATH'].$app->icon)}}"  ><img class="mb-1" src="{{  asset($constants['APPFILEPATH'].$app->icon ) }}" alt="{{ $app->name }}" /></a>
            @endforeach
        </div>
        <div id="notification" class="Notification w-56 h-48 rounded-lg hidden">
          <div class="border-b-2 p-5 text-center">
            <h1 class="text-normal">Notification Center</h1>
          </div>
          <div class="flex items-center justify-center p-4">
            <p>Empty</p>
          </div>
        </div>
        
      </div>
    </div>
    <!--iframe section -->
    <div id="iframePopup" class="popup hidden">
        <div class="flex justify-between items-center p-2 bg-gray-800 text-white rounded-t">
            <span id="iframeheadingid"></span>
            <div class="space-x-2">
                <i id="minimize" class="ri-subtract-line cursor-pointer"></i>
                <i id="maximize" class="ri-fullscreen-line cursor-pointer"></i>
                <i id="closeiframe" class="ri-close-line cursor-pointer"></i>
            </div>
        </div>
        <iframe id="iframe" src="" class="w-full h-full"></iframe>
    </div>
    <img id="iframeimageid" src="" alt="Maximize" class="maximize-icon hidden">
    <!--end here -->
    
   
      

<script>
      const desktopapp = @json(route('desktopapp'));

</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('#search-input').on('keyup', function () {
            var query = $(this).val();
            if (query.length > 2) {
                $.ajax({
                    url: '{{ route('search') }}',
                    type: 'GET',
                    dataType: 'json',
                    data: { query: query },
                   success: function (data) {

                   $('#searchData').removeClass('hidden');
                   $('#searchData').html(data.html);

        },
                    error: function () {
                        $('#searchData').html('<p>An error occurred while searching.</p>').removeClass('hidden');
                    }
                });
            } else {
               $('#searchData').addClass('hidden').html('');
            }
        });
    });


</script>
@endsection
@section('scripts')
    <script src="{{ asset($constants['JSFILEPATH'].'dashboard.js') }}"></script>
@endsection

 
