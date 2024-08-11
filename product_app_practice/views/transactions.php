<!DOCTYPE html>
<html>

<head>
    <title>Transactions</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            text-align: center;
        }

        table tr th,
        table tr td {
            padding: 5px;
            border: 1px #eee solid;
        }

        tfoot tr th,
        tfoot tr td {
            font-size: 20px;
        }

        tfoot tr th {
            text-align: right;
        }

        a {
            font-size: 2rem;
        }
    </style>
</head>

<body>
    <div>
        <a href="/">Home |</a>
        <a href="/transactions">Transactions |</a>
    </div>

    <hr>

    <?php if (!empty($transactions)) : ?>
        <table>
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Check #</th>
                    <th>Description</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($transactions as $transaction) : ?>
                    <tr>
                        <!-- Formatting the date -->
                        <td><?= date("M d, Y", strtotime($transaction["transaction_date"])) ?></td>
                        <td><?= $transaction["check_number"] ?></td>
                        <td><?= $transaction["description"] ?></td>

                        <?php if ($transaction["amount"] > 0) : ?>
                            <!-- Adds dollar sign and commas, also rounds off by 2 decimal places -->
                            <td style="color:green;">
                                <?= Brick\Money\Money::of($transaction["amount"], "USD")->formatTo("en_US"); ?>
                            </td>
                        <?php else : ?>
                            <td style="color:red;">
                                <?= Brick\Money\Money::of($transaction["amount"], "USD")->formatTo("en_US"); ?>
                            </td>
                        <?php endif; ?>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="3">Total Income:</th>
                    <td>
                        <?= Brick\Money\Money::of($totalIncome, "USD")->formatTo("en_US"); ?>
                    </td>
                </tr>
                <tr>
                    <th colspan="3">Total Expense:</th>
                    <td>
                        <?= Brick\Money\Money::of($totalExpense, "USD")->formatTo("en_US"); ?>
                    </td>
                </tr>
                <tr>
                    <th colspan="3">Net Total:</th>
                    <td>
                        <?= Brick\Money\Money::of($netTotal, "USD")->formatTo("en_US"); ?>
                    </td>
                </tr>
            </tfoot>
        </table>
    <?php else : ?>
        <h1>[No Trasactions Added]</h1>
    <?php endif; ?>
</body>

</html>