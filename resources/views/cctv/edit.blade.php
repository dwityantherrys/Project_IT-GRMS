<x-app-layout>


    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h2 class="text-2xl font-semibold text-gray-900 dark:text-gray-100 text-center">Edit CCTV Data</h2>
                    <form method="POST" action="{{ route('cctvs.update', $cctv->fc_id) }}" class="mt-8">
                        @csrf
                        @method('PATCH')

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Column 1 -->
                            <div class="space-y-4">
                                <div class="mb-4">
                                    <label for="fc_id_cctv"
                                        class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                        ID CCTV
                                    </label>
                                    <input type="text" id="fc_id_cctv" name="fc_id_cctv"
                                        value="{{ old('fc_id_cctv', $cctv->fc_id_cctv) }}"
                                        class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100"
                                        placeholder="ID CCTV" />
                                    @error('fc_id_cctv')
                                    <span class="text-red-600 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label for="fv_divisi"
                                        class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                        Division
                                    </label>
                                    <input type="text" id="fv_divisi" name="fv_divisi"
                                        value="{{ old('fv_divisi', $cctv->fv_divisi) }}"
                                        class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100"
                                        placeholder="Division" />
                                    @error('fv_divisi')
                                    <span class="text-red-600 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label for="fv_sys_type"
                                        class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                        System Type
                                    </label>
                                    <input type="text" id="fv_sys_type" name="fv_sys_type"
                                        value="{{ old('fv_sys_type', $cctv->fv_sys_type) }}"
                                        class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100"
                                        placeholder="System Type" />
                                    @error('fv_sys_type')
                                    <span class="text-red-600 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label for="fv_principle"
                                        class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                        Principle
                                    </label>
                                    <input type="text" id="fv_principle" name="fv_principle"
                                        value="{{ old('fv_principle', $cctv->fv_principle) }}"
                                        class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100"
                                        placeholder="Principle" />
                                    @error('fv_principle')
                                    <span class="text-red-600 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label for="fv_branch_Name"
                                        class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                        Branch Name
                                    </label>
                                    <input type="text" id="fv_branch_Name" name="fv_branch_Name"
                                        value="{{ old('fv_branch_Name', $cctv->fv_branch_Name) }}"
                                        class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100"
                                        placeholder="Branch Name" />
                                    @error('fv_branch_Name')
                                    <span class="text-red-600 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label for="fv_anydesk"
                                        class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                        Anydesk
                                    </label>
                                    <input type="text" id="fv_anydesk" name="fv_anydesk"
                                        value="{{ old('fv_anydesk', $cctv->fv_anydesk) }}"
                                        class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100"
                                        placeholder="Anydesk" />
                                    @error('fv_anydesk')
                                    <span class="text-red-600 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label for="fv_teamviewer"
                                        class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                        TeamViewer
                                    </label>
                                    <input type="text" id="fv_teamviewer" name="fv_teamviewer"
                                        value="{{ old('fv_teamviewer', $cctv->fv_teamviewer) }}"
                                        class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100"
                                        placeholder="TeamViewer" />
                                    @error('fv_teamviewer')
                                    <span class="text-red-600 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label for="fv_link_add"
                                        class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                        Link Add
                                    </label>
                                    <input type="text" id="fv_link_add" name="fv_link_add"
                                        value="{{ old('fv_link_add', $cctv->fv_link_add) }}"
                                        class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100"
                                        placeholder="Link Add" />
                                    @error('fv_link_add')
                                    <span class="text-red-600 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label for="fv_link_temp"
                                        class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                        Link Temp
                                    </label>
                                    <input type="text" id="fv_link_temp" name="fv_link_temp"
                                        value="{{ old('fv_link_temp', $cctv->fv_link_temp) }}"
                                        class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100"
                                        placeholder="Link Temp" />
                                    @error('fv_link_temp')
                                    <span class="text-red-600 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label for="fc_serial"
                                        class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                        Serial
                                    </label>
                                    <input type="text" id="fc_serial" name="fc_serial"
                                        value="{{ old('fc_serial', $cctv->fc_serial) }}"
                                        class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100"
                                        placeholder="Serial" />
                                    @error('fc_serial')
                                    <span class="text-red-600 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label for="fv_status_hdd_ext"
                                        class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                        Status HDD Ext
                                    </label>
                                    <input type="text" id="fv_status_hdd_ext" name="fv_status_hdd_ext"
                                        value="{{ old('fv_status_hdd_ext', $cctv->fv_status_hdd_ext) }}"
                                        class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100"
                                        placeholder="Status HDD Ext" />
                                    @error('fv_status_hdd_ext')
                                    <span class="text-red-600 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>



                            </div>

                            <!-- Column 2 -->
                            <div class="space-y-4">


                                <div class="mb-4">
                                    <label for="fc_username"
                                        class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                        Username
                                    </label>
                                    <input type="text" id="fc_username" name="fc_username"
                                        value="{{ old('fc_username', $cctv->fc_username) }}"
                                        class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100"
                                        placeholder="Username" />
                                    @error('fc_username')
                                    <span class="text-red-600 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label for="fc_user"
                                        class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                        User ID
                                    </label>
                                    <input type="text" id="fc_user" name="fc_user"
                                        value="{{ old('fc_user', $cctv->fc_user) }}"
                                        class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100"
                                        placeholder="User ID" />
                                    @error('fc_user')
                                    <span class="text-red-600 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label for="fc_password"
                                        class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                        Password
                                    </label>
                                    <input type="text" id="fc_password" name="fc_password"
                                        value="{{ old('fc_password', $cctv->fc_password) }}"
                                        class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100"
                                        placeholder="Password" />
                                    @error('fc_password')
                                    <span class="text-red-600 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label for="fn_qty_cam"
                                        class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                        Jumlah Kamera
                                    </label>
                                    <input type="number" id="fn_qty_cam" name="fn_qty_cam"
                                        value="{{ old('fn_qty_cam', $cctv->fn_qty_cam) }}"
                                        class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100"
                                        placeholder="Jumlah Kamera" />
                                    @error('fn_qty_cam')
                                    <span class="text-red-600 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>


                                <div class="mb-4">
                                    <label for="fc_user_it"
                                        class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                        User IT
                                    </label>
                                    <input type="text" id="fc_user_it" name="fc_user_it"
                                        value="{{ old('fc_user_it', $cctv->fc_user_it) }}"
                                        class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100"
                                        placeholder="User IT" />
                                    @error('fc_user_it')
                                    <span class="text-red-600 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label for="fc_password_it"
                                        class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                        Password IT
                                    </label>
                                    <input type="text" id="fc_password_it" name="fc_password_it"
                                        value="{{ old('fc_password_it', $cctv->fc_password_it) }}"
                                        class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100"
                                        placeholder="Password IT" />
                                    @error('fc_password_it')
                                    <span class="text-red-600 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label for="fc_user_sysadm"
                                        class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                        User SysAdm
                                    </label>
                                    <input type="text" id="fc_user_sysadm" name="fc_user_sysadm"
                                        value="{{ old('fc_user_sysadm', $cctv->fc_user_sysadm) }}"
                                        class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100"
                                        placeholder="User SysAdm" />
                                    @error('fc_user_sysadm')
                                    <span class="text-red-600 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label for="fc_password_sysadm"
                                        class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                        Password SysAdm
                                    </label>
                                    <input type="text" id="fc_password_sysadm" name="fc_password_sysadm"
                                        value="{{ old('fc_password_sysadm', $cctv->fc_password_sysadm) }}"
                                        class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100"
                                        placeholder="Password SysAdm" />
                                    @error('fc_password_sysadm')
                                    <span class="text-red-600 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>


                                <!-- Jika Status Error maka muncul keterangan error, jika tidak maka tidak muncul  -->

                                <!-- Status Radio Buttons -->
                                <div class="mb-4">
                                    <label for="fc_status"
                                        class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                        Status
                                    </label>
                                    <div class="mt-2 space-y-2">
                                        <label class="inline-flex items-center">
                                            <input type="radio" name="fc_status" value="A"
                                                {{ old('fc_status', $cctv->fc_status) == 'A' ? 'checked' : '' }}
                                                class="form-radio h-4 w-4 text-blue-600 dark:text-blue-400"
                                                onchange="handleStatusChange()">
                                            <span class="ml-2 text-gray-700 dark:text-gray-300">Normal</span>
                                        </label>
                                        <label class="inline-flex items-center">
                                            <input type="radio" name="fc_status" value="E"
                                                {{ old('fc_status', $cctv->fc_status) == 'E' ? 'checked' : '' }}
                                                class="form-radio h-4 w-4 text-red-600 dark:text-red-400"
                                                onchange="handleStatusChange()">
                                            <span class="ml-2 text-gray-700 dark:text-gray-300">Error</span>
                                        </label>
                                        <label class="inline-flex items-center">
                                            <input type="radio" name="fc_status" value="C"
                                                {{ old('fc_status', $cctv->fc_status) == 'C' ? 'checked' : '' }}
                                                class="form-radio h-4 w-4 text-gray-600 dark:text-gray-400"
                                                onchange="handleStatusChange()">
                                            <span class="ml-2 text-gray-700 dark:text-gray-300">Closed</span>
                                        </label>
                                    </div>
                                    @error('fc_status')
                                    <span class="text-red-600 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>

                                <!-- Keterangan Error -->
                                <div class="mb-4" id="error-description" style="display: none;">
                                    <label for="fv_ket_error"
                                        class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                        Keterangan Tambahan
                                    </label>
                                    <input type="text" id="fv_ket_error" name="fv_ket_error"
                                        value="{{ old('fv_ket_error', $cctv->fv_ket_error) }}"
                                        class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-100"
                                        placeholder="Keterangan Tambahan" />
                                    @error('fv_ket_error')
                                    <span class="text-red-600 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="flex justify-end mt-6">
                            <button type="submit"
                                class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-blue-500 dark:hover:bg-blue-600 dark:focus:ring-blue-700">
                                Update
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <!-- Inline JavaScript and CSS -->
    <script>
    // document.addEventListener('contextmenu', function(event) {
    //     event.preventDefault();
    // });

    // document.addEventListener('keydown', function(event) {
    //     // Disable F12, Ctrl+Shift+I, Ctrl+U, Ctrl+Shift+J
    //     if (event.key === 'F12' ||
    //         (event.ctrlKey && event.shiftKey && event.key === 'I') ||
    //         (event.ctrlKey && event.key === 'U') ||
    //         (event.ctrlKey && event.shiftKey && event.key === 'J')) {
    //         event.preventDefault();
    //     }
    // });

    function handleStatusChange() {
        var status = document.querySelector('input[name="fc_status"]:checked').value;
        var errorDescription = document.getElementById('error-description');

        if (status === 'A' || status === 'E' || status === 'C') {
            errorDescription.style.display = 'block';
            // Optional: Add fade-in animation
            errorDescription.classList.add('fade-in');
        } else {
            errorDescription.style.display = 'none';
            // Clear the input value when status is not Error
            document.getElementById('fv_ket_error').value = '';
        }
    }

    // Initial call to set visibility based on current status
    document.addEventListener('DOMContentLoaded', function() {
        handleStatusChange();
    });
    </script>

    <!-- Inline CSS -->
    <style>
    /* Fade-in animation */
    .fade-in {
        animation: fadeIn 0.5s ease-in-out;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(-10px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    </style>

</x-app-layout>