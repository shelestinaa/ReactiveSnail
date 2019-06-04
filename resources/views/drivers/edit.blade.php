@extends('drivers.layout')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                Изменить информацию о водителе
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
                <form method="post" action="{{ route('driverr.update', $driver->id) }}">
                    @method('PATCH')
                    @csrf
                    <div class="form-group">
                        <label for="name">Имя:</label>
                        <input type="text" class="form-control" name="name" value={{ $driver->name }} />
                    </div>
                    <div class="form-group">
                        <label for="price">Дата рождения:</label>
                        <input type="date" class="form-control" name="birth_date" value={{ $driver->birth_date }} />
                    </div>
                    <button type="submit" class="btn btn-primary">Изменить</button>
                </form>
            </div>
        </div>
    </div>
@endsection