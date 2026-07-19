<!DOCTYPE html>
<html lang="en">

@include('admin.partials.head')

<body>
    <div class="admin-shell">
        <div class="sidebar-backdrop" data-sidebar-close></div>

        {{-- INCLUDE SIDEBAR --}}
        @include('admin.components.sidebar')

        <div class="admin-main">

            {{-- INCLUDE NAVBAR --}}
            @include('admin.components.navbar')

            {{-- @include('admin.pages.dashboard') --}}
            @yield('content')

            {{-- INCLUDE FOOTER --}}
            @include('admin.components.footer')
        </div>
    </div>
    {{-- INCLUDE SCRIPT --}}
    @include('admin.partials.script')
</body>

</html>
