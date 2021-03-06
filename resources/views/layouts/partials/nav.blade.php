<div role="navigation" class="navbar navbar-default topnav">
  <div class="container">
    <div class="navbar-header">

      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>

      <a href="/" class="navbar-brand">
        <img src="{{ cdn('assets/images/logo4.png') }}" alt="Laravel China"/>
      </a>
    </div>

    <div id="top-navbar-collapse" class="collapse navbar-collapse">
      <ul class="nav navbar-nav">
        <li class="{{ (Request::is('topics') && ! Request::is('categories*') ? ' active' : '') }}"><a href="{{ route('topics.index') }}">{{ lang('Topics') }}</a></li>
        <li class="{{ (Request::is('categories/'.config('phphub.life_category_id')) || (isset($topic) && $topic->category_id == config('phphub.life_category_id'))) ? ' active' : '' }}"><a href="{{ route('categories.show', config('phphub.life_category_id')) }}">life</a></li>
        <li class="{{ Request::is('categories/1') || (isset($topic) && $topic->category_id === 1) ? ' active' : '' }}"><a href="{{ route('categories.show', 1) }}">{{ lang('Jobs') }}</a></li>
        <li class="{{ (Request::is('tickets') ? ' active' : '') }}"><a href="{{ route('categories.show', config('phphub.qa_category_id')) }}">Tickets</a></li>
        <li class="{{ (Request::is('relations') ? ' active' : '') }}"><a href="{{ route('topics.index') }}">Relations</a></li>
        <li class="{{ (Request::is('projects') ? ' active' : '') }}"><a href="{{ route('topics.index') }}">Projects</a></li>
      </ul>

      <div class="navbar-right">

        {{--@if ((Request::is('users*') && isset($user)) || (Request::is('search*') && $user->id > 0))

          <form method="GET" action="{{ route('search') }}" accept-charset="UTF-8"
                class="navbar-form navbar-left hidden-sm hidden-md">
            <div class="form-group">
              <input class="form-control search-input mac-style" placeholder="search：{{ $user->name }}" name="q"
                     type="text" value="{{ (Request::is('search*') && isset($query)) ? $query : '' }}">
              <input class="form-control search-input mac-style" name="user_id" type="hidden" value="{{ $user->id }}">
        @else
                <form method="GET" action="{{ route('search') }}" accept-charset="UTF-8"
                      class="navbar-form navbar-left hidden-sm hidden-md">
                  <div class="form-group">
                    <input class="form-control search-input mac-style" placeholder="search" name="q" type="text"
                           value="{{ (Request::is('search*') && isset($query)) ? $query : '' }}">
        @endif

                  </div>
                </form>--}}

                <ul class="nav navbar-nav github-login">
                  @if (Auth::check())
                    <li>
                      <a href="#" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-plus text-md"></i>
                      </a>
                      <ul class="dropdown-menu" aria-labelledby="dLabel">

                        <li>
                          <a class="button no-pjax"
                             href="{{ isset($category) ? '#'  : '#' }}">
                            <i class="fa fa-comment text-md"></i> create relation
                          </a>
                        </li>

                        <li>
                          <a class="button no-pjax"
                             href="{{ isset($category) ? '#'  : '#' }}">
                            <i class="fa fa-comment text-md"></i> create project
                          </a>
                        </li>

                        <li>
                          <a class="button no-pjax"
                             href="{{ isset($category) ? URL::route('topics.create', ['category_id' => $category->id]) : URL::route('topics.create') }}">
                            <i class="fa fa-comment text-md"></i> create Ticket
                          </a>
                        </li>



                      </ul>
                    </li>

                    <li>
                      <a href="{{ route('notifications.unread') }}" class="text-warning" style="margin-top: -4px;">
                      <span
                        class="badge badge-{{ $currentUser->notification_count + $currentUser->message_count > 0 ? 'important' : 'fade' }} popover-with-html"
                        data-content="notifications" id="notification-count">
                          {{ $currentUser->notification_count + $currentUser->message_count }}
                      </span>
                      </a>
                    </li>

                    <li>
                      <a href="#" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                         id="dLabel">
                        <img class="avatar-topnav" alt="Summer" src="{{ $currentUser->present()->gravatar }}"/>
                        {{ $currentUser->name }}
                        <span class="caret"></span>
                      </a>

                      <ul class="dropdown-menu" aria-labelledby="dLabel">

                        @if (Auth::user()->can('visit_admin'))
                          <li>
                            <a href="/admin" class="no-pjax">
                              <i class="fa fa-tachometer text-md"></i> admincp
                            </a>
                          </li>
                        @endif

                        @if(Auth::user()->can('access_board'))
                          <li>
                            <a class="button" href="{{ route('categories.show', config('phphub.admin_board_cid')) }}">
                              <i class="fa fa-users "></i> categories
                            </a>
                          </li>
                        @endif

                        <li>
                          <a class="button" href="{{ route('users.show', $currentUser->id) }}"
                             data-lang-loginout="{{ lang('Are you sure want to logout?') }}">
                            <i class="fa fa-user text-md"></i> users show
                          </a>
                        </li>
                        <li>
                          <a class="button" href="{{ route('users.edit', $currentUser->id) }}">
                            <i class="fa fa-cog text-md"></i> edit profile
                          </a>
                        </li>
                        <li>
                          <a id="login-out" class="button" href="{{ URL::route('logout') }}"
                             data-lang-loginout="{{ lang('Are you sure want to logout?') }}">
                            <i class="fa fa-sign-out text-md"></i> {{ lang('Logout') }}
                          </a>
                        </li>
                      </ul>
                    </li>

                  @else
                    <a href="{{ URL::route('auth.login') }}" class="btn btn-primary login-btn">
                      <i class="fa fa-user"></i>
                      {{ lang('Login') }}
                    </a>
                  @endif
                </ul>
            {{--</div>--}}
      </div><!-- /navbar-right -->
    </div>
  </div>