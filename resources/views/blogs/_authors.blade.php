<div class="panel panel-default corner-radius" style="padding-bottom: 20px;">

  <div class="panel-heading">
    <h3 class="panel-title">专栏Author</h3>
  </div>

  <div class="panel-body  topic-author-box blog-info">

    @foreach ($authors as $index => $author)
      @if ($author->is_banned != 'yes')
        <a class="" href="{{ route('users.show', [$author->id]) }}"
           title="{{ $author->name . ($author->introduction ? ' - ' . $author->introduction : '')}}">
          <img class=" img-thumbnail avatar avatar-middle" alt="{{ $author->name }}"
               src="{{ $author->present()->gravatar }}"/>
        </a>
      @endif
    @endforeach
  </div>

</div>