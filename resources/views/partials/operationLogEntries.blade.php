 @foreach($log as $logs)
             
             
                                    
                            <tr class=" bg-white border-b dark:bg-gray-800 dark:border-gray-700">

                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">

                                    <span class="bg-gray-400 rounded-full px-2"></span> {{ $logs->user->name }}
                                </th>
                                <td class="px-6 py-4">
                                   {{ $logs->created_at }}
                                </td>
                                                           
                                <td class="px-6 py-4 flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 18 18" fill="none">
                                      <g clip-path="url(#clip0_527_173)">
                                        <path />
                                      </g>
                                      <defs>
                                        <clipPath id="clip0_527_173">
                                          <rect width="18" height="18" fill="white"/>
                                        </clipPath>
                                      </defs>
                                    </svg>
                               {{ $logs->new_values }}
                                  </td>
                                <td class="px-6 py-4">
                                     {{ $logs->event }}

                                </td>
                                <td class="px-6 py-4">
                                     
                                    India
                                </td>
                            </tr>
                            @endforeach
                            