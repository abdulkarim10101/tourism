<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="{{route('excel.store')}}" enctype="multipart/form-data" method="POST">
@csrf
<input type="file" name="excel_file" id="" />
<input type="submit" value="submit">
</form>
</body>
</html>
