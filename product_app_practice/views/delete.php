<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products App | <?= $page ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.colors.min.css">
</head>

<body>
    <main class="container-fluid">
        <h1>Delete Product?</h1>

        <table>
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Image</th>
                    <th scope="col">Price</th>
                    <th scope="col">Create Date</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row"><?= $product->getId() ?></th>
                    <td><?= $product->getTitle(); ?></td>
                    <td><?= $product->getDescription(); ?></td>
                    <td style="width: 8rem;">
                        <img src="<?= $product->getImage(); ?>">
                    </td>
                    <td><?= $product->getPrice(); ?></td>
                    <td><?= $product->getCreateDate(); ?></td>
                </tr>
            </tbody>
        </table>

        <!-- TODO: finish delete functionality -->
        <form action="/delete" method="POST">
            <button type="submit">Delete</button>
        </form>

    </main>
</body>

</html>