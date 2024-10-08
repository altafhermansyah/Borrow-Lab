<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BorrowLab - Print Report</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300;400&display=swap');

        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f7f9fc;
            color: #333;
        }

        .container {
            width: 95%;
            /* Lebar container ditingkatkan menjadi 95% */
            margin: 20px auto;
            /* Kurangi margin atas dan bawah */
            padding: 20px;
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            font-size: 24px;
            font-weight: 500;
            color: #333;
            margin-bottom: 30px;
        }

        table {
            width: 100%;
            /* Tabel menyesuaikan lebar container */
            border-collapse: collapse;
            margin-bottom: 20px;
            border: 1px solid black;
        }

        th,
        td {
            padding: 12px 15px;
            text-align: left;
            font-size: 15px;
            border: 1px solid black;
        }

        th {
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            color: #fff;
            background-color: #343a40;
        }

        td {
            background-color: #fff;
            color: #333;
        }

        tr:nth-child(even) td {
            background-color: #e0e0e0;
        }

        .status {
            padding: 6px 10px;
            font-size: 13px;
            border-radius: 15px;
            font-weight: 500;
            color: #fff;
        }

        .status.return-pending {
            background-color: #ff6b6b;
        }

        .status.fulfilled {
            background-color: #28a745;
        }

        .status.confirmed {
            background-color: #17a2b8;
        }

        .status.partially-shipped {
            background-color: #ffc107;
        }

        .alert {
            text-align: center;
            color: #ff6b6b;
            font-size: 14px;
            padding: 10px;
        }

        @media print {
            body {
                background-color: #fff;
            }

            .container {
                box-shadow: none;
            }

            th,
            td {
                padding: 8px;
                font-size: 12px;
                border: 1px solid black;
            }

            .alert {
                color: #000;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Loans History</h1>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Item Name</th>
                    <th>Borrower</th>
                    <th>Status</th>
                    <th>Loan Date</th>
                    <th>Return Date</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($loans as $no => $loan)
                    <tr>
                        <td>{{ ++$no }}</td>
                        <td>{{ $loan->items->name }}</td>
                        <td>{{ $loan->users->name }}</td>
                        <td>{{ ucwords(str_replace('returnPending', 'Return Pending', $loan->status)) }}</td>
                        <td>{{ $loan->loan_date }}</td>
                        <td>{{ $loan->return_date }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">
                            <div class="alert">No items found</div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</body>

</html>
