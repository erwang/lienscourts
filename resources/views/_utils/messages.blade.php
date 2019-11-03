@foreach(\App\Message::get() as $message)
    @component('_utils.alert',['type'=>$message['type']])
        {{$message['text']}}
    @endcomponent
@endforeach
