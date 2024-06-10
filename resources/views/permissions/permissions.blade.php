@extends('layouts.setting')
@section('title', 'Document-Permissions')
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
            <h2 class="text">Admin & Users > <span class="font-semibold">Document Permissions</span></h2>
        </div>
        <div class="flex items-center">
            <!-- Search icon -->
            <div class="flex items-center">
                <!-- Search input -->
                <input id="searchInput" type="text" placeholder="Search users, groups" class="border rounded-l-md p-2 focus:outline-none bg-gray-100" style="height: 40px;">
                <!-- File folder icon -->
                <span class="bg-gray-100 p-2 rounded-r-md cursor-pointer" style="height: 40px;">
                    <i class="fas fa-search"></i>
                </span>
            </div>
           <span class="ml-4 text-2xl mr-3">
              <a href="#" data-modal-target="permission-modal" data-modal-toggle="permission-modal"><i class="ri-add-circle-fill"></i></a>
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
                            <!-- <th class="px-6 py-3 border-b border-gray-300  text-left text-xs leading-4 font-medium text-gray-100 border-none tracking-wider">
                                <div class="flex items-center">
                                    <span>Space Usage</span>
                                    <span class="pb-1 pl-2">
                                        <i class="fas fa-sort-down"></i>
                                    </span>
                                </div>
                            </th> -->
                            <th class="px-6 py-3 border-b border-gray-300  text-left text-xs leading-4 font-medium text-gray-100 border-none tracking-wider">Permissions</th>
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
<div id="permission-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Add Document Permission
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="permission-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5 space-y-4">
                <form class="max-w-sm mx-auto" action="{{ route('permission-create') }}" method="POST">
                    @csrf
                      <div class="mb-5">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                        <input type="text" name="name" id="email" class="p-3 shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="Permission name" required />
                      </div>


        <div class="mb-5">        
        <!-- File Management Section -->
          <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Permissions</label>
          <ul class="bg-gray-200 p-4 rounded-lg flex flex-wrap gap-4">
            <li class="inline-flex items-center p-2 bg-gray-300 rounded-md">
              <label for="file-manage" class="text-gray-600 flex items-center">
                <span>Document List: File List: View</span>
                <input type="checkbox" id="file-manage" name="permissions[]" value="file-manage" class="rounded-full text-blue-500 focus:ring-blue-500 focus:ring-2 ml-2">
              </label>
            </li>
            <li class="inline-flex items-center p-2 bg-gray-300 rounded-md">
              <label for="preview" class="text-gray-600 flex items-center">
                <span>Preview</span>
                <input type="checkbox" id="preview" name="permissions[]"  value="preview" class="rounded-full text-blue-500 focus:ring-blue-500 focus:ring-2 ml-2">
              </label>
            </li>
            <li class="inline-flex items-center p-2 bg-gray-300 rounded-md">
              <label for="search" class="text-gray-600 flex items-center">
                <span>Search</span>
                <input type="checkbox" id="search" name="permissions[]"  value="search" class="rounded-full text-blue-500 focus:ring-blue-500 focus:ring-2 ml-2">
              </label>
            </li>
            <li class="inline-flex items-center p-2 bg-gray-300 rounded-md">
              <label for="download" class="text-gray-600 flex items-center">
                <span>Download</span>
                <input type="checkbox" id="download" name="permissions[]" value="download" class="rounded-full text-blue-500 focus:ring-blue-500 focus:ring-2 ml-2">
              </label>
            </li>
            <li class="inline-flex items-center p-2 bg-gray-300 rounded-md">
              <label for="new-file" class="text-gray-600 flex items-center">
                <span>New file (folder)</span>
                <input type="checkbox" id="new-file"  name="permissions[]" value="new-file" class="rounded-full text-blue-500 focus:ring-blue-500 focus:ring-2 ml-2">
              </label>
            </li>
            <li class="inline-flex items-center p-2 bg-gray-300 rounded-md">
              <label for="upload" class="text-gray-600 flex items-center">
                <span>Upload</span>
                <input type="checkbox" id="upload" name="permissions[]" value="upload" class="rounded-full text-blue-500 focus:ring-blue-500 focus:ring-2 ml-2">
              </label>
            </li>
            <li class="inline-flex items-center p-2 bg-gray-300 rounded-md">
              <label for="share" class="text-gray-600 flex items-center">
                <span>Share</span>
                <input type="checkbox" id="share" name="permissions[]" value="share" class="rounded-full text-blue-500 focus:ring-blue-500 focus:ring-2 ml-2">
              </label>
            </li>
            <li class="inline-flex items-center p-2 bg-gray-300 rounded-md">
              <label for="edit" class="text-gray-600 flex items-center">
                <span>Edit</span>
                <input type="checkbox" id="edit" name="permissions[]" value="edit" class="rounded-full text-blue-500 focus:ring-blue-500 focus:ring-2 ml-2">
              </label>
            </li>
            <li class="inline-flex items-center p-2 bg-gray-300 rounded-md">
              <label for="delete" class="text-gray-600 flex items-center">
                <span>Delete</span>
                <input type="checkbox" id="delete" name="permissions[]" value="delete" class="rounded-full text-blue-500 focus:ring-blue-500 focus:ring-2 ml-2">
              </label>
            </li>
            <li class="inline-flex items-center p-2 bg-gray-300 rounded-md">
              <label for="edit" class="text-gray-600 flex items-center">
                <span>Comments:View document comments; add/delete your own comments (editing permission required):</span>
                <input type="checkbox" id="comments" name="permissions[]" value="comments" class="rounded-full text-blue-500 focus:ring-blue-500 focus:ring-2 ml-2">
              </label>
            </li>
            <li class="inline-flex items-center p-2 bg-gray-300 rounded-md">
              <label for="edit" class="text-gray-600 flex items-center">
                <span>Dynamics:Document dynamic viewing, subscription dynamic:</span>
                <input type="checkbox" id="dynamic" name="permissions[]" value="dynamic" class="rounded-full text-blue-500 focus:ring-blue-500 focus:ring-2 ml-2">
              </label>
            </li>
             <li class="inline-flex items-center p-2 bg-gray-300 rounded-md">
              <label for="edit" class="text-gray-600 flex items-center">
                <span>Administration:Set member permissions / comment / history version management:</span>
                <input type="checkbox" id="admin" name="permissions[]" value="admin" class="rounded-full text-blue-500 focus:ring-blue-500 focus:ring-2 ml-2">
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
        <div id="permission-edit-div">
            
        </div>
<!-- End Edit modal -->


@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
<script src="{{ asset($constants['JSFILEPATH'].'setting.js') }}"></script>
<script>

 $(document).ready(function(){     
 // Initial population of the table
    populateTable();
    

    // $('table td a.editUserpermission').on('click',function(e){

    //     e.preventDefault();
    //     alert('working');

    // });
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
        
            // Function to populate the table with data
            function populateTable(data) {
                const searchTerm = '';
                const listroute = @json(route('permission-list'));
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
            searchInput.addEventListener('input', function () {
                const searchTerm = searchInput.value.toLowerCase();
                const filteredData = tableData.filter(row =>
                    row.name.toLowerCase().includes(searchTerm) ||
                    row.permissions.toLowerCase().includes(searchTerm) 
                );
                populateTable(filteredData);
            });

});
        </script>

@endsection
