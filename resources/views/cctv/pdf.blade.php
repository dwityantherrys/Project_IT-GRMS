<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>CCTV Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin-left: 30px;
            margin-right: 30px;
        }

        .header {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
            margin-top:-40px;
        }

        .company-info {
            text-align: left;
            font-size: 10px;
            flex: 1;
            margin-right: 10px;
        }

        .green-box {
            padding: 5px;
            text-align: center;
        }

        .red-box {
            padding: 5px;
            text-align: center;
            margin-left: 10px;
        }

        .header img {
            width: 90px;
            height: auto;
        }

        .header h2 {
            margin: 0;
            font-size: 20px;
            color: black;
        }

        /* .memo-title h3 {
            text-align: center;
            text-transform: uppercase;
            font-size: 20px;
            margin-top: 20px;
        } */

        .memo-title {
            text-align: center;
            /* text-transform: uppercase; */
            font-size: 16px;
            margin-top: -10px;
        }

        .memo-title h4 {
            margin-top: -15px;
            font-size: 17px;
            margin-bottom: 40px;
        }

        .memo-info {
            margin-top: 20px;
            font-size: 14px;
        }

        .memo-info p{
            margin-top: -7px;
        }

        hr {
            border: none;
            border-top: 2px solid black;
            margin: 20px 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .status-normal {
            background-color: #38a169;
            color: white;
            padding: 3px 6px;
            border-radius: 4px;
        }

        .status-error {
            background-color: #e53e3e;
            color: white;
            padding: 3px 6px;
            border-radius: 4px;
        }

        .status-closed {
            background-color: #718096;
            color: white;
            padding: 3px 6px;
            border-radius: 4px;
        }
    </style>
</head>

<body>

    <div class="header" >
        <table style="border: 0px solid black">
            <tr>
                <td style="border: 0px solid black"> 
                    <div class="company-info">
                        <p>Jl. Sunandar Priyo Sudarmo 
                        <br>Jawa Timur , 65126
                        <br>Email : contact@rms.co.id
                        <br>Telp : 08123456789
                    </p>
                    </div>
                </td>
                <td style="border: 0px solid black">
                    <div class="green-box">
                        <img src="{{ public_path('img/logo.svg') }}" alt="Company Logo">
                    </div>
                </td>
                <td style="border: 0px solid black">
                    <div class="red-box">
                        <h2>PT RUKUN MITRA SEJATI</h2>
                    </div>
                </td>
            </tr>
        </table>
    </div>

    <div class="memo-title">
        <h2>Internal Report</h2>
        <h4>No: 001/IT/Support/VII/2024</h4>
    </div>

    <div class="memo-info">
        <p><strong>Date:</strong> <?php echo date('d F Y'); ?></p>
        <p><strong>To:</strong> Head Of IT Division, Regional Manager</p>
        <p><strong>From:</strong> IT Support Division</p>
        <p><strong>Subject:</strong> Laporan CCTV</p>
    </div>

    <hr>

    <h1>CCTV Report</h1>
    <table>
        <thead>
            <tr>
                <!-- <th>ID</th> -->
                <th>Division</th>
                <!-- <th>System Type</th> -->
                <th>Principle</th>
                <th>Branch Name</th>
                <!-- <th>Region</th> -->
                <th>Status</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cctvs as $cctv)
            <tr>
                <!-- <td>{{ $cctv->fc_id_cctv }}</td> -->
                <td>{{ $cctv->fv_divisi }}</td>
                <!-- <td>{{ $cctv->fv_sys_type }}</td> -->
                <td>{{ $cctv->fv_principle }}</td>
                <td>{{ $cctv->fv_branch_Name }}</td>
                <!-- <td>{{ $cctv->fc_region }}</td> -->
                <td>
                    @if($cctv->fc_status === 'A')
                    <span class="status-normal">Normal</span>
                    @elseif($cctv->fc_status === 'E')
                    <span class="status-error">Error</span>
                    @elseif($cctv->fc_status === 'C')
                    <span class="status-closed">Closed</span>
                    @endif
                </td>
                <td>{{ $cctv->fv_ket_error }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
