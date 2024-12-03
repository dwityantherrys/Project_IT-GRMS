<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-100 leading-tight">
            {{ __('Add New CCTV Entry') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg bg-white dark:bg-gray-800">
                <div class="p-6">
                    <form method="POST" action="{{ route('cctvs.store') }}">
                        @csrf
                        <!-- Branch Section -->
                        <div class="text-center text-white font-bold text-xl mb-6">BRANCH</div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="mb-6 text-gray-900 dark:text-gray-100">
                                <label class="block">
                                    <span>ID</span>
                                    <input type="text" name="fc_id_cctv"
                                        class="block w-full mt-1 rounded-md text-gray-900 dark:text-gray-900"
                                        placeholder="ID" value="{{ old('fc_id_cctv') }}" />
                                </label>
                                @error('fc_id_cctv')
                                <div class="text-sm text-red-600">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-6 text-gray-900 dark:text-gray-100">
                                <label class="block">
                                    <span>Division</span>
                                    <input type="text" name="fv_divisi"
                                        class="block w-full mt-1 rounded-md text-gray-900 dark:text-gray-900"
                                        placeholder="Division" value="{{ old('fv_divisi') }}" />
                                </label>
                                @error('fv_divisi')
                                <div class="text-sm text-red-600">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-6 text-gray-900 dark:text-gray-100">
                                <label class="block">
                                    <span>System Type</span>
                                    <input type="text" name="fv_sys_type"
                                        class="block w-full mt-1 rounded-md text-gray-900 dark:text-gray-900"
                                        placeholder="System Type" value="{{ old('fv_sys_type') }}" />
                                </label>
                                @error('fv_sys_type')
                                <div class="text-sm text-red-600">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-6 text-gray-900 dark:text-gray-100">
                                <label class="block">
                                    <span>Principle</span>
                                    <input type="text" name="fv_principle"
                                        class="block w-full mt-1 rounded-md text-gray-900 dark:text-gray-900"
                                        placeholder="Principle Name" value="{{ old('fv_principle') }}" />
                                </label>
                                @error('fv_principle')
                                <div class="text-sm text-red-600">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-6 text-gray-900 dark:text-gray-100">
                                <label class="block">
                                    <span>Nama Cabang</span>
                                    <input type="text" name="fv_branch_Name"
                                        class="block w-full mt-1 rounded-md text-gray-900 dark:text-gray-900"
                                        placeholder="Nama Cabang" value="{{ old('fv_branch_Name') }}" />
                                </label>
                                @error('fv_branch_Name')
                                <div class="text-sm text-red-600">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-6 text-gray-900 dark:text-gray-100">
                                <label class="block">
                                    <span>Anydesk</span>
                                    <input type="text" name="fv_anydesk"
                                        class="block w-full mt-1 rounded-md text-gray-900 dark:text-gray-900"
                                        placeholder="Anydesk" value="{{ old('fv_anydesk') }}" />
                                </label>
                                @error('fv_anydesk')
                                <div class="text-sm text-red-600">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-6 text-gray-900 dark:text-gray-100">
                                <label class="block">
                                    <span>Team Viewer</span>
                                    <input type="text" name="fv_teamviewer"
                                        class="block w-full mt-1 rounded-md text-gray-900 dark:text-gray-900"
                                        placeholder="Team Viewer" value="{{ old('fv_teamviewer') }}" />
                                </label>
                                @error('fv_teamviewer')
                                <div class="text-sm text-red-600">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-6 text-gray-900 dark:text-gray-100">
                                <label class="block">
                                    <span>Ultra Viewer</span>
                                    <input type="text" name="fv_ultraviewer"
                                        class="block w-full mt-1 rounded-md text-gray-900 dark:text-gray-900"
                                        placeholder="Ultra Viewer" value="{{ old('fv_ultraviewer') }}" />
                                </label>
                                @error('fv_ultraviewer')
                                <div class="text-sm text-red-600">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-6 text-gray-900 dark:text-gray-100">
                                <label class="block">
                                    <span>Link Address</span>
                                    <input type="text" name="fv_link_add"
                                        class="block w-full mt-1 rounded-md text-gray-900 dark:text-gray-900"
                                        placeholder="Link Address" value="{{ old('fv_link_add') }}" />
                                </label>
                                @error('fv_link_add')
                                <div class="text-sm text-red-600">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-6 text-gray-900 dark:text-gray-100">
                                <label class="block">
                                    <span>Link Sementara</span>
                                    <input type="text" name="fv_link_temp"
                                        class="block w-full mt-1 rounded-md text-gray-900 dark:text-gray-900"
                                        placeholder="Link Sementara" value="{{ old('fv_link_temp') }}" />
                                </label>
                                @error('fv_link_temp')
                                <div class="text-sm text-red-600">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-6 text-gray-900 dark:text-gray-100">
                            <label class="block">
                                <span>Region</span>
                                <select name="fc_region"
                                    class="block w-full mt-1 rounded-md text-gray-900 dark:text-gray-900">
                                    <option value="">Select a region</option>
                                    @foreach ($provinces as $province)
                                    <option value="{{ $province }}"
                                        {{ old('fc_region') == $province ? 'selected' : '' }}>
                                        {{ $province }}
                                    </option>
                                    @endforeach
                                </select>
                            </label>
                            @error('fc_region')
                            <div class="text-sm text-red-600">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="text-center text-white font-bold text-xl mb-6">
                            ------------------------------------------------------------------------------------------------
                        </div>

                        <div class="text-center text-white font-bold text-xl mb-6">USER IT</div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">


                            <div class="mb-6 text-gray-900 dark:text-gray-100">
                                <label class="block">
                                    <span>User</span>
                                    <input type="text" name="fc_user_it"
                                        class="block w-full mt-1 rounded-md text-gray-900 dark:text-gray-900"
                                        placeholder="User" value="{{ old('fc_user_it') }}" />
                                </label>
                                @error('fc_user_it')
                                <div class="text-sm text-red-600">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-6 text-gray-900 dark:text-gray-100">
                                <label class="block">
                                    <span>Password</span>
                                    <input type="text" name="fc_password_it"
                                        class="block w-full mt-1 rounded-md text-gray-900 dark:text-gray-900"
                                        placeholder="Password" value="{{ old('fc_password_it') }}" />
                                </label>
                                @error('fc_password_it')
                                <div class="text-sm text-red-600">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="text-center text-white font-bold text-xl mb-6">
                            ------------------------------------------------------------------------------------------------
                        </div>

                        <div class="text-center text-white font-bold text-xl mb-6">USER SYSADM</div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                            <div class="mb-6 text-gray-900 dark:text-gray-100">
                                <label class="block">
                                    <span>User</span>
                                    <input type="text" name="fc_user_sysadm"
                                        class="block w-full mt-1 rounded-md text-gray-900 dark:text-gray-900"
                                        placeholder="User" value="{{ old('fc_user_sysadm') }}" />
                                </label>
                                @error('fc_user_sysadm')
                                <div class="text-sm text-red-600">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-6 text-gray-900 dark:text-gray-100">
                                <label class="block">
                                    <span>Password</span>
                                    <input type="text" name="fc_password_sysadm"
                                        class="block w-full mt-1 rounded-md text-gray-900 dark:text-gray-900"
                                        placeholder="Password" value="{{ old('fc_password_sysadm') }}" />
                                </label>
                                @error('fc_password_sysadm')
                                <div class="text-sm text-red-600">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="text-center text-white font-bold text-xl mb-6">
                            ------------------------------------------------------------------------------------------------
                        </div>

                        <div class="text-center text-white font-bold text-xl mb-6">CCTV</div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                            <div class="mb-6 text-gray-900 dark:text-gray-100">
                                <label class="block">
                                    <span>Username</span>
                                    <input type="text" name="fc_username"
                                        class="block w-full mt-1 rounded-md text-gray-900 dark:text-gray-900"
                                        placeholder="Username" value="{{ old('fc_username') }}" />
                                </label>
                                @error('fc_username')
                                <div class="text-sm text-red-600">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-6 text-gray-900 dark:text-gray-100">
                                <label class="block">
                                    <span>Serial</span>
                                    <input type="text" name="fc_serial"
                                        class="block w-full mt-1 rounded-md text-gray-900 dark:text-gray-900"
                                        placeholder="Serial" value="{{ old('fc_serial') }}" />
                                </label>
                                @error('fc_serial')
                                <div class="text-sm text-red-600">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-6 text-gray-900 dark:text-gray-100">
                                <label class="block">
                                    <span>User ID</span>
                                    <input type="text" name="fc_user"
                                        class="block w-full mt-1 rounded-md text-gray-900 dark:text-gray-900"
                                        placeholder="User ID" value="{{ old('fc_user') }}" />
                                </label>
                                @error('fc_user')
                                <div class="text-sm text-red-600">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-6 text-gray-900 dark:text-gray-100">
                                <label class="block">
                                    <span>Password</span>
                                    <input type="text" name="fc_password"
                                        class="block w-full mt-1 rounded-md text-gray-900 dark:text-gray-900"
                                        placeholder="Password" value="{{ old('fc_password') }}" />
                                </label>
                                @error('fc_password')
                                <div class="text-sm text-red-600">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-6 text-gray-900 dark:text-gray-100">
                                <label class="block">
                                    <span>Jumlah Kamera</span>
                                    <input type="number" name="fn_qty_cam"
                                        class="block w-full mt-1 rounded-md text-gray-900 dark:text-gray-900"
                                        placeholder="Jumlah Kamera" value="{{ old('fn_qty_cam') }}" />
                                </label>
                                @error('fn_qty_cam')
                                <div class="text-sm text-red-600">{{ $message }}</div>
                                @enderror
                            </div>



                            <div class="mb-6 text-gray-900 dark:text-gray-100">
                                <label class="block">
                                    <span>Status HDD External</span>
                                    <input type="text" name="fv_status_hdd_ext"
                                        class="block w-full mt-1 rounded-md text-gray-900 dark:text-gray-900"
                                        placeholder="Status HDD External" value="{{ old('fv_status_hdd_ext') }}" />
                                </label>
                                @error('fv_status_hdd_ext')
                                <div class="text-sm text-red-600">{{ $message }}</div>
                                @enderror
                            </div>





                            <div class="mb-6 text-gray-900 dark:text-gray-100">
                                <label class="block">
                                    <span>Status</span>
                                    <div class="flex items-center space-x-4">
                                        <label>
                                            <input type="radio" name="fc_status" value="A" class="hidden peer"
                                                id="status-normal" {{ old('fc_status') == 'A' ? 'checked' : '' }}>
                                            <span
                                                class="inline-block px-4 py-2 rounded-md cursor-pointer peer-checked:bg-green-600 peer-checked:text-white transition-colors duration-300"
                                                id="status-normal-label">
                                                Normal
                                            </span>
                                        </label>

                                        <label>
                                            <input type="radio" name="fc_status" value="E" class="hidden peer"
                                                id="status-error" {{ old('fc_status') == 'E' ? 'checked' : '' }}>
                                            <span
                                                class="inline-block px-4 py-2 rounded-md cursor-pointer peer-checked:bg-red-600 peer-checked:text-white transition-colors duration-300"
                                                id="status-error-label">
                                                Error
                                            </span>
                                        </label>

                                        <label>
                                            <input type="radio" name="fc_status" value="C" class="hidden peer"
                                                id="status-closed" {{ old('fc_status') == 'C' ? 'checked' : '' }}>
                                            <span
                                                class="inline-block px-4 py-2 rounded-md cursor-pointer peer-checked:bg-gray-600 peer-checked:text-white transition-colors duration-300"
                                                id="status-closed-label">
                                                Closed
                                            </span>
                                        </label>
                                    </div>
                                </label>
                                @error('fc_status')
                                <div class="text-sm text-red-600">{{ $message }}</div>
                                @enderror
                            </div>

                            <div id="error-section"
                                class="mb-6 text-gray-900 dark:text-gray-100 {{ old('fc_status') == 'E' ? 'block fade-in' : 'hidden' }}">
                                <label class="block">
                                    <span>Additional Error Information</span>
                                    <textarea name="fv_ket_error" id="fv_ket_error"
                                        class="block w-full mt-1 rounded-md text-gray-900 dark:text-gray-900"
                                        placeholder="Additional Error Information">{{ old('fv_ket_error') }}</textarea>
                                </label>
                                @error('fv_ket_error')
                                <div class="text-sm text-red-600">{{ $message }}</div>
                                @enderror
                            </div>


                            <div class="flex justify-end mt-6">
                                <button type="submit"
                                    class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-blue-500 dark:hover:bg-blue-600 dark:focus:ring-blue-700">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
    function handleStatusChange() {
        var status = document.querySelector('input[name="fc_status"]:checked').value;
        var errorSection = document.getElementById('error-section');

        if (status === 'E') {
            errorSection.style.display = 'block';
            errorSection.classList.add('fade-in');
        } else {
            errorSection.style.display = 'none';
            errorSection.classList.remove('fade-in');
            document.getElementById('fv_ket_error').value = ''; // Clear the input when status is not Error
        }
    }

    // Initial call to set visibility based on current status
    document.addEventListener('DOMContentLoaded', function() {
        handleStatusChange();
    });

    // Event listeners for status change
    document.querySelectorAll('input[name="fc_status"]').forEach(radio => {
        radio.addEventListener('change', handleStatusChange);
    });

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