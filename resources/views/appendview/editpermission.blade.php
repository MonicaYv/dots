<div tabindex="-1" aria-hidden="true" class="permission-edit-modal hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full ml-56">
<div class="relative p-4 w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Edit Document Permission
                </h3>
                <button type="button" class="permission-edit-close text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="permission-edit-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5 space-y-4">
                <form class="max-w-sm mx-auto" action="{{ route('permission-update',['id' => $permission->id]) }}" method="POST">
                    @csrf
                      <div class="mb-5">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                        <input type="text" name="name" id="email"  class="p-3 shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="Permission name" required value="{{ $permission->name }}" />
                      </div>


        <div class="mb-5">        
        <!-- File Management Section -->
          <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Permissions</label>
          <ul class="bg-gray-200 p-4 rounded-lg flex flex-wrap gap-4">
            <li class="inline-flex items-center p-2 bg-gray-300 rounded-md">
              <label for="file-manage" class="text-gray-600 flex items-center">
                <span>Document List: File List: View</span>
                <input type="checkbox" id="file-manage" name="permissions[]" value="file-manage" class="rounded-full text-blue-500 focus:ring-blue-500 focus:ring-2 ml-2"  @php echo in_array('file-manage', $permission->permissions) ? 'checked' : ''  @endphp>
              </label>
            </li>
            <li class="inline-flex items-center p-2 bg-gray-300 rounded-md">
              <label for="preview" class="text-gray-600 flex items-center">
                <span>Preview</span>
                <input type="checkbox" id="preview" name="permissions[]"  value="preview" class="rounded-full text-blue-500 focus:ring-blue-500 focus:ring-2 ml-2" @php echo in_array('preview', $permission->permissions) ? 'checked' : ''  @endphp>
              </label>
            </li>
            <li class="inline-flex items-center p-2 bg-gray-300 rounded-md">
              <label for="search" class="text-gray-600 flex items-center">
                <span>Search</span>
                <input type="checkbox" id="search" name="permissions[]"  value="search" class="rounded-full text-blue-500 focus:ring-blue-500 focus:ring-2 ml-2"  @php echo in_array('search', $permission->permissions) ? 'checked' : ''  @endphp>
              </label>
            </li>
            <li class="inline-flex items-center p-2 bg-gray-300 rounded-md">
              <label for="download" class="text-gray-600 flex items-center">
                <span>Download</span>
                <input type="checkbox" id="download" name="permissions[]" value="download" class="rounded-full text-blue-500 focus:ring-blue-500 focus:ring-2 ml-2"  @php echo in_array('download', $permission->permissions) ? 'checked' : ''  @endphp >
              </label>
            </li>
            <li class="inline-flex items-center p-2 bg-gray-300 rounded-md">
              <label for="new-file" class="text-gray-600 flex items-center">
                <span>New file (folder)</span>
                <input type="checkbox" id="new-file"  name="permissions[]" value="new-file" class="rounded-full text-blue-500 focus:ring-blue-500 focus:ring-2 ml-2" @php echo in_array('new-file', $permission->permissions) ? 'checked' : ''  @endphp>
              </label>
            </li>
            <li class="inline-flex items-center p-2 bg-gray-300 rounded-md">
              <label for="upload" class="text-gray-600 flex items-center">
                <span>Upload</span>
                <input type="checkbox" id="upload" name="permissions[]" value="upload" class="rounded-full text-blue-500 focus:ring-blue-500 focus:ring-2 ml-2" @php echo in_array('upload', $permission->permissions) ? 'checked' : ''  @endphp>
              </label>
            </li>
            <li class="inline-flex items-center p-2 bg-gray-300 rounded-md">
              <label for="share" class="text-gray-600 flex items-center">
                <span>Share</span>
                <input type="checkbox" id="share" name="permissions[]" value="share" class="rounded-full text-blue-500 focus:ring-blue-500 focus:ring-2 ml-2" @php echo in_array('share', $permission->permissions) ? 'checked' : ''  @endphp>
              </label>
            </li>
            <li class="inline-flex items-center p-2 bg-gray-300 rounded-md">
              <label for="edit" class="text-gray-600 flex items-center">
                <span>Edit</span>
                <input type="checkbox" id="edit" name="permissions[]" value="edit" class="rounded-full text-blue-500 focus:ring-blue-500 focus:ring-2 ml-2" @php echo in_array('edit', $permission->permissions) ? 'checked' : ''  @endphp>
              </label>
            </li>
            <li class="inline-flex items-center p-2 bg-gray-300 rounded-md">
              <label for="delete" class="text-gray-600 flex items-center">
                <span>Delete</span>
                <input type="checkbox" id="delete" name="permissions[]" value="delete" class="rounded-full text-blue-500 focus:ring-blue-500 focus:ring-2 ml-2" @php echo in_array('delete', $permission->permissions) ? 'checked' : ''  @endphp>
              </label>
            </li>
            <li class="inline-flex items-center p-2 bg-gray-300 rounded-md">
              <label for="edit" class="text-gray-600 flex items-center">
                <span>Comments:View document comments; add/delete your own comments (editing permission required):</span>
                <input type="checkbox" id="comments" name="permissions[]" value="comments" class="rounded-full text-blue-500 focus:ring-blue-500 focus:ring-2 ml-2" @php echo in_array('comments', $permission->permissions) ? 'checked' : ''  @endphp >
              </label>
            </li>
            <li class="inline-flex items-center p-2 bg-gray-300 rounded-md">
              <label for="edit" class="text-gray-600 flex items-center">
                <span>Dynamics:Document dynamic viewing, subscription dynamic:</span>
                <input type="checkbox" id="dynamic" name="permissions[]" value="dynamic" class="rounded-full text-blue-500 focus:ring-blue-500 focus:ring-2 ml-2" @php echo in_array('dynamic', $permission->permissions) ? 'checked' : ''  @endphp >
              </label>
            </li>
             <li class="inline-flex items-center p-2 bg-gray-300 rounded-md">
              <label for="edit" class="text-gray-600 flex items-center">
                <span>Administration:Set member permissions / comment / history version management:</span>
                <input type="checkbox" id="admin" name="permissions[]" value="admin" class="rounded-full text-blue-500 focus:ring-blue-500 focus:ring-2 ml-2" @php echo in_array('admin', $permission->permissions) ? 'checked' : ''  @endphp >
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
  
  $('.permission-edit-close').on('click', function (e) {
          $('.permission-edit-modal').hide();
    });
</script>