<main class="container-fluid">
    <h1>Edit Product</h1>
    <form action="/edit" method="POST" enctype="multipart/form-data">
        <?php if ($product->getImage()): ?>
            <img src="<?= $product->getImage(); ?>" style="width: 8rem;">
        <?php endif; ?>

        <label for="image">Image</label>
        <input type="file" name="image">

        <input type="hidden" name="existingImage" value="<?= $product->getImage(); ?>">

        <input type="hidden" name="id" value="<?= $product->getId(); ?>">

        <label for="title">Title</label>
        <input type="text" name="title" value="<?= $product->getTitle() ?? "" ?>">
        <p class="pico-color-red-500"><?= $errors["noTitleError"] ?? "" ?></p>

        <label for="description">Description</label>
        <textarea name="description"><?= $product->getDescription() ?? "" ?></textarea>

        <label for="price">Price</label>
        <input type="number" step="0.01" name="price" value="<?= $product->getPrice() ?? "" ?>">
        <p class="pico-color-red-500"><?= $errors["noPriceError"] ?? "" ?></p>

        <button type="submit">Confirm</button>
    </form>
    <form action="/" method="GET">
        <button type="submit">Cancel</button>
    </form>
</main>