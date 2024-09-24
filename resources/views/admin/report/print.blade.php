<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BorrowLab - Print PDF</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            color: #333;
        }

        .container {
            width: 100%;
            margin: 0 auto;
            padding: 20px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f4f4f4;
            font-weight: bold;
        }

        .alert {
            color: red;
            text-align: center;
        }

        @media print {
            .container {
                width: 100%;
                margin: 0;
                padding: 0;
            }

            table {
                width: 100%;
                border-collapse: collapse;
            }

            th,
            td {
                border: 1px solid #000;
                padding: 10px;
                text-align: left;
            }

            th {
                background-color: #e0e0e0;
            }

            .alert {
                color: #000;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Print Loans History</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Item Name</th>
                    <th scope="col">Borrower</th>
                    <th scope="col">Status</th>
                    <th scope="col">Loan Date</th>
                    <th scope="col">Return Date</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($loans as $no => $loan)
                    <tr>
                        <th scope="row">{{ ++$no }}</th>
                        <td>{{ $loan->items->name }}</td>
                        <td>{{ $loan->users->name }}</td>
                        <td>{{ ucwords(str_replace('returnPending', 'Return Pending', $loan->status)) }}</td>
                        <td>{{ $loan->loan_date }}</td>
                        <td>{{ $loan->return_date }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">
                            <div class="alert">
                                No items found
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</body>

</html>
