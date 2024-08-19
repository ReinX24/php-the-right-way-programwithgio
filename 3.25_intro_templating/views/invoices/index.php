<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Invoice #</th>
            <th>Amount</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <?php if (empty($invoices)): ?>
            <tr>
                <td colspan="4">No Invoices Found</td>
            </tr>
        <?php else: ?>
            <?php foreach ($invoices as $invoice) : ?>
                <tr>
                    <td><?= $invoice["id"] ?></td>
                    <td><?= $invoice["invoiceNumber"] ?></td>
                    <td>$<?= number_format($invoice["amount"], 2) ?></td>
                    <td><?= $invoice["status"]; ?></td>
                </tr>
            <?php endforeach ?>
        <?php endif; ?>
    </tbody>
</table>