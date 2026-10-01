<!-- jquery js -->
<script src="assets/js/vendor/jquery-3.6.2.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<!-- bootstrap js -->
<script src="assets/js/bootstrap.min.js"></script>
<!-- carousel js -->
<script src="assets/js/owl.carousel.min.js"></script>
<!-- counterup js -->
<script src="assets/js/jquery.counterup.min.js"></script>
<!-- waypoints js -->
<script src="assets/js/waypoints.min.js"></script>
<!-- wow js -->
<script src="assets/js/wow.js"></script>
<!-- imagesloaded js -->
<script src="assets/js/imagesloaded.pkgd.min.js"></script>
<!-- venobox js -->
<script src="venobox/venobox.js"></script>

<!--  animated-text js -->
<script src="assets/js/animated-text.js"></script>
<!-- venobox min js -->
<script src="venobox/venobox.min.js"></script>
<!-- isotope js -->
<script src="assets/js/isotope.pkgd.min.js"></script>
<!-- jquery meanmenu js -->
<script src="assets/js/jquery.meanmenu.js"></script>

<!-- jquery scrollup js -->
<script src="assets/js/jquery.scrollUp.js"></script>

<script src="assets/js/jquery.barfiller.js"></script>
<!-- jquery js -->
<!-- theme js -->
<script src="assets/js/theme.js"></script>
<!--<script>
    jQuery(document).ready(function ($) {
        var path = window.location.pathname.split("/").pop();

        if (path === '') {
            path = 'index.php';
        }
        var target = $('nav a[href="' + path + '"]');
        target.addClass('active');

    });
</script>-->

<script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.bundle.min.js'></script>

<!----------------Whatsapp Chat--------------->
<style>
a{
  text-decoration:none;
}
.floating_btn {
  position: fixed;
  bottom: 95px;
  right: 12px;
  width: 100px;
  height: 100px;
  display: flex;
  flex-direction: column;
  align-items:center;
  justify-content:center;
  z-index: 1000;
}

@keyframes pulsing {
  to {
    box-shadow: 0 0 0 30px rgba(232, 76, 61, 0);
  }
}

.contact_icon {
  background-color: #42db87;
  color: #fff;
  width: 60px;
  height: 60px;
  font-size:30px;
  border-radius: 50px;
  text-align: center;
  box-shadow: 2px 2px 3px #999;
  display: flex;
  align-items: center;
  justify-content: center;
  transform: translatey(0px);
  animation: pulse 1.5s infinite;
  box-shadow: 0 0 0 0 #42db87;
  -webkit-animation: pulsing 1.25s infinite cubic-bezier(0.66, 0, 0, 1);
  -moz-animation: pulsing 1.25s infinite cubic-bezier(0.66, 0, 0, 1);
  -ms-animation: pulsing 1.25s infinite cubic-bezier(0.66, 0, 0, 1);
  animation: pulsing 1.25s infinite cubic-bezier(0.66, 0, 0, 1);
  font-weight: normal;
  font-family: sans-serif;
  text-decoration: none !important;
  transition: all 300ms ease-in-out;
}


.text_icon {
  margin-top: 8px;
  color: #707070;
  font-size: 13px;
font-weight: bold;
}
</style>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<div class="floating_btn">
    <a target="_blank" href="https://wa.me/6269111560" rel="noopener">
      <div class="contact_icon">
        <i class="fa fa-whatsapp my-float"></i>
      </div>
    </a>
    <p class="text_icon">Chat us?</p>
  </div>

<!----------------Whatsapp Chat--------------->


<?=$seo_footer; ?>
