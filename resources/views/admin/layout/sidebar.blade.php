<script type="text/javascript">
    $(document).ready(function()
    {
        setTimeout(function() {$("#menuToggle").click() ; },1000);
    });
</script>
<aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
        <a style="position:relative; left:54px;" id="menuToggle" class="menutoggle pull-right">
            <i class="fa fa fa-tasks" style="margin-top: 10px"></i></a>

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand"      href="/"><img style="max-width:120px !important;" src="{{asset('/img/logo2.png')}}" alt="Logo"></a>
                <a class="navbar-brand hidden" href="./"><img style="max-width:30px !important;" src="{{asset('/img/logo3.png')}}" alt="Logo"></a>
            </div>


            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active" title="Dashboard">
                        <a href="{{route('dashboard')}}"> <i class="menu-icon fa fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li class="menu-item-has-children dropdown" title="Report">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="menu-icon fa fa-archive"></i> Report</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li title="Request"><i class=""></i><a href=""> Request</a></li>
                            <li title="Assign"><i class=""></i><a href=""> Assign</a></li>
                            <li title="Staff In Client"><i class=""></i><a href=""> Staff In Client</a></li>
                        </ul>
                    </li>
                    <h3 class="menu-title">CAREER</h3><!-- /.menu-title -->
                    
                    {{-- <li title="Job Apply Client" class="{{ request()->route()->getName() == 'jobsapplyclient' ? 'active' : '' }}">
                        <a href="{{route('jobsapplyclient')}}"> <i class="menu-icon fa fa-th-list"></i> Job Apply Client</a>
                    </li> --}}
                    
                    <li title="Job Apply Client" class="{{ request()->route()->getName() == 'jobsapplyclient.index' ? 'active' : '' }}">
                        <a href="{{route('jobsapplyclient.index')}}"> <i class="menu-icon fa fa-th-list"></i> Job Apply Client</a>
                    </li>
                    

                    <li title="Job Apply">
                        <a href="{{route('jobsapply')}}"> <i class="menu-icon fa fa-th-list"></i> Job Apply</a>
                    </li>
                    
                    <li title="All Talent" class="{{ request()->route()->getName() == 'all-talent.index' ? 'active' : '' }}">
                        <a href="{{route('all-talent.index')}}"> <i class="menu-icon fa fa-th-list"></i> All Talent</a>
                    </li>

                    <li title="Job List">
                        <a href="{{route('index.jobs')}}"> <i class="menu-icon fa fa-th-list"></i> Job List</a>
                    </li>
                    <li class="menu-item-has-children dropdown" title="Setting Career">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="menu-icon fa fa fa-gears"></i> Setting Career</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li title="Substep Job Apply"><i class=""></i><a href="{{ route('substeps.getsubsteps') }}"> Substep Job Apply</a></li>
                            <li title="Location Jobs"><i class=""></i><a href="{{ route('jobs.all') }}"> Location Jobs</a></li>
                            <li title="Job Category"><i class=""></i><a href=""> Job Category</a></li>
                        </ul>
                    </li>
                    <h3 class="menu-title">Questions & Answer</h3><!-- /.menu-title -->                    
                    <li class="menu-item-has-children dropdown" title="Setting Questions">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="menu-icon fa fa fa-gears"></i> Setting Question</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li title="Substep Job Apply"><i class=""></i><a href="{{ route('inquiry') }}"> Question</a></li>
                            <li title="Location Jobs"><i class=""></i><a href="{{ route('jobs.all') }}"> Location Jobs</a></li>
                        </ul>
                    </li>
                    <h3 class="menu-title">TALENT</h3>
                    {{-- Adi --}}
                    <li title="Talent List New">
                        <a href="{{route('talent.list')}}"> <i class="menu-icon fa fa-user-o"></i> Talent List New</a>
                    </li>
                    {{-- end of Adi --}}

                     <li title="Talent List">
                        <a href="{{route('talent.index')}}"> <i class="menu-icon fa fa-user-o"></i> Talent List</a>
                    </li>
                    <li title="Talent Create">
                        <a href="{{route('createtalent.index')}}"> <i class="menu-icon fa fa-user-o"></i> Talent Create</a>
                    </li>
                    <li title="Pra Talent">
                        <a href="{{route('pratalent.index')}}"> <i class="menu-icon fa fa-user-o"></i> Pra Talent</a>
                    </li>
                    <li title="Reference">
                        <a href=""> <i class="menu-icon fa fa-user-o"></i> Reference</a>
                    </li>
                    <li class="menu-item-has-children dropdown" title="Setting Talent">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="menu-icon fa fa fa-gears"></i> Setting Talent</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li title="Substep Talent"><i class=""></i><a href=""> Substep Talent</a></li>
                        </ul>
                    </li>
                    <h3 class="menu-title">COMPANY</h3>
                    <li class="menu-item-has-children dropdown" title="Company List">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="menu-icon fa fa-institution"></i> Company List</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li title="Company"><i class=""></i><a href="{{route('companies.index')}}"> Company</a></li>
                            <!--<li><i class=""></i><a href="">Company Job Position</a></li>-->
                            <li title="Company Request"><i class=""></i><a href="{{route('companies.companyrequest')}}"> Company Request</a></li>
                        </ul>
                    </li>
                    <li title="Company Test">
                        <a href=""><i class="menu-icon fa fa-institution"></i> Company Test</a>
                    </li>
                    <h3 class="menu-title">BOOTCAMP</h3>
                    <li class="menu-item-has-children dropdown" title="Bootcamp Public">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="menu-icon fa fa-graduation-cap"></i> Bootcamp Public</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li title="Bootcamp Event"><i class=""></i><a href="{{route('bootcamp.index')}}"> Bootcamp Event</a></li>
                            <li title="Bootcamp Master Data"><i class=""></i><a href="{{ route('bmaster.index') }}"> Bootcamp Master Data</a></li>
                            <li title="Master Data Class"><i class=""></i><a href="{{ route('class.index') }}"> Master Data Class</a></li>
                            <li title="Bootcamp FAQ"><i class=""></i><a href="{{ route('faq.index') }}"> Bootcamp FAQ</a></li>
                            <li title="Bootcamp Alumni"><i class=""></i><a href="{{ route('alumni.index') }}"> Bootcamp Alumni</a></li>
                        </ul>
                    </li>
                    <br>
                    <li class="menu-item-has-children dropdown" title="Bootcamp Applier">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-graduation-cap"></i> Bootcamp Applier</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li title="Pendaftar"><i class=""></i><a href="{{ route('eventlist') }}"> Pendaftar</a></li>
                            <li title="Test Selection"><i class=""></i><a href=""> Test Selection</a></li>
                            <li title="Participant"><i class=""></i><a href=""> Participant</a></li>
                        </ul>
                    </li>
                    <h3 class="menu-title">CAMPAIGN</h3>
                    <li title="Campaign List">
                        <a href="{{route('campaign.index')}}"> <i class="menu-icon fa fa-share-alt"></i> Campaign List</a>
                    </li>
                    <li title="Portal Media">
                        <a href=""> <i class="menu-icon fa fa-share-alt"></i> Portal Media</a>
                    </li>
                    <li title="Blast Email">
                        <a href="{{route('blast')}}"> <i class="menu-icon fa fa-envelope"></i> Blast Email</a>
                    </li>

                    <h3 class="menu-title">MASTER DATA</h3>
                    <li class="menu-item-has-children dropdown" title="Master Data">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="menu-icon fa fa-graduation-cap"></i> Master Data</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li title="Skill"><i class=""></i><a href="{{route('skill.index')}}"> Skill</a></li>
                            <li title="Location Jobs"><i class=""></i><a href=""> Location Jobs</a></li>
                            <li title="Campus"><i class=""></i><a href="{{ route('campus.index') }}"> Campus</a></li>
                            <li title="Prefered Location"><i class=""></i><a href="{{ route('preferlocation.index') }}"> Prefered Location</a></li>
                            <li title="Interview"><i class=""></i><a href="{{ route('interview.index') }}"> Interview</a></li>
                            <li title="User"><i class=""></i><a href="{{ route('user.index') }}"> User</a></li>
                        </ul>
                    </li>

                    <!-- <li title="Company Add">
                        <a href=""><i class="menu-icon fa fa-book"></i> Open Jobs</a>
                    </li> -->
                    <h3 class="menu-title">CLIENT</h3>
                    <li title="Attendance & Permit">
                        <a href="{{route('attend.index')}}"><i class="menu-icon fa fa-building-o"></i> Skill</a>
                    </li>
                    
                    <h3 class="menu-title">Others</h3>
                    <li title="Sign-Out">
                        <a href="{{route('logout')}}"><i class="menu-icon fa fa-sign-out"></i> Sign-Out</a>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

@push('script')

@endpush
