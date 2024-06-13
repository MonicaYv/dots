<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users and Groups</title>
    <!-- Include Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset($constants['CSSFILEPATH'].'root.css') }}">
    <link rel="stylesheet" href="{{ asset($constants['CSSFILEPATH'].'setting-admin-users.css') }}">
     <!-- Add jQuery for simplicity -->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

</head>

<body>
    <main class="bg-gray-100 pt-5">
        <div class="flex items-center mb-4 ml-4 p-3">
            <!-- Setting icon -->
            <span class="text-gray-500 mr-3 text-2xl ">
                <i class="fas fa-cog"></i>
            </span>
            <!-- Title -->
            <span class="text-2xl">System Settings</span>
        </div>

        <div class="flex items-center justify-between bg-yellow-400 p-2 pl-8  mb-4">
            <div>
                <h2 class="text">Admin & Users > <span class="font-semibold">Users and Groups</span></h2>
            </div>
        </div>

        <div class="users-admin-btn-grp pl-8 flex items-center relative justify-between">

            <div class="flex items-center gap-3">
                

                <button  data-filter="today"

                    class="flex items-center focus:border-yellow-500 dropdown-toggle border border-gray-300 rounded px-6 py-1 mr-2 hover:border-yellow-300 filter-button">Today</button>
             
               
                <button data-filter="7-days"
                    class="flex items-center focus:border-yellow-500 dropdown-toggle border border-gray-300 rounded px-6 py-1 mr-2 hover:border-yellow-300 filter-button">Last
                    7 days</button>
                <button data-filter="30-days"
                    class="flex items-center focus:border-yellow-500 dropdown-toggle border border-gray-300 rounded px-6 py-1 mr-2 hover:border-yellow-300 filter-button">Last
                    30 days</button>
                <button
                    class="flex items-center focus:border-yellow-500 dropdown-toggle border border-gray-300 rounded px-6 py-1 mr-2 hover:border-yellow-300">Customize</button>



                <button id="dropdownHoverButton" data-dropdown-toggle="dropdownHover" data-dropdown-trigger="hover"
                    class="flex items-center focus:border-yellow-500 dropdown-toggle border border-gray-300 rounded px-6 py-1 mr-2 hover:border-yellow-300  px-6 py-1 text-center"
                    type="button">Select User <svg class="w-2.5 h-2.5 ms-3 ml-2" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 4 4 4-4" />
                    </svg>
                </button>

                <!-- Dropdown menu -->
                <div id="dropdownHover"
                    class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownHoverButton">
                        <li>
                            <a href="#"
                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Dashboard</a>
                        </li>
                        <li>
                            <a href="#"
                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Settings</a>
                        </li>
                        <li>
                            <a href="#"
                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Earnings</a>
                        </li>
                        <li>
                            <a href="#"
                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Sign
                                out</a>
                        </li>
                    </ul>
                </div>

            </div>

        </div>

        <div class="users-admin-content-wrapper pl-8  pr-3">
            <div class="container mx-auto mt-10">
                <!-- Searchable Table -->
                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-white uppercase bg-gray-500 dark:text-white">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    User
                                </th>
                                <th scope="col" class="px-6 py-3">
                                   Log in date
                                </th>
                               
                                
                                <th scope="col" class="px-6 py-3">
                                   System
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Client
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Login address
                                </th>
                            </tr>
                        </thead>
                        <tbody id="log-entries">
                                @foreach($log as $logs)
             
             
                                    
                            <tr class=" bg-white border-b dark:bg-gray-800 dark:border-gray-700">

                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">

                                    <span class="bg-gray-400 rounded-full px-2"></span> {{ $logs->user->name }}
                                </th>
                                <td class="px-6 py-4">
                                   {{ $logs->login_time }}
                                </td>
                                
                            
                                <td class="px-6 py-4 flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 18 18" fill="none">
                                      <g clip-path="url(#clip0_527_173)">
                                        <path d="M17.7188 0.22998L8.29691 1.61289V8.62037L17.7188 8.54528V0.22998ZM0.231644 9.38073L0.232065 15.3438L7.37455 16.3258L7.36893 9.42714L0.231644 9.38073ZM8.22196 9.47636L8.23518 16.4324L17.7099 17.7696L17.7122 9.49196L8.22196 9.47636ZM0.22644 2.71342L0.23305 8.67353L7.37553 8.63289L7.3723 1.74001L0.22644 2.71342Z" fill="#00ADEF"/>
                                      </g>
                                      <defs>
                                        <clipPath id="clip0_527_173">
                                          <rect width="18" height="18" fill="white"/>
                                        </clipPath>
                                      </defs>
                                    </svg>
                                   {{ $logs->system }}
                                  </td>
                                <td class="px-6 py-4">
                                     {{ $logs->browser }}

                                </td>
                                <td class="px-6 py-4">
                                    India
                                </td>
                            </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                      <!-- Pagination Links -->
                       {{ $log->links() }}

                <script>
        $(document).ready(function(){
            $('.filter-button').on('click', function(){
                var filter = $(this).data('filter');
                $.ajax({
                    url: '{{ route("loginLogs.filter") }}', // Route to handle the AJAX request
                    type: 'GET',
                    data: { filter: filter },
                    success: function(response){
                        $('#log-entries').html(response.html); // Update the table body with the new data
                    }
                });
            });
        });
    </script>
                </div>

            </div>
        </div>


    </main>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</body>

</html>