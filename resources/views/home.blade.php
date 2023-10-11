<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
</head>

<body>
    <h1>User: {{ $user->name }}</h1>
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button>Log Out</button>
    </form>
    <div>
        <h1>Products</h1>
        <div>
            @if (session()->has('success'))
                {{ session('success') }}
            @endif
        </div>
        <div>
            <a href="{{ route('products.create') }}">Create Product</a>
        </div>
        <div>
            <table>
                <tr>
                    <th>id</th>
                    <th>name</th>
                    <th>quantity</th>
                    <th>price</th>
                    <th>description</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->quantity }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->description }}</td>
                        <td>
                            <a href="{{ route('products.edit', ['product' => $product]) }}">Edit</a>
                        </td>
                        <td>
                            <form method="POST" action="{{ route('products.destroy', ['product' => $product]) }}">
                                @csrf
                                @method('delete')
                                <input type="submit" value="Delete" />
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
</body>

</html>
