@extends('layouts.loginlayout')

@section('content')
<form class="form-vertical" method="POST" action="{{ route('login') }}">
    @csrf
    <div class="module-head">
        <h3>Sign In</h3>
    </div>
    <div class="module-body">
        <div class="control-group">
            <div class="controls row-fluid">
                <input id="email" type="email" class="span12 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="control-group">
            <div class="controls row-fluid">
                <input id="password" type="password" class="span12 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
    </div>
    <div class="module-foot">
        <div class="control-group">
            <div class="controls clearfix">
                <button type="submit" class="btn btn-primary pull-right">Login</button>
                <label class="checkbox">
                    <input type="checkbox"> Remember me
                </label>
            </div>
        </div>
    </div>
</form>






@endsection
