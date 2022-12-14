                
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <h4 class="card-title">Daftar Guru - <b><?= $data_coach->nama ?></b></h4>
                    </div>
                </div>
                <hr>
                <div class="table-responsive">
                    <table id="datatable-buttons" class="table table-bordered nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th class="text-center" style="vertical-align: middle !important;">No</th>
                                <th style="vertical-align: middle !important;">Nama Guru</th>
                                <th class="text-center">NUPTK</th>
                                <th class="text-center">NIK</th>
                                <th >Instansi</th>
                                <th >Jabatan</th>
                                <th >Kontak</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; foreach ($data_guru as $row): ?>
                            <tr>
                                <td class="text-center"><?= $no++ ?></td>
                                <td> <?= $row->nama ?> </td>
                                <td class="text-center"> <?= $row->nuptk ?> </td>
                                <td class="text-center"> <?= $row->nik ?> </td>
                                <td> <?= $row->instansi ?><br><?= $row->kab.', '.$row->prov ?> </td>
                                <td> <?= $row->jabatan ?> </td>
                                <td> <?= $row->no_hp.'<br>'.$row->email ?> </td>
                                <td>
                                    <?php if($row->kunci=='1') { ?>
                                    <a href="javascript:;" class="btn btn-primary btn-sm"> <i class="fa fa-user"></i> Sudah Kunci</a>
                                    <?php } else { ?>
                                    <a href="javascript:;" onclick="hapus('<?= encode_id($row->id_instrumen) ?>', '<?= $row->nama ?>')" class="btn btn-sm btn-danger"> Hapus</a>
                                    <?php } ?>
                                </td>
                            </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>



<script type="text/javascript">
    function hapus(id, nama) {
        Swal.fire({
            title: "Apakah yakin menghapus guru "+nama+" dari Widyaprada <?= $data_coach->nama ?>?",
            text: "",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#ea1c18",
            confirmButtonText: "Ya",
            cancelButtonText: "Batal",
            closeOnConfirm: false,
            closeOnCancel: true
        }).then((result) => {
            if (result.value) {
                window.location.href = '<?= base_url('admin/ploting_table/hapus/') ?>'+id;
            }
        });
    }
</script>