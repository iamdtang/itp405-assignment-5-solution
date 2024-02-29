<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Secret</title>
</head>
<body>
    <h1>Secret page</h1>

    @if (session('success'))
        <p>Maintenance mode successfully {{ $isInMaintenance ? "enabled" : "disabled" }}</p>
    @endif

    <form action="{{ route('secret.store') }}" method="POST">
        @csrf
        <label for="maintenance">In maintenance</label>
        <input
            type="checkbox"
            name="maintenance"
            id="maintenance"
            {{ $isInMaintenance ? "checked" : "" }}
        />
        <button type="submit">Save</button>
    </form>
</body>
</html>