<!DOCTYPE html>
<html>
<head>
    <title>Feitjes per categorie</title>
</head>
<body>

@if ($facts)
    <h2>{{ $facts->title }}</h2>
    <p>{{ $facts->content }}</p>
@else
    <p>No fact found.</p>
@endif

</body>
</html>
