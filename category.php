<?php
	include 'session.php';
?>





<!doctype html>
<html lang="en">

<?php
	include 'layout/css-layout/css-layout.php';
?>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<!-- NAVBAR -->
        <?php 
			include 'layout/css-layout/navbar.php' ;
	    ?>
		<!-- END NAVBAR -->
		<!-- LEFT SIDEBAR -->
		<div id="sidebar-nav" class="sidebar">
			<div class="sidebar-scroll">
				<nav>
					<ul class="nav">
						<li><a href="index.html" class=""><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
						<li><a href="elements.html" class="active"><i class="lnr lnr-code"></i> <span>Elements</span></a></li>
						<li><a href="charts.html" class=""><i class="lnr lnr-chart-bars"></i> <span>Charts</span></a></li>
						<li><a href="panels.html" class=""><i class="lnr lnr-cog"></i> <span>Panels</span></a></li>
						<li><a href="notifications.html" class=""><i class="lnr lnr-alarm"></i> <span>Notifications</span></a></li>
						<li>
							<a href="#subPages" data-toggle="collapse" class="collapsed"><i class="lnr lnr-file-empty"></i> <span>Pages</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
							<div id="subPages" class="collapse ">
								<ul class="nav">
									<li><a href="page-profile.html" class="">Profile</a></li>
									<li><a href="page-login.html" class="">Login</a></li>
									<li><a href="page-lockscreen.html" class="">Lockscreen</a></li>
								</ul>
							</div>
						</li>
						<li><a href="tables.html" class=""><i class="lnr lnr-dice"></i> <span>Tables</span></a></li>
						<li><a href="typography.html" class=""><i class="lnr lnr-text-format"></i> <span>Typography</span></a></li>
						<li><a href="icons.html" class=""><i class="lnr lnr-linearicons"></i> <span>Icons</span></a></li>
					</ul>
				</nav>
			</div>
		</div>
		<!-- END LEFT SIDEBAR -->
		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<h3 class="page-title">Elements</h3>
					<div class="row">
                            <div class="col-md-12  ">
                                <!-- BUTTONS -->
                                
                                <!-- END BUTTONS -->
                                <!-- INPUTS -->
                                <div class="panel">
                                    <div class="panel-heading ">
                                        <h3 class="panel-title">Inputs</h3>
                                    </div>
                                    <div class="panel-body col-md-offset-3 ">
                                        <form class="form-auth-small" action="?" method="POST">
                                            <div class="form-group">
                                                <label for="name" class="control-label ">Name</label>
                                                <input style="width:50%;" type="text" class="form-control" name="name" value="" placeholder="Enter Your Category"  id="name">
                                               
                                            </div>
                                            <div class="form-group">
                                                <label for="details" class="control-label">Details</label>
                                                <textarea id="details" rows="4" cols="50" class="form-control" style="width:50%;" name="details" placeholder="add details">
                                                </textarea>
                                               
                                            </div>
                                            <button type="submit"  class="btn btn-primary btn-lg btn-block" style="width:50%;" name="category">Add New Category</button>
                                        </form>
                                        
                                        
                                        
                                    </div>
                                </div>
                                <!-- END INPUTS -->
                                <!-- INPUT SIZING -->

                                <!-- END INPUT SIZING -->
                            </div>						
                        </div>
					</div>
				</div>
			</div>
			<!-- END MAIN CONTENT -->
		</div>
		<!-- END MAIN -->
		<div class="clearfix"></div>
		<footer>
			<div class="container-fluid">
				<p class="copyright">Shared by <i class="fa fa-love"></i><a href="https://bootstrapthemes.co">BootstrapThemes</a>
</p>
			</div>
		</footer>
	</div>
	<!-- END WRAPPER -->
	<!-- Javascript -->
	<script src="assets/vendor/jquery/jquery.min.js"></script>
	<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="assets/scripts/klorofil-common.js"></script>
</body>

</html>
