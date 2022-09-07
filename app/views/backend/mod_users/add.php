<div class="col-sm-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title"><?= $title ?></h4>
            <h5 class="card-subtitle">Pastikan setiap form terisi dengan benar.</h5>

            <?php $attributes = array('class' => 'form-horizontal', 'role' => 'form', 'autocomplete' => 'off');
            echo form_open_multipart('users/tambah_users', $attributes); ?>
            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
            <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">No.Pegawai*</label>
                <div class="col-10">
                    <!-- <input 
                            type = "number"
                            style="width: 308px;width: 860px;border: 1px solid #ebebeb;border-radius: 3px"
                            name="nopeg" 
                            oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                            maxlength = "7" required> -->
                    <input type="form-control" style="width: 308px;width: 860px;border: 1px solid #ebebeb;border-radius: 3px" name="nopeg" minlength="7" maxlength="7" required>
                </div>
            </div>

            <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">Nama users*</label>
                <div class="col-10">
                    <input style="width: 308px;width: 860px;border: 1px solid #ebebeb;border-radius: 3px" type="text" name="nama" required>
                </div>
            </div>

            <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">Email</label>
                <div class="col-10">
                    <input type="email" style="”width: 308px;width: 860px;border: 1px solid #ebebeb;border-radius: 3px" name="email" required>
                </div>
            </div>

            <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">Password*</label>
                <div class="col-10">
                    <input type="form-control" style="”width: 308px;width: 860px;border: 1px solid #ebebeb;border-radius: 3px" type="password" name="password" required>
                </div>
            </div>

            <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">No Hp</label>
                <div class="col-10">
                    <input type="number" style="”width: 308px;width: 860px;border: 1px solid #ebebeb;border-radius: 3px" name="nohp" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="12" required>

                </div>
            </div>

            <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">Alamat</label>
                <div class="col-10">
                    <input type="form-control" style="”width: 308px;width: 860px;border: 1px solid #ebebeb;border-radius: 3px" type="text" name="alamat">
                </div>
            </div>

            <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">Foto</label>
                <div class="col-10">
                    <input class="form-control" type="file" name="foto">
                </div>
            </div>

            <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">Level</label>
                <div class="col-10">
                    <select class="form-control" name="level">
                        <option value="0">-- Pilih Level --</option>
                        <?php foreach ($level as $key => $value) {
                            echo "<option value='$value[id_level]'> $value[nama_level] </option>";
                        } ?>
                    </select>
                    <small class="text-muted">default user</small>
                </div>
            </div>

            <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">Blokir</label>
                <div class="col-10">
                    <select class="form-control" name="blokir">
                        <option value="N">-- Blokir? --</option>
                        <option value="N"> No </option>
                        <option value="Y"> Yes </option>
                    </select>
                    <small class="text-muted"> Default No / N</small>
                </div>
            </div>

            <button type="submit" class="btn btn-success waves-effect waves-light m-r-10" name="submit">Kirim</button>
            <a href="<?= base_url() . 'users/indeks' ?>" class="btn btn-inverse waves-effect waves-light">Batal</a>
            <?php echo form_close(); ?>

        </div>
    </div>
</div>