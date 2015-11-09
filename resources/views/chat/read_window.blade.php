@foreach($messages as $message)
<div class="chat-box-{{ $message->user_id == Auth::user()->id ? 'right' : 'left' }}">
    {{ $message->message }}
</div>
<div class="chat-box-name-{{ $message->user_id == Auth::user()->id ? 'right' : 'left' }}">
    - {{ $message->user->name }}
</div>
<hr class="hr-clas" />
@endforeach