@if (count($items) > 0)
    <ul class="list-unstyled">
        @foreach ($items as $item)
            <li class="media mb-3">
                {{-- 投稿の所有者のメールアドレスをもとにGravatarを取得して表示 --}}
                <img class="mr-2 rounded" src="{{ Gravatar::get($item->user->email, ['size' => 50]) }}" alt="">
                <div class="media-body">
                    <div>
                        {{-- 投稿の所有者のユーザ詳細ページへのリンク --}}
                        {!! link_to_route('users.show', $item->user->name, ['user' => $item->user->id]) !!}
                        <span class="text-muted">posted at {{ $item->created_at }}</span>
                    </div>
                    <div>
                        {{-- 投稿内容 --}}
                        <p class="mb-0">{!! nl2br(e($item->content)) !!}</p>
                    </div>
                    <div class="wrapper">
                    <div>
                        @if (Auth::user()->is_favorite($item->id))
                            {{-- お気に入り外すボタンのフォーム --}}
                            {!! Form::open(['route' => ['favorites.unfavorite', $item->id], 'method' => 'delete']) !!}
                                 {!! Form::submit('Unfavorite', ['class' => 'btn btn-success btn-sm']) !!}
                            {!! Form::close() !!}
                        @else
                            {{-- 　お気に入りボタンのフォーム --}}
                            {!! Form::open(['route' => ['favorites.favorite', $item->id], 'method' => 'post']) !!}
                            {!! Form::submit('Favorite', ['class' => 'btn btn-light btn-sm']) !!}
                            {!! Form::close() !!}
                        @endif
                    </div>
                </div>
                </div>
            </li>
        @endforeach
    </ul>
    {{-- ページネーションのリンク --}}
    {{ $items->links() }}
@endif