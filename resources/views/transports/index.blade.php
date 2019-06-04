@extends('transports.layout')
@section('content')
    <div class="container">
        @if(session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div><br/>
        @endif
            <a href="{{route('transportt.create')}}"><button class="btn btn-success">Создать</button></a>
        <table class="table table-striped">
            <thead>
            <tr>
                <td>Марка</td>
                <td>Пробег</td>
                <td>Водитель</td>
                <td>Тип транспорта</td>
                <td>Статус</td>
                <td></td>
                <td></td>
            </tr>
            </thead>
            <tbody>
            @foreach($transports['transports'] as $transport)
                <tr>
                    <td>{{$transport->brand}}</td>
                    <td>{{$transport->mileage}}</td>
                    <td>{{App\Driver::find($transport->driver_id)['name']}}</td>
                    <td>{{App\TransportType::find($transport->type_id)['name']}}</td>
                    <td>{{App\TransportStatus::find($transport->status_id)['name']}}</td>
                    <td><a href="{{ route('transportt.edit',$transport->id)}}" class="btn btn-primary">Изменить</a>
                    </td>
                    <td>
                        <form action="{{ route('transportt.destroy', $transport->id)}}" method="post">
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