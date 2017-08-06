@if ($topic->is_excellent == 'yes')
  <div class="ribbon">
    <div class="ribbon-excellent">
      <i class="fa fa-trophy"></i> {{ lang('This topic has been mark as Excenllent Topic.') }}
    </div>
  </div>
@endif

@if ($topic->order == -1)
  <div class="ribbon">
    <div class="ribbon-anchored">
      @if ($topic->category_id === 1)
        <i class="fa fa-anchor"></i> 此贴已 <a href="https://laravel-china.org/topics/2802">under沉</a>，请按照 <a
          href="https://laravel-china.org/topics/817/laravel-china-recruitment-post-specification">招聘贴release 规范</a> 修改，改后 @
        operation员取消under沉。
      @else
        <i class="fa fa-anchor"></i> 此贴已under沉，请查看 <a href="https://laravel-china.org/topics/2802">under沉说明</a> 修改，改后 @ operation员取消under沉。
      @endif
    </div>
  </div>
@endif
