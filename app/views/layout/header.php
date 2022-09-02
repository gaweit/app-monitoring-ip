<!-- ============================================================== -->
<!-- Logo -->
<!-- ============================================================== -->
<div class="navbar-header">
    <a class="navbar-brand" href="<?=base_url()?>">
        <!-- Logo icon --><b>
            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
            <!-- Dark Logo icon -->
            <img src="<?=base_url()?>assets/images/logo-icon.png" alt="homepage" class="dark-logo" width="50" />
            <!-- Light Logo icon -->
            <img src="<?=base_url()?>assets/images/logo-light-icon.png" alt="homepage" class="light-logo" width="50" />
        </b>
        <!--End Logo icon -->
        <!-- Logo text --><span>
         <!-- dark Logo text -->
         <img src="<?=base_url()?>assets/images/logo-text.png" alt="homepage" class="dark-logo"/>
         <!-- Light Logo text -->    
         <img src="<?=base_url()?>assets/images/logo-light-text.png" class="light-logo" alt="homepage"/></span> </a>
</div>
<!-- ============================================================== -->
<!-- End Logo -->
<!-- ============================================================== -->
<div class="navbar-collapse">

    <!-- ============================================================== -->
    <!-- toggle and nav items -->
    <!-- ============================================================== -->
    <ul class="navbar-nav mr-auto">
        <!-- This is  -->
        <li class="nav-item"> <a class="nav-link nav-toggler d-block d-md-none waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
        <li class="nav-item"> <a class="nav-link sidebartoggler d-none d-lg-block d-md-block waves-effect waves-dark" href="javascript:void(0)"><i class="icon-menu"></i></a> </li>
        <span class="my-auto text-center text-light"><?=$this->mylibrary->greeting().' '.$this->session->userdata('nama'); ?></span>
        <!-- ============================================================== -->
        <!-- Search -->
        <!-- ============================================================== -->
        <!-- <li class="nav-item">
            <form class="app-search d-none d-md-block d-lg-block">
                <input type="text" class="form-control" placeholder="Search & enter">
            </form>
        </li> -->
    </ul>
    
    <!-- ============================================================== -->
    <!-- User profile and search -->
    <!-- ============================================================== -->
    <ul class="navbar-nav my-lg-0">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="ti-bell"></i>
                <div id="ntf"></div>
            </a>
            <div class="dropdown-menu dropdown-menu-right mailbox animated bounceInDown">
                <ul>
                    <li>
                        <div class="drop-title">Notifications</div>
                    </li>
                    <li id="ls">
                        
                    </li>
                    <!-- <li>
                        <a class="nav-link text-center link" href="javascript:void(0);"> <strong>Semua</strong> <i class="fa fa-angle-right"></i> </a>
                    </li> -->
                </ul>
            </div>
        </li>
        <!-- ============================================================== -->
        <!-- User Profile -->
        <!-- ============================================================== -->
        <?php  if (getMode()=='light') { ?>
            <li class="nav-item dropdown u-pro">
                <a class="nav-link dropdown-toggle waves-effect waves-dark profile-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="<?=base_url()?>assets/uploads/users/<?=$this->session->userdata('foto');?>" alt="user" class=""> <span class="hidden-md-down"><?= $this->session->userdata('nama'); ?> &nbsp;<i class="fa fa-angle-down"></i></span> </a>
        <?php }elseif(getMode()=='dark'){ ?>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle waves-effect waves-dark profile-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ti-user"></i> <span class="hidden-md-down"><?= $this->session->userdata('nama'); ?> &nbsp;<i class="fa fa-angle-down"></i></span> </a>
        <?php }else{ ?>
            <li class="nav-item dropdown u-pro">
                <a class="nav-link dropdown-toggle waves-effect waves-dark profile-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="<?=base_url()?>assets/uploads/users/<?=$this->session->userdata('foto');?>" alt="user" class=""> <span class="hidden-md-down"><?= $this->session->userdata('nama'); ?> &nbsp;<i class="fa fa-angle-down"></i></span> </a>
        <?php } ?>
        
            
            <div class="dropdown-menu dropdown-menu-right animated flipInY">
                <!-- text-->
                <div class="dropdown-divider"></div>
                <!-- text-->
                <a href="<?=base_url('siteman/logout')?>" class="dropdown-item"><i class="fa fa-power-off"></i> Logout</a>
                <!-- text-->
            </div>
        </li>
        <!-- ============================================================== -->
        <!-- End User Profile -->
        <!-- ============================================================== -->
    </ul>
</div>

<script type="text/javascript">
    $(document).ready(function() {
    var interval = setInterval(function() {
        $.ajax({
             url: '<?=base_url()?>admin/ajax/notifDc',
             success: function(data) {
                var d = JSON.parse(data);
                
                $('#ntf').html(d.notif);
                $('#ls').html(d.list);
             }
        });
    }, 3000);
});
</script>