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

    <form action="/delete" method="POST">
        <input type="hidden" name="id" value="<?= $product->getId(); ?>">
        <button type="submit">Delete</button>
    </form>

</main>