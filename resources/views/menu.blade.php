<ul class="sidebar-menu" data-widget="tree">
    <li class="header">Menu</li>
    <!-- Optionally, you can add icons to the links -->
    @if(auth()->user()->keterangan == 'admin')
    <li class="active"><a href="/admin/home"><i class="fa fa-home"></i> <span>Home</span></a></li>
    <li><a href="/admin/export"><i class="fa fa-book"></i> <span>Export Import</span></a></li>
    <li><a href="/admin/pemOsis"><i class="fa fa-book"></i> <span>Pemilihan Kandidat</span></a></li>
    <li><a href="{{ url('/admin/allUser') }}"><i class="fa fa-users"></i> <span>Jumlah user</span></a></li>
    <li><a href="{{ url('/admin/time') }}"><i class="fa fa-users"></i> <span>Time</span></a></li>
    <li><a href="{{ url('/admin/chart') }}"><i class="fa fa-users"></i> <span>Chart</span></a></li>
    <li><a href="{{ route('logout') }}"><i class="fa fa-key"></i> <span>logout</span></a></li>
    @endif
    @if(auth()->user()->keterangan == 'siswa')
    <li class="active"><a href="/siswa/home"><i class="fa fa-home"></i> <span>Home</span></a></li>
    <li><a href="/siswa/vote"><i class="fa fa-file"></i> <span>Vote</span></a></li>
    <li><a href="{{ route('logout') }}"><i class="fa fa-key"></i> <span>logout</span></a></li>
    @endif
    @if(auth()->user()->keterangan == 'guru')
    <li class="active"><a href="/guru/home"><i class="fa fa-home"></i> <span>Home</span></a></li>
    <li><a href="/guru/vote"><i class="fa fa-file"></i> <span>Vote Guru</span></a></li>
    <li><a href="{{ route('logout') }}"><i class="fa fa-key"></i> <span>logout</span></a></li>
    @endif
</ul>
