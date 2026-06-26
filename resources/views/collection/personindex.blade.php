<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>
<h2>All Persons</h2>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Active</th>
    </tr>

    @foreach($persons as $person)
        <tr>
            <td>{{ $person->id }}</td>
            <td>{{ $person->name }}</td>
            <td>{{ $person->email }}</td>
            <td>{{ $person->active }}</td>
        </tr>
    @endforeach
</table>