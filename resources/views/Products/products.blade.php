
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
                    <td><a href="/categories/{{$categories[$product->category_id - 1]["id"]}}">{{$categories[$product->category_id - 1]['category_name']}}</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{$products->links()}}
    </div>
@endsection

