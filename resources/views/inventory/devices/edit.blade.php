
@extends('layouts.default')

@section('breadcrumbs')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mt-3">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Главная</a></li>
            <li class="breadcrumb-item"><a href="{{ route('inventoryIndex') }}">Активы предприятия</a></li>
            <li class="breadcrumb-item"><a href="{{ route('devicesIndex') }}">Группы МТС</a></li>
            <li class="breadcrumb-item active" aria-current="page">Редактировать группу МТС</li>
        </ol>
    </nav>
@endsection

@section('content')
    <h1>Редактировать группу МТС</h1>
    <hr>
    {!! Form::open(array('route' => array('devicesEdit', $id), 'method' => 'POST', 'files' => 'true')) !!}

    @if (Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
    @elseif(Session::has('warning'))
        <div class="alert alert-danger">
            {{ Session::get('warning') }}
        </div>
    @endif

    <div class="form-group">
        {!! Form::label('manufactures', 'Производитель') !!}
        <div>
            {!! Form::select('manufactures', $manufactures, $device->id_manufacture, ['class' => 'form-control'] ) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('types', 'Тип') !!}
        <div>
            {!! Form::select('types', $types, $device->id_type, ['class' => 'form-control', 'id' => 'types'] ) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('name', 'Название') !!}
        <div>
            {!! Form::text('name', $device->name, ['class' => 'form-control']) !!}
            {!! $errors->first('name', '<p class="alert alert-danger">:message</p>') !!}
        </div>
    </div>

    <hr>
    <div class="form-group">
        {!! Form::label('specifications', 'Характеристики') !!}
        <div id="specifications">

        </div>
    </div>
    <script>
        $(document).ready(function() {

            var select  = $('#types');
            ajax(select.val());

            console.log(select.val());

            $('#types').change(function () {
                ajax(this.value);
            });
        });

        function ajax (id) {
            $.ajax({
                type: "POST",
                url: "/inventory/devices/api/getTypes",
                data: {id: id, _token: '{{csrf_token()}}'},
                dataType: 'JSON',

                success: function(data) {

                    var countainer = $('#specifications');

                    countainer.empty();
                    console.clear();

                    var d = $.parseJSON(data.properties);
                    $.each(d, function(key,value) {


                        countainer.append('<input type="text" class="form-control mt-1" name="specifications['+ value +']" placeholder="'+ value +'">');
                        console.log(key+' '+value);
                    });
                }}
            );
        }
    </script>
    
    <div class="form-group">
        <label for="image">Изображение</label>
        <br>
        @if($device->photo != null)
            <img src="{{ asset('/storage/' . $device->photo) }}" class="card-img-top rounded" style="object-fit: cover; width: 300px; height: 250px;">
        @else
            <img src="/img/no_image.png" width="100px" height="100px" style="object-fit: cover; width: 300px; height: 250px;" class="mr-3 rounded" alt="Изображение отсутствует">
        @endif
        <hr>
    </div>

    <div class="form-group">
        {!! Form::label('photo', 'Изменить изображение') !!}
        {!! Form::file('photo', ['id' => 'photo', 'class' => 'form-control-file']) !!}
    </div>

    {!! Form::submit('Изменить', ['class' => 'btn btn-primary']) !!}

    {!! Form::close() !!}

@endsection