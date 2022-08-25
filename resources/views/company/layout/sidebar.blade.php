<script type="text/javascript">
    $(document).ready(function () {
        setTimeout(function () {
            $("#menuToggle").click();
        }, 1000);
    });
</script>
<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
        <a style="position:relative; left:54px;" id="menuToggle" class="menutoggle pull-right">
            <i class="fa fa fa-tasks" style="margin-top: 10px"></i></a>

        <div class="navbar-header">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu"
                aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="/"><img style="max-width:120px !important;" src="{{asset('/img/logo2.png')}}"
                    alt="Logo"></a>
            <a class="navbar-brand hidden" href="./"><img style="max-width:30px !important;"
                    src="{{asset('/img/logo3.png')}}" alt="Logo"></a>
        </div>


        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="@if($active == 'dashboard') active @endif" title="Dashboard">
                    <a href="{{route('company.dashboard')}}"> <i class="menu-icon fa fa-dashboard"></i> Dashboard</a>
                </li>
                <li class="@if($active == 'all') active @endif" title="All Database">
                    <a href="{{route('company.dashboard.talent')}}"><i class="menu-icon fa fa-database"></i> All Database <span>({{$total}})</span></a>
                    <ul>
                        <li class="ml-2" title="Request Active"><a href="{{ route('company.request.active') }}" style="@if($active == 'active') color:white !important; @endif"> Request Active <span id="active">(2)</span></a></li>
                        <li class="ml-2" title="Request Non Active"><a href="#" style="@if($active == 'nonactive') color:white !important; @endif"> Request Non Active <span id="nonactive">(1)</span></a></li>
                    </ul>
                </li>
                <li title="Bidding">
                    <a href="javascript:void(0)"> <i class="menu-icon fa fa-th-list"></i> Bidding</a>
                </li>
                <li title="Billing">
                    <a href="javascript:void(0)"> <i class="menu-icon fa fa-th-list"></i> Billing</a>
                </li>

                <h3 class="menu-title">Others</h3>
                <li title="Sign-Out">
                    <a href="{{route('logout.company')}}"><i class="menu-icon fa fa-sign-out"></i> Sign-Out</a>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside><!-- /#left-panel -->

@push('script')

@endpush
