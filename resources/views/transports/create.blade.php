@extends('transports.layout')

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <div class="card uper">
        <div class="card-header">
            Добавить транспорт
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br/>
            @endif
            <form method="post" action="{{ route('transportt.store') }}">
                <div class="form-group">
                    @csrf
                    <label for="name">Марка:</label>
                    <input type="text" class="form-control" name="brand"/>
                </div>
                <div class="form-group">
                    <label for="mileage">Пробег :</label>
                    <input type="number" class="form-control" name="mileage"/>
                </div>
                <button type="submit" class="btn btn-primary">Добавить</button>
            </form>
        </div>
    </div>
@endsection