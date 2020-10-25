@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">
            <h2>{{ empty($sales) ? 'Новая продажа' : 'Редактировать продажу' }}</h2>

        </div>
        <div class="card-body">
            @if (!$errors->isEmpty())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $item)
                        <p>{{ $item }}</p>
                    @endforeach
                </div>
            @endif
            @if (session()->has('error'))
                <div class="alert alert-danger">
                    {{ session()->get('error') }}
                </div>
            @endif
            <form class="needs-validation" novalidate method="post"
                action="{{ route('sales.save', !empty($sales) ? $sales->id : null) }}">
                {{ csrf_field() }}

                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="validationTooltip01">Продукт</label>
                        <select name="product_id" class="form-control">
                            @foreach ($products as $key => $v)
                                <option value="{{ $key }}">{{ $v }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="validationTooltip01">Цена продажи</label>
                        <input type="text" class="form-control" name="sale_price" id="validationTooltip01" required
                            value="{{ !empty($sales) ? $sales->sale_price : old('sale_price') }}">
                    </div>
                </div>


                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="validationTooltip01">Количество</label>
                        <input type="text" class="form-control" name="sale_amount" id="validationTooltip01" required
                            value="{{ !empty($sales) ? $sales->sale_amount : old('sale_amount') }}">
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="validationTooltip01">Номер партии</label>
                        <input type="text" class="form-control" name="party_number" id="validationTooltip01" required
                            value="{{ !empty($sales) ? $sales->party_number : old('party_number') }}">
                    </div>
                </div>


                <button class="btn btn-primary" type="submit">Продать</button>
            </form>
        </div>

    </div>


@endsection
