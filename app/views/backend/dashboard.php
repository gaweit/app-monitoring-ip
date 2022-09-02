<div class="col-md-12">
    <div class="card">
        <div class="card-body">
            <form class="form-horizontal" action="" method="GET">
                <div class="row">
                    <div class="col-md-9">
                        <div class="form-group row">
                            <select class="form-control" name="server">
                                <option value="">-- Pilih Server Terlebih Dulu --</option>
                                <?php  
                                    foreach ($serv as $key => $value) {
                                        echo "<option value='$value[kode_blok]'> $value[nama_blok] </option>";
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <button class="btn btn-primary btn-block" type="submit">Monitor</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="col-md-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title"><?=$title?>
            </h4>
            <h6 class="card-subtitle">Monitoring</h6>
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
    var srv = '<?=$this->input->get('server')?>';
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