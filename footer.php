<!-- Footer
		============================================= -->
<?php
	                include "admin/connectdb.php";
					//lấy tất cả các user có trong bảng users
					//câu query để lấy
					$sql = 'select * from logo'; // không có where vì mình cần lấy tất cả
					$result = mysqli_query($conn, $sql);
					$user = mysqli_fetch_assoc($result);
					$imgData = $user['img'];  
?>		
<footer id="footer" class="dark">

			<div class="container">

				<!-- Footer Widgets
				============================================= -->
				<div class="footer-widgets-wrap clearfix">

					<div class="col_two_third">

						<div class="col_one_third">

							<div class="widget clearfix">

								<img <?php echo "src=\"$imgData\" ";?> alt="" class="footer-logo">

								<p>Blog chuyên chia sẻ kinh nghiệm, thủ thuật mẹo vặt các tiện ích hay và miễn phí.</p>

								<div style="background: url('images/world-map.png') no-repeat center center; background-size: 100%;">
									<address>
										<strong>Địa Chỉ</strong><br>
										Quận Nam Từ Liêm<br>
										Phường Trung Văn.<br>
									</address>
									<abbr title="Phone Number"><strong>Phone:</strong></abbr> 0368407798<br>
									<abbr title="Email Address"><strong>Email:</strong></abbr> presidentboy9877@gmail.com
								</div>

							</div>

						</div>

						<div class="col_one_third">

							<div class="widget widget_links clearfix">

								<h4>Blogroll</h4>

								<ul>
						<?php
						$sql = 'select * from folder';
						$result = mysqli_query($conn, $sql);
						$i= 1;
						while($pt = mysqli_fetch_assoc($result)){ 
							if($pt['hidden']!=0){
						?>
									<li><a<?php echo '<a href="/category.php?id='.$pt['id'].'">';?><?php echo $pt['folder']?></a></li>
						<?php
							}
						}
						?>
								</ul>

							</div>

						</div>

						<div class="col_one_third col_last">

							<div class="widget clearfix">
								<h4>Recent Posts</h4>

								<div id="post-list-footer">
									<div class="spost clearfix">
										<?php
										$sql = 'select * from posts order by id DESC';
										$result = mysqli_query($conn, $sql);
											$i=1;
										while($pt = mysqli_fetch_assoc($result)){
											if($i<4){
												$i++;

										$imgData = $pt['photo'];  
										?>
										<div class="entry-c">
											<div class="entry-title">
												<h4><a <?php echo 'href=/content.php?id='.$pt['id'];?>><?php echo $pt['title'];?></a></h4>
											</div>
											<ul class="entry-meta">
												<li><?php echo $pt['time'];?></li>
											</ul>
										</div>
																			<?php
											}
								}
									?>
									</div>
								</div>
							</div>

						</div>

					</div>

					<div class="col_one_third col_last">

						<div class="widget clearfix" style="margin-bottom: -20px;">

							<div class="row">

								<div class="col-lg-6 bottommargin-sm">
									<div class="counter counter-small"><span data-from="50" data-to="15065421" data-refresh-interval="80" data-speed="3000" data-comma="true"></span></div>
									<h5 class="nobottommargin">Total Downloads</h5>
								</div>

								<div class="col-lg-6 bottommargin-sm">
									<div class="counter counter-small"><span data-from="100" data-to="18465" data-refresh-interval="50" data-speed="2000" data-comma="true"></span></div>
									<h5 class="nobottommargin">Clients</h5>
								</div>

							</div>

						</div>

						<div class="widget subscribe-widget clearfix">
							<h5><strong>Đăng kí</strong> để nhận các bài viết với nhất &amp; Hay nhất:</h5>
							<div class="widget-subscribe-form-result"></div>
							<?php
							ob_start();
							     if(isset($_POST['submit'])){
								    $email = $_POST['email'];	
										$sql = 'Insert into mailsb(email)values("'.$email.'")';
		                                $sql1 = 'select * from mailsb where email="'.$email.'"';
										$result = mysqli_query($conn, $sql1);
										if (mysqli_num_rows($result)){
										}
										else if (mysqli_query($conn, $sql)) {  //biến $conn được khai báo trong file connectdb
											echo 'Đăng bài thành công!';
										}
									}
							ob_end_flush();
							?>
							<form  action="" method="post" >
								<div class="input-group divcenter">
									<div class="input-group-prepend">
										<div class="input-group-text"><i class="icon-email2"></i></div>
									</div>
									<input type="email" name="email" class="form-control required email" placeholder="Enter your Email">
									<div class="input-group-append">
										<button class="btn btn-success" type="submit" name="submit">Subscribe</button>
									</div>
								</div>
							</form>
						</div>

						<div class="widget clearfix" style="margin-bottom: -20px;">

							<div class="row">

								<div class="col-lg-6 clearfix bottommargin-sm">
									<a href="#" class="social-icon si-dark si-colored si-facebook nobottommargin" style="margin-right: 10px;">
										<i class="icon-facebook"></i>
										<i class="icon-facebook"></i>
									</a>
									<a href="https://www.facebook.com/MUSIC-Strong-1940042419597440/"><small style="display: block; margin-top: 3px;"><strong>Like us</strong><br>on Facebook</small></a>
								</div>
								<div class="col-lg-6 clearfix">
									<a href="#" class="social-icon si-dark si-colored si-rss nobottommargin" style="margin-right: 10px;">
										<i class="icon-rss"></i>
										<i class="icon-rss"></i>
									</a>
									<a href="#"><small style="display: block; margin-top: 3px;"><strong>Subscribe</strong><br>to RSS Feeds</small></a>
								</div>

							</div>

						</div>

					</div>

				</div><!-- .footer-widgets-wrap end -->

			</div>

			<!-- Copyrights
			============================================= -->
			<div id="copyrights">

				<div class="container clearfix">

					<div class="col_half">
						Copyrights &copy; 2018 by truonggiang.<br>
						<div class="copyright-links"><a href="#">Terms of Use</a> / <a href="#">Privacy Policy</a></div>
					</div>

					<div class="col_half col_last tright">
						<div class="fright clearfix">
							<a href="#" class="social-icon si-small si-borderless si-facebook">
								<i class="icon-facebook"></i>
								<i class="icon-facebook"></i>
							</a>

							<a href="#" class="social-icon si-small si-borderless si-twitter">
								<i class="icon-twitter"></i>
								<i class="icon-twitter"></i>
							</a>

							<a href="#" class="social-icon si-small si-borderless si-gplus">
								<i class="icon-gplus"></i>
								<i class="icon-gplus"></i>
							</a>

							<a href="#" class="social-icon si-small si-borderless si-pinterest">
								<i class="icon-pinterest"></i>
								<i class="icon-pinterest"></i>
							</a>

							<a href="#" class="social-icon si-small si-borderless si-vimeo">
								<i class="icon-vimeo"></i>
								<i class="icon-vimeo"></i>
							</a>

							<a href="#" class="social-icon si-small si-borderless si-github">
								<i class="icon-github"></i>
								<i class="icon-github"></i>
							</a>

							<a href="#" class="social-icon si-small si-borderless si-yahoo">
								<i class="icon-yahoo"></i>
								<i class="icon-yahoo"></i>
							</a>

							<a href="#" class="social-icon si-small si-borderless si-linkedin">
								<i class="icon-linkedin"></i>
								<i class="icon-linkedin"></i>
							</a>
						</div>

						<div class="clear"></div>

						<i class="icon-envelope2"></i> presidentboy9877@gmail.com <span class="middot">&middot;</span> <i class="icon-headphones"></i> +0368425125 <span class="middot">&middot;</span> <i class="icon-skype2"></i> TruongGiangOnSkype
					</div>

				</div>

			</div><!-- #copyrights end -->

		</footer><!-- #footer end -->

	</div><!-- #wrapper end -->

	<!-- Go To Top
	============================================= -->
	<div id="gotoTop" class="icon-angle-up"></div>

	<!-- External JavaScripts
	============================================= -->
	<script src="js/jquery.js"></script>
	<script src="js/plugins.js"></script>

	<!-- Footer Scripts
	============================================= -->
	<script src="js/functions.js"></script>

</body>
</html>