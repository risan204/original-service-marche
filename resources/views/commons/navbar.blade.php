<header class="mb-4">
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        {{-- トップページへのリンク --}}
        <a class="navbar-brand" href="/"><p style="font-size:25px">Vegetable Marche<img alt="VegetableMarche" src="{{ asset('favicon.ico') }}"></p></a>
        
        <p style="color: white;">農家から消費者へ直接新鮮野菜をお届け！<br>農家を応援～野菜・果物マルシェ～</p>

        <div class="collapse navbar-collapse" id="nav-bar">
            <ul class="navbar-nav mr-auto"></ul>
            <ul class="navbar-nav">
                @if (Auth::check())
                　　{!! link_to_route('items.create', '出品する', [], ['class' => 'btn btn-success']) !!}
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">{{ Auth::user()->name }}</a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            {{-- 出品履歴のリンク --}}
                            <li class="dropdown-item">{!! link_to_route('users.listing_histories', '出品履歴') !!}</li>
                            <li class="dropdown-divider"></li>
                             {{-- 購入履歴のリンク --}}
                            <li class="dropdown-item">{!! link_to_route('users.purchase_histories', '購入履歴') !!}</li>
                            <li class="dropdown-divider"></li>
                            {{-- お気に入り一覧のリンク --}}
                            <li class="dropdown-item">{!! link_to_route('users.favorites', 'お気に入り一覧') !!}</li>
                            <li class="dropdown-divider"></li>
                            {{-- ログアウトへのリンク --}}
                            <li class="dropdown-item">{!! link_to_route('logout.get', 'ログアウト') !!}</li>
                        </ul>
                    </li>
                @else
                    {{-- ユーザ登録ページへのリンク --}}
                    <li class="nav-item">{!! link_to_route('signup.get', '会員登録', [], ['class' => 'nav-link']) !!}</li>
                    {{-- ログインページへのリンク --}}
                    <li class="nav-item">{!! link_to_route('login', 'ログイン', [], ['class' => 'nav-link']) !!}</li>
                @endif
            </ul>
        </div>
    </nav>
</header>