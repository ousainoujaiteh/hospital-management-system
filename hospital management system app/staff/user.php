<?php include_once '../includes/header.php'; ?>

<?php include_once '../includes/sidebar.php'; ?>
<?php include_once '../includes/nav.php'; ?>



<div class="clearfix"></div>


<div class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-4 col-md-5">
					<div class="card card-user">
						<div class="image">
							<!-- <img src="https://unsplash.it/348/256?random" alt="..."/> -->
							<img src="assets/img/background.jpg" alt="..."/>
						</div>
						<div class="content">
							<div class="author">
								<img class="avatar border-white" src="../public/assets/img/faces/face-0.jpg" alt="..."/>
								<h4 class="title"><a>Upload Profile Image</a><br />
									<!-- <a href="#"><small>@jongavelli</small></a> -->
								</h4>
							</div>
							<!-- <p class="description text-center">
								"Senior Lecturer under the Computer Science Department"
							</p> -->
						</div>
						<!-- <hr>
						<div class="text-center">
							<div class="row">
								<div class="col-md-3 col-md-offset-1">
									<h5>23<br /><small>Age</small></h5>
								</div>
								<div class="col-md-4">
									<h5>5<br /><small>Courses</small></h5>
								</div>
								<div class="col-md-3">
									<h5>9,700<br /><small>Salary<small></h5>
								</div>
							</div>
						</div> -->
					</div>
					<div class="card">
						<div class="header">
							<h4 class="title">CV Upload</h4>
						</div>
						<div class="content">
							<ul class="list-unstyled team-members">
								<li>
									<div class="row">
										<div class="col-xs-3">
											<div class="avatar">
												<img src="https://placehold.it/100x100" alt="Circle Image" class="img-circle img-no-padding img-responsive">
											</div>
										</div>
										<!-- <div class="col-xs-6">
											DJ Khaled
											<br />
											<span class="text-muted"><small>Offline</small></span>
										</div> -->

										<div class="col-xs-9 text-right">
											<!-- <btn input="file" class="btn btn-sm btn-success btn-icon"><i class="fa fa-file-text-o"></i></btn> -->
											<input type="file" class="btn btn-sm btn-success btn-icon right" style="width: 180px"></input>
										</div>
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-lg-8 col-md-7">
					<div class="card">
						<div class="header">
							<h4 class="title">Personal details</h4>
						</div>
						<div class="content">
							<form>

								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>First Name</label>
											<input type="text" class="form-control border-input" placeholder="Ousainou">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Last Name</label>
											<input type="text" class="form-control border-input" placeholder="Jonga">
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="exampleInputEmail1">Email address</label>
											<input type="email" class="form-control border-input" placeholder="ousainou@gmail.com">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Website (if any)</label>
											<input type="text" class="form-control border-input" placeholder="https://assutech.gm">
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label>Street</label>
											<input type="text" class="form-control border-input" placeholder="10 Dabakh Malick Avenue">
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-md-4">
										<div class="form-group">
											<label>City</label>
											<input type="text" class="form-control border-input" placeholder="Banjul">
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label>Country</label>
											<input type="text" class="form-control border-input" placeholder="The Gambia">
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label>Phone Number</label>
											<input type="number" class="form-control border-input" placeholder="220 123 4567">
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label>Employee description</label>
											<textarea rows="5" class="form-control border-input" placeholder="Here can be your description" value="Mike">
												Oh so, your weak rhyme
												You doubt I'll bother, reading into it
												I'll probably won't, left to my own devices
												But that's the difference in our opinions.
											</textarea>
										</div>
									</div>
								</div>

								<!-- Modal -->
								<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								  <div class="modal-dialog" role="document">
								    <div class="modal-content">
								      <div class="modal-header">
								        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
								        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          <span aria-hidden="true">&times;</span>
								        </button>
								      </div>
								      <div class="modal-body">
								        ...
								      </div>
								      <div class="modal-footer">
								        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								        <button type="button" class="btn btn-primary">Save changes</button>
								      </div>
								    </div>
								  </div>
								</div>

									<!-- <div class="text-center">
										<button type="submit" class="btn btn-info btn-fill btn-wd">Update Profile</button>
									</div> -->
									<div class="clearfix"></div>
								</form>
							</div>

							<!-- HEADING 2 -->
							<div class="header">
								<h4 class="title">Employment details</h4>
							</div>
							<div class="content">

								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Company From</label>
											<input type="text" class="form-control border-input" placeholder="Assutech Inc.">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="exampleInputEmail1">Email address</label>
											<input type="email" class="form-control border-input" placeholder="Email">
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label>Department applied for</label>
											<input type="text" class="form-control border-input" placeholder="Computer Science">
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label>Why do you want to join the UTG</label>
											<textarea rows="5" class="form-control border-input" placeholder="Here can be your description" value="Mike">Oh so, your weak rhyme
												You doubt I'll bother, reading into it
												I'll probably won't, left to my own devices
												But that's the difference in our opinions.</textarea>
											</div>
										</div>
									</div>

								<div class="text-center">
									<button type="submit" class="btn btn-info btn-fill btn-wd">Update Profile</button>
								</div>
								<div class="clearfix"></div>
							</div>


						</div>
					</div>


				</div>
			</div>
		</div>
