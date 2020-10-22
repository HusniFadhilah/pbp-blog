<footer class="bg-191 color-ash pt-50 pb-20 text-left center-sm-text">

    <div class="container-fluid">
        <div class="row">

            <div class="col-lg-1"></div>

            <div class="col-md-4 col-lg-6 mb-30">
                <div class="card h-100">
                    <div class="dplay-tbl">
                        <div class="dplay-tbl-cell">


                            <p class="color-ash mt-25">
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                Copyright &copy;<script>
                                    document.write(new Date().getFullYear());
                                </script> All rights reserved | Project PBP Website Dinamis Mini Project</a>
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            </p>

                        </div><!-- dplay-tbl-cell -->
                    </div><!-- dplay-tbl -->
                </div><!-- card -->
            </div><!-- col-lg-4 col-md-6 -->

            <div class="col-md-4 col-lg-2 mb-30">
                <div class="card h-100">
                    <div class="dplay-tbl">
                        <div class="dplay-tbl-cell">



                        </div><!-- dplay-tbl-cell -->
                    </div><!-- dplay-tbl -->
                </div><!-- card -->
            </div><!-- col-lg-4 col-md-6 -->

            <div class="col-md-4 col-lg-2 mb-30 text-left">
                <div class="card h-100">
                    <div class="dplay-tbl">
                        <div class="dplay-tbl-cell">
                            <form class="form-block form-brdr-b mx-w-400x m-auto">

                                <input class="color-white ptb-15 center-sm-text" type="text" placeholder=" Your Email">
                                <button class="mt-30 btn-brdr-grey color-ash w-100 text-center" type="submit">SUBSCRIBE</button>

                            </form>
                        </div><!-- dplay-tbl-cell -->
                    </div><!-- dplay-tbl -->
                </div><!-- card -->
            </div><!-- col-lg-4 col-md-6 -->

        </div><!-- row -->
    </div><!-- container -->
</footer>

<!-- SCIPTS -->

<script src="/assets/js/jquery.min.js"></script>

<script src="/assets/js/bootstrap.min.js"></script>

<script src="/assets/js/swiper.js"></script>


<script src="/assets/js/scripts.js"></script>

<!-- OPTIONAL SCRIPT -->
<script src="/assets/js/sweetalert2.all.min.js" type="text/javascript"></script>

<!-- IMPLEMENTATION OF JAVASCRIPT -->
<script type="text/javascript">
    const textflashData = $('.flash-data').data('text');
    const titleflashData = $('.flash-data').data('title');
    const iconflashData = $('.flash-data').data('icon');

    if (textflashData && titleflashData && iconflashData) {
        Swal.fire({
            title: titleflashData,
            text: textflashData,
            icon: iconflashData
        });
    }
</script>

</body>

</html>