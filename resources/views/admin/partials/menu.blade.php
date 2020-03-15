@php
    $r = \Route::current()->getAction();
    $route = (isset($r['as'])) ? $r['as'] : '';
@endphp

<li class="nav-item mT-30">
    <a class="sidebar-link {{ Str::startsWith($route,'dash') ? 'active' : '' }}" href="{{ route('dash') }}">
        <span class="icon-holder">
            <i class="c-blue-500 ti-home"></i>
        </span>
        <span class="title">Dashboard</span>
    </a>
</li>
<li class="nav-item">
    <a class="sidebar-link {{ Str::startsWith($route, ADMIN . '.operations') ? 'active' : '' }}" href="{{ route(ADMIN . '.operations.index') }}">
        <span class="icon-holder">
            <i class="c-blue-500 ti-bolt"></i>
        </span>
        <span class="title">Operações</span>
    </a>
</li>
@unlessrole('operator')
<li class="nav-item">
    <a class="sidebar-link {{ Str::startsWith($route, ADMIN . '.fields') ? 'active' : '' }}" href="{{ route(ADMIN . '.fields.index') }}">
        <span class="icon-holder">
            <i class="c-blue-500 ti-flag"></i>
        </span>
        <span class="title">Talhões</span>
    </a>
</li>
@endrole
@role('producer')
    <li class="nav-item">
        <a class="sidebar-link {{ Str::startsWith($route, ADMIN . '.users') ? 'active' : '' }}" href="{{ route(ADMIN . '.users.index') }}">
            <span class="icon-holder">
                <i class="c-blue-500 ti-user"></i>
            </span>
            <span class="title">Equipe</span>
        </a>
    </li>
@endrole

