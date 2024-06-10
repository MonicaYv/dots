@extends('layouts.setting')
@section('title', 'Roles')
@section('content')
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
            <h2 class="text">Admin & Users > <span class="font-semibold">Role</span></h2>
        </div>
        <div class="flex items-center">
            <!-- Search icon -->
            <div class="flex items-center">
                <!-- Search input -->
                <input id="searchInput" type="text" placeholder="Search roles" class="border rounded-l-md p-2 focus:outline-none bg-gray-100" style="height: 40px;">
                <!-- File folder icon -->
                <span class="bg-gray-100 p-2 rounded-r-md cursor-pointer" style="height: 40px;">
                    <i class="fas fa-search"></i>
                </span>
            </div>
           <span class="ml-4 text-2xl mr-3">
              <a href="#" data-modal-target="role-modal" data-modal-toggle="role-modal"><i class="ri-add-circle-fill"></i></a>
            </span>
            <span class="ml-2 text-2xl">
                <i class="fas fa-folder"></i>
            </span>
        </div>
    </div>
    
       
    
        <div class="users-admin-content-wrapper pl-8  pr-3">
            <div class="container mx-auto mt-10">
                <!-- Searchable Table -->
                <div class="overflow-x-auto rounded-lg shadow-lg">
                    <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-lg">
                        <thead class="bg-gray-500">
                        <tr>
                            <th class="px-6 py-3 border-b border-gray-300  text-left text-xs leading-4 font-medium text-gray-100 border-none tracking-wider">Name</th>
                            <!-- <th class="px-6 py-3 border-b border-gray-300  text-left text-xs leading-4 font-medium text-gray-100 border-none tracking-wider flex items-center">
                                <div class="flex items-center">
                                    <span>Roles</span>
                                    <span class="pb-1 pl-2">
                                        <i class="fas fa-sort-down"></i>
                                    </span>
                                </div>
                            </th> -->
                            <th class="px-6 py-3 border-b border-gray-300  text-left text-xs leading-4 font-medium text-gray-100 border-none tracking-wider">
                                <div class="flex items-center">
                                    <span>Space Usage</span>
                                    <span class="pb-1 pl-2">
                                        <i class="fas fa-sort-down"></i>
                                    </span>
                                </div>
                            </th>
                            <th class="px-6 py-3 border-b border-gray-300  text-left text-xs leading-4 font-medium text-gray-100 border-none tracking-wider">Description</th>
                            <th class="px-6 py-3 border-b border-gray-300  text-left text-xs leading-4 font-medium text-gray-100 border-none tracking-wider">Actions</th>
                        </tr>
                        </thead>
                        <tbody id="searchableTableBody">
                            <!-- Table rows will be dynamically added here -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        

</main>

<!-- Main modal -->
<div id="role-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Add Role
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="role-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5 space-y-4">
                <form class="max-w-sm mx-auto" action="{{ route('role-create') }}" method="POST">
                    @csrf
                      <div class="mb-5">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                        <input type="text" name="name" id="email" class="p-3 shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="role name" required />
                      </div>
                      <div class="mb-5">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Upload Limit (GB):</label>
                        <input type="text"  name="upload_limit" id="email" class="p-3 shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="In GB" required />
                      </div>
                      
                       <div class="mb-5">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                        <input type="text" name="description" id="email" class="p-3 shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="Role Description" required />
                      </div>


        <div class="mb-5">        
        <!-- File Management Section -->
          <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">File Management</label>
          <ul class="bg-gray-200 p-4 rounded-lg flex flex-wrap gap-4">
            <li class="inline-flex items-center p-2 bg-gray-300 rounded-md">
              <label for="file-manage" class="text-gray-600 flex items-center">
                <span>File manage</span>
                <input type="checkbox" id="file-manage" name="file_manage_settings[]" value="file-manage" class="rounded-full text-blue-500 focus:ring-blue-500 focus:ring-2 ml-2">
              </label>
            </li>
            <li class="inline-flex items-center p-2 bg-gray-300 rounded-md">
              <label for="preview" class="text-gray-600 flex items-center">
                <span>Preview</span>
                <input type="checkbox" id="preview" name="file_manage_settings[]"  value="preview" class="rounded-full text-blue-500 focus:ring-blue-500 focus:ring-2 ml-2">
              </label>
            </li>
            <li class="inline-flex items-center p-2 bg-gray-300 rounded-md">
              <label for="search" class="text-gray-600 flex items-center">
                <span>Search</span>
                <input type="checkbox" id="search" name="file_manage_settings[]"  value="search" class="rounded-full text-blue-500 focus:ring-blue-500 focus:ring-2 ml-2">
              </label>
            </li>
            <li class="inline-flex items-center p-2 bg-gray-300 rounded-md">
              <label for="download" class="text-gray-600 flex items-center">
                <span>Download</span>
                <input type="checkbox" id="download" name="file_manage_settings[]" value="download" class="rounded-full text-blue-500 focus:ring-blue-500 focus:ring-2 ml-2">
              </label>
            </li>
            <li class="inline-flex items-center p-2 bg-gray-300 rounded-md">
              <label for="new-file" class="text-gray-600 flex items-center">
                <span>New file (folder)</span>
                <input type="checkbox" id="new-file"  name="file_manage_settings[]" value="new-file" class="rounded-full text-blue-500 focus:ring-blue-500 focus:ring-2 ml-2">
              </label>
            </li>
            <li class="inline-flex items-center p-2 bg-gray-300 rounded-md">
              <label for="upload" class="text-gray-600 flex items-center">
                <span>Upload</span>
                <input type="checkbox" id="upload" name="file_manage_settings[]" value="upload" class="rounded-full text-blue-500 focus:ring-blue-500 focus:ring-2 ml-2">
              </label>
            </li>
            <li class="inline-flex items-center p-2 bg-gray-300 rounded-md">
              <label for="share" class="text-gray-600 flex items-center">
                <span>Share</span>
                <input type="checkbox" id="share" name="file_manage_settings[]" value="share" class="rounded-full text-blue-500 focus:ring-blue-500 focus:ring-2 ml-2">
              </label>
            </li>
            <li class="inline-flex items-center p-2 bg-gray-300 rounded-md">
              <label for="edit" class="text-gray-600 flex items-center">
                <span>Edit</span>
                <input type="checkbox" id="edit" name="file_manage_settings[]" value="edit" class="rounded-full text-blue-500 focus:ring-blue-500 focus:ring-2 ml-2">
              </label>
            </li>
            <li class="inline-flex items-center p-2 bg-gray-300 rounded-md">
              <label for="delete" class="text-gray-600 flex items-center">
                <span>Delete</span>
                <input type="checkbox" id="delete" name="file_manage_settings[]" value="delete" class="rounded-full text-blue-500 focus:ring-blue-500 focus:ring-2 ml-2">
              </label>
            </li>
          </ul>
        </div>

    <div class="mb-5">
        <!-- User Section -->
          <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">User</label>
          <ul class="bg-gray-200 p-4 rounded-lg flex flex-wrap gap-4">
            <li class="inline-flex items-center p-2 bg-gray-300 rounded-md">
              <label for="move" class="text-gray-600 flex items-center">
                <span>Move (copy/cut/paste/drag operation)</span>
                <input type="checkbox" id="move" name="user_settings[]" value="move" class="rounded-full text-blue-500 focus:ring-blue-500 focus:ring-2 ml-2">
              </label>
            </li>
            <li class="inline-flex items-center p-2 bg-gray-300 rounded-md">
              <label for="remote-download" class="text-gray-600 flex items-center">
                <span>Remote download</span>
                <input type="checkbox" id="remote-download" name="user_settings[]" value="remote-download" class="rounded-full text-blue-500 focus:ring-blue-500 focus:ring-2 ml-2">
              </label>
            </li>
            <li class="inline-flex items-center p-2 bg-gray-300 rounded-md">
              <label for="decompression" class="text-gray-600 flex items-center">
                <span>Decompression</span>
                <input type="checkbox" id="decompression"  name="user_settings[]" value="decompression" class="rounded-full text-blue-500 focus:ring-blue-500 focus:ring-2 ml-2">
              </label>
            </li>
            <li class="inline-flex items-center p-2 bg-gray-300 rounded-md">
              <label for="compression" class="text-gray-600 flex items-center">
                <span>Compression</span>
                <input type="checkbox" id="compression" name="user_settings[]" value="compression" class="rounded-full text-blue-500 focus:ring-blue-500 focus:ring-2 ml-2">
              </label>
            </li>
            <li class="inline-flex items-center p-2 bg-gray-300 rounded-md">
              <label for="config-modification" class="text-gray-600 flex items-center">
                <span>Configuration modification (set avatar/change password, etc.)</span>
                <input type="checkbox" id="config-modification" name="user_settings[]" value="config-modification" class="rounded-full text-blue-500 focus:ring-blue-500 focus:ring-2 ml-2">
              </label>
            </li>
            <li class="inline-flex items-center p-2 bg-gray-300 rounded-md">
              <label for="starred-operation" class="text-gray-600 flex items-center">
                <span>Starred operation</span>
                <input type="checkbox" id="starred-operation" name="user_settings[]" value="starred-operation" class="rounded-full text-blue-500 focus:ring-blue-500 focus:ring-2 ml-2">
              </label>
            </li>
          </ul>
      </div>
  
                      
                    
                      
                      <button type="submit" class="p-3 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Save</button>
                </form>
            </div>
            <!-- Modal footer -->
            <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
            </div>
        </div>
    </div>
</div>

<!-- Edit modal -->
        <div id="role-edit-div">
            
        </div>
<!-- End Edit modal -->

@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
<script src="{{ asset($constants['JSFILEPATH'].'setting.js') }}"></script>

<script>

    // Initial population of the table
            populateTable();

    function toggleDropdown(id) {
        var dropdownOptions = document.getElementById(id);
        var allDropdowns = document.querySelectorAll('.dropdown-options');

        allDropdowns.forEach(function(dropdown) {
            if (dropdown.id !== id) {
                dropdown.style.display = 'none';
            }
        });

        if (dropdownOptions.style.display === 'none') {
            dropdownOptions.style.display = 'block';
        } else {
            dropdownOptions.style.display = 'none';
        }

        // Toggle active class on button
        var dropdownButton = document.getElementById(id.replace('dropdownOptions-', 'dropdownButton-'));
        var allDropdownButtons = document.querySelectorAll('.dropdown-toggle');

        allDropdownButtons.forEach(function(button) {
            if (button.id !== dropdownButton.id) {
                button.classList.remove('dropdown-button-active');
            }
        });

        dropdownButton.classList.toggle('dropdown-button-active');
    }

    function setActive(elementId) {
        // Remove active class from all dropdown items
        var dropdownItems = document.getElementsByClassName('dropdown-item');
        for (var i = 0; i < dropdownItems.length; i++) {
            dropdownItems[i].classList.remove('dropdown-item-active');
        }

        // Add active class to the clicked dropdown item
        var clickedItem = document.getElementById(elementId);
        clickedItem.classList.add('dropdown-item-active');
    }
     // Data for the table (example)
     // const tableData = [
     //            { nickname: "Vicky", role: "Administrator", spaceUsage: "1.1MB/Unlimited", group: "Group" },
     //            { nickname: "Administrator", role: "Administrator", spaceUsage: "1.1KB/2GB", group: "Group" },
     //            { nickname: "Vighnesh", role: "User", spaceUsage: "1.1KB/4GB", group: "Developer" }
     //        ];
        const tableData = @php echo $roles @endphp;  
        
            // Function to populate the table with data
            function populateTable(data) {
                const searchTerm = '';
                const listroute = @json(route('role-list'));
                $.ajax({
                            url: listroute,
                            method: 'GET',
                            data: { searchTerm:searchTerm },
                            success: function (response) {
                                // Update the app list container with the updated list
                                $('#searchableTableBody').html(response);
                            },
                            error: function (xhr, status, error) {
                                console.error(xhr.responseText);
                            }
                        });
            }
        
        
            // Search functionality
            const searchInput = document.getElementById('searchInput');
            const tableBody = document.getElementById('searchableTableBody');
            searchInput.addEventListener('input', function () {
                const searchTerm = searchInput.value.toLowerCase();
                const filteredData = tableData.filter(row =>
                    row.name.toLowerCase().includes(searchTerm) ||
                    row.description.toLowerCase().includes(searchTerm)
                );
                populateTable(filteredData);
            });
        </script>

@endsection
