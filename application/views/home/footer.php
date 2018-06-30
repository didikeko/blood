<!-- Footer -->
    <footer class="bg-light" style="padding-top: 1.2em; padding-bottom: 1.2em  ">
      <div class="container">
        <div class="row">
        	<div class="col-lg-6 h-100 text-center text-lg-left my-auto">
            <ul class="list-inline mb-0">
              <li class="list-inline-item mr-3">
                <a href="#">
                  <i class="fa fa-facebook fa-2x fa-fw text-dark"></i>
                </a>
              </li>
              <li class="list-inline-item mr-3">
                <a href="#">
                  <i class="fa fa-twitter fa-2x fa-fw text-dark"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fa fa-instagram fa-2x fa-fw text-dark"></i>
                </a>
              </li>
            </ul>
          </div>
          <div class="col-lg-6 h-100 text-center text-lg-right my-auto ">
            <ul class="list-inline mb-2 ">
              <li class="list-inline-item">
                <a href="#" style="color: #e8260c">About</a>
              </li>
              <li class="list-inline-item">&sdot;</li>
              <li class="list-inline-item">
                <a href="#" style="color: #e8260c">Contact</a>
              </li>
              <li class="list-inline-item">&sdot;</li>
              <li class="list-inline-item">
                <a href="#" style="color: #e8260c">Terms of Use</a>
              </li>
              <li class="list-inline-item">&sdot;</li>
              <li class="list-inline-item">
                <a href="#" style="color: #e8260c">Privacy Policy</a>
              </li>
            </ul>
            <p class="text-muted small mb-4 mb-lg-0">&copy; Bloodemergency 2018. All Rights Reserved.</p>
          </div>
          
        </div>
      </div>
    </footer>


<!-- Back to top -->
<div class="btn-back-to-top" id="myBtn">
	<span class="symbol-btn-back-to-top">
		<i class="zmdi zmdi-chevron-up"></i>
	</span>
</div>


<!--===============================================================================================-->
<script src="<?php echo base_url('assets'); ?>/vendor/jquery/jquery-3.2.1.min.js"></script>
<script>
    $(document).ready(function () {
        $("#propinsi").click(function () {
            $.post("<?php echo base_url(); ?>index.php/Myapi/get_city/" + $('#propinsi').val(), function (obj) {
                $('#origin').html(obj);
            });
        });
        
    });
</script>

	<!--===============================================================================================-->
	<script src="<?php echo base_url('assets'); ?>/vendor/animsition/js/animsition.min.js"></script>
	<!--===============================================================================================-->
	<script src="<?php echo base_url('assets'); ?>/vendor/bootstrap/js/popper.js"></script>
	<script src="<?php echo base_url('assets'); ?>/vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="<?php echo base_url('assets'); ?>/vendor/select2/select2.min.js"></script>
	<script>
		$(".js-select2").each(function(){
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});
		})
	</script>
	<!--===============================================================================================-->
	<script src="<?php echo base_url('assets'); ?>/vendor/daterangepicker/moment.min.js"></script>
	<script src="<?php echo base_url('assets'); ?>/vendor/daterangepicker/daterangepicker.js"></script>
	<!--===============================================================================================-->
	<script src="<?php echo base_url('assets'); ?>/vendor/slick/slick.min.js"></script>
	<script src="<?php echo base_url('assets'); ?>/js/slick-custom.js"></script>
	<!--===============================================================================================-->
	<script src="<?php echo base_url('assets'); ?>/vendor/parallax100/parallax100.js"></script>
	<script>
		$('.parallax100').parallax100();
	</script>
	<!--===============================================================================================-->
	<script src="<?php echo base_url('assets'); ?>/vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
	<script>
		$('.gallery-lb').each(function() { // the containers for all your galleries
			$(this).magnificPopup({
		        delegate: 'a', // the selector for gallery item
		        type: 'image',
		        gallery: {
		        	enabled:true
		        },
		        mainClass: 'mfp-fade'
		    });
		});
	</script>
	<!--===============================================================================================-->
	<script src="<?php echo base_url('assets'); ?>/vendor/isotope/isotope.pkgd.min.js"></script>
	<!--===============================================================================================-->
	<script src="<?php echo base_url('assets'); ?>/vendor/sweetalert/sweetalert.min.js"></script>
	<script>
		$('.js-addwish-b2').on('click', function(e){
			e.preventDefault();
		});

		$('.js-addwish-b2').each(function(){
			var nameProduct = $(this).parent().parent().find('.js-name-b2').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");

				$(this).addClass('js-addedwish-b2');
				$(this).off('click');
			});
		});

		$('.js-addwish-detail').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.js-name-detail').html();

			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");

				$(this).addClass('js-addedwish-detail');
				$(this).off('click');
			});
		});

		/*---------------------------------------------*/

		$('.js-addcart-detail').each(function(){
			var nameProduct = $(this).parent().parent().parent().parent().find('.js-name-detail').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to cart !", "success");
			});
		});

	</script>
	<!--===============================================================================================-->
	<script src="<?php echo base_url('assets'); ?>/vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
	<script>
		$('.js-pscroll').each(function(){
			$(this).css('position','relative');
			$(this).css('overflow','hidden');
			var ps = new PerfectScrollbar(this, {
				wheelSpeed: 1,
				scrollingThreshold: 1000,
				wheelPropagation: false,
			});

			$(window).on('resize', function(){
				ps.update();
			})
		});
	</script>
	<!--===============================================================================================-->
	
	<!--===============================================================================================-->
	<script src="<?php echo base_url('assets'); ?>/js/main.js"></script>
	<script src="<?php echo base_url('assets'); ?>/js/custom.js"></script>

	<!-- Custom scripts for this template -->
    <script src="<?php echo base_url('assets'); ?>/js/freelancer.min.js"></script>

</body>
</html>
