<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>All Student Data</title>
</head>

<body>
    @foreach ($students as $student)
        <h3>{{ $student->id }} | {{ $student->name }} | {{ $student->email }} | {{ $student->city_name }} |</h3>
    @endforeach
</body>

</html>
