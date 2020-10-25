@extends('layouts.app')
@section('content')
    <div class="card">
        @if (session()->has('success'))
            <div class="alert alert-success">{{ session()->get('success') }}</div>
        @endif
        <div class="card-header">
            <h2>Склад (приход)</h2>
            <div class="float-right m-20">
                <a href="{{ route('stock.form') }}" class="btn btn-success">+ Сделать приход </a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">

                <table class="table table-striped">

                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Название продукта</th>
                            <th>Приходная цена</th>
                            <th>Количество</th>
                            <th>Дата прихода </th>
                            <th>Номер партии товара</th>
                            <th scope="col">Действия</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($stocks as $stock)
                            <tr>
                                <th scope="row">{{ $stock->id }}</th>
                                <td>{{ $stock->product->product_name }}</td>
                                <td>{{ $stock->entry_price }}</td>
                                <td>{{ $stock->stock_amount }}</td>
                                <td>{{ $stock->created_at }}</td>
                                <td>{{ $stock->party_number }}</td>
                                <td>
                                    <a href="{{ route('stock.form', $stock->id) }}" class="btn btn-info">Изменить</a>
                                    <a href="{{ route('product.delete', $stock->id) }}"
                                        class="btn btn-danger delete">Удалить</a>
                                </td>
                            </tr>
                        @endforeach

                        <tr>
                            <td class="table-info" td class="info"><strong>Итого</strong></th>
                            <td class="table-info"></td>
                            <td class="table-info">
                                </th>
                            <td class="table-info"><strong>{{ $stocks->sum('stock_amount') }}</strong></td>
                            <td class="table-info">
                                </th>
                            <td class="table-info"></td>
                            <td class="table-info">
                                </th>
                        </tr>

                    </tbody>
                </table>
                {!! $stocks->links() !!}
            </div>
        </div>

    </div>
@endsection
