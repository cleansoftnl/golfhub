<div class="meta inline-block">

  cat: <a href="{{ route('categories.show', $topic->category->id) }}" class="remove-padding-left"><i class="fa fa-folder text-md" aria-hidden="true"></i> {{ $topic->category->name }}</a> |
  auth: <a class="author" href="{{ route('users.show', $topic->user->id) }}">{{ $topic->user->name }}</a> | at: {{ lang('at') }} timeago <abbr title="{{ $topic->created_at }}" class="timeago">{{ $topic->created_at }}</abbr> |
  @if (count($topic->lastReplyUser))
    {{ lang('last_reply_by') }}
    <a href="{{ URL::route('users.show', [$topic->lastReplyUser->id]) }}">
      {{ $topic->lastReplyUser->name }}
    </a>
    {{ lang('at') }} <abbr title="{{ $topic->updated_at }}" class="timeago">{{ $topic->updated_at }}</abbr>
    timeago
  @endif

  reads : {{ $topic->view_count }} {{ lang('Reads') }}

  @if ($topic->source && in_array($topic->source, ['iOS', 'Android'])){{{'UserAgent'}}}@endif
</div>
<div class="clearfix"></div>
