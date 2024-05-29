<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Workspace</title>
</head>
<body>
    <h1>Create Workspace</h1>
    <form action="{{ route('createWorkspace') }}" method="post">
        @csrf
        <label for="name">Name</label>
        <input type="text" name="name" id="name">
        <br>
        <label for="description">Description</label>
        <textarea name="description" id="description"></textarea>
        <br>
        <label for="type">Type</label>
        <select name="type" id="type">
            <option value="personal">Personal</option>
            <option value="team">Team</option>
        </select>
        <button type="submit">Create</button>
    </form>
</body>
</html>
