<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select User</title>
    <link rel="stylesheet" href="{{ asset('css/patstyle.css') }}">
</head>
<body>
    <div class="container">
        <h1>Select User</h1>
        <form action="{{ route('case-paper.user-records') }}" method="GET">
            <div class="form-group">
                <label for="user_id">Select User:</label>
                <select id="user_id" name="user_id" required>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <button type="submit">Submit</button>
            </div>
        </form>
    </div>
</body>
</html>