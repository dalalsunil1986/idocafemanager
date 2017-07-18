<!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
<div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav side-nav">
        <li class="active">
            <a href="{{ route('manage.order') }}"><i class="fa fa-fw fa-dashboard"></i> Beranda</a>
        </li>
        <!-- ORDER -->
        <li>
            <a href="javascript:;" data-toggle="collapse" data-target="#order"><i class="fa fa-fw fa-arrows-v"></i> Order <i class="fa fa-fw fa-caret-down"></i></a>
            <ul id="order" class="collapse">
                @if((Auth::user()->type)!='Kasir')
                <li>
                    <a href="{{ route('list.order') }}"><i class="fa fa-fw fa-table"></i> Daftar Order</a>
                </li>
                @endif
                @if((Auth::user()->type)!='Dapur')
                    <li>
                        <a href="{{ route('manage.order') }}"><i class="fa fa-fw fa-edit"></i> Kelola Order</a>
                    </li>
                @endif

            </ul>
        </li>
        <!-- LAPORAN -->
        @if((Auth::user()->type)=='Manager')
        <li>
            <a href="javascript:;" data-toggle="collapse" data-target="#laporan"><i class="fa fa-fw fa-arrows-v"></i> Area Manager <i class="fa fa-fw fa-caret-down"></i></a>
            <ul id="laporan" class="collapse">
                <li>
                    <a href="{{ route('show.reports') }}"><i class="fa fa-fw fa-bar-chart-o"></i> Laporan</a>
                </li>

                <li>
                    <a href="{{ route('manage.finances') }}"><i class="glyphicon glyphicon-piggy-bank"></i> Keuangan</a>
                </li>

                <li>
                    <a href="{{ route('user.manage') }}"><i class="glyphicon glyphicon-user"></i> Pengguna</a>
                </li>

                <li>
                    <a href="{{ route('menus.manage') }}"><i class="glyphicon glyphicon-th-list"></i> Menu</a>
                </li>
            </ul>
        </li>
        @endif
    </ul>
</div>
<!-- /.navbar-collapse -->