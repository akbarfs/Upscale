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
                <li class="active" title="Dashboard">
                    <a href="{{route('company.dashboard')}}"> <i class="menu-icon fa fa-dashboard"></i> Dashboard</a>
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
