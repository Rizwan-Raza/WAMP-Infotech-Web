<?php 
session_start();

if (!isset($_SESSION['login']) or $_SESSION['login'] != true or isset($_GET['uid']) and isset($_GET['hash'])) { 
	extract($_GET, EXTR_OVERWRITE);?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>WAMP Infotech | Reset Password </title>
	<?php include "includes/head.inc.php"; ?>
	<link rel="stylesheet" href="css/signin.css" />
</head>

<body>
	<?php include "layouts/nav.inc.html"; ?>
	<div class="scrollable grey lighten-3">
		<section class="back">
			<section class="panel" id="reset-form">
				<div class="progress-holder hide" id="progress">
					<div class="progress">
						<div class="indeterminate bg-primary"></div>
					</div>
				</div>
				<div class="prevent-overlay hide full border-radius-8"></div>
				<div class="card-panel">
					<?php if(md5("*WAMP*".$uid."*WAMP*") == $hash) { 
				$sql = "SELECT `_uid` FROM `users` WHERE `_uid`=$uid";
				require 'php/db.php';
				$conn = DB::getConnection();
				if ($result = $conn->query($sql) and $result->num_rows > 0) { ?>
					<h4 class="left-align fw-600">Reset Password</h4>
					<hr class="short-border left" />
					<br />
					<form>
						<div class="input-field"><input type="password" class="validate" name="password"
								id="rp_password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
								title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"
								required>
							<label for="rp_password">
								New Password
							</label>
							<button type="button" onclick="passVisibility(this, '#rp_password')"
								class="transparent btn-flat circle btn-floating tooltipped right waves-effect waves-circle waves-dark"
								data-tooltip="Show Password">
								<i class="material-icons grey-text text-darken-3"
									style="vertical-align: middle">visibility_off</i></button>
							<div class="helper-text">Must contain at least one number, one uppercase and lowercase
								letter, and at least 8</div>
						</div>
						<div class="input-field"><input type="password" class="validate" name="rrp_password"
								id="rrp_password" minlength="6" required>
							<label for="rrp_password">
								Re-Type Password
							</label>
						</div>
						<br />
						<button type="submit" class="btn bg-primary white-text right">Reset</button>
					</form>
					<button onclick="window.location.href='signin'"
						class="btn text-primary white waves-effect waves-primary btn-flat ml--1 left left-align">Sign
						in instead</button>
					<br clear="both" />
					<? } else { ?>
					<h4>Sorry!</h4>
					<p>User doesn&apos;t exist, mismatch hash.</p>
					<br />

					<button onclick="window.location.href='signin';togglePanels();"
						class="btn bg-primary waves-light waves-effect">Try Reset again</button>
					<?php }
			} else { ?>
					<h4>Sorry!</h4>
					<p>Wrong Activation URL, mismatch hash.</p>
					<br />
					<button onclick="window.location.href='signin';togglePanels();"
						class="btn bg-primary waves-light waves-effect">Try Reset again</button>
					<?php } ?>
				</div>
			</section>
		</section>
		<?php include "layouts/footer.inc.html"; ?>
	</div>
	<?php include "includes/scripts.inc.php"; ?>
	<script src="ui-scripts/reset-pass.js"></script>
</body>

</html>

<?php } else {
    header("Location: signin");
} ?>