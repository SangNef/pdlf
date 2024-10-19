<div class="container">
    <style>
        .container {
            max-width: 900px;
            margin: 0 auto;
            padding: 20px;
            font-family: Arial, sans-serif;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .btn-primary {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            display: inline-block;
            margin-bottom: 20px;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .table, .table th, .table td {
            border: 1px solid #ddd;
        }

        .table th, .table td {
            padding: 12px;
            text-align: center;
        }

        .table th {
            background-color: #f4f4f4;
        }

        .btn-warning, .btn-danger {
            padding: 6px 12px;
            border-radius: 5px;
            color: white;
            text-decoration: none;
        }

        .btn-warning {
            background-color: #f0ad4e;
        }

        .btn-warning:hover {
            background-color: #ec971f;
        }

        .btn-danger {
            background-color: #d9534f;
            border: none;
        }

        .btn-danger:hover {
            background-color: #c9302c;
        }

        form {
            display: inline;
        }

    </style>

    <h1>Item Sales</h1>
    <a href="{{ route('item_sales.create') }}" class="btn btn-primary">Add Item Sale</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Item Code</th>
                <th>Item Name</th>
                <th>Quantity</th>
                <th>Expiry Date</th>
                <th>Note</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($itemSales as $itemSale)
                <tr>
                    <td>{{ $itemSale->id }}</td>
                    <td>{{ $itemSale->item_code }}</td>
                    <td>{{ $itemSale->item_name }}</td>
                    <td>{{ $itemSale->quantity }}</td>
                    <td>{{ $itemSale->expiry_date }}</td>
                    <td>{{ $itemSale->note ?? 'N/A' }}</td>
                    <td>{{ $itemSale->created_at }}</td>
                    <td>{{ $itemSale->updated_at }}</td>
                    <td>
                        <a href="{{ route('item_sales.edit', $itemSale->id) }}" class="btn btn-warning">Edit</a>
                        
                        <form action="{{ route('item_sales.destroy', $itemSale->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
