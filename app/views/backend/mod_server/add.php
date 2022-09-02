<div class="col-sm-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title"><?=$title?></h4>
            <h5 class="card-subtitle">Pastikan setiap form terisi dengan benar.</h5>

            <?php $attributes = array('class'=>'form-horizontal','role'=>'form','autocomplete'=>'off'); echo form_open_multipart('server/tambah_server',$attributes); ?>
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                
                <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">Nama</label>
                    <div class="col-10">
                        <input class="form-control" type="text" name="b" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">Latitude</label>
                    <div class="col-10">
                        <input class="form-control" type="text" name="e" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">Longitude</label>
                    <div class="col-10">
                        <input class="form-control" type="text" name="f" required>
                    </div>
                </div>

                <!-- <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">IP</label>
                    <div class="col-10">
                        <input type="text" class="form-control ip-inputmask" placeholder="Jika server tidak perlu di isi" name="a">
                    </div>
                </div> -->

                <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">Alamat</label>
                    <div class="col-10">
                        <textarea class="form-control" name="c" required></textarea>
                    </div>
                </div>

                <!-- <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">Pusat</label>
                    <div class="col-10">
                        <select class="form-control" name="d">
                            <option value="0">-- Pilih --</option>
                            <option value="0"> N </option>
                            <option value="1"> Y </option>
                        </select>
                        <small class="text-muted"> Default No / N</small>
                    </div>
                </div> -->

                <button type="submit" class="btn btn-success waves-effect waves-light m-r-10" name="submit">Kirim</button>
                <a href="<?=base_url().'server/indeks'?>" class="btn btn-inverse waves-effect waves-light">Batal</a>
            <?php echo form_close(); ?>

        </div>
    </div>
</div>