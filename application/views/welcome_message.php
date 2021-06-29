<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>
</head>
<body>

	<div id="container">

		<div class="container">
			<h1 class="page-header text-center">CodeIgniter Ajax</h1>
			<div class="row">
				<div class="col-md-4 col-md-offset-4">
			

				<?php if($this->session->set_userdata('NOMBRE_USUARIO') != null): ?>

					<p>Bienvenido</p>
				<?php endif; ?>
				<a href="<?php echo base_url(); ?>Accesos/logout" class="btn btn-danger">Logout</a>
			</div>
		</div>
	</div>
</div>

</body>
</html>