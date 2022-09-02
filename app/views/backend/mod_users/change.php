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
            <h4 class="card-title"><?=$title?></h4>
            <h5 class="card-subtitle">Masukan password baru anda.</h5>

            <?php $attributes = array('class'=>'form-horizontal','role'=>'form','autocomplete'=>'off'); echo form_open_multipart('password',$attributes); ?>
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">Password Lama</label>
                    <div class="col-10">
                        <input class="form-control" type="password" id="pwd" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">Password Baru</label>
                    <div class="col-10">
                        <input class="form-control" type="password" id="pwd">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">Konfirmasi Password Baru</label>
                    <div class="col-10">
                        <input class="form-control" type="password" name="a" id="kpwd" onkeyup="ceksame()">
                        <small class="textConf text-danger"></small>
                    </div>
                </div>

                <button type="submit" class="btn btn-success waves-effect waves-light m-r-10" name="submit" id="subm" style="display: none">Ubah</button>
            <?php echo form_close(); ?>

        </div>
    </div>
</div>
<script type="text/javascript">
    function ceksame() {
        var pwd = $('#pwd').val();
        var kpwd = $('#kpwd').val();
        if(pwd==kpwd){
            $('#subm').show();
            $('.textConf').remove();
        }else{
            $('.textConf').text('Password tidak sama');
        }
    }
</script>