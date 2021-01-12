<div>
    @foreach($fields as $k=>$field)
        @if(isset($data[$k]))
            @if($k == 'perm_title')
                <p><b>{{$field}} </b><a href="{{route('licenses.single', ['slug' => $data['perm_id']])}}">{{$data[$k]}}</a></p>
            @elseif($k == 'tour_title')
                <p><b>{{$field}} </b><a href="{{route('tours.single', ['slug' => $data['tour_id']])}}">{{$data[$k]}}</a></p>
            @elseif($k == 'season')
                @foreach($data[$k] as $index=>$item)
                    <p><b>{{$field}} {{$index + 1}}</b> {{$item}}</p>
                @endforeach
            @else
                <p><b>{{$field}}: </b>{{$data[$k]}}</p>
            @endif
        @endif
    @endforeach
</div>
