<style>
    th,
    td {
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: #D6EEEE;
    }

</style>
<div class="container mt-3">
    <h1>Your order</h1>
    <table class="table">
        <thead>
            <tr class="bg-info">
                <th>Product Name</th>
                <th>Description</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($user as $item)
                <tr>
                    <td>{{ $item['products'][0]->name }}</td>
                    <td>{{ $item['products'][0]->description }}</td>
                    <td>{{ $item['products'][0]->price }}</td>
                </tr>
            @endforeach
            <tr>
                <td colspan="2">Total</td>
                <td>{{ $sum }}</td>
            </tr>
        </tbody>
    </table>
    <h1>Thanks for purchase </h1>
