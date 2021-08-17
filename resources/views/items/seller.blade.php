/* 削除ボタン */

                @if (Auth::id() == $item->user_id)
                    {{-- 投稿削除ボタンのフォーム --}}
                    {!! Form::open(['route' => ['items.destroy', $item->id], 'method' => 'delete']) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                    {!! Form::close() !!}
                @endif
            
@endforeach