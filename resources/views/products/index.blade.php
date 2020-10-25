@extends('layouts.app')
@section('content')
    <div class="card">
        @if (session()->has('success'))
            <div class="alert alert-success">{{ session()->get('success') }}</div>
        @endif
        <div class="card-header">
            <h2>Товары</h2>
            <div class="float-right m-20">
                <a href="{{ route('product.form') }}" class="btn btn-success">+ Добавить новый</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">

                <table class="table table-striped">

                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Название продукта</th>
                            <th scope="col">Действия</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <th scope="row">{{ $product->id }}</th>
                                <td>{{ $product->product_name }}</td>
                                <td>
                                    <a href="{{ route('product.form', $product->id) }}" class="btn btn-info">Изменить</a>
                                    <a href="{{ route('product.delete', $product->id) }}"
                                        class="btn btn-danger delete">Удалить</a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
                {!! $products->links() !!}
            </div>
        </div>

    </div>
@endsection
