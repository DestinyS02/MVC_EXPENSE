<!DOCTYPE html>
<html>
<head>
    <title>Add Expense</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <h1>Add Expense</h1>
    <form method="POST">
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" required>
        <label for="amount">Amount:</label>
        <input type="number" id="amount" name="amount" required>
        <button type="submit">Add Expense</button>
    </form>
</body>
</html>
