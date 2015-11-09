@extends('app')

@section('css')
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" />
@stop

@section('javascript')
    <script type="text/javascript" src="{{ asset('/assets/js/app.js') }}"></script>
    <script>
        var uri = "{!! route('chat.update.online',[ 'id' => $room->id ]) !!}";
    </script>
@stop

@section('body')
    <div class="row pad-top pad-bottom">


        <div class=" col-lg-9 col-md-9 col-sm-9">
            <div class="chat-box-div">
                <div class="chat-box-head">
                    ЧАТ
                </div>
                <div class="panel-body chat-box-main">

                </div>
                <div class="chat-box-footer">
                    <div class="input-group">
                        <input type="text" class="form-control" id="message" placeholder="Enter Text Here...">
                            <span class="input-group-btn">
                                <button class="btn btn-info" type="button" id="sendMessage" data-room="{{ $room->id }}">SEND</button>
                            </span>
                    </div>
                </div>

            </div>

        </div>
        <div class="col-lg-3 col-md-3 col-sm-3">
            <div class="chat-box-online-div">
                <div class="chat-box-online-head">
                    В сети
                </div>
                <div class="panel-body chat-box-online">


                </div>

            </div>

        </div>

    </div>

@stop