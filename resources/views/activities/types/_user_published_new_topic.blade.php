<li class="list-group-item media">
  <div class="avatar pull-left">
    <a href="{{ route('users.show', [$activity->user->id]) }}">
      <img class="media-object img-thumbnail avatar" alt="{{ $activity->user->name }}"
           src="{{ $activity->user->present()->gravatar }}"/>
    </a>
  </div>
  <div class="infos">
    <div class="media-heading">

      <i class="fa fa-file-text-o" aria-hidden="true"></i>

      <a href="{{ route('users.show', [$activity->user->id]) }}">
        {{ $activity->user->name }}
      </a>
      @if ($activity->data['topic_type'] == 'article')
        Publish the Article
        <?php
        $topic_title = "《" . str_limit($activity->data['topic_title'], '100') . "》";
        ?>
      @else
        在 <a
          href="{{ route('categories.show', $activity->data['topic_category_id'] ) }}">{{ $activity->data['topic_category_name'] }}</a>
        underrelease  the topic

        <?php
        $topic_title = str_limit($activity->data['topic_title'], '100');
        ?>
      @endif
      <a href="{{ $activity->data['topic_link'] }}" title="{{ $activity->data['topic_title'] }}">
        {{ $topic_title }}
      </a>
             <span class="meta pull-right">
                 <span class="timeago">{{ $activity->created_at }}</span>
            </span>

      @include("activities._topic_images")
    </div>
  </div>
</li>