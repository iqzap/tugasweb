<nav>
    <div class="nav-wrapper">
        <a href="#!" style="padding-left: 20px; padding-top: 5px;" class="brand-logo"><img src="{{asset('desain/logo.png')}}" alt="logo"></a>
        <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>

        <!--navbar web-size-->

        <!--Dropdown-->
        <ul id="dropdown1" class="dropdown-content">
            <li class="divider"></li>
            <li></li>
            <li><a href="{{route('logout_admin')}}"><i class="material-icons">exit_to_app</i>Log Out</a></li>
        </ul>
        <!--Dropdown-->

        <ul class="right hide-on-med-and-down">
            <li><a href="{{route('admin.tabel')}}"><i class="material-icons left">local_mall</i>Barang</a></li>
            <li><a href="{{route('admin.user')}}"><i class="material-icons left">people</i>User</a></li>
            <li><a href="{{route('admin.statistik')}}"><i class="material-icons left">timeline</i>Statistik</a></li>
            <li><a href="{{route('admin.banner')}}"><i class="material-icons left">photo_size_select_actual</i>Transaksi</a></li>
            
        </ul>
        <!--navbar web-size-->

        <!--navbar mobile-size-->

        <!--navbar mobile-size-->
    </div>
</nav>
