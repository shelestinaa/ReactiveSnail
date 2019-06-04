@extends('transports.layout')

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <div class="card uper">
        <div class="card-header">
            Изменить информацию об автомобиле
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
            <form method="post" action="{{ route('transportt.update', $transport->id) }}">
                @method('PATCH')
                @csrf
                <div class="form-group">
                    <label for="brand">Марка:</label>
                    <input type="text" class="form-control" name="brand" value={{ $transport->brand}} />
                </div>
                <div class="form-group">
                    <label for="mileage">Пробег:</label>
                    <input type="number" class="form-control" name="mileage" value={{ $transport->mileage }} />
                </div>
                <div class="form-group">
                    <label for="driver_id">Водитель:</label>
                    <select class="form-control" name="driver_id">
                        @foreach ($drivers as $driver)
                            <option value="{{$driver->id}}">{{$driver->id}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="type_id">Тип:</label>
                    <select class="form-control" name="type_id">
                        @foreach ($types as $type)
                            <option value="{{$type->id}}">{{$type->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="status_id">Статус:</label>
                    <select class="form-control" name="status_id">
                        @foreach ($statuses as $status)
                            <option value="{{$status->id}}">{{$status->name}}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Изменить</button>
            </form>
        </div>
    </div>
@endsection