@extends('layouts.app')
@section('content')
    <div class="card">
        @if (session()->has('success'))
            <div class="alert alert-success">{{ session()->get('success') }}</div>
        @endif
        <div class="card-header">
            <h2>Продажи</h2>
            <div class="float-right m-20">
                <a href="{{ route('sales.form') }}" class="btn btn-success">+ Новая продажа </a>
            </div>
        </div>
        <div class="card-body">

            <div class="row">
                <div class="col-6">
                    <form method="get">
                        <div class="form-group">
                            <label for="start_date">Начало</label>
                            <input type="text" class="form-control datepicker" data-toggle="datepicker"
                                value="{{ request()->has('start_date') ? request()->get('start_date') : null }}"
                                name="start_date">
                        </div>
                        <div class="form-group">
                            <label for="start_date">Конец</label>
                            <input type="text" class="form-control datepicker" data-toggle="datepicker"
                                value="{{ request()->has('end_date') ? request()->get('end_date') : null }}"
                                name="end_date">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Применить</button>
                        </div>
                        <form>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Название продукта</th>
                            <th>Цена продажи</th>
                            <th>Количество</th>
                            <th>Номер партии товара</th>
                            <th>Дата продажи</th>
                            <th>Себестоимость</th>
                            <th>Выручка</th>
                            <th>Прибыль</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sales as $sale)
                            <tr>
                                <th scope="row">{{ $sale->id }}</th>
                                <td>{{ $sale->product->product_name }}</td>
                                <td>{{ $sale->sale_price }}</td>
                                <td>{{ $sale->sale_amount }}</td>
                                <td>{{ $sale->party_number }}</td>
                                <td>{{ $sale->created_at }}</td>
                                <td>{{ $sale->original_cost }} $</td>
                                <td>{{ $sale->viruchka }} $</td>
                                <td>{{ $sale->profit }}$</td>
                            </tr>
                        @endforeach

                        <tr>
                            <td class="table-info" td class="info"><strong>Итого</strong></th>
                            <td class="table-info"></td>
                            <td class="table-info">
                                </th>
                            <td class="table-info"></td>
                            <td class="table-info">
                                </th>
                            <td class="table-info"></td>

                            <td class="table-info">
                                <strong>{{ number_format($total_original_costs) }}</strong> $
                                </th>
                            <td class="table-info">
                                <strong> {{ number_format($total_viruchka) }} $</strong>
                                </th>
                            <td class="table-info">
                                <strong> {{ number_format($total_profit) }} $</strong>
                                </th>
                        </tr>

                    </tbody>
                </table>
                {!! $sales->links() !!}
            </div>
        </div>

    </div>
@endsection
