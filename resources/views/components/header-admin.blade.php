<div class="header d-flex justify-content-between align-items-center">
    <h5 class="m-0">@yield('title')</h5>
    <div class="user-info">
        <span>Hi, {{ auth()->user()->nama }}</span>
    </div>
</div>
