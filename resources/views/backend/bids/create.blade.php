<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('bids.store') }}" method="post">
        @csrf
        <input type="text" name="issue_id">
        <input type="text" name="user_id">
        <input type="number" name="timeToFix">
        <input type="text" name="sendBackDate">
        <input type="text" name="needSupport">
        <input type="text" name="needSpare">
        <input type="text" name="possibleCost">
        <input type="text" name="haveExistingTask">
        <input type="submit" value="submit">
    </form>
</body>
</html>