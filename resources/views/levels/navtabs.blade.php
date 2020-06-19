<ul class="nav nav-tabs nav-justified mb-3">
    {{-- 新規登録タブ --}}
    <li class="nav-item">
            新規登録
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
            購入ページ
    </li>

</ul>