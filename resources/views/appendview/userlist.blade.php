
@foreach($users as $user)
<tr>
        <td class="editUsers px-6 py-4 whitespace-no-wrap border-b border-gray-300" data-id="{{$user->id}}">{{$user->name}}</td>
        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300">{{$user->roles->name}}</td>
        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300">{{$user->sizeMax}}</td>
         <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300">{{$user->group->name}}</td>
</tr>
@endforeach
<script>
     //edit popup
                    const editroute = @json(route('user-edit'));

                     $('table tr td.editUsers').on('click', function (e) {
                       e.preventDefault();
                       
                    id = $(this).attr("data-id");
                    $.ajax({
                            url: editroute,
                            method: 'GET',
                            data: {id:id},
                            success: function (response) {
                                // Update the app list container with the updated list
                                $('#user-edit-div').html(response);
                                $('.user-edit-modal').removeClass('hidden');
                            },
                            error: function (xhr, status, error) {
                                console.error(xhr.responseText);
                            }
                        });
                     
                    });
</script>