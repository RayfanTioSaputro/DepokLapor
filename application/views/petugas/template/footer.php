</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2020</span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<script src="<?= base_url() . 'assets/js/petugas/script.js' ?>"></script>
<script src="<?= base_url() . 'assets/js/petugas/bootstrap.bundle.min.js' ?>"></script>
<script src="<?= base_url() . 'assets/js/petugas/bootstrap.min.js' ?>"></script>
<script src="<?= base_url() . 'assets/js/petugas/sb-admin-2.min.js' ?>"></script>
<script type="text/javascript">
    $('body').waitMe({
        effect: 'win8',
        text: 'Mohon tunggu...',
        bg: 'rgba(0,0,0,0.5)',
        color: '#fff',
        maxSize: '',
        waitTime: -1,
        source: '',
        textPos: 'vertical',
        fontSize: '',
        onClose: function() {}
    });

    $(function() {
        $(".waitMe").fadeOut(200);
    });

    $(window).on("beforeunload", function(e) {
        $(".waitMe").show();
    })

    $(window).bind("load", function() {
        window.setTimeout(function() {
            $(".alert").fadeTo(10000, 0).slideUp(300, function() {
                $(this).remove();
            });
        }, 500);
    });

    let alert_success = '<?= $this->session->flashdata('message-success', TRUE); ?>';

    if (alert_success != '') {
        var x = document.getElementById("snackbar");
        x.className = "show";
        setTimeout(function() {
            x.className = x.className.replace("show", "");
        }, 3000);
    }
</script>


</body>

</html>