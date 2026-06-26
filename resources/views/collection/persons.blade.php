
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <h2>Add Person</h2>
    
    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif
    
    <form action="/persons/store" method="POST">
        @csrf
         <label>Name:</label>
        <input type="text" name="name" required>
    
        <br><br>
        <label>Email:</label>
        <input type="email" name="email" required>
    
        <br><br>
    
        <label>Active:</label>
    
        <select name="active">
            <option value="1">Active</option>
            <option value="0">Inactive</option>
        </select>
    
        <br><br>
    
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</body>
</html>