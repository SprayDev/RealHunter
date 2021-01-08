<div>
    @foreach($fields as $k=>$field)
        @if(isset($data[$k]))
            <p><b>{{$field}}: </b>{{$data[$k]}}</p>
        @endif
    @endforeach
</div>
