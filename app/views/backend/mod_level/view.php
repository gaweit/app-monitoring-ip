<?php if (uri_string()=='level/indeks') { ?>
    <div class="col-md-12 mb-2">
        <a href="<?=base_url('level/indeks')?>" class="btn btn-warning btn-xs mr-1">User Group</a>
        <a href="<?=base_url('role/indeks')?>" class="btn btn-primary btn-xs">Menu Privilege</a>
    </div>
<?php }else if(uri_string()=='role/indeks') { ?>
    <div class="col-md-12 mb-2">
        <a href="<?=base_url('level/indeks')?>" class="btn btn-primary btn-xs mr-1">User Group</a>
        <a href="<?=base_url('role/indeks')?>" class="btn btn-warning btn-xs">Menu Privilege</a>
    </div>
<?php }else{ ?>
    <div class="col-md-12 mb-2">
        <a href="<?=base_url('level/indeks')?>" class="btn btn-primary btn-xs mr-1">User Group</a>
        <a href="<?=base_url('role/indeks')?>" class="btn btn-primary btn-xs">Menu Privilege</a>
    </div>
<?php } ?>

<hr>
<div class="col-sm-12">
    <?php if($this->session->flashdata('success')){ ?>
        <div class="alert alert-success" role="alert">
            <?php echo $this->session->flashdata('success'); ?>
        </div>
    <?php }else if($this->session->flashdata('error')){  ?>
        <div class="alert alert-danger" role="alert">
            <?php echo $this->session->flashdata('error'); ?>
        </div>
    <?php } ?>
     <div class="card">
        <div class="card-body">
            <h4 class="card-title"><?=$title?>
                <a href="<?=base_url('level/tambah_level')?>" class="btn btn-info btn-xs float-right"><i class="fa fa-plus-circle"></i> Tambah</a>
            </h4>
            <h6 class="card-subtitle">Semua data users group</h6>
        
            <div class="table-responsive">
                <table id="myTable" class="table table-striped">
                    <thead>
                        <tr>
                            <th style="width: 25px">No</th>
                            <th>Group</th>
                            <th>Aktif</th>
                            <th style="width: 50px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $no = 1;
                            foreach ($record as $row) {
                        ?>
                            <tr>
                                <td><center><?=$no?></center></td>
                                <td><?=$row['nama_level']?></td>
                                <td><?=$row['aktif']?></td>
                                <td>
                                    <center>
                                        <a href="<?=base_url().'level/ubah_level/'.$row['id_level'];?>" class="badge badge-success">
                                            <i class="far fa-edit"></i>
                                        </a>
                                        <a href="<?=base_url().'level/hapus_level/'.$row['id_level'];?>" class="badge badge-danger" id="confirm<?=$no?>" onclick="confirms(this.id)">
                                            <i class="far fa-trash-alt"></i>
                                        </a>
                                    </center>
                                </td>
                            </tr>
                        <?php
                            $no++;    # code...
                            }
                         ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>