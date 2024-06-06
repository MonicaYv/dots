<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users and Groups</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- Include Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
</head>

<style>
    .dropdown-options {
            display: none;
        }

    .dropdown-options-custom-width{
        max-width: 250px;
        width: 220px;
    }
     
    /* Style for Input range scroll */
    input[type=range] {
            -webkit-appearance: none;
            width: 40%;
            background: transparent;
        }
        input[type=range]::-webkit-slider-runnable-track {
            width: 10%;
            height: 8px;
            cursor: pointer;
            animate: 0.2s;
            box-shadow: 1px 1px 1px #8c8989;
            background: linear-gradient(to right, #fbbf24 20%, #d1d5db 20%); /* 20% yellow, 80% gray */
            border-radius: 5px;
            
        }
        input[type=range]::-webkit-slider-thumb {   
            display: none;
        }
       /* Custom styles for active dropdown items */
        .dropdown-item-active {
            background-color: #fbbf24; /* Yellow */
            outline-offset: -2px;
            border-radius: 8px;
        }
       /* Custom style for active dropdown button */
       .dropdown-button-active {
            outline: 2px solid #fbbf24; /* Yellow */
            outline-offset: -2px;
        }

</style>

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
                <i class="fas fa-plus-circle"></i>
            </span>
            <span class="ml-2 text-2xl">
                <i class="fas fa-folder"></i>
            </span>
        </div>
    </div>
    
        <div class="users-admin-btn-grp pl-8 flex items-center relative justify-between">
            
            <div class="flex items-center">
            <!-- Dropdown 1 -->
            
            <div class="relative">
                <button onclick="toggleDropdown('dropdownOptions-1')" class="flex items-center focus:border-yellow-500 dropdown-toggle border border-gray-300 rounded px-4 py-1 mr-2">
                        <span class="">Group 1</span>
                        <span class="pb-1 pl-2">
                            <i class="fas fa-sort-down"></i>
                        </span>
                </button>
                <div id="dropdownOptions-1" class="dropdown-options absolute top-0 left-0 mt-10 bg-white border border-gray-300 rounded shadow-md dropdown-options-custom-width">
                    <div class="p-2 dropdown-options-custom-width">
                        <a href="#" class="block py-1">Edit</a>
                        <a href="#" class="block py-1">Set space size batches</a>
                        <a href="#" class="block py-1"></a>Add sub-group</a>
                        <a href="#" class="block py-1"></a>New user</a>
                    </div>
                </div>
            </div>
    
            <!-- Dropdown 2 -->
            <div class="relative">
                <button onclick="toggleDropdown('dropdownOptions-2')" class="flex items-center dropdown-toggle focus:border-yellow-500 border border-gray-300 rounded px-4 py-1 mr-2">
                        <span class="">New User</span>
                        <span class="pb-1 pl-2">
                            <i class="fas fa-sort-down"></i>
                        </span>
                </button>
                <div id="dropdownOptions-2" class="dropdown-options absolute top-0 left-0 mt-10 bg-white border border-gray-300 rounded shadow-md">
                    <div class="p-1 px-5">
                        <a href="#" class="block">Add in bulk</a>
                    </div>
                </div>
            </div>
    
            <!-- Dropdown 3 -->
            <div class="relative">
                <button  onclick="toggleDropdown('dropdownOptions-3')" class="flex items-center focus:border-yellow-500 dropdown-toggle border border-gray-300 rounded px-4 py-1 mr-2">
                        <span class="">Bulk Operations</span>
                        <span class="pb-1 pl-2">
                            <i class="fas fa-sort-down"></i>
                        </span>
                </button>
                <div id="dropdownOptions-3" class="dropdown-options absolute top-0 left-0 mt-10 bg-white border border-gray-300 rounded shadow-md dropdown-options-custom-width">
                 <div class="p-2">
                        <a href="#" id="userRoleSetting" class="block py-1 px-2 dropdown-item" onclick="setActive('userRoleSetting')">User role setting</a>
                        <a href="#" id="spaceSizeSetting" class="block py-1 px-2 dropdown-item" onclick="setActive('spaceSizeSetting')">Space size setting</a>
                        <a href="#" id="removeFromGroup" class="block py-1 px-2 dropdown-item" onclick="setActive('removeFromGroup')">Remove from group</a>
                        <a href="#" id="addToGroup" class="block py-1 px-2 dropdown-item" onclick="setActive('addToGroup')">Add to group</a>
                        <a href="#" id="migrateToDepartment" class="block py-1 px-2 dropdown-item" onclick="setActive('migrateToDepartment')">Migrate to department</a>
                   </div>
                </div>
            </div>
    
            <!-- Disabled Button 1 -->
            <button class="disabled-btn bg-gray-300 text-gray-600 px-4 py-2 rounded mr-2" disabled>Button 1</button>
    
            <!-- Disabled Button 2 -->
            <button class="disabled-btn bg-gray-300 text-gray-600 px-4 py-2 rounded mr-2" disabled>Button 2</button>
            
            <!-- Disabled Button 3 -->
            <button class="disabled-btn bg-gray-300 text-gray-600 px-4 py-2 rounded" disabled>Button 3</button>
        </div>
            <div>
                <p class="text-sm mr-6">ID: 1 Dep: 1</p>
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

<script>
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
                const tableBody = document.getElementById('searchableTableBody');
                tableBody.innerHTML = ''; // Clear previous data
        
                data.forEach(row => {
                    const newRow = document.createElement('tr');
                    newRow.innerHTML = `
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300">${row.name}</td>
                         <td class="py-4 whitespace-no-wrap border-b border-gray-300">
                            <input type="range" class="w-full" min="0" max="500" value="${row.upload_limit}">
                            <span class="block text-sm">${row.upload_limit}</span>
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300">${row.description}</td>
                    `;
                    tableBody.appendChild(newRow);
                });
            }
        
            // Initial population of the table
            populateTable(tableData);
        
            // Search functionality
            const searchInput = document.getElementById('searchInput');
            searchInput.addEventListener('input', function () {
                const searchTerm = searchInput.value.toLowerCase();
                const filteredData = tableData.filter(row =>
                    row.nickname.toLowerCase().includes(searchTerm) ||
                    row.role.toLowerCase().includes(searchTerm) ||
                    row.group.toLowerCase().includes(searchTerm)
                );
                populateTable(filteredData);
            });
        </script>

</body>

</html>
