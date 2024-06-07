
@foreach($permissions as $permission)
<tr>
        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300">{{$permission->name}}</td>
        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300">{{$permission->permissions}}</td>
        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300">
        <a href="#" data-id="{{$permission->id}}" class="editUserpermission">Edit</a> &nbsp;
        <a href="{{ route('permission-delete',['id' => $permission->id]) }}">Delete</a>
        </td>
</tr>
@endforeach
<script>
     //edit popup
                    const editroute = @json(route('permission-edit'));

                     $('table td a.editUserpermission').on('click', function (e) {
                       e.preventDefault();
                       
                    id = $(this).attr("data-id");
                    $.ajax({
                            url: editroute,
                            method: 'GET',
                            data: {id:id},
                            success: function (response) {
                                // Update the app list container with the updated list
                                $('#permission-edit-div').html(response);
                                $('.permission-edit-modal').removeClass('hidden');
                            },
                            error: function (xhr, status, error) {
                                console.error(xhr.responseText);
                            }
                        });
                     
                    });
</script>