         
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
                                    India
                                </td>
                            </tr>
                            @endforeach