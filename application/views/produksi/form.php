<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Material</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Warehouse</a></div>
              <div class="breadcrumb-item">Tambah Material</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title"><?= $_title ?></h2>
            <p class="section-lead">Masukkan penggunaan material.</p>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form class="form-horizontal" id="form-simpan" role="form" method="post" action="<?= site_url('MaterialUse/save/'.@$id) ?>" style="margin:20px;">
                                <div class="row">
                                <?php $today = date("20y-m-d");?>
                                    <div class="form-group col-md-12">
                                        <label for="tangggal">Tanggal</label>
                                        <input type="text" class="form-control" value="<?php echo isset($data->tanggal) ? $data->tanggal : $today ?>" name="tanggal" id="tanggal" readonly>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="id_material">Pilih Jenis Material</label>
                                        <select name="id_material" id="id_material" class="form-control">
                                            <option value="">-PILIH-</option>
                                            <?php foreach ($perusahaan as $ph) { ?>
                                            <option value="<?= $ph['id_material'] ?>" <?php echo @$data->id_material==$ph['id_material'] ? "selected":"" ?>><?= $ph['jenis_material'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="shift">Shift</label>
                                        <select name="shift" id="shift" class="form-control">
                                            <option value="">-PILIH-</option>
                                            <option value="SHIFT 1" <?php echo isset($data->shift) ? $data->shift : '' ?>>SHIFT 1</option>
                                            <option value="SHIFT 2" <?php echo isset($data->shift) ? $data->shift : '' ?>>SHIFT 2</option>
                                            <option value="SHIFT 3" <?php echo isset($data->shift) ? $data->shift : '' ?>>SHIFT 3</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="vacum">Vacum</label>
                                        <select name="vacum" id="vacum" class="form-control">
                                            <option value="">-PILIH-</option>
                                            <option value="VACUM 1" <?php echo isset($data->vacum) ? $data->vacum : '' ?>>VACUM 1</option>
                                            <option value="VACUM 2"<?php echo isset($data->vacum) ? $data->vacum : '' ?>>VACUM 2</option>
                                            <option value="VACUM 3" <?php echo isset($data->vacum) ? $data->vacum : '' ?>>VACUM 3</option>
                                            <option value="VACUM 4" <?php echo isset($data->vacum) ? $data->vacum : '' ?>>VACUM 4</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="roll">ROLL</label>
                                        <input type="text" class="form-control" value="<?php echo isset($data->roll) ? $data->roll_vacum : '' ?>" name="roll_vacum" id="roll_vacum" placeholder="ROLL">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="kg">KG</label>
                                        <input type="text" class="form-control" value="<?php echo isset($data->kg) ? $data->kg_vacum : '' ?>" name="kg_vacum" id="kg_vacum" placeholder="kg">
                                    </div>
                                    
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <hr>
                                        <?php if (!@$id) { ?>
                                        <button type="submit" class="btn btn-primary pull-right" id="simpan">Simpan</button>
                                        <?php  } else { ?>
                                        <button type="submit" class="btn btn-primary pull-right" id="update">Simpan</button>
                                        <?php } ?>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>