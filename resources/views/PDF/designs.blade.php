<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Design List</title>
    <style>
        /* Add any custom PDF styling here */
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>DAAV</h1>
    <h2>Designs List</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Created Date</th> 
            </tr>
        </thead>
        <tbody>
            @foreach($designs as $design)
                <tr>
                    <td>{{ $design->id }}</td>
                    <td>{{ $design->name }}</td>
                    <td>{{ $design->description }}</td>
                    <td>{{ $design->created_at->format('d-m-Y') }}</td> <!-- Formatted date -->
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
