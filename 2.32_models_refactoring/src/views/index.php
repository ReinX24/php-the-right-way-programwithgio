<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Home Page</h1>
    <hr>
    <div>
        <?php if (!empty($invoice)) : ?>
            <p>Invoice ID: <?= htmlspecialchars($invoice["id"], ENT_QUOTES) ?></p>
            <p>Invoice Amount: <?= htmlspecialchars($invoice["amount"], ENT_QUOTES) ?></p>
            <p>User: <?= htmlspecialchars($invoice["full_name"], ENT_QUOTES) ?></p>
        <?php endif; ?>
    </div>
</body>

</html>