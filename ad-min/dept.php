<?php
include('header.php');

$dao = new DataAccess();
$elements = array(
	"dept" => ""
);

$form = new FormAssist($elements, $_POST);
$labels = array(
	'dept' => "Department name"
);

$rules = array(
	"dept" => array(
		"required" => true,
		"minlength" => 3,
		"maxlength" => 30,
		"alphaonly" => true
	)
);

$validator = new FormValidator($rules, $labels);
if (isset($_POST["insert"])) {
	if ($validator->validate($_POST)) {
		$data = array('dept' => $_POST['dept']);
		if ($dao->insert($data, "dept2")) $msg = "Success : Insert";
		else $msg = "Failed : Insert";
		echo "<script> alert('$msg');</script>";
	}
}

if (isset($_POST["delete"])) {
	if ($dao->delete("dept2", "depid = " . $_POST['depid'])) $msg = "Success : Delete";
	else $msg = "Failed : Delete";
	echo "<script> alert('$msg');</script>";
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
		<div class="col-lg-7">
			<div class="card">
				<div class="card-body">
					<h5 class="card-title">Departments List</h5>
					<table class="table table-hover">
						<thead>
							<tr>
								<th scope="col">#</th>
								<th scope="col">Department</th>
								<th scope="col" width="120px">Edit</th>
	
							</tr>
						</thead>
						<tbody>
							<?php
							$actions = array(
								'edit' => array(
									'post' => false,
									'label' => "<i class='bi bi-pencil-fill'></i>",
									'link' => 'depted.php',
									'params' => array('depid' => 'depid'),
									'attributes' => array('class' => 'btn btn-warning')
								),
								'delete' => array(
									'post' => true,
									'label' => "<i class='bi bi-trash-fill'></i>",
									'link' => '',
									'params' => array('depid' => 'depid'),
									'attributes' => array('class' => 'btn btn-danger')
								)
							);
							$config = array(
								'srno' => true,
								'scope' => true,
								'hiddenfields' => array('depid'),
							);
							$join = array();
							$fields = array('depid', 'dept');
							$users = $dao->selectAsTablePost($fields, 'dept2', 1 , $join, $actions, $config);
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
						<div class="col-md-12">
							<div class="form-floating">
								<?= $form->textBox('dept', array('class' => 'form-control', 'id' => 'dept', 'placeholder' => 'Name')); ?>
								<label for="dept">Name</label>
								<!-- <span class="text-danger">
								<?= $validator->error('dept'); ?>
								</span> -->
							</div>
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