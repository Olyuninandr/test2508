<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    <title>Import Excel</title>
</head>
<body>



<form action="{{ route('import') }}" method="post" enctype="multipart/form-data">
    @csrf

    Select excel file to upload
    <br><br>

    <input type="file" name="file" id="file">
    <br><br>

    <button type="submit">Upload file</button>
    <br><br>

</form>

</body>
</html>
