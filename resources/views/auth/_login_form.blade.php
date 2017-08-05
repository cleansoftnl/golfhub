<form method="POST" action="{{ route('auth.login') }}" accept-charset="UTF-8">
  {{ csrf_field() }}

  <input type="hidden" name="remember" value="yes">

  @if (isset($login_required))
    <div class="alert alert-warning">
      你需要sign in以后才能操作。
    </div>
  @endif

  <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
    <label class="control-label" for="email">{{ lang('Email') }}</label>
    <input class="form-control" name="email" type="text" value="{{ old('email') }}" placeholder="请填写 Email">
    {!! $errors->first('email', '<span class="help-block">:message</span>') !!}
  </div>

  <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
    <label class="control-label" for="password">password</label>
    <input class="form-control" name="password" type="password" value="{{ old('password') }}" placeholder="请填写密码">
    {!! $errors->first('password', '<span class="help-block">:message</span>') !!}
  </div>

  <button type="submit" class="btn btn-lg btn-success btn-block">
    <i class="fa fa-btn fa-sign-in"></i> sign in
  </button>

  <hr>

  <fieldset class="form-group">
    <div class="alert alert-info">
      use the following method to register or sign in（<a class="forget-password">forgot password？</a>）
    </div>
    <a class="btn btn-lg btn-default btn-block" id="login-required-submit"
       href="{{ URL::route('auth.oauth', ['driver' => 'github']) }}"><i
        class="fa fa-github-alt"></i> {{lang('Login with GitHub')}}</a>
    <a class="btn btn-lg btn-default btn-block" href="{{ URL::route('auth.oauth', ['driver' => 'wechat']) }}"><i
        class="fa fa-weixin"></i> {{lang('Login with WeChat')}}</a>
  </fieldset>
</form>

