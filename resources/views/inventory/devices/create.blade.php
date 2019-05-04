@extends('layouts.default')

@section('content')
    <h1>Добавить</h1>
    <hr>

    {!! Form::open(array('route' => 'devicesCreate', 'method' => 'POST', 'files' => 'true')) !!}

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
            {!! Form::select('manufactures', $manufactures, null, ['class' => 'form-control'] ) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('types', 'Тип') !!}
        <div>
            {!! Form::select('types', $types, null, ['class' => 'form-control', 'id' => 'types'] ) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('name', 'Название') !!}
        <div>
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
            {!! $errors->first('name', '<p class="alert alert-danger">:message</p>') !!}
        </div>
    </div>

    <hr>
    <div class="form-group">
        {!! Form::label('name', 'Характеристики') !!}
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
        {!! Form::label('photo', 'Фото') !!}
        {!! Form::file('photo', ['id' => 'photo', 'class' => 'form-control-file']) !!}
    </div>

    {!! Form::submit(__('social/event/index.add'), ['class' => 'btn btn-primary']) !!}

    {!! Form::close() !!}

@endsection