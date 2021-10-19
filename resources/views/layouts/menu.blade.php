<li class="nav-item">
    <a href="{{ route('transactions.index') }}"
       class="nav-link {{ Request::is('transactions*') ? 'active' : '' }}">
        <p>Transactions</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('accounts.index') }}"
       class="nav-link {{ Request::is('accounts*') ? 'active' : '' }}">
        <p>Accounts</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('activityLogs.index') }}"
       class="nav-link {{ Request::is('activityLogs*') ? 'active' : '' }}">
        <p>Activity Logs</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('depts.index') }}"
       class="nav-link {{ Request::is('depts*') ? 'active' : '' }}">
        <p>Depts</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('roles.index') }}"
       class="nav-link {{ Request::is('roles*') ? 'active' : '' }}">
        <p>Roles</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('users.index') }}"
       class="nav-link {{ Request::is('users*') ? 'active' : '' }}">
        <p>Users</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('userAcccounts.index') }}"
       class="nav-link {{ Request::is('userAcccounts*') ? 'active' : '' }}">
        <p>User Acccounts</p>
    </a>
</li>


