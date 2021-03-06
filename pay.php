<!DOCTYPE html>
<html lang="en">

<head>
	<title>WAMP Infotech | Pay now | Payment Portal</title>
	<?php include "includes/head.inc.php"; ?>
	<link rel="stylesheet" href="css/signin.css" />
</head>

<body>
	<?php include "layouts/nav.inc.html"; ?>
	<div class="scrollable grey lighten-3">
		<section class="back">
			<section class="panel card-panel center-align mx-auto" style="max-width: 500px;">
				<?php if (isset($_GET) and isset($_GET['payment_id'])) {
    ?>
				<h4 class="center-align fw-600">Thank You</h4>
				<hr class="short-border" />
				<br />
				<p>Your Payment ID <b style="user-select: text">
						<?php echo $_GET['payment_id']; ?><b></p>
				<?php
} else {
        ?>
				<h4 class="left-align fw-600">Pay Now</h4>
				<hr class="short-border left" />
				<br />
				<form action="/php/pay-api.php" method="POST">
					<div class="input-field">
						<label for="pay-purpose">Purpose</label>
						<input type="text" name="purpose" id="pay-purpose" required>
					</div>
					<div class="input-field">
						<label for="pay-name">Name</label>
						<input type="text" name="name" id="pay-name" value="<?=@$_SESSION[name]?>">
					</div>
					<div class="input-field">
						<label for="pay-email">Email</label>
						<input type="email" name="email" id="pay-email" required value="<?=@$_SESSION[email]?>">
					</div>
					<div class="input-field">
						<label for="pay-phone">Phone</label>
						<input type="tel" name="phone" id="pay-phone" required value="<?=@$_SESSION[number]?>">
					</div>
					<div class="input-field">
						<label for="pay-amount">Amount</label>
						<input type="number" name="amount" id="pay-amount" required min="9">
					</div>
					<button type="submit" class="btn bg-primary right">Pay Now</button>
					<div class="clearfix"></div>
				</form>
				<?php
    } ?>
			</section>
		</section>
		<?php include "layouts/footer.inc.html"; ?>
	</div>
	<?php include "includes/scripts.inc.php"; ?>
</body>

</html>