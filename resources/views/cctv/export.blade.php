<x-app-layout>
    <x-slot name="header">
        <h1 class="text-2xl font-bold text-white">Export CCTV Data</h1>
    </x-slot>

    <div class="py-6">
        <!-- Form untuk memilih kolom dan filter -->
        <form action="{{ route('cctvs.export') }}" method="GET">
            <!-- Pilihan Kolom -->
            <div class="mb-4">
                <h2 class="text-lg font-semibold mb-2 text-white">Select Columns to Export:</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    @foreach($columns as $key => $label)
                        @if($key !== 'fc_id') <!-- Hilangkan pilihan kolom No -->
                            <label class="inline-flex items-center mt-2 text-white border-white border-y-2">
                                <input type="checkbox" name="columns[]" value="{{ $key }}" class="form-checkbox column-checkbox">
                                <span class="ml-2">{{ $label }}</span>
                            </label>
                        @endif
                    @endforeach
                </div>
            </div>

            <!-- Filter -->
            <div class="mb-4">
                <h2 class="text-lg font-semibold mb-2 text-white">Filters:</h2>
                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                    <div>
                        <label for="fv_divisi" class="block text-sm font-medium text-white">Division:</label>
                        <input type="text" name="fv_divisi" id="fv_divisi" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    </div>

                    <div>
                        <label for="fv_sys_type" class="block text-sm font-medium text-white">System Type:</label>
                        <input type="text" name="fv_sys_type" id="fv_sys_type" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    </div>

                    <div>
                        <label for="fv_principle" class="block text-sm font-medium text-white">Principle:</label>
                        <input type="text" name="fv_principle" id="fv_principle" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    </div>

                    <div>
                        <label for="fv_branch_Name" class="block text-sm font-medium text-white">Branch Name:</label>
                        <input type="text" name="fv_branch_Name" id="fv_branch_Name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    </div>

                    <div>
                        <label for="fc_region" class="block text-sm font-medium text-white">Region:</label>
                        <input type="text" name="fc_region" id="fc_region" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    </div>

                    <div>
                        <label for="fc_status" class="block text-sm font-medium text-white">Status:</label>
                        <select name="fc_status" id="fc_status" class="text-white mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            <option value="">All</option>
                            <option value="A">Normal</option>
                            <option value="E">Error</option>
                            <option value="C">Closed</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="flex justify-end">
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Export</button>
            </div>
        </form>

        <!-- Live Print Preview -->
        <div class="mt-6">
            <h2 class="text-lg font-semibold mb-2 text-white">Live Print Preview:</h2>
            <div id="preview" class="overflow-x-auto bg-gray-800 p-4 rounded-md">
                <p class="text-white">Select columns to see the live preview.</p>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const preview = document.getElementById('preview');
            const columnCheckboxes = document.querySelectorAll('.column-checkbox');

            // Data contoh, sesuaikan dengan data aktual dari server jika ada
            const sampleData = [
                {
                    fc_id_cctv: 'A1', 
                    fv_divisi: 'Sales', 
                    fv_sys_type: 'Type1', 
                    fv_principle: 'Principle1', 
                    fv_branch_Name: 'Branch1', 
                    fv_anydesk: 'Desk1', 
                    fv_teamviewer: 'TV1', 
                    fv_ultraviewer: 'UV1', 
                    fv_link_add: 'Link1', 
                    fv_link_temp: 'Temp1', 
                    fc_user_it: 'User1', 
                    fc_password_it: 'Pass1', 
                    fc_user_sysadm: 'SysUser1', 
                    fc_password_sysadm: 'SysPass1', 
                    fv_status_hdd_ext: 'Status1', 
                    fc_username: 'User1', 
                    fc_serial: 'Serial1', 
                    fc_user: 'User2', 
                    fc_password: 'Pass2', 
                    fn_qty_cam: 4, 
                    fc_region: 'Region1', 
                    fc_status: 'A', 
                    fv_ket_error: 'Error1'
                }
            ];

            // Kolom yang akan ditampilkan
            const columns = {
                fc_id_cctv: 'ID CCTV',
                fv_divisi: 'DIVISI',
                fv_sys_type: 'SYSTEM TYPE',
                fv_principle: 'PRINCIPLE',
                fv_branch_Name: 'NAMA CABANG',
                fv_anydesk: 'ANYDESK',
                fv_teamviewer: 'TEAMVIEWER',
                fv_ultraviewer: 'ULTRAVIEWER',
                fv_link_add: 'LINK ADDRESS',
                fv_link_temp: 'LINK SEMENTARA',
                fc_user_it: 'USER IT',
                fc_password_it: 'PASSWORD IT',
                fc_user_sysadm: 'USER SYSADM',
                fc_password_sysadm: 'PASSWORD SYSADM',
                fv_status_hdd_ext: 'STATUS HDD EXT',
                fc_username: 'USERNAME',
                fc_serial: 'SERIAL',
                fc_user: 'USER',
                fc_password: 'PASSWORD',
                fn_qty_cam: 'JUMLAH KAMERA',
                fc_region: 'Region',
                fc_status: 'Status',
                fv_ket_error: 'ERROR DESKRIPSI'
            };

            function updatePreview() {
                // Ambil kolom yang dipilih
                const selectedColumns = Array.from(columnCheckboxes)
                    .filter(checkbox => checkbox.checked)
                    .map(checkbox => checkbox.value);

                // Buat header tabel dengan nomor urut otomatis
                let tableHeaders = `<th class="px-4 py-2 border-b border-gray-700 text-white">No</th>` + 
                                    selectedColumns.map(col => `<th class="px-4 py-2 border-b border-gray-700 text-white">${columns[col]}</th>`).join('');
                
                // Buat baris tabel berdasarkan data contoh
                let tableRows = sampleData.map((item, index) => {
                    let row = `<td class="px-4 py-2 border-b border-gray-700 text-white">${index + 1}</td>` + 
                               selectedColumns.map(col => `<td class="px-4 py-2 border-b border-gray-700 text-white">${item[col] || ''}</td>`).join('');
                    return `<tr>${row}</tr>`;
                }).join('');

                // Perbarui konten preview
                preview.innerHTML = `
                    <table class="min-w-full divide-y divide-gray-700">
                        <thead>
                            <tr>${tableHeaders}</tr>
                        </thead>
                        <tbody>
                            ${tableRows}
                        </tbody>
                    </table>
                `;
            }

            // Perbarui preview saat checkbox berubah
            columnCheckboxes.forEach(checkbox => {
                checkbox.addEventListener('change', updatePreview);
            });

            // Inisialisasi preview
            updatePreview();
        });
    </script>
</x-app-layout>
