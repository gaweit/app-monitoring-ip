<div class="col-md-12">
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
                <a href="<?=base_url('server/tambah_server')?>" class="btn btn-info btn-xs float-right"><i class="fa fa-plus-circle"></i> Tambah Server</a>
            </h4>
            <h6 class="card-subtitle">Semua data server</h6>
            <div class="table-responsive m-t-40">
                <table id="myTable_data" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th style="width: 25px">No</th>
                            <th>Nama</th>
                            <!-- <th>IP Addres</th> -->
                            <th>Alamat</th>
                            <th style="width: 200px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $no = 1;
                            foreach ($record as $row) {
                        ?>
                            <tr>
                                <td><center><?=$no?></center></td>
                                <td><?=$row['nama_blok']?></td>
                                <!-- <td><?=$row['ip_blok']?></td> -->
                                <td><?=$row['alamat_blok']?></td>
                                <td>
                                    <center>
                                        <a href="<?=base_url().'device/parent/'.$row['kode_blok'];?>" class="badge badge-success" title="Detil Client">
                                            <i class="fas fa-eye">      Monitor</i>
                                        </a>
                                        <a href="<?=base_url().'server/ubah_server/'.$row['id_blok'];?>" class="badge badge-success">
                                            <i class="far fa-edit">     Edit</i>
                                        </a>
                                        <a href="<?=base_url().'server/hapus_server/'.$row['id_blok'];?>" class="badge badge-danger" onClick="javascript: return confirm('Anda yakin ingin menghapusnya ?');">
                                            <i class="far fa-trash-alt">    Delete</i>
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