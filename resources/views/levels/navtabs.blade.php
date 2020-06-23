<ul class="nav nav-tabs nav-justified mb-3">
    {{-- 新規登録タブ --}}
    <li class="nav-item">
     <a href="{{ route('levels.create', ['user' => $user->id]) }}" class="nav-link {{ Request::routeIs('levels.create') ? 'active' : '' }}">
           新規登録
     </a>
     </li>
    {{-- 1回目タブ --}}
    <li class="nav-item">
     <a href="{{ route('levels.index', ['user' => $user->id]) }}" class="nav-link {{ Request::routeIs('levels.index') ? 'active' : '' }}">
            1回目
     </a>
    </li>
    {{-- 2回目タブ --}}
    <li class="nav-item">
     <a href="{{ route('levels.second', ['user' => $user->id]) }}" class="nav-link {{ Request::routeIs('levels.second') ? 'active' : '' }}">
            2回目
    </a>
    </li>
    {{-- 3回目タブ --}}
    <li class="nav-item">
      <a href="{{ route('levels.third', ['user' => $user->id]) }}" class="nav-link {{ Request::routeIs('levels.third') ? 'active' : '' }}">
            3回目
      </a>
    </li>
    {{-- 購入ページ --}}
    <li class="nav-item">
        <a href="{{ route('levels.buy', ['user' => $user->id]) }}" class="nav-link {{ Request::routeIs('levels.buy') ? 'active' : '' }}">
            購入ページ
        </a>
    </li>

</ul>