@section('users')
    <div>
        @foreach ($users as $user)
            <div><a href="{{route('users.show', $user->id)}}">{{$user->id}}.{{$user->title}}</a></div>
        @endforeach
    </div>
@endsection