<div class="col-sm-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title"><?=$title?></h4>
            <h5 class="card-subtitle">Pastikan setiap form terisi dengan benar.</h5>

            <?php $attributes = array('class'=>'form-horizontal','role'=>'form','autocomplete'=>'off'); echo form_open_multipart('device/tambah_device',$attributes); ?>
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                
                <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">Nama</label>
                    <div class="col-10">
                        <input class="form-control" type="text" name="c" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">Server</label>
                    <div class="col-10">
                        <select class="form-control" name="a" required>
                            <option value="">-- Pilih Server --</option>
                            <?php  
                                foreach ($serv as $key => $value) {
                                    echo "<option value='$value[kode_blok]'> $value[nama_blok] </option>";
                                }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">Latitude</label>
                    <div class="col-10">
                        <input class="form-control" type="text" name="d" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">Longitude</label>
                    <div class="col-10">
                        <input class="form-control" type="text" name="e" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">IP</label>
                    <div class="col-10">
                        <input type="text" class="form-control ip-inputmask" placeholder="IP address" name="b" required>
                    </div>
                </div>

                <!-- <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">Rute</label>
                    <div class="col-10">
                        <input type="text" name="f" class="form-control" required>
                    </div>
                </div> -->

                <button type="submit" class="btn btn-success waves-effect waves-light m-r-10" name="submit">Kirim</button>
                <a href="<?=base_url().'device/indeks'?>" class="btn btn-inverse waves-effect waves-light">Batal</a>
            <?php echo form_close(); ?>

        </div>
    </div>
</div>