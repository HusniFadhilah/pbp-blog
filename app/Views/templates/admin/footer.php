</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy;<script>
                    document.write(new Date().getFullYear());
                </script> | PBP Blog</span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-danger" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-success" href="/authadmin/logout">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="/assets/js/jquery.min.js"></script>
<script src="/assets/js/bootstrap.bundle.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="/assets/js/sb-admin-2.min.js"></script>

<!-- OPTIONAL SCRIPT -->
<script src="/assets/js/sweetalert2.all.min.js" type="text/javascript"></script>

<!-- Adapter jquery ckeditor -->
<script src="/assets/vendor/ckeditor4/ckeditor.js" type="text/javascript"></script>
<script src="/assets/vendor/ckeditor4/adapters/jquery.js" type="text/javascript"></script>

<!-- DataTable -->
<script src="/assets/vendor/datatables/media/js/jquery.dataTables.min.js"></script>
<script src="/assets/vendor/datatables/media/js/dataTables.bootstrap4.min.js"></script>

<!-- IMPLEMENTATION OF JAVASCRIPT -->
<script type="text/javascript">
    const textflashData = $('.flash-data').data('text');
    const titleflashData = $('.flash-data').data('title');
    const iconflashData = $('.flash-data').data('icon');

    $(document).ready(function() {
        $('#kategori').DataTable({});
        $('#penulis').DataTable({});
    });

    if (textflashData && titleflashData && iconflashData) {
        Swal.fire({
            title: titleflashData,
            text: textflashData,
            icon: iconflashData
        });
    }
    $('.tombol-hapus').on('click', function(e) {
        e.preventDefault();
        const textflashData = $(this).data('text');
        const href = $(this).attr('href');

        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: 'Data ' + textflashData + ' ini akan dihapus',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus data!'
        }).then((result) => {
            if (result.value) {
                document.location.href = href;
            }
        });
    });

    $('.tombol-reset').on('click', function(e) {
        e.preventDefault();
        const textflashData = $(this).data('text');
        const href = $(this).attr('href');

        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: textflashData + ' ini akan direset',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, reset sekarang!'
        }).then((result) => {
            if (result.value) {
                document.location.href = href;
            }
        });
    });
</script>


</body>

</html>