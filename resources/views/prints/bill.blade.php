<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bill No #{{ $data->id }}</title>
</head>
<body>
    <table>
        <tbody>
            <tr>
                <th>Vehicle Number</th>
                <td>:</td>
                <td>{{ $data->number_plate }}</td>
            </tr>
            <tr>
                <th>Start</th>
                <td>:</td>
                <td>{{ $data->start }}</td>
            </tr>
            <tr>
                <th>End</th>
                <td>:</td>
                <td>{{ $data->end }}</td>
            </tr>
            <tr>
                <th>Total</th>
                <td>:</td>
                <td>{{ format_currency($data->price) }}</td>
            </tr>
        </tbody>
    </table>
</body>
</html>
