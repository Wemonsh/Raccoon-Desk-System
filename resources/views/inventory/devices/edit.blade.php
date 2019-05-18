
@extends('layouts.default')

@section('breadcrumbs')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mt-3">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('inventory/devices/edit.main') }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('inventoryIndex') }}">{{ __('inventory/devices/edit.enterprise_assets') }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('devicesIndex') }}">{{ __('inventory/devices/edit.mtm_groups') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ __('inventory/devices/edit.edit_mtm_group') }}</li>
        </ol>
    </nav>
@endsection

@section('content')
    <h1>{{ __('inventory/devices/edit.edit_mtm_group') }}</h1>
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
        {!! Form::label('id_manufacture', __('inventory/devices/edit.manufacturer')) !!}
        <div>
            {!! Form::select('id_manufacture', $manufactures, $device->id_manufacture, ['class' => 'form-control'] ) !!}
            {!! $errors->first('id_manufacture', '<p class="alert alert-danger">:message</p>') !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('id_type', __('inventory/devices/edit.type')) !!}
        <div>
            {!! Form::select('id_type', $types, $device->id_type, ['class' => 'form-control', 'id' => 'types'] ) !!}
            {!! $errors->first('id_type', '<p class="alert alert-danger">:message</p>') !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('name', __('inventory/devices/edit.name')) !!}
        <div>
            {!! Form::text('name', $device->name, ['class' => 'form-control']) !!}
            {!! $errors->first('name', '<p class="alert alert-danger">:message</p>') !!}
        </div>
    </div>

    <hr>
    <div class="form-group">
        {!! Form::label('specifications', __('inventory/devices/edit.specifications')) !!}
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

        //TO DO "Изображение отсутствует" заполнить! 108 строка
        <label for="image">{{ __('inventory/devices/edit.image') }}</label>
        <br>
        @if($device->photo != null)
            <img src="{{ asset('/storage/' . $device->photo) }}" class="card-img-top rounded" style="object-fit: cover; width: 300px; height: 250px;">
        @else
            <img src="/img/no_image.png" width="100px" height="100px" style="object-fit: cover; width: 300px; height: 250px;" class="mr-3 rounded" alt="Изображение отсутствует">
        @endif
        <hr>
    </div>

    <div class="form-group">
        {!! Form::label('photo', __('inventory/devices/edit.change_image')) !!}
        {!! Form::file('photo', ['id' => 'photo', 'class' => 'form-control-file']) !!}
        {!! $errors->first('photo', '<p class="alert alert-danger">:message</p>') !!}
    </div>

    {!! Form::submit(__('inventory/devices/edit.change'), ['class' => 'btn btn-primary']) !!}

    {!! Form::close() !!}

@endsection