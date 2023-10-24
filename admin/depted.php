<?php
include('header.php');

$dao = new DataAccess();
$file = new FileUpload();
$info = $dao->getData('*', 'dept', 'depid=' . $_GET['depid']);
$elements = array(
	"dept" => $info[0]['dept'],
	'depmg' => ''
);

$form = new FormAssist($elements, $_POST);
$labels = array(
	'dept' => "Department name",
	'depmg' => "Department Image"
);

$rules = array(
	"dept" => array(
		"required" => true,
		"minlength" => 3,
		"maxlength" => 30,
		"alphaonly" => true
	),
	'depmg' => array(
		'filerequired' => true
	)
);
$flag = false;
$validator = new FormValidator($rules, $labels);
if (isset($_POST["update"])) {
	if ($validator->validate($_POST)) {
		if ($fileName = $file->doUploadRandom(
			$_FILES['depmg'],
			array('.jpg', '.png', '.jpeg'),
			100000,
			1,
			'../uploads/'
		)) { $flag = true; }
		$data = array(
			'dept' => $_POST['dept']
		);
		$condition = 'depid=' . $_GET['depid'];
		if(isset($flag)) $data['depmg'] = $fileName;
		if ($dao->update($data, "dept", $condition))
			$msg = "Successfullly Updated";
		else $msg = "Failed";
		echo "<script>
            alert('$msg');
            location.replace('dept.php');
            </script>";
	}
}
?>

<div class="pagetitle">
	<h1>Departments</h1>
	<nav>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="index.php">Home</a></li>
			<li class="breadcrumb-item"><a href="dept.php">Departments</a></li>
			<li class="breadcrumb-item active">Edit</li>
		</ol>
	</nav>
</div><!-- End Page Title -->

<section class="section">
	<div class="row">

		<!-- Edit form -->
		<div class="col-4">
			<div class="card">
				<div class="card-body">
					<h5 class="card-title">Edit Department</h5>
					<form action="" method="POST" class="row g-3" enctype="multipart/form-data">
						<div class="col-md-12">

							<div class="form-floating">
								<?= $form->textBox('dept', array('class' => 'form-control', 'id' => 'dept', 'placeholder' => 'Name')); ?>
								<label for="dept">Name</label>
								<!-- <span class="text-danger">
								<?= $validator->error('dept'); ?>
								</span> -->
							</div>

							<div class="col-12">
								<label for="depmg">Image</label>
								<?= $form->fileField('depmg', array('class' => 'form-control')); ?>
								<?= $validator->error('depmg'); ?>
							</div>

						</div>
						<div class="d-grid gap-2 mt-3">
							<button type="submit" class="btn btn-primary" name="update">Save changes</button>
						</div>
					</form>
				</div>
			</div>
		</div>

	</div>
</section>
<?php include("footer.html"); ?>