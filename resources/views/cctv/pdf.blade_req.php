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
            font-size: 8px;
            flex: 1;
            margin-right: 10px;
        }

        .green-box {
            /* padding: 5px; */
            text-align: center;
            /* height: 30px;
            width:200px; */
        }

        .red-box {
            padding: 5px;
            text-align: center;
            margin-left: 10px;
        }

        .header img {
            height: 90px; /* Set height to 90px */
            width: auto; /* Maintain aspect ratio */
        }

        .header h2 {
            margin: 0;
            font-size: 20px;
            color: black;
        }

        .memo-title h3 {
            text-align: center;
            text-transform: uppercase;
            font-size: 20px;
            margin-top: 20px;
        }

        .memo-title {
            text-align: center;
            text-transform: uppercase;
            font-size: 14px;
            margin-top: 10px;
        }

        .memo-info {
            margin-top: 10px;
            font-size: 14px;
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
                    <div class="green-box">
                        <img src="{{ public_path('img/logo.svg') }}" alt="Company Logo" >
                    </div>
                </td>
            </tr>
        </table>
    </div>

    <div class="memo-title">
        <h1>Internal Report</h1>
        <p>No: 001/IT/Support/VII/2024</p>
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
                <th>Division</th>
                <th>Principle</th>
                <th>Branch Name</th>
                <th>Status</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cctvs as $cctv)
            <tr>
                <td>{{ $cctv->fv_divisi }}</td>
                <td>{{ $cctv->fv_principle }}</td>
                <td>{{ $cctv->fv_branch_Name }}</td>
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
