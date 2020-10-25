@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">
            <h2>{{ !empty($stock) ? 'Редактировать приход' : 'Добавить приход' }}</h2>

        </div>
        <div class="card-body">
            @if (!$errors->isEmpty())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $item)
                        {{ $item }}
                    @endforeach
                </div>
            @endif
            <form class="needs-validation" novalidate method="post"
                action="{{ route('stock.save', !empty($stock) ? $stock->id : null) }}">
                {{ csrf_field() }}

                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="validationTooltip01">Продукт</label>
                        <select name="product_id" class="form-control">
                            @foreach ($products as $key => $v)
                                <option value="{{ $key }}"
                                    {{ !empty($stock && $key == $stock->product_id) ? 'selected="selected"' : null }}>
                                    {{ $v }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="validationTooltip01">Приходная цена</label>
                        <input type="text" class="form-control" name="entry_price" id="validationTooltip01" required
                            value="{{ !empty($stock) ? $stock->entry_price : old('entry_price') }}">
                    </div>
                </div>


                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="validationTooltip01">Количество</label>
                        <input type="text" class="form-control" name="stock_amount" id="validationTooltip01" required
                            value="{{ !empty($stock) ? $stock->stock_amount : old('stock_amount') }}">
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="validationTooltip01">Номер партии</label>
                        <input type="text" class="form-control" name="party_number" id="validationTooltip01" required
                            value="{{ !empty($stock) ? $stock->party_number : old('party_number') }}">
                    </div>
                </div>


                <button class="btn btn-primary" type="submit">Сделать приход</button>
            </form>
        </div>

    </div>


@endsection
