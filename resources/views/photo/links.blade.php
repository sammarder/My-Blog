<div class="center">
    @if ($first != -1)
        <a href="{{ route('detail', ['season' => $season, 'id' => $first]) }}"><<</a>
    @endif
    @if ($prev != -1)
        <a href="{{ route('detail', ['season' => $season, 'id' => $prev]) }}"><</a>
    @endif
    {{ $id }}
    @if ($next != -1)
    <a href="{{ route('detail', ['season' => $season, 'id' => $next]) }}">></a>
    @endif
    @if ($last != -1)
        <a href="{{ route('detail', ['season' => $season, 'id' => $last]) }}">>></a>
    @endif
</div>
