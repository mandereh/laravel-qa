<a title="Click to mark as favourite question(click again to undo)" 
    class="favourite mt-2 {{ Auth::guest() ? 'off' : ($model->is_favorited ? 'favourited' : '') }} "
    onclick="event.preventDefault(); document.getElementById('favorite-question-{{ $model->id }}').submit();"
    >
        <i class="fas fa-star fa-2x"></i>
        <span class="favourite-count">{{ $model->favorites_count }}</span>
    </a>
    <form id="favorite-question-{{ $model->id }}" action="/{{ $firstURISegment }}/{{ $model->id }}/favorites" method="post" style="display: none;">
        @csrf
        @if ($model->is_favorited)
            @method('DELETE')
        @endif
    </form>