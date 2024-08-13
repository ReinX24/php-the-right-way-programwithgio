<main class="container-fluid">
    <h1>Products App</h1>

    <!-- TODO: finish search functionality -->
    <form action="/search" method="GET">
        <fieldset role="group">
            <input type="text" name="search" placeholder="Search products">
            <input type="submit">
        </fieldset>
    </form>

    <table>
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Image</th>
                <th scope="col">Price</th>
                <th scope="col">Create Date</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product): ?>
                <tr>
                    <th scope="row"><?= $product->getId(); ?></th>
                    <td><?= $product->getTitle(); ?></td>
                    <td><?= $product->getDescription(); ?></td>
                    <td style="width: 8rem;">
                        <img src="<?= $product->getImage(); ?>">
                    </td>
                    <td><?= $product->getPrice(); ?></td>
                    <td><?= $product->getCreateDate(); ?></td>
                    <td>
                        <div>
                            <a href="/edit?id=<?= $product->getId(); ?>"><button>Edit</button></a>
                            <a href="/delete?id=<?= $product->getId(); ?>"><button>Delete</button></a>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <a href="/add"><button>Add Product</button></a>
</main>