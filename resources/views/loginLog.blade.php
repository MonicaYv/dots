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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/datepicker.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

     <!-- Add jQuery for simplicity -->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


</head>

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
                <h2 class="text">Safety Control > <span class="font-semibold">Login Log</span></h2>
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
              <button id="customize"
        class="flex items-center focus:border-yellow-500 dropdown-toggle border border-gray-300 rounded px-6 py-1 mr-2 hover:border-yellow-300">
    Customize
</button>
<button id="filter"
        class="flex items-center focus:border-yellow-500 dropdown-toggle border border-gray-300 rounded px-6 py-1 mr-2 hover:border-yellow-300 hidden">
    Filter
</button>
<div class="date-select flex items-center gap-2 focus:border-yellow-500 dropdown-toggle border border-gray-300 rounded mr-2 hover:border-yellow-300 hidden">
    <input id="start-date" class="outline-none bg-gray-100 w-24 py-1 pl-2" datepicker datepicker-autohide type="text" placeholder="Select date start" readonly>
    <input id="start-time" type="time" class="outline-none bg-gray-100" min="09:00" max="18:00" value="00:00" required/>
</div>

<div class="date-select flex items-center gap-2 focus:border-yellow-500 dropdown-toggle border border-gray-300 rounded mr-2 hover:border-yellow-300 hidden">
    <input id="end-date" class="outline-none bg-gray-100 w-24 py-1 pl-2" datepicker datepicker-autohide type="text" placeholder="Select date end" readonly>
    <input id="end-time" type="time" class="outline-none bg-gray-100" min="09:00" max="18:00" value="00:00" required/>
</div>       
                    

  <!-- <a href="{{ route('export.logins') }}" class="btn btn-success" target="_blank">Export to Excel</a> -->
              
  <a class="btn btn-success" id="export-button">Export to Excel</a>
    <!-- Dropdown menu -->
             <select class="flex items-center focus:border-yellow-500 dropdown-toggle border border-gray-300 rounded px-6 py-2 mr-2 hover:border-yellow-300  form-control roles_filter" id="sel1" name="roleID" id="roleID">
            <option value="">Please Select</option>
             @foreach($roles as $role)
              <option data-role-ID = "{{ $role->id }}" value="{{ $role->id }}">{{ $role->name }}</option>
             @endforeach
          </select>
            <!-- User List -->
        <div id="userList" class="mt-5">
            <!-- Users will be displayed here -->
        </div>

            </div>

        </div>

        <div class="users-admin-content-wrapper pl-8  pr-3">
            <div class="container mx-auto mt-10">
                <!-- Searchable Table -->
                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400" id="my-table">
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
                        <tbody id="log-entries" id="userList">
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
                                {{ $logs->system . ' ' . $logs->system_version }}
                                  </td>
                                <td class="px-6 py-4">
                                     {{ $logs->browser }}

                                </td>
                                <td class="px-6 py-4">
                                    {{ $logs->localIP }} India

                                </td>
                            </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                      <!-- Pagination Links -->
                       {{ $log->links() }}
                               <script src="https://cdn.jsdelivr.net/npm/xlsx@0.18.5/dist/xlsx.full.min.js"></script>
        <!-- Export Functionality -->
        <script>
            document.getElementById('export-button').addEventListener('click', function() {
                // Select the HTML table element
                var table = document.getElementById('my-table'); // Replace with your table ID

                // Ensure the table is updated before export
                if (!table) {
                    console.error('Table element not found!');
                    return;
                }

                // Log the table to ensure it's found
                // console.log(table);

                // Convert the HTML table to a SheetJS workbook
                var workbook = XLSX.utils.table_to_book(table, { sheet: "Sheet1" });

                // Generate a binary string representation of the workbook
                var binaryString = XLSX.write(workbook, { bookType: 'xlsx', type: 'binary' });

                // Convert the binary string to an array buffer
                var buffer = new ArrayBuffer(binaryString.length);
                var view = new Uint8Array(buffer);
                for (var i = 0; i < binaryString.length; i++) {
                    view[i] = binaryString.charCodeAt(i) & 0xFF;
                }

                // Create a Blob from the array buffer
                var blob = new Blob([buffer], { type: 'application/octet-stream' });

                // Create a link element
                var link = document.createElement('a');

                // Set the download attribute with a filename
                link.href = URL.createObjectURL(blob);
                link.download = 'LogIn-Log.xlsx';

                // Append the link to the body
                document.body.appendChild(link);

                // Programmatically click the link to trigger the download
                link.click();

                // Remove the link from the document
                document.body.removeChild(link);
            });
        </script>

        <script>
            document.addEventListener('DOMContentLoaded', (event) => {
                
                
                // Get the current time
                const now = new Date();
                let hours = now.getHours();
                let minutes = now.getMinutes();
                
                // Pad the hours and minutes with leading zeros if needed
                hours = hours < 10 ? '0' + hours : hours;
                minutes = minutes < 10 ? '0' + minutes : minutes;
                
                // Set the current time in the time input field
                const currentTime = hours + ':' + minutes;
                document.getElementById('end-time').value = currentTime;
            });
        
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


            $('.roles_filter').on('change', function(){
               
                var roles = $(this).val();
               
                $.ajax({
                    url: '{{ route("loginLogs.filter") }}', // Route to handle the AJAX request
                    type: 'GET',
                    data: { roles: roles,filter:'role' },
                    success: function(response){
                        $('#log-entries').html(response.html); // Update the table body with the new data
                    }
                });
            });
        });
    </script>
    <script>
       $(document).ready(function() {
    $('#filter').click(function() {
        // Get the input values
        var startDate = $('#start-date').val();
        var startTime = $('#start-time').val();
        var endDate = $('#end-date').val();
        var endTime = $('#end-time').val();

        // Combine and format date and time
        var startDateTime = startDate + ' ' + startTime;
        var endDateTime = endDate + ' ' + endTime;

        // Format date-time to Y-m-d H:i
        var startDateTimeFormatted = formatDateTime(startDateTime);
        var endDateTimeFormatted = formatDateTime(endDateTime);

        // Make AJAX request
        $.ajax({
            url: '{{ route("loginLogs.filter") }}', // URL to send the request to
            type: 'GET',
            data: {
                start_date_time: startDateTimeFormatted,
                end_date_time: endDateTimeFormatted,
                filter: 'dateTime'
            },
            success: function(response) {
                // Handle success
                
                $('#log-entries').html(response.html); 
              
            },
            error: function(xhr, status, error) {
                // Handle error
                console.error(error);
            }
        });
    });

    function formatDateTime(dateTime) {
        var date = new Date(dateTime);
        var year = date.getFullYear();
        var month = ('0' + (date.getMonth() + 1)).slice(-2);
        var day = ('0' + date.getDate()).slice(-2);
        var hours = ('0' + date.getHours()).slice(-2);
        var minutes = ('0' + date.getMinutes()).slice(-2);
        return `${year}-${month}-${day} ${hours}:${minutes}`;
    }
});


    </script>
<script type="text/javascript">
    var filter = document.getElementById('filter');
    document.getElementById("customize").addEventListener("click",function(){
          filter.classList.toggle("hidden")
          document.querySelectorAll(".date-select").forEach(function(element) {
            element.classList.toggle('hidden');
        });
        })
</script>
                </div>

            </div>
        </div>
  

    </main>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
      
   
