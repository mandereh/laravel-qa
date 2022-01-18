@if ($model instanceof App\Question)
    @php
        $name = 'question';
        $firstURISegment = 'questions';
    @endphp
@elseif ($model instanceof App\Answer)

    @php
        $name = 'answer';
        $firstURISegment = 'answers';
    @endphp
    
@endif
@php
    $formId = $name ."-". $model->id;
    $formAction = "/{ $firstURISegment }/{ $model->id }/vote";
@endphp
<div class="d-flex flex-column vote-controls">
        {{-- upvote question --}}
    <a title="This {{ $name }} is useful" class="vote-up {{ Auth::guest() ? 'off' : '' }}"
    onclick="event.preventDefault(); document.getElementById('up-vote-{{ $formId }}').submit();"
    >  <i class="fas fa-caret-up fa-2x"></i>
    </a>
    <form id="up-vote-{{ $formId }}" action="{{ $formAction }}" method="post" style="display: none;">
        @csrf
        <input type="hidden" name="vote" value="1">
    </form>
        {{-- vote counts --}}
    <span class="votes-count">{{ $model->votes_count }}</span>
        {{-- downvote question --}}
    <a title="This answer is not useful" class="vote-down {{ Auth::guest() ? 'off' : '' }}"
    onclick="event.preventDefault(); document.getElementById('down-vote-{{ $formId }}').submit();"
    >
        <i class="fas fa-caret-down fa-2x"></i>
    </a>
    <form id="down-vote-{{ $formId }}" action="{{ $formAction }}" method="post" style="display: none;">
        @csrf
        <input type="hidden" name="vote" value="-1">
    </form>
        {{-- Mark as favourite --}}
        @if ($model instanceof App\Question)
            <favorite :question="{{ $model }}"></favorite>
        @elseif($model instanceof App\Answer)
            <accept :answer="{{ $model }}"></accept>
        @endif
</div>