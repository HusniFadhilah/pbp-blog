<!-- Bootstrap core JavaScript-->
<script src="/assets/js/jquery.min.js"></script>
<script src="/assets/js/bootstrap.bundle.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="/assets/js/sb-admin-2.min.js"></script>

<!-- OPTIONAL SCRIPT -->
<script src="/assets/js/sweetalert2.all.min.js" type="text/javascript"></script>
<!-- IMPLEMENTATION OF JAVASCRIPT -->
<script type="text/javascript">
    const textflashData = $('.flash-data').data('text');
    const titleflashData = $('.flash-data').data('title');
    const iconflashData = $('.flash-data').data('icon');
    const href = $('.flash-data').data('href');

    if (textflashData && titleflashData && iconflashData && href) {
        Swal.fire({
            title: titleflashData,
            text: textflashData,
            icon: iconflashData,
            confirmButtonText: 'Lanjutkan'
        }).then((result) => {
            if (result.value) {
                document.location.href = href;
            }
        });
    } else if (textflashData && titleflashData && iconflashData) {
        Swal.fire({
            title: titleflashData,
            text: textflashData,
            icon: iconflashData
        });
    }
</script>


</body>

</html>