<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('rents.store') }}" method="POST">
    @csrf

    <input type="text" name="name" placeholder="Enter property name"><br><br>
    <input type="text" name="email" placeholder="Enter email"><br><br>
    <input type="text" name="phone" placeholder="Enter phone"><br><br>
    <input type="text" name="id_card" placeholder="Enter id_card"><br><br>
    <input type="text" name="address" placeholder="Enter address"><br><br>

    <input type="submit" value="Save">
</form>
</body>
</html>


