<?php
	require_once('include/login/auth.php');
	require_once('include/debug.php');
	include('include/mysql_connect.php');

	$owner 	= 	$_SESSION['SESS_MEMBER_ID'];

	$GetDataComponent = mysqli_query($connection,"SELECT * FROM members WHERE member_id = ".$owner."");
	$executesql = mysqli_fetch_assoc($GetDataComponent);

?>

<?php 
 // Custom Page Titles
 $pageTitle = 'Profile - ecDB';
 include("include/head.php")  
 ?>



	<body>
		<div id="wrapper">
			
			<!-- Header -->
				<?php include 'include/header.php'; ?>
			<!-- END -->
			
			<!-- Main menu -->
				<?php include 'include/menu.php'; ?>
			<!-- END -->
			
			<!-- Main content -->
			<div id="content">
				<h1>Settings</h1>

				<?php
					include('include/include_my_settings.php');
					$Settings = new My;
					$Settings->Settings();
				?>

				<form class="globalForms noPadding" action="" method="post">
					<table class="globalTables leftAlign noHover" cellpadding="0" cellspacing="0">
						<tbody>
							<tr>
								<td class="boldText">
									First Name
								</td>
								<td>
									<input name="firstname" type="text" class="medium" value="<?php if(isset($_POST['submit'])) { echo $_POST['firstname']; } else { echo $executesql['firstname']; } ?>" />
								</td>
								<td class="boldText">
									Last Name
								</td>
								<td>
									<input name="lastname" type="text" class="medium" value="<?php if(isset($_POST['submit'])) { echo $_POST['lastname']; } else { echo $executesql['lastname']; } ?>" />
								</td>
							</tr>
							<tr>
								<td class="boldText">
									Email
								</td>
								<td>
									<input name="mail" class="medium" type="text" value="<?php if(isset($_POST['submit'])) { echo $_POST['mail']; } else { echo $executesql['mail']; } ?>" />
								</td>
							</tr>
							<tr>
								<td class="boldText">
									Password
								</td>
								<td>
									<input name="oldpass" class="medium" type="password" value="" />
								</td>
								<td class="boldText">
									New password
								</td>
								<td>
									<input name="newpass" class="medium" type="password" value="" onpaste="return false;" />
								</td>
							</tr>
							<tr>
								<td class="boldText">
									Measurement System
								</td>
								<td>
									<?php
										if(!isset($_POST['submit']) && $executesql['measurement'] == 1) {
											echo '<input type="radio" name="measurement" value="1" checked="checked" /> Metric ';
											echo '<input type="radio" name="measurement" value="0" /> Imperial';
										}
										if(!isset($_POST['submit']) && $executesql['measurement'] == 0) {
											echo '<input type="radio" name="measurement" value="1" /> Metric ';
											echo '<input type="radio" name="measurement" value="0" checked="checked" /> Imperial';
										}
										if(isset($_POST['submit']) && $_POST['measurement'] == 1) {
											echo '<input type="radio" name="measurement" value="1" checked="checked" /> Metric ';
											echo '<input type="radio" name="measurement" value="0" /> Imperial';
										}
										if(isset($_POST['submit']) && $_POST['measurement'] == 0) {
											echo '<input type="radio" name="measurement" value="1" /> Metric ';
											echo '<input type="radio" name="measurement" value="0" checked="checked" /> Imperial';
										}
									?>
								</td>
							</tr>
							<tr>
								<td class="boldText">
									Currency
								</td>
								<td>
									<select name="currency">
										<option value="SEK" 
										<?php
											if(!isset($_POST['submit']) && $executesql['currency'] == 'SEK') {
												echo 'selected';
											}
											if(isset($_POST['submit']) && $_POST['currency'] == 'SEK') {
												echo 'selected';
											}
										?>
										>SEK</option>
										
										<option value="USD" 
										<?php
											if(!isset($_POST['submit']) && $executesql['currency'] == 'USD') {
												echo 'selected';
											}
											if(isset($_POST['submit']) && $_POST['currency'] == 'USD') {
												echo 'selected';
											}
										?>
										>USD</option>
										
										<option value="EUR" 
										<?php
											if(!isset($_POST['submit']) && $executesql['currency'] == 'EUR') {
												echo 'selected';
											}
											if(isset($_POST['submit']) && $_POST['currency'] == 'EUR') {
												echo 'selected';
											}
										?>
										>EUR</option>	

										<option value="GBP" 
										<?php
											if(!isset($_POST['submit']) && $executesql['currency'] == 'GBP') {
												echo 'selected';
											}
											if(isset($_POST['submit']) && $_POST['currency'] == 'GBP') {
												echo 'selected';
											}
										?>
										>GBP</option>	
									</select>
								</td>
							</tr>
						</tbody>
					</table>
					<div class="buttons">
						<div class="input">
							<button class="button green" name="submit" type="submit"><span class="fa fa-save fa-lg"></span> Save</button>
						</div>
					</div>
				</form>
			</div>
			<!-- END -->
			<!-- Text outside the main content -->
				<?php include 'include/footer.php'; ?>
			<!-- END -->
		</div>
	</body>
</html>
