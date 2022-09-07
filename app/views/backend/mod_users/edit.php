<div class="col-sm-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title"><?= $title ?></h4>
            <h5 class="card-subtitle">Pastikan setiap form terisi dengan benar.</h5>
            <?php $attributes = array('class' => 'form-horizontal', 'role' => 'form', 'autocomplete' => 'off');
            echo form_open_multipart('users/ubah_users', $attributes); ?>
            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
            <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">No.Pegawai</label>
                <div class="col-10">
                    <input type="hidden" name="id" value="<?= $row['kode_user'] ?>">
                    <input type="form-control" style="”width: 308px;width: 860px;" type="number" name="nopeg" value="<?= $row['nopeg'] ?>" minlength="7" maxlength="7" required>
                </div>
            </div>

            <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">Nama users</label>
                <div class="col-10">
                    <input type="form-control" style="”width: 308px;width: 860px;" type="text" name="nama" value="<?= $row['nama'] ?>" required>
                </div>
            </div>

            <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">Email</label>
                <div class="col-10">
                    <input type="email" style="”width: 308px;width: 860px;" type="email" name="email" value="<?= $row['email'] ?>" required>
                </div>
            </div>

            <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">Password</label>
                <div class="col-10">
                    <input class="form-control" style="”width: 308px;width: 860px;" type="password" name="password" value="<?= $row['password'] ?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">No Hp</label>
                <div class="col-10">
                    <input type="form-control" style="”width: 308px;width: 860px;" type="tel" name="nohp" value="<?= $row['nohp'] ?>" minlength="12" maxlength="12">
                </div>
            </div>

            <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">Alamat</label>
                <div class="col-10">
                    <input type="form-control" style="”width: 308px;width: 860px;" type="text" name="alamat" value="<?= $row['alamat'] ?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">Foto Saat ini</label>
                <div class="col-10">
                    <img src="<?= base_url() . 'assets/uploads/users/' . $row['foto'] ?>" class="img-thumbnail align-middle" width="100">
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
                            $pilih = "selected";
                            if ($value['id_level'] == $row['id_level']) {
                                echo "<option value='$value[id_level]' $pilih> $value[nama_level] </option>";
                            } else {
                                echo "<option value='$value[id_level]'> $value[nama_level] </option>";
                            }
                        } ?>
                    </select>
                    <small class="text-muted">default user</small>
                </div>
            </div>

            <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">Blokir</label>
                <div class="col-10">
                    <select class="form-control" name="blokir">
                        <option value="<?= $row['blokir'] ?>"> <?= $row['blokir'] ?> </option>
                        <option value="N"> N </option>
                        <option value="Y"> Y </option>
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