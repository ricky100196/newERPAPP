<?php
defined('BASEPATH') or exit('No direct script access allowed');

if (@$this->session->flashdata('success')) { ?>
    <div class="row col-12">
        <div class="block-content" style="width:100%;">
            <div class="alert alert-primary alert-dismissable" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <span><?= $this->session->flashdata('success') ?></span>
            </div>
        </div>
    </div>
<?php }
if (@$this->session->flashdata('failed')) { ?>
    <div class="row col-12">
        <div class="block-content" style="width:100%;">
            <div class="alert alert-danger alert-dismissable" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <span><?= $this->session->flashdata('failed') ?></span>
            </div>
        </div>
    </div>
<?php }
if (@$this->session->flashdata('successs')) { ?>
    <div class="row col-12">
        <div class="block-content" style="width:100%;">
            <div class="alert alert-success alert-dismissable" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <span><?= $this->session->flashdata('successs') ?></span>
            </div>
        </div>
    </div>
<?php } ?>