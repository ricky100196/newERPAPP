<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if(@$this->session->flashdata('success')){?>
<script>
Swal.fire({
    type: "success",
    icon: "success",
    title: 'Success...',
    text: "<?= $this->session->flashdata('success')?>"
});
</script>
<?php } if(@$this->session->flashdata('failed')){?>
<script>
Swal.fire({
    type: "error",
    icon: "error",
    title: 'Error...',
    text: "<?= $this->session->flashdata('failed')?>"
});
</script>
<?php } ?>
