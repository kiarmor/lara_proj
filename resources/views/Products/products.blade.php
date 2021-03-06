
@extends('layout')

@section('title', 'Products')

@section('content')
    <p>This is our products.</p>

    <div class="container">
        <table class="table">
            <thead>
            <th>ID</th>
            <th>Product</th>
            <th></th>
            <th>Price</th>
            <th>Image</th>
            <th > <a href="/categories">Categories</a></th>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{$product->id}}</td>
                    <td><a href="/products/{{$product->id}}">{{$product->name}}</a></td>
                    <td>
                        @if(isset($auth))
                            @if($auth->role == 1)
                                <a href="/products/{{$product->id}}/edit">Edit </a>
                            @endif
                        @endif

                    </td>
                    <td>{{$product->price}}</td>
                    <td>
                        @if(isset($product->img_path))
                            <img src="{{asset("storage/$product->img_path")}}" height="100" width="100">
                        @endif
                    </td>
                    <td><a href="{{route('product.addToCart', ['id' => $product->id])}}" class="btn btn-success pull-right">Add</a></td>
                    <td><a href="/categories/{{$categories[$product->category_id - 1]["id"]}}">{{$categories[$product->category_id - 1]['category_name']}}</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{$products->links()}}
    </div>
@endsection

