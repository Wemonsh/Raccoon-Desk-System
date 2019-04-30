@extends('layouts.default')

@section('content')
    <h1>{{ __('social/message/index.messages') }}</h1>
    <hr>

    <div class="messaging">
        <div class="inbox_msg rounded">
            <div class="inbox_people">
                <div class="headind_srch">
                    <div class="recent_heading">
                        <h4>{{ __('social/message/index.last') }}</h4>
                    </div>
                    <div class="srch_bar">
                        <a href="{{ route('messageSend') }}">{{ __('social/message/index.start_chat') }}</a>
                    </div>
                </div>
                <div class="inbox_chat scroll">
                @foreach($rooms as $room)
                    <a href="{{ route('messagesIndex', $room['id']) }}">
                        @if($id_room == $room['id'])
                            <div class="chat_list active_chat">
                        @else
                            <div class="chat_list">
                        @endif
                            <div class="chat_people">
                                <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                                <div class="chat_ib">
                                    @if($room['messages'][0]['sender']['id'] != $id_user)
                                        <h5>{{ $room['messages'][0]['sender']['last_name'].' '.$room['messages'][0]['sender']['first_name'] }}
                                    @else
                                        <h5>{{ $room['messages'][0]['receiver']['last_name'].' '.$room['messages'][0]['receiver']['first_name'] }}
                                    @endif
                                    <span class="chat_date">{{ $room['messages'][0]['created_at'] }}</span></h5>
                                    <p>
                                        @if($room['messages'][0]['sender']['id'] == $id_user)
                                            <strong>{{ __('social/message/index.you') }} </strong>
                                            @elseif($room['messages'][0]['unread'] == 0)
                                            <strong>{{ __('social/message/index.new_message') }} </strong>
                                        @endif
                                        {{ $room['messages'][0]['message'] }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
                </div>
            </div>
            <div class="mesgs">
                <div class="msg_history" id="chatArea">
                    @if(count($messages) != 0)
                        @foreach($messages as $message)
                            @if($message['id_sender'] == $id_user)
                                <div class="outgoing_msg mt-1">
                                    <div class="sent_msg">
                                        <p>{{ $message['message'] }}</p>
                                        <span class="time_date">{{ $message['created_at'] }}</span>
                                    </div>
                                </div>
                            @else
                                <div class="incoming_msg mt-1">
                                    <div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                                    <div class="received_msg">
                                        <div class="received_withd_msg">
                                            <p>{{ $message['message'] }}</p>
                                            <span class="time_date">{{ $message['created_at'] }}</span>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @else
                        <p>{{ __('social/message/index.empty') }}</p>
                    @endif
                </div>
                <div class="type_msg pb-1 pt-1">
                    <form method="post" action="{{ route('messageSend') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="text" name="id_receiver" value="{{ $id_receiver }}" hidden>

                        <div class="form-group">
                            <textarea class="form-control" name="message" id="message" rows="3" placeholder="{{ __('social/message/index.enter_text') }}"></textarea>
                        </div>

                        <div class="form-group">
                            <input type="file" name="file[]" class="form-control-file" id="files" multiple>
                        </div>

                        <button type="submit" class="btn btn-primary">{{ __('social/message/index.send') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        window.onload = function(){
            document.getElementById('chatArea').scrollTop = 9999;
        }
    </script>

@endsection