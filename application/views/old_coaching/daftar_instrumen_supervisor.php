<style type="text/css">
    .toolbar {
        position: absolute;
        right: 10px;
        top: 10px;
    }

    @media screen and (max-width: 600px) {
        .toolbar {
            position: unset;
            text-align: center;
        }
    }
</style>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Daftar Instrumen Guru Ekosistem Merdeka Belajar</h4>
                <hr>
                <div class="table-responsive">
                    <table id="datatable-buttons" class="table table-bordered nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th>Nama Coach</th>
                                <th>Nama Peserta</th>
                                <th>Program</th>
                                <th>Interaksi Terakhir</th>
                                <th>Status</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($data as $row) : ?>
                                <tr>
                                    <td class="text-center"><?= $no++ ?></td>
                                    <td><?= $row->nama_coach ?></td>
                                    <td><?= $row->nama ?></td>
                                    <td><?= ($row->program_bi == 'psp' ? 'PROGRAM SEKOLAH PENGGERAK' : ($row->program_bi == 'pgp' ? 'PROGRAM GURU PENGGERAK' : ($row->program_bi == 'ikm' ? 'IMPLEMENTASI KURIKULUM MERDEKA' : ''))) ?><br>Layanan : <?= $row->program ?></td>
                                    <td>
                                        <?php $chat = $this->db->select('max(created_at) as chat_time')->where('deleted_at is null')->where('id_instrumen', $row->id)->get('chat_request')->row() ?>
                                        <?= 'Last Call Coach <br> '.($row->call_time_coach==null?'-':$row->call_time_coach) ?><br>
                                        <?= 'Last Call Guru <br> '.($row->call_time_guru==null?'-':$row->call_time_guru) ?><br>
                                        <?= 'Chat Terakhir <br> '.($chat==null?'-':$chat->chat_time) ?>
                                    </td>
                                    <td><?= ($row->kunci != '1') ? '<button type="button" class="btn btn-sm btn-danger"> Pengisian Instrumen</button>' : (($row->selesai == '1') ? '<button type="button" class="btn btn-sm btn-success"> Coaching Selesai</button>' : '<button type="button" class="btn btn-sm btn-primary"> Proses Coaching</button>') ?></td>
                                    <td class="text-center">
                                        <?= ($row->kunci == '0') ? '<button type="button" class="btn btn-sm btn-danger"> Belum Submit</button>' : '<a href="' . base_url('coaching/guru/' . encode_id($row->id)) . '" class="btn btn-sm btn-primary"><i class="bx bx-detail"></i> Lihat</a>' ?>
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
<div class="modal fade" id="modal-popout" role="dialog" aria-labelledby="modal-popout" aria-hidden="true">
    <div class="modal-dialog modal-dialog-popout modal-lg" role="document">
        <div class="modal-content">
            <div id="content_modal"></div>
        </div>
    </div>
</div>