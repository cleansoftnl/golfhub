<ul class="list list-group">
  @foreach ($sidebarTopics as $index => $sidebarTopic)
    <li class="list-group-item">
      <a href="{{ $sidebarTopic->link() }}" title="{{ $sidebarTopic->title }}">

        @if (isset($numbered))
          {{ $index }}.
        @endif

        {{ $sidebarTopic->title }}
      </a>
    </li>
  @endforeach
</ul>
