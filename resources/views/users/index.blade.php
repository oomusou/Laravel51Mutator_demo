<!DOCTYPE html>
<html>
<head>
    <title>Users</title>
</head>
<body>
<div>
    @foreach($users as $user)
        <div>
            <h2>{{ $user->name }}</h2>
            <h2>{{ $user->email }}</h2>
            <h2>{{ $user->created_at }}</h2>
        </div>
        <hr>
    @endforeach
</div>
</body>
</html>