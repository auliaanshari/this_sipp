
@section('side-bar')
<div class="side-nav-inner">
    <ul class="side-nav-menu scrollable">

        <li class="nav-item dropdown">
            <a class="dropdown-toggle" href="javascript:void(0);">
                <span class="icon-holder">
                    <i class="anticon anticon-dashboard"></i>
                </span>
                <span class="title">Dashboard</span>
                <span class="arrow">
                    <i class="arrow-icon"></i>
                </span>
                <ul class="dropdown-menu">
                    <li class="nav-item dropdown">
                        <a href="{{ url('/') }}">
                            <i class="anticon anticon-question-circle"></i>
                            <span>About</span>
                        </a>
                </ul>
            </a>
        </li>

        <li class="nav-item dropdown">
            <a class="dropdown-toggle" href="javascript:void(0);">
                <span class="icon-holder">
                    <i class="anticon anticon-hdd"></i>
                </span>
                <span class="title">Data Master</span>
                <span class="arrow">
                    <i class="arrow-icon"></i>
                </span>
                <ul class="dropdown-menu">
                    <li class="nav-item dropdown">
                        <a href="{{ url('/nagari') }}">
                            <i class="anticon anticon-gold"></i>
                            <span>Nagari</span>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="{{ url('/jorong') }}">
                            <i class="anticon anticon-gold"></i>
                            <span>Jorong</span>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="{{ url('/pekerjaan') }}">
                            <i class="anticon anticon-gold"></i>
                            <span>Pekerjaan</span>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="{{ url('/level_pendidikan') }}">
                            <i class="anticon anticon-gold"></i>
                            <span>Level Pendidikan</span>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="{{ url('/kewarganegaraan') }}">
                            <i class="anticon anticon-gold"></i>
                            <span>Kewarganegaraan</span>
                        </a>
                    </li>
                </ul>
            </a>
        </li>

        <li class="nav-item dropdown">
            <a class="dropdown-toggle" href="javascript:void(0);">
                <span class="icon-holder">
                    <i class="anticon anticon-appstore"></i>
                </span>
                <span class="title">SIPP</span>
                <span class="arrow">
                    <i class="arrow-icon"></i>
                </span>
                <ul class="dropdown-menu">
                    <li class="nav-item dropdown">
                        <a href="{{ url('/penduduk') }}">
                            <i class="anticon anticon-solution"></i>
                            <span>Penduduk</span>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="{{ url('/kartu_keluarga') }}">
                            <i class="anticon anticon-idcard"></i>
                            <span>Kartu Keluarga</span>
                        </a>
                    </li>
                </ul>
            </a>
        </li>

        <li class="nav-item dropdown">
            <a class="dropdown-toggle" href="javascript:void(0);">
                <span class="icon-holder">
                    <i class="anticon anticon-file-text"></i>
                </span>
                <span class="title">Laporan</span>
                <span class="arrow">
                    <i class="arrow-icon"></i>
                </span>
                <ul class="dropdown-menu">
                    <li class="nav-item dropdown">
                        <a href="{{ url('/laporan1') }}">
                            <i class="anticon anticon-file"></i>
                            <span>Penduduk Usia Produktif</span>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="{{ url('/laporan2') }}">
                            <i class="anticon anticon-file"></i>
                            <span>Daftar Penduduk per Nagari</span>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="{{ url('/laporan3') }}">
                            <i class="anticon anticon-file"></i>
                            <span>Level Pendidikan Penduduk</span>
                        </a>
                    </li>
                </ul>
            </a>
        </li>

    </ul>
</div>
@endsection
