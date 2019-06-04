@extends('drivers.layout')
@section('content')
    <div class="container">
        @if(session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div><br/>
        @endif
        <a href="{{route('driverr.create')}}">
            <button class="btn btn-success">Создать</button>
        </a>
        <table class="table table-striped">
            <thead>
            <tr>
                <td>Имя</td>
                <td>День рождения</td>
                <td></td>
                <td></td>
            </tr>
            </thead>
            <tbody>
            @foreach($drivers['drivers'] as $driver)

                <tr>
                    <td>{{$driver->name}}</td>
                    <td>{{$driver->birth_date}}</td>
                    <td><a href="{{ route('driverr.edit',$driver->id)}}" class="btn btn-primary">Изменить</a></td>
                    <td>
                        <form action="{{ route('driverr.destroy', $driver->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Удалить</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection