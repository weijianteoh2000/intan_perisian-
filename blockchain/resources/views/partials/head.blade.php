<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>@yield('title')</title>


<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>


<title>Blockchain</title>
@stack('style')


<style>
    .btn.mine_btn:hover {
        background-color: #10274c;
        border-color: #10c6d3;
    }

    .dropdown-menu {
        display: none;
        transition: opacity 0.3s ease, visibility 0.3s ease, transform 0.3s ease;
        opacity: 0;
        visibility: hidden;
        transform: translateY(-10px);
    }

    .dropdown:hover>.dropdown-menu {
        display: block !important;
        opacity: 1;
        visibility: visible;
        transform: translateY(0);


    }

    .advance {
        color: white
    }

    .advance:hover {
        color: #0d6efd;
        background-color: #FFFFFF;
        border: 1px solid #dee2e6;
        padding: 8px;
        border-radius: 20px
    }

    .m_btn:hover {
        background-image: none;
    }

    .active {
        color: black;
        background-color: #FFFFFF;
    }

    .txt-white {
        color: #FFFFFF;
    }

    .nav-txt {
        color: #D9D9D9;
    }

    .kavoon {
        font-family: 'Kavoon', cursive;
    }
</style>


@yield('head')
