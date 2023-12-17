<!-- partial -->
</div>
<!-- main-panel ends -->
</div>
<!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->

<!-- plugins:js -->
<script src="<?= base_url('assets/'); ?>vendors/js/vendor.bundle.base.js"></script>
<script src="<?= base_url('assets/'); ?>vendors/js/vendor.bundle.addons.js"></script>
<!-- endinject -->
<!-- Plugin js for this page-->
<!-- End plugin js for this page-->
<!-- inject:js -->
<script src="<?= base_url('assets/'); ?>js/off-canvas.js"></script>
<script src="<?= base_url('assets/'); ?>js/hoverable-collapse.js"></script>
<script src="<?= base_url('assets/'); ?>js/misc.js"></script>
<script src="<?= base_url('assets/'); ?>js/settings.js"></script>
<script src="<?= base_url('assets/'); ?>js/todolist.js"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="<?= base_url('assets/'); ?>js/dashboard.js"></script>
<script src="<?= base_url('assets/'); ?>js/modal-demo.js"></script>
<script src="<?= base_url('assets/'); ?>js/form-validation.js"></script>
<script src="<?= base_url('assets/'); ?>js/bt-maxLength.js"></script>
<script src="<?= base_url('assets/'); ?>js/data-table.js"></script>
<script src="<?= base_url('assets/'); ?>my.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#angka1').maskMoney();
        $('#angka2').maskMoney({
            prefix: 'US$'
        });
        $('#hrg').maskMoney({
            prefix: 'Rp. ',
            thousands: '.',
            decimal: ',',
            precision: 0
        });
        $('#dbyr').maskMoney({
            prefix: 'Rp. ',
            thousands: '.',
            decimal: ',',
            precision: 0
        });
        $('#pengur').maskMoney({
            prefix: 'Rp. ',
            thousands: '.',
            decimal: ',',
            precision: 0
        });

        $('#angka4').maskMoney();
        showInputs: false
    });
</script>
<script type="text/javascript">
    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function() {
            $(this).remove();
        });
    }, 5000)
</script>
<!-- End custom js for this page-->
</body>


<!-- Mirrored from www.urbanui.com/melody/template/pages/layout/horizontal-menu.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 15 Sep 2018 06:05:55 GMT -->

</html>