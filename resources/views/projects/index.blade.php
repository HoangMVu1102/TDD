<!DOCTYPE html>
<html>
<head>
    <title>

    </title>
</head>

<body>
<h1>Something</h1>

<ul>
    @foreach($projects as $project)
        <li>{{$project->title}}</li>
    @endforeach
</ul>
</body>

</html>