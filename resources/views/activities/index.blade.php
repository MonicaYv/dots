<!DOCTYPE html>
<html>
<head>
    <title>User Activities</title>
</head>
<body>
    <h1>User Activities</h1>
    <ul>
        @foreach ($activities as $activity)
            <li>
                <strong>User:</strong> {{ $activity->user->name }}<br>
                <strong>Date:</strong> {{ $activity->date }}<br>
                <strong>Action:</strong> {{ $activity->action }}<br>
                <strong>Details:</strong> {{ $activity->details }}<br>
                <strong>Address:</strong> {{ $activity->address }}<br>
            </li>
        @endforeach
    </ul>
</body>
</html>
    