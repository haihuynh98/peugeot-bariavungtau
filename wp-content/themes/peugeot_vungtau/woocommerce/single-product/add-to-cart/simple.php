<div class="row">
	<div class="col-12 p-2">
		<div class="col-bg-blue">
			<strong>– Khuyến mãi & ưu đãi</strong>
			<br>
			<em>* Quý khách vui lòng liên hệ hotline tư vấn, nhận thông tin ưu đãi &amp; khuyễn mãi.</em>
		</div>

	</div>
	<div class="col-lg-12 col-md-12 col-12 p-2">
		<a class=" col-bg-blue btn popup_dklt" href="#">Đăng ký lái thử</a></div>
</div>

<?php $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";?>
<ul class="social-icon">
	<li>
		<a href="<?php echo 'https://www.facebook.com/sharer.php?u=' . $actual_link?>">
			<i class="fab fa-facebook-f"></i>
		</a>
	</li>
	<li>
		<a href="<?php echo 'https://twitter.com/share?url=' . $actual_link?>">
			<i class="fab fa-twitter"></i>
		</a>
	</li>
	<li>
		<a href="<?php echo 'mailto:enteryour@addresshere.com?subject=NEW%20PEUGEOT%203008&body=Check%20this%20out:%20' . $actual_link?>">
			<i class="fa-solid fa-envelope"></i>
		</a>
	</li>
	<li>
		<a href="<?php echo 'https://pinterest.com/pin/create/button/?url=' . $actual_link?>">
			<i class="fab fa-pinterest"></i>
		</a>
	</li>
	<li>
		<a href="<?php echo 'https://www.linkedin.com/shareArticle?mini=true&url=' . $actual_link?>">
			<i class="fab fa-linkedin"></i>
		</a>
	</li>
</ul>
