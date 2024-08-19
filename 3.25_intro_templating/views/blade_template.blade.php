<style>
    table {
        width: 100%;
        border-collapse: collapse;
        text-align: center;
    }

    table tr th,
    table tr td {
        border: 1px #eee solid;
        padding: 5px;
    }

    .color-green {
        color: green;
    }

    .color-red {
        color: red;
    }

    .color-gray {
        color: gray;
    }

    .color-orange {
        color: orange;
    }
</style>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Invoice #</th>
            <th>Amount</th>
            <th>Status</th>
            <th>Due Date</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($invoices as $invoice)
        <tr>
            <td>{{ $invoice["id"] }}</td>
            <td>{{ $invoice["invoice_number"] }}</td>
            <td>${{ number_format($invoice["amount"], 2) }}</td>
            <td>{{ $invoice["status"] }}</td>
            <td>
                @if ($invoice["due_date"])
                {{ date("m/d/Y", strtotime($invoice["due_date"])) }}
                @else
                N/A
                @endif
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="4">No Invoices Found</td>
        </tr>
        @endforelse
    </tbody>
</table>