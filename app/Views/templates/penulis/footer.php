<!-- jQuery and Bootstrap Bundle (includes Popper) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>


<!-- OPTIONAL SCRIPT -->
<!-- SweetAlert -->
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
        $('#post').DataTable({});
        $('#komentar').DataTable({});
        $('#texteditor').ckeditor();
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

    function previewImg() {
        const gambar = document.querySelector('#file_gambar');
        const label_gambar = document.querySelector('.custom-file-label');
        const preview_gambar = document.querySelector('.img-preview');

        label_gambar.textContent = gambar.files[0].name;
        const file_gambar = new FileReader();
        file_gambar.readAsDataURL(gambar.files[0]);

        file_gambar.onload = function(e) {
            preview_gambar.src = e.target.result;
        }
    }
</script>

</body>

</html>