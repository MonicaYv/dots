
@foreach($roles as $role)
<tr>
        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300">{{$role->name}}</td>
        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300">{{$role->upload_limit}}</td>
        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300">{{$role->description}}</td>
        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300">
        <a href="#" data-id="{{$role->id}}" class="editRoles">Edit</a> &nbsp;
        <a href="{{ route('role-delete',['id' => $role->id]) }}">Delete</a>
        </td>
</tr>
@endforeach
<script>
     //edit popup
                    const editroute = @json(route('role-edit'));

                     $('table td a.editRoles').on('click', function (e) {
                       e.preventDefault();
                       
                    id = $(this).attr("data-id");
                    $.ajax({
                            url: editroute,
                            method: 'GET',
                            data: {id:id},
                            success: function (response) {
                                // Update the app list container with the updated list
                                $('#role-edit-div').html(response);
                                $('.role-edit-modal').removeClass('hidden');
                            },
                            error: function (xhr, status, error) {
                                console.error(xhr.responseText);
                            }
                        });
                     
                    });
</script>