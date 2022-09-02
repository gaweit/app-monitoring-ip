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
                <a href="<?=base_url('device/tambah_device')?>" class="btn btn-info btn-xs float-right"><i class="fa fa-plus-circle"></i> Tambah Perangkat</a>
            </h4>
            <h6 class="card-subtitle">Semua data client</h6>
            <div class="table-responsive m-t-40">
                <table id="myTable_data" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th style="width: 25px">No</th>
                            <th>Nama</th>
                            <th>IP Address</th>
                            <th style="width: 100">Status</th>
                            <th style="width: 200px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="loadData">
                        <tr id="showLoad">
                            <td colspan="5">
                                <img src="<?=base_url().'assets/images/loding.gif'?>" class="rounded mx-auto d-block" width="150">
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
    var srv = '<?=$this->uri->segment(3)?>';
    $("#showLoad").show();
    var interval = setInterval(function() {
        $.ajax({
             url: '<?=base_url()?>admin/ajax/pingIp?srv='+srv,
             success: function(data) {
                $("#showLoad").hide();
                $('#loadData').html(data);
             }
        });
    }, 3000);
});
</script>