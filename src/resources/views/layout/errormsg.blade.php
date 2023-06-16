@if(count($errors) > 0)
    @foreach($errors->all() as $error)
        <div class="alert alert-danger" role="alert" style="font-size:0.8rem; padding:10px;">{{$error}}</div>
    @endforeach
@endif

@if(session()->has('error'))
    <div class="alert alert-danger" role="alert" style="font-size:0.8rem; padding:10px;">{!! session('error') !!}</div>
@endif