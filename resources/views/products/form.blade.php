@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">
            <h2>{{ !empty($product) ? 'Редактировать' : 'Добавить' }}</h2>

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
                action="{{ route('product.save', !empty($product) ? $product->id : null) }}">
                {{ csrf_field() }}
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="validationTooltip01">Название</label>
                        <input type="text" class="form-control" name="product_name" id="validationTooltip01" required
                            value="{{ !empty($product) ? $product->product_name : old('product_name') }}">
                    </div>

                </div>

                <button class="btn btn-primary" type="submit">Сохранить</button>
            </form>
        </div>

    </div>


@endsection
