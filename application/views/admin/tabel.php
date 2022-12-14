<table class="table table-bordered nowrap example" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
    <thead>
        <tr>
            <th class="text-center">No</th>
            <th>Email</th>
            <th>Wilayah</th>
            <th>Nama</th>
            <th class="text-center">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $no=1; foreach ($data as $row): ?>
        <tr>
            <td class="text-center"><?= $no++ ?></td>
            <td><?= $row->email ?><br><span class="text-danger font-w600"><?= $row->no_hp ?></span></td>
            <td><?= $row->nama_kab ?><br><span class="text-danger font-w600"><?= $row->nama_prov ?></span></td>
            <td style="white-space: unset; word-wrap: break-word;"><?= $row->nama ?></td>
            <td class="text-center" data-order="<?= $row->is_lengkap ?>">
                <?php if ($row->is_lengkap=='ya') { ?>
                <button class="btn btn-success">Selesai</button>
                <?php } else { ?>
                <button class="btn btn-warning">Proses</button>
                <?php } ?>
                <a href="<?= base_url(strtolower($row->type).'/index?id='.encode_id($row->id)) ?>" class="btn btn-primary"><i class="fa fa-eye"></i> Lihat Isian</a>
                <a target="_blank" href="<?= base_url('admin/cetak_'.strtolower($row->type).'/'.encode_id($row->id)) ?>" class="btn btn-primary"><i class="fa fa-print"></i> Cetak PDF</a>
            </td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>
<script type="text/javascript">
    $('.example').DataTable({
        language: {
            search: '<span>Cari:</span> _INPUT_',
            searchPlaceholder: 'Masukan pencarian...',
            infoEmpty: "Menampilkan 0 data",
            zeroRecords: "Tidak ada data",
            info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
            infoFiltered: "(disaring dari _MAX_ data keseluruhan)",
            lengthMenu: 'Tampilkan: _MENU_',
            paginate: {
                'first': 'First',
                'last': 'Last',
                'next': '&rarr;',
                'previous': '&larr;'
            }
        }
    });
</script>