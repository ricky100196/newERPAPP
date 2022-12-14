<style type="text/css">
    small{
        font-size: 12px;
    }
</style>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <h4 class="card-title">Rekap Instrumen</h4>
                    </div>
                </div>
                <hr>
                <div class="table-responsive">
                    <table id="datatable-buttons" class="table table-bordered nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th class="text-center" style="vertical-align: middle !important;">No</th>
                                <th style="vertical-align: middle !important;">Coach</th>
                                <th class="text-center">Pertanyaan 1</th>
                                <th class="text-center">Pertanyaan 2</th>
                                <th class="text-center">Pertanyaan 3</th>
                                <th class="text-center">Pertanyaan 4</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; foreach ($data as $row): ?>
                            <tr>
                                <td class="text-center"><?= $no++ ?></td>
                                <td>
                                    <?=$row->coach?> <br>
                                    (<?=$row->instansi_coach?>)
                                </td>
                                <td>
                                    <?=$row->guru?> <br>
                                    (<?=$row->instansi_guru?>)
                                    <?=$row->kab_guru?>|<?=$row->prov_guru?>
                                </td>
                                <td><?=$row->j1?></td>
                                <td><?=$row->j2?></td>
                                <td><?=$row->j3?></td>
                                <td><?=$row->j4?></td>
                            </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    
</script>