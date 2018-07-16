@php
    $user = Auth::user();
    $role = $user->role();
@endphp
</li>
    <li class="dropdown user user-menu">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <img src="{{ asset('img/' . $role->slug .'.png') }}" class="user-image" alt="User Image">
            <span class="hidden-xs">{{ $user->name }}</span>
        </a>
        <ul class="dropdown-menu">
            <!-- User image -->
            <li class="user-header">
                <img src="{{ asset('img/' . $role->slug .'.png') }}" class="img-circle" alt="User Image">
                <p>
                    {{ $user->name }}
                    <small>{{ $role->name }}</small>
                </p>
            </li>
            <!-- Menu Footer-->
            <li class="user-footer">
                <div class="pull-left">
                    <a href="/profile" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                    <a href="{{ url(config('adminlte.logout_url', 'auth/logout')) }}" class="btn btn-default btn-flat">Log out</a>
                </div>
            </li>
        </ul>
    </li>
<!-- Control Sidebar Toggle Button -->
<li>