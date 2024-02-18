<ul class="py-4 list-decimal divide-y">
    @foreach($latestposts as $key => $item)
      <li>
        <a href="{{route('posts.index')}}"> {{ $item->title ?? '' }}</a>
      </li>
    @endforeach
</ul>