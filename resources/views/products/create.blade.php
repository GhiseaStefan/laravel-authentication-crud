<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Product</title>
</head>

<body>
    <h1>Create Product</h1>
    <div>
        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
    </div>
    <form method="POST" action="{{ route('products.store') }}">
        @csrf
        @method('post')
        <div>
            <label for="name">Name</label>
            <input type="text" name="name" id="name" placeholder="Name" />
        </div>
        <div>
            <label for="quantity">Quantity</label>
            <input type="text" name="quantity" id="quantity" placeholder="Quantity" />
        </div>
        <div>
            <label for="price">Price</label>
            <input type="text" name="price" id="price" placeholder="Price" />
        </div>
        <div>
            <label for="description">Description</label>
            <input type="text" name="description" id="description" placeholder="Description" />
        </div>
        <div>
            <input type="submit" value="Create" />
        </div>
    </form>
</body>

</html>
