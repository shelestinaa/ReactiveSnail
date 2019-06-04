@extends('transports.layout')

@section('content')
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
                <div class="form-group">
                    <label for="driver_id">Водитель:</label>
                    <select class="form-control" name="driver_id">
                        @foreach (App\Driver::all() as $driver)
                            <option value="{{$driver->id}}"></option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="type_id">Тип:</label>
                    <select class="form-control" name="type_id">
                        @foreach (App\TransportType::all() as $type)
                            <option value="{{$type->id}}"></option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="status_id">Статус:</label>
                    <select class="form-control" name="status_id">
                        @foreach (App\TransportStatus::all() as $status){{$status->name}}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Добавить</button>
            </form>
        </div>
    </div>
@endsection