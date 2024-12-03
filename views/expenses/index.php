<!DOCTYPE html>
<html>
<head>
    <title>Expense Tracker</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <h1>Expense Tracker</h1>
    <a href="?module=expense&action=add">Add Expense</a>
    <ul>
        <?php foreach ($data['expenses'] as $expense): ?>
            <li>
                <?= htmlspecialchars($expense['title']) ?> - $<?= htmlspecialchars($expense['amount']) ?>
                <a href="?module=expense&action=delete&id=<?= $expense['id'] ?>">Delete</a>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
