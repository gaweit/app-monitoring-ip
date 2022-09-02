<div class="col-sm-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title"><?=$title?></h4>
            <h5 class="card-subtitle">Pastikan setiap form terisi dengan benar.</h5>

            <?php $attributes = array('class'=>'form-horizontal','role'=>'form','autocomplete'=>'off'); echo form_open_multipart('level/ubah_level',$attributes); ?>
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">

                <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">Nama</label>
                    <div class="col-10">
                        <input class="form-control" type="text" name="a" value="<?=$row['nama_level']?>">
                        <input class="form-control" type="hidden" name="b" value="backend">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">Aktif</label>
                    <div class="col-10">
                        <select class="form-control" name="c">
                            <option value="<?=$row['aktif']?>"> <?=$row['aktif']?> </option>
                            <option value="N"> N </option>
                            <option value="Y"> Y </option>
                        </select>
                        <small class="text-muted"> Default No / N</small>
                    </div>
                </div>

                <button type="submit" class="btn btn-success waves-effect waves-light m-r-10" name="submit">Kirim</button>
                <a href="<?=base_url().'level/indeks'?>" class="btn btn-inverse waves-effect waves-light">Batal</a>
            <?php echo form_close(); ?>

        </div>
    </div>
</div>