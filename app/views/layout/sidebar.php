<!-- Sidebar scroll-->
<div class="scroll-sidebar">
    <?php   if (getMode()=='dark') { ?>
        <div class="user-profile">
            <div class="user-pro-body">
                <div><img src="<?=base_url()?>assets/uploads/users/<?=$this->session->userdata('foto');?>" alt="user-img" class="img-circle"></div>
                <div class="dropdown">
                    <a href="javascript:void(0)" class="dropdown-toggle u-dropdown link hide-menu" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?= $this->session->userdata('nama'); ?> <span class="caret"></span></a>
                    <div class="dropdown-menu animated flipInY">
                        
                        <!-- text-->
                        <a href="<?=base_url('siteman/logout')?>" class="dropdown-item"><i class="fas fa-power-off"></i> Logout</a>
                        <!-- text-->
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
    <!-- Sidebar navigation-->
    <nav class="sidebar-nav">
        <ul id="sidebarnav">
            <?php   if (getMode()=='light') { ?>
            <li class="user-pro"> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><img src="<?=base_url()?>assets/uploads/users/<?=$this->session->userdata('foto');?>" alt="user-img" class="img-circle"><span class="hide-menu"><?= $this->session->userdata('nama'); ?></span></a>
                <ul aria-expanded="false" class="collapse">

                    <li><a href="<?=base_url('siteman/logout')?>"><i class="fa fa-power-off"></i> Logout</a></li>
                </ul>
            </li>
            <?php } ?>
            <li class="nav-small-cap"></li>
            <li> 
                <a class="waves-effect waves-dark" href="<?=base_url()?>" aria-expanded="false">
                    <i class="fas fa-tachometer-alt"></i>
                    <span class="hide-menu">Dashboard</span>
                </a>
            </li>
            
            <li> 
                <a class="has-arrow waves-effect waves-dark col-12 text-truncate" href="javascript:void(0)" aria-expanded="false">
                    <i class="fas fa-cubes"></i>
                    <span class="hide-menu">Server</span>
                </a>
                <ul aria-expanded="false" class="collapse">
                    <li><a href="<?=base_url().'server/tambah_server'?>">Tambah Baru</a></li>
                    <li><a href="<?=base_url().'server/indeks'?>">Daftar Server</a></li>
                </ul>
            </li>
            <?php if($this->session->userdata('level')=='1'){ ?>
            <li> 
                <a class="has-arrow waves-effect waves-dark col-12 text-truncate" href="javascript:void(0)" aria-expanded="false">
                    <i class="fas fa-cog"></i>
                    <span class="hide-menu ">Options</span>
                </a>
                <ul aria-expanded="false" class="collapse">
                    <li><a href="<?=base_url('users/indeks')?>">User Manager</a></li>
                    <!-- <?php if($this->uri->segment(1)=='role'){ ?>
                    <li><a href="<?=base_url('role/indeks')?>">User group dan menu privilege</a></li>
                    <?php }else if($this->uri->segment(1)=='level'){ ?>
                    <li><a href="<?=base_url('level/indeks')?>">User group dan menu privilege</a></li>
                    <?php }else{ ?>
                    <li><a href="<?=base_url('role/indeks')?>">User group dan menu privilege</a></li>
                    <?php } ?> -->
                    <li><a href="<?=base_url('log/indeks')?>">Log System</a></li>
                    <!-- <li><a href="<?=base_url('users/change_password')?>">Change Password</a></li> -->
                </ul>
            </li>
            <?php } ?>
            <li> <a class="waves-effect waves-dark" href="<?=base_url('siteman/logout')?>" aria-expanded="false"><i class="fas fa-key"></i><span class="hide-menu">Logout</span></a>
            </li>
        </ul>
    </nav>
    <!-- End Sidebar navigation -->
</div>
<!-- End Sidebar scroll-->