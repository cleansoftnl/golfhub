<!DOCTYPE html>
<html lang="zh">
<head>

  <meta charset="UTF-8">

  <title>@section('title')Laravel China 社区 - 高品质 of  Laravel 和 PHP 开发者社区@show - Powered by PHPHub</title>

  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"/>

  <meta name="keywords"
        content="php,laravel,php论坛,laravel论坛,php社区,laravel社区,laravelTutorial,phpTutorial,laravel视频,php开源,php新手,php7,laravel5"/>
  <meta name="author" content="PHPHub"/>
  <meta name="description"
        content="@section('description') Laravel China 是国内最大 of  Laravel 和 PHP ，致力于推动 Laravel，PHP7、php-fig 等 PHP 新技术，新理念在中国 of 发展，是国内最靠谱 of  PHP 论坛。 @show"/>
  <meta name="_token" content="{{ csrf_token() }}">

  <link rel="stylesheet" href="{{ cdn(elixir('assets/css/styles.css')) }}">

  <link rel="shortcut icon" href="{{ cdn('favicon1.png') }}"/>

  <script>
    Config = {
      'cdnDomain': '{{ get_cdn_domain() }}',
      'user_id': {{ $currentUser ? $currentUser->id : 0 }},
      'user_avatar': {!! $currentUser ? '"'.$currentUser->present()->gravatar() . '"' : '""' !!},
      'user_link': {!! $currentUser ? '"'. route('users.show', $currentUser->id) . '"' : '""' !!},
      'user_badge': '{{ $currentUser ? ($currentUser->present()->hasBadge() ? $currentUser->present()->badgeName() : '') : '' }}',
      'user_badge_link': "{{ $currentUser ? (route('roles.show', [$currentUser->present()->badgeID()])) : '' }}",
      'routes': {
        'notificationsCount': '{{ route('notifications.count') }}',
        'upload_image': '{{ route('upload_image') }}'
      },
      'token': '{{ csrf_token() }}',
      'environment': '{{ app()->environment() }}',
      'following_users': [],
      'qa_category_id': '{{ config('phphub.qa_category_id') }}'
    };

    var ShowCrxHint = '{{isset($show_crx_hint) ? $show_crx_hint : 'no'}}';
  </script>

  @yield('styles')

  <meta http-equiv="x-pjax-version" content="{{ elixir('assets/css/styles.css') }}">

</head>
<body id="body" class="{{ route_class() }}">



  <div id="wrap">

    @include('layouts.partials.nav')

    <div class="container main-container">

      @include('flash::message')

      @yield('content')

    </div>


  </div>



  <script src="{{ cdn(elixir('assets/js/scripts.js')) }}"></script>

  @yield('scripts')

</body>
</html>
