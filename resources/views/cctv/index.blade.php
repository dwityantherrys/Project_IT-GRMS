<x-app-layout>
    <div class="">
        <div class="">
            <div class="bg-white dark:bg-gray-800 shadow-sm">
                <div class="py-2 text-gray-900 dark:text-gray-100">
                    <h2 class="text-3xl font-semibold text-gray-900 dark:text-gray-100 text-center">CCTV Dashboard</h2>
                    <!-- <img src="{{asset('img/logo.svg')}}" alt="Logo" height="75px"> -->
                    <!-- Button untuk Toggle Form Filter dan Search Input -->
                    <div class="pl-4 pr-4 pb-4 flex items-center">
                        <button id="toggle-filter-btn"
                            class="px-3 py-1 bg-gray-600 text-white rounded-md hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-700">Filter</button>

                        <!-- Button untuk Export PDF -->
                        <a href="{{ route('cctvs.exportPDF', request()->query()) }}"
                            class="ml-4 px-3 py-1 bg-green-600 text-white rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-700">
                            Export to PDF
                        </a>

                        <!-- Button untuk Export Excel -->
                        <a href="{{ route('cctvs.exportExcel', request()->query()) }}"
                            class="ml-4 px-3 py-1 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-700">
                            Export to Excel
                        </a>


                        <!-- Space untuk Search Fields -->
                        <div class="flex-grow"></div>

                        <!-- Search Fields -->
                        <form method="GET" action="{{ route('cctvs.index') }}" class="flex items-center">
                            <input type="text" id="search" name="search" value="{{ request('search') }}"
                                class="form-input py-1 mt-1 block w-full text-gray-900" placeholder="Search...">
                            <button type="submit"
                                class="ml-2 px-3 py-1 bg-blue-700 text-white rounded-md hover:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-blue-800">Search</button>
                        </form>
                    </div>

                    <!-- Filter Form -->
                    <div id="filter-form" class="mb-6 filter-hidden pl-4 pr-4">
                        <form method="GET" action="{{ route('cctvs.index') }}" class="mb-6">
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                                <!-- Filter Fields -->
                                @foreach(['fv_divisi' => 'Division', 'fv_principle' => 'Principle', 'fv_sys_type' =>
                                'System Type', 'fv_branch_Name' => 'Branch Name', 'fc_region' => 'Region'] as $name =>
                                $label)
                                <div class="flex flex-col py-1">
                                    <label for="{{ $name }}" class="text-sm font-medium text-white">{{ $label }}</label>
                                    <input type="text" id="{{ $name }}" name="{{ $name }}" value="{{ request($name) }}"
                                        class="form-input mt-1 block w-full text-gray-900 py-1"
                                        placeholder="{{ $label }}">
                                </div>
                                @endforeach
                                <div class="flex flex-col py-1">
                                    <label for="fc_status" class="block text-sm font-medium text-white">Status</label>
                                    <select id="fc_status" name="fc_status"
                                        class="mt-1 block w-full text-gray-900 py-1">
                                        <option value="">All</option>
                                        <option value="A" {{ request('fc_status') === 'A' ? 'selected' : '' }}>Normal
                                        </option>
                                        <option value="E" {{ request('fc_status') === 'E' ? 'selected' : '' }}>Error
                                        </option>
                                        <option value="C" {{ request('fc_status') === 'C' ? 'selected' : '' }}>Closed
                                        </option>
                                    </select>
                                </div>
                                <!-- Button di bagian kolom paling kanan -->
                                <div class="col-span-1 lg:col-span-3 flex items-center justify-end mt-4 space-x-4 py-1">
                                    <button type="submit"
                                        class="btn btn-primary px-3 py-1 bg-gray-600 text-white rounded-md hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-700">Filter</button>
                                    <a href="{{ route('cctvs.index') }}"
                                        class="btn btn-secondary px-3 py-1 bg-red-600 text-white rounded-md hover:bg-red-800 focus:outline-none focus:ring-2 focus:ring-gray-700">Reset
                                        Filter</a>
                                </div>
                            </div>
                        </form>
                    </div>


                    <!-- Kontainer scroll horizontal -->
                    <div class="overflow-x-auto"   style="max-height: 70vh; height: 70vh; overflow-y: scroll; overflow-x: auto;">
                        <div style="min-width: 2000px;">
                            <table class="mx-auto text-gray-900 dark:text-gray-100">
                                <thead>
                                    <tr
                                        class="font-bold bg-gradient-to-r from-gray-200 via-gray-300 to-gray-400 dark:from-gray-800 dark:via-gray-900 dark:to-gray-700 shadow-lg">
                                        @foreach(['fc_id' => 'No', 'fc_id_cctv' => 'ID CCTV', 'fv_divisi' => 'DIVISI',
                                        'fv_sys_type' => 'SYSTEM TYPE', 'fv_principle' => 'PRINCIPLE', 'fv_branch_Name'
                                        => 'NAMA CABANG',
                                        'fv_anydesk' => 'ANYDESK', 'fv_teamviewer' => 'TEAMVIEWER', 'fv_ultraviewer' =>
                                        'ULTRAVIEWER',
                                        'fv_link_add' => 'LINK ADDRESS', 'fv_link_temp' => 'LINK SEMENTARA',
                                        'fc_user_it' => 'USER IT',
                                        'fc_password_it' => 'PASSWORD IT', 'fc_user_sysadm' => 'USER SYSADM',
                                        'fc_password_sysadm' => 'PASSWORD SYSADM',
                                        'fv_status_hdd_ext' => 'STATUS HDD EXT', 'fc_username' => 'USERNAME',
                                        'fc_serial' => 'SERIAL',
                                        'fc_user' => 'USER', 'fc_password' => 'PASSWORD', 'fn_qty_cam' => 'JUMLAH
                                        KAMERA', 'fc_region' => 'Region',
                                        'fc_status' => 'Status', 'fv_ket_error' => 'ERROR DESKRIPSI'] as $field =>
                                        $title)
                                        <th class="px-6 py-3 text-xs leading-4 tracking-wider text-left font-semibold text-gray-800 dark:text-gray-200 border-b-2 border-gray-300 dark:border-gray-600 bg-gray-100 dark:bg-gray-800
                        @if($field === 'fc_id') border-r @endif">
                                            {{ $title }}
                                        </th>
                                        @endforeach
                                        @auth
                                        <th
                                            class="px-6 py-3 text-xs leading-4 tracking-wider text-left font-semibold text-gray-800 dark:text-gray-200 border-b-2 border-gray-300 dark:border-gray-600 bg-gray-100 dark:bg-gray-800">
                                            Actions
                                        </th>
                                        @endauth
                                        <th
                                            class="px-6 py-3 text-xs leading-4 tracking-wider text-left font-semibold text-gray-800 dark:text-gray-200 border-b-2 border-gray-300 dark:border-gray-600 bg-gray-100 dark:bg-gray-800">
                                            Test Connection
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="font-normal">
                                    @php
                                    $startNumber = ($cctvs->currentPage() - 1) * $cctvs->perPage() + 1;
                                    @endphp
                                    @foreach($cctvs as $cctv)
                                    <tr class="hover:bg-gray-100 dark:hover:bg-gray-700 {{ $cctv->fc_status === 'E' ? 'bg-orange-500 dark:hover:bg-orange-700' : '' }}"
                                        data-id="{{ $cctv->fc_id }}">
                                        <td class="px-6 py-4 whitespace-no-wrap border-gray-600 border-r">
                                            {{ $startNumber++ }}
                                        </td>
                                        @foreach(['fc_id_cctv', 'fv_divisi', 'fv_sys_type', 'fv_principle',
                                        'fv_branch_Name', 'fv_anydesk',
                                        'fv_teamviewer', 'fv_ultraviewer', 'fv_link_add', 'fv_link_temp', 'fc_user_it',
                                        'fc_password_it',
                                        'fc_user_sysadm', 'fc_password_sysadm', 'fv_status_hdd_ext', 'fc_username',
                                        'fc_serial', 'fc_user',
                                        'fc_password', 'fn_qty_cam', 'fc_region'] as $field)

                                        <!-- Mask Data Container -->
                                        <td class="px-6 py-4 whitespace-no-wrap border-gray-200 "
                                            data-field="{{ $field }}">
                                            @if(in_array($field, ['fc_user_it', 'fc_password_it', 'fc_user_sysadm',
                                            'fc_password_sysadm', 'fc_user', 'fc_password', 'fc_serial']))
                                            <div  data-field="{{ $field }}">
                                                <span>{{ $cctv->$field }}</span>
                                            </div>

                                            @else
                                            @if($field === 'fv_link_add')
                                            @php
                                            $link = $cctv->$field;
                                            $containsNexdist = strpos($link, '/nexdist') !== false;
                                            $containsHttp = strpos($link, 'http://') === 0;
                                            if ($containsNexdist && !$containsHttp) {
                                            $link = 'http://' . $link;
                                            }
                                            @endphp
                                            @if($containsNexdist)
                                            <a href="{{ $link }}"
                                                class="bg-slate-500 text-white py-2 px-2 rounded hover:bg-blue-900"
                                                target="_blank">{{ $link }}</a>
                                            @else
                                            {{ $link }}
                                            @endif
                                            @else
                                            {{ $cctv->$field }}
                                            @endif
                                            @endif
                                        </td>
                                        @endforeach
                                        <td class="px-6 py-4 whitespace-no-wrap border-gray-200">
                                            @if($cctv->fc_status === 'A')
                                            <button class="bg-green-500 text-white px-3 py-1 rounded">Normal</button>
                                            @elseif($cctv->fc_status === 'E')
                                            <button class="bg-red-600 text-white px-3 py-1 rounded">Error</button>
                                            @elseif($cctv->fc_status === 'C')
                                            <button class="bg-gray-500 text-white px-3 py-1 rounded">Closed</button>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap border-gray-200"
                                            style="min-width: 500px;">
                                            {{ $cctv->fv_ket_error }}
                                        </td>

                                        @auth
                                        <td class="px-6 py-4 border-gray-200">
                                            <a href="{{ route('cctvs.edit', $cctv->fc_id) }}"
                                                class="text-white hover:bg-gray-800 bg-gray-600 px-3 py-1 rounded">Edit</a>
                                            <form action="{{ route('cctvs.destroy', $cctv->fc_id) }}" method="POST"
                                                class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="text-white hover:bg-red-800 bg-red-600 px-3 py-1 rounded mt-2">Delete</button>
                                            </form>
                                        </td>
                                        @endauth
                                        <td class="px-6 py-4 whitespace-no-wrap border-gray-200">
                                            <button class="test-connection-btn bg-gray-500 text-white px-3 py-1 rounded"
                                                data-ip="{{ $cctv->fv_link_add }}">Test</button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>



                    <!-- Pagination -->
                    <div class="mt-4">
                        {{ $cctvs->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

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

    // Mengatur event double click pada baris tabel
    document.querySelectorAll('tr[data-id]').forEach(row => {
        row.addEventListener('dblclick', function() {
            const id = this.getAttribute('data-id');
            window.location.href = `/cctv/${id}/edit`;
        });
    });

    // Menambahkan event listener untuk toggle filter form
    document.getElementById('toggle-filter-btn').addEventListener('click', function() {
        const filterForm = document.getElementById('filter-form');
        if (filterForm.classList.contains('filter-hidden')) {
            filterForm.classList.remove('filter-hidden');
            filterForm.classList.add('filter-visible');
        } else {
            filterForm.classList.remove('filter-visible');
            filterForm.classList.add('filter-hidden');
        }
    });


    //TEST ping
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.test-connection-btn').forEach(button => {
            button.addEventListener('click', function() {
                const ipAddress = this.getAttribute('data-ip');
                const buttonElement = this;

                // Set button state to testing
                buttonElement.textContent = 'Testing...';
                buttonElement.classList.remove('bg-gray-500', 'bg-green-500', 'bg-yellow-500');
                buttonElement.classList.add('bg-blue-500');

                // Perform AJAX request to backend for ping test
                fetch(`/ping-test?ip=${ipAddress}`, {
                        method: 'GET'
                    })
                    .then(response => response.json())
                    .then(data => {
                        console.log(data);
                        if (data.status === 'success') {
                            console.log(data.output);
                            if (data.ping < 100) {
                                buttonElement.textContent = `Normal (${data.ping} ms)`;
                                buttonElement.classList.remove('bg-blue-500');
                                buttonElement.classList.add('bg-green-500');
                            } else if (data.ping >= 100) {
                                buttonElement.textContent = `Warning (${data.ping} ms)`;
                                buttonElement.classList.remove('bg-blue-500');
                                buttonElement.classList.add('bg-yellow-500');
                            }
                        } else {
                            buttonElement.textContent = 'Server Down';
                            buttonElement.classList.remove('bg-blue-500');
                            buttonElement.classList.add('bg-purple-500');
                        }
                    })
                    .catch(error => {
                        buttonElement.textContent = 'Server Down';
                        buttonElement.classList.remove('bg-blue-500');
                        buttonElement.classList.add('bg-red-500');
                    });
            });
        });
    });
    </script>

    <style>
    .filter-hidden {
        display: none;
    }

    .filter-visible {
        display: block;
    }

    .wide-col {
        width: 300px;
        /* Sesuaikan lebar sesuai kebutuhan */
    }


    .overflow-x-auto::-webkit-scrollbar {
    width: 10px; /* Lebar scrollbar */
    height: 10px; /* Tinggi scrollbar */
}

.overflow-x-auto::-webkit-scrollbar-thumb {
    background-color: orange; /* Warna scrollbar */
    border-radius: 10px; /* Sudut melengkung */
    border-color: Blue;
    /* Ukuran thumb bisa disesuaikan */
    height: 40px; /* Atur tinggi thumb */
}

.overflow-x-auto::-webkit-scrollbar-track {
    background: #f1f1f1; /* Warna latar belakang scrollbar */
    border-radius: 10px; /* Sudut melengkung */
    /* Berikan warna latar belakang yang lebih besar dari thumb untuk efek jarak */
    margin-top: 5px; /* Margin atas */
    margin-bottom: 5px; /* Margin bawah */
}
    </style>
</x-app-layout>
<!-- Pop-up (Initially hidden)
<div class="mask-popup" style="display: none;">
    <input type="text" id="access-code" placeholder="Enter access code" />
    <button onclick="validateAccessCode()">Submit</button>
    <div class="error-message">Incorrect access code</div>
</div> -->