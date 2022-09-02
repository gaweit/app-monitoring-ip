<div class="col-md-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title"><?=$title?></h4>
            <h6 class="card-subtitle">Log System monitoring</h6>
            <div class="table-responsive">
                <table id="myTabless" class="table table-striped">
                    <thead>
                        <tr>
                            <th style="width: 25px">No</th>
                            <th>Users</th>
                            <th>Kegiatan</th>
                            <th>Data</th>
                            <th>Tanggal</th>
                            <th>Jam</th>
                            <th>Browser</th>
                        </tr>
                    </thead>
                </table>
                <script type="text/javascript">
                  $(function() {
                    $('#myTabless').DataTable( {
                        "processing": true,
                        "serverSide": true,
                        "ajax": {
                          "url":"<?=base_url().'admin/ajax/gethistory'?>",
                          "type": "POST",
                          "data": {par:'val'},
                          "dataType": 'json'
                        }
                    } );
                  }); 
                </script>
            </div>
        </div>
    </div>
</div>