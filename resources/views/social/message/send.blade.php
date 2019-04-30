@extends('layouts.default')

@section('content')
    <h1>{{ __('social/message/send.new_message') }}</h1>
    <hr>
    <form method="post" action="{{ route('messageSend') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="id_receiver">{{ __('social/message/send.whom') }}</label>
            <select class="form-control" name="id_receiver" id="id_receiver">
                @foreach($users as $user)
                    <option value="{{ $user['id'] }}">{{ $user['last_name'].' '.$user['first_name'].' '.$user['middle_name'] }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="message">{{ __('social/message/send.message') }}</label>
            <textarea class="form-control" name="message" id="message" rows="3" placeholder="{{ __('social/message/send.enter_text') }}"></textarea>
        </div>

        <div class="form-group">
            <label for="files">{{ __('social/message/send.attach_files') }}</label>
            <input type="file" name="file[]" class="form-control-file" id="files" multiple>
        </div>

        <button type="submit" class="btn btn-primary">{{ __('social/message/send.send') }}</button>
    </form>

@endsection