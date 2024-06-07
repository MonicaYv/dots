<div  tabindex="-1" aria-hidden="true" class="role-edit-modal hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full ml-56">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Add Role
                </h3>
                <button type="button" class="roles-edit-close text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="role-edit-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5 space-y-4">
                <form class="max-w-sm mx-auto" action="{{ route('role-update',['id' => $role->id]) }}" method="POST">
                    @csrf
                      <div class="mb-5">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                        <input type="text" name="name" id="email" class="p-3 shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="role name" required  value="{{ $role->name }}" />
                      </div>
                      <div class="mb-5">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Upload Limit (GB):</label>
                        <input type="text"  name="upload_limit" id="email" class="p-3 shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="In GB" required value="{{ $role->upload_limit }}" />
                      </div>
                      
                       <div class="mb-5">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                        <input type="text" name="description" id="email" class="p-3 shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="Role Description" required  value="{{ $role->description }}"  />
                      </div>


        <div class="mb-5">        
        <!-- File Management Section -->
          <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">File Management</label>
          <ul class="bg-gray-200 p-4 rounded-lg flex flex-wrap gap-4">
            <li class="inline-flex items-center p-2 bg-gray-300 rounded-md">
              <label for="file-manage" class="text-gray-600 flex items-center">
                <span>File manage</span>
                <input type="checkbox" id="file-manage" name="file_manage_settings[]" value="file-manage" class="rounded-full text-blue-500 focus:ring-blue-500 focus:ring-2 ml-2" @php echo in_array('file-manage', $role->file_manage_settings) ? 'checked' : ''  @endphp>
              </label>
            </li>
            <li class="inline-flex items-center p-2 bg-gray-300 rounded-md">
              <label for="preview" class="text-gray-600 flex items-center">
                <span>Preview</span>
                <input type="checkbox" id="preview" name="file_manage_settings[]"  value="preview" class="rounded-full text-blue-500 focus:ring-blue-500 focus:ring-2 ml-2" @php echo in_array('preview', $role->file_manage_settings) ? 'checked' : ''  @endphp >
              </label>
            </li>
            <li class="inline-flex items-center p-2 bg-gray-300 rounded-md">
              <label for="search" class="text-gray-600 flex items-center">
                <span>Search</span>
                <input type="checkbox" id="search" name="file_manage_settings[]"  value="search" class="rounded-full text-blue-500 focus:ring-blue-500 focus:ring-2 ml-2" @php echo in_array('search', $role->file_manage_settings) ? 'checked' : ''  @endphp>
              </label>
            </li>
            <li class="inline-flex items-center p-2 bg-gray-300 rounded-md">
              <label for="download" class="text-gray-600 flex items-center">
                <span>Download</span>
                <input type="checkbox" id="download" name="file_manage_settings[]" value="download" class="rounded-full text-blue-500 focus:ring-blue-500 focus:ring-2 ml-2" @php echo in_array('download', $role->file_manage_settings) ? 'checked' : ''  @endphp >
              </label>
            </li>
            <li class="inline-flex items-center p-2 bg-gray-300 rounded-md">
              <label for="new-file" class="text-gray-600 flex items-center">
                <span>New file (folder)</span>
                <input type="checkbox" id="new-file"  name="file_manage_settings[]" value="new-file" class="rounded-full text-blue-500 focus:ring-blue-500 focus:ring-2 ml-2" @php echo in_array('new-file', $role->file_manage_settings) ? 'checked' : ''  @endphp >
              </label>
            </li>
            <li class="inline-flex items-center p-2 bg-gray-300 rounded-md">
              <label for="upload" class="text-gray-600 flex items-center">
                <span>Upload</span>
                <input type="checkbox" id="upload" name="file_manage_settings[]" value="upload" class="rounded-full text-blue-500 focus:ring-blue-500 focus:ring-2 ml-2" @php echo in_array('upload', $role->file_manage_settings) ? 'checked' : ''  @endphp >
              </label>
            </li>
            <li class="inline-flex items-center p-2 bg-gray-300 rounded-md">
              <label for="share" class="text-gray-600 flex items-center">
                <span>Share</span>
                <input type="checkbox" id="share" name="file_manage_settings[]" value="share" class="rounded-full text-blue-500 focus:ring-blue-500 focus:ring-2 ml-2" @php echo in_array('share', $role->file_manage_settings) ? 'checked' : ''  @endphp >
              </label>
            </li>
            <li class="inline-flex items-center p-2 bg-gray-300 rounded-md">
              <label for="edit" class="text-gray-600 flex items-center">
                <span>Edit</span>
                <input type="checkbox" id="edit" name="file_manage_settings[]" value="edit" class="rounded-full text-blue-500 focus:ring-blue-500 focus:ring-2 ml-2" @php echo in_array('edit', $role->file_manage_settings) ? 'checked' : ''  @endphp >
              </label>
            </li>
            <li class="inline-flex items-center p-2 bg-gray-300 rounded-md">
              <label for="delete" class="text-gray-600 flex items-center">
                <span>Delete</span>
                <input type="checkbox" id="delete" name="file_manage_settings[]" value="delete" class="rounded-full text-blue-500 focus:ring-blue-500 focus:ring-2 ml-2" @php echo in_array('delete', $role->file_manage_settings) ? 'checked' : ''  @endphp >
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
                <input type="checkbox" id="move" name="user_settings[]" value="move" class="rounded-full text-blue-500 focus:ring-blue-500 focus:ring-2 ml-2" @php echo in_array('move', $role->user_settings) ? 'checked' : ''  @endphp >
              </label>
            </li>
            <li class="inline-flex items-center p-2 bg-gray-300 rounded-md">
              <label for="remote-download" class="text-gray-600 flex items-center">
                <span>Remote download</span>
                <input type="checkbox" id="remote-download" name="user_settings[]" value="remote-download" class="rounded-full text-blue-500 focus:ring-blue-500 focus:ring-2 ml-2" @php echo in_array('remote-download', $role->user_settings) ? 'checked' : ''  @endphp >
              </label>
            </li>
            <li class="inline-flex items-center p-2 bg-gray-300 rounded-md">
              <label for="decompression" class="text-gray-600 flex items-center">
                <span>Decompression</span>
                <input type="checkbox" id="decompression"  name="user_settings[]" value="decompression" class="rounded-full text-blue-500 focus:ring-blue-500 focus:ring-2 ml-2" @php echo in_array('decompression', $role->user_settings) ? 'checked' : ''  @endphp >
              </label>
            </li>
            <li class="inline-flex items-center p-2 bg-gray-300 rounded-md">
              <label for="compression" class="text-gray-600 flex items-center">
                <span>Compression</span>
                <input type="checkbox" id="compression" name="user_settings[]" value="compression" class="rounded-full text-blue-500 focus:ring-blue-500 focus:ring-2 ml-2" @php echo in_array('compression', $role->user_settings) ? 'checked' : ''  @endphp >
              </label>
            </li>
            <li class="inline-flex items-center p-2 bg-gray-300 rounded-md">
              <label for="config-modification" class="text-gray-600 flex items-center">
                <span>Configuration modification (set avatar/change password, etc.)</span>
                <input type="checkbox" id="config-modification" name="user_settings[]" value="config_modify" class="rounded-full text-blue-500 focus:ring-blue-500 focus:ring-2 ml-2" @php echo in_array('config_modify', $role->user_settings) ? 'checked' : ''  @endphp >
              </label>
            </li>
            <li class="inline-flex items-center p-2 bg-gray-300 rounded-md">
              <label for="starred-operation" class="text-gray-600 flex items-center">
                <span>Starred operation</span>
                <input type="checkbox" id="starred-operation" name="user_settings[]" value="operation" class="rounded-full text-blue-500 focus:ring-blue-500 focus:ring-2 ml-2" @php echo in_array('operation', $role->user_settings) ? 'checked' : ''  @endphp >
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

<script>
  
  $('.roles-edit-close').on('click', function (e) {
          $('.role-edit-modal').hide();
    });
</script>