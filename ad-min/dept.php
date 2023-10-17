<?php
include('header.php');

$dao = new DataAccess();
$file = new FileUpload();
$elements = array(
	"dept" => "",
	"dmg" => ""
);

$form = new FormAssist($elements, $_POST);
$labels = array(
	'dept' => "Department name",
	'dmg' => "Department image"
);

$rules = array(
	"dept" => array(
		"required" => true,
		"minlength" => 3,
		"maxlength" => 30,
		"alphaonly" => true
	),

	"dmg" => array(
		"filerequired" => true
	)
);

$validator = new FormValidator($rules, $labels);
if (isset($_POST["insert"])) {
	if ($validator->validate($_POST)) {
		if ($fileName = $file->doUploadRandom(
			$_FILES['dmg'],
			array('.jpg', '.png', '.jpeg'),
			100000,
			1,
			'../uploads'
		)) {
			$data = array(
				'dept' => $_POST['dept'],
				'dmg' => $fileName
			);
			if ($dao->insert($data, "dept")) $msg = "Success : Insert";
			else $msg = "Failed : Insert";
			echo "<script> alert('$msg');</script>";
		} else echo $file->errors();
	}
}
?>

<div class="pagetitle">
	<h1>Departments</h1>
	<nav>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="index.html">Home</a></li>
			<li class="breadcrumb-item active">Departments</li>
		</ol>
	</nav>
</div><!-- End Page Title -->

<section class="section">
	<div class="row">

		<!-- List -->
		<div class="col-lg-8">
			<div class="card">
				<div class="card-body">
					<h5 class="card-title">Departments List</h5>
					<table class="table table-hover">
						<thead>
							<tr>
								<th scope="col">#</th>
								<th scope="col">Department</th>
								<th scope="col">Image</th>
								<th scope="col">Edit</th>

							</tr>
						</thead>
						<tbody>
							<?php
							$actions = array(
								'edit' => array(
									'label' => "<i class='bi bi-pencil-fill'></i>",
									'link' => 'dept_edit.php',
									'params' => array('id' => 'id'),
									'attributes' => array('class' => 'btn btn-warning')
								),
								'delete' => array(
									'label' => "<i class='bi bi-trash-fill'></i>",
									'link' => 'editspecilization.php',
									'params' => array('id' => 'id'),
									'attributes' => array('class' => 'btn btn-danger')
								)
							);
							$config = array(
								'srno' => true,
								'scope' => true,
								'hiddenfields' => array('id'),
								'images' => array(
									array(
										'field' => 'dmg',
										'path' => '../uploads/',
										'attributes' => array("style" => "height:50px;width:auto;")
									)
								)

							);
							$join = array();
							$fields = array('id', 'dept', 'dmg');
							$users = $dao->selectAsTable($fields, 'dept', 'stat = 1', $join, $actions, $config);
							echo $users;
							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>

		<!-- Add form -->
		<div class="col-4">
			<div class="card">
				<div class="card-body">
					<h5 class="card-title">Add Department</h5>
					<form action="" method="POST" class="row g-3">
						<div class="col-12">
							<label for="adept">Department Name</label>
							<?= $form->textBox('dept', array('class' => 'form-control', 'id' => 'adept')); ?>
							<!-- <span class="text-danger">
							<?= $validator->error('dept'); ?>
						</span> -->
						</div>
						<div class="col-12">
							<label for="admg">Department Image</label>
							<?= $form->fileField('dmg', array('class' => 'form-control', 'id' => 'admg')); ?>
							<!-- <span class="text-danger">
							<?= $validator->error('dmg'); ?>
						</span> -->
						</div>
						<div class="d-grid gap-2 mt-3">
							<button type="submit" class="btn btn-primary" name="insert">Submit</button>
						</div>
					</form>
				</div>
			</div>
		</div>

	</div>
</section>
<?php include("footer.html"); ?>