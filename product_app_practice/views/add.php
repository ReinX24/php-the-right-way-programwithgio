<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products App | <?= $page ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
</head>

<body>

    <main class="container-fluid">
        <h1>Add Product</h1>
        <form action="/add" method="POST" enctype="multipart/form-data">
            <label for="image">Image</label>
            <input type="file" name="image">

            <label for="title">Title</label>
            <input type="text" name="title">

            <label for="description">Description</label>
            <textarea name="description"></textarea>

            <label for="price">Price</label>
            <input type="number" step="0.01" name="price">

            <button type="submit">Confirm</button>
        </form>
    </main>

</body>

</html>