<!DOCTYPE html>
<html lang="en">

<head>
    @include('partials.head')

    <style>
        /* Custom CSS to prevent third-level dropdown from closing */
        .dropdown-submenu {
            position: relative;
        }

        .dropdown-submenu .dropdown-menu {
            top: 0;
            left: 100%;
            margin-top: -1px;
            display: none;
        }

        .dropdown-submenu:hover .dropdown-menu {
            display: block;
        }
        
    </style>

</head>

<body style="background: rgba(51, 29, 44, 1)">
    <div class="main">
        @include('partials.topbar')

        @yield('content')

        <footer class="footer">
            <div class="container-fluid">
                @include('partials.footer')
            </div>
        </footer>
    </div>

    @yield('script')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Add this script to prevent the third-level dropdown from closing when clicked
    </script>
</body>

</html>
