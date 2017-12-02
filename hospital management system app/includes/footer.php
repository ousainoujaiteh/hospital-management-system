<footer class="footer">
	<div class="container-fluid">
		<nav class="pull-left">
			<ul>

				<li>
					<a href="http://www.creative-tim.com">
					Hospital Management System
					</a>
				</li>
			</ul>
		</nav>
		<div class="copyright pull-right">
			&copy; <script>document.write(new Date().getFullYear())</script>, made with <i class="fa fa-heart heart"></i> by <a href="">Hospital Management System</a>
		</div>
	</div>
</footer>

</div>
</div>


<!--   Core JS Files   -->
<script src="../public/assets/js/jquery-1.10.2.js" type="text/javascript"></script>
<script src="../public/assets/js/bootstrap.min.js" type="text/javascript"></script>

<!--  Checkbox, Radio & Switch Plugins -->
<script src="../public/assets/js/bootstrap-checkbox-radio.js"></script>

<!--  Charts Plugin -->
<script src="../public/assets/js/chartist.min.js"></script>

<!--  Notifications Plugin    -->
<script src="../public/assets/js/bootstrap-notify.js"></script>

<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>

<!-- Paper Dashboard Core javascript and methods for Demo purpose -->
<script src="../public/assets/js/paper-dashboard.js"></script>



<script type="text/javascript">
$(document).ready(function(){

	demo.initChartist();

	$.notify({
		icon: 'ti-bell',
		message: "Welcome to <b>KARMA</b> - Hospital Management System."

	},{
		type: 'success',
		timer: 1000
	});

});
</script>


</html>
