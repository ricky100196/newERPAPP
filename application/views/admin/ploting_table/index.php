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
                        <h4 class="card-title">Ploting Coaching</h4>
                    </div>
                    <div class="col-md-6">
                        <a href="<?=base_url('admin/ploting_table/tambah')?>" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Tambah Ploting</a>
                    </div>
                </div>
                <hr>
                <div class="table-responsive">
                    <table id="table_data" class="table table-bordered nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th class="text-center" style="vertical-align: middle !important;">No</th>
                                <th style="vertical-align: middle !important;">Nama Widyaprada</th>
                                <th >NIP / No. KTP</th>
                                <th >Instansi</th>
                                <th >Kontak</th>
                                <th >Guru</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>                           
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-popout" role="dialog" aria-labelledby="modal-popout" aria-hidden="true">
    <div class="modal-dialog modal-dialog-popout " role="document">
        <div class="modal-content">
            <div id="content_modal"></div>
        </div>
    </div>
</div>