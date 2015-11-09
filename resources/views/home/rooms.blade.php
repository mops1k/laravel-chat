@extends('app')

@section('javascript')
    <script>
        $(document).ready(function () {
            var uri = "{{ route('chat.delete.online') }}";
            $.ajax({
                url: uri,
                type: 'DELETE',
                success: function(result) {
                    console.log(result);
                }
            });
        });
    </script>
@stop
@section('body')
    <ul class="list-group">
        @foreach($rooms as $room)
            <li class="list-group-item"><a href="/room/{{ $room->id }}">{{ $room->name }}</a>
                <p><small>{{ $room->description }}</small></p>
            </li>
        @endforeach
    </ul>
@stop