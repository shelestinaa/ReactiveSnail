@extends('transports.layout')
@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <div class="uper">
        @if(session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div><br/>
        @endif
        <table class="table table-striped">
            <thead>
            <tr>
                <td>Марка</td>
                <td>Пробег</td>
                <td>Водитель</td>
                <td>Тип транспорта</td>
                <td>Статус</td>
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
                    <td><a href="{{ route('transportt.edit',$transport->id)}}" class="btn btn-primary">Изменить</a></td>
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