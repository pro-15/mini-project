<?php
include('header.php');

$dao = new DataAccess();
$file = new FileUpload();
$elements = array(
    "depid" => "",
    "fname" => "",
    "lname" => "",
    "dage" => "",
    "dphon" => "",
    'dmg' => ''
);
$form = new FormAssist($elements, $_POST);
$labels = array(
    'depid' => 'Department',
    'fname' => "Name",
    'lname' => "Name",
    'dage' => "Age",
    "dphon" => "Phone",
    'dmg' => 'Image'
);
$rules = array(
    "depid" => array(
        "required" => true
    ),
    "fname" => array(
        "required" => true,
        "minlength" => 3,
        "maxlength" => 30,
        "alphaonly" => true
    ),
    "lname" => array(
        "required" => true,
        "minlength" => 3,
        "maxlength" => 30,
        "alphaspaceonly" => true
    ),
    "dage" => array(
        "required" => true,
        "minlength" => 2,
        "maxlength" => 2,
        "integeronly" => true
    ),
    "dphon" => array(
        "required" => true,
        "minlength" => 10,
        "maxlength" => 10,
        "integeronly" => true
    ),
    'dmg' => array(
        'filerequired' => true
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
            '../uploads/'
        )) {
            $data = array(
                'depid' => $_POST['depid'],
                'fname' => $_POST['fname'],
                'lname' => $_POST['lname'],
                'dage' => $_POST['dage'],
                'dphon' => $_POST['dphon'],
                'dmg' => $fileName,
            );
            if ($dao->insert($data, "doc"))
                $msg = "Success : Insert";
            else
                $msg = "Failed : Insert";
            echo "<script>alert('$msg');</script>";
        } else echo $file->errors();
    }
}
if (isset($_POST["delete"])) {
	if ($dao->delete("doc", "docid = " . $_POST['docid'])) $msg = "Success : Delete";
	else $msg = "Failed : Delete";
	echo "<script> alert('$msg');</script>";
}
?>
<div class="pagetitle">
	<h1>Doctors</h1>
	<nav>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="index.php">Home</a></li>
			<li class="breadcrumb-item active">Doctors</li>
		</ol>
	</nav>
</div><!-- End Page Title -->

<section class="section">
    <div class="row">

    <!-- Add form -->
		<div class="col-6">
			<div class="card">
				<div class="card-body">
					<h5 class="card-title">Add Doctor</h5>
					<form action="" method="POST" class="row g-3" enctype="multipart/form-data">
                        <div class="col-12">
                            <label for="depid">Department</label>
                            <?=
                                $form->dropDownList(
                                    'depid',
                                    array('class' => 'form-control'),
                                    $dao->createOptions(
                                        'dept', 'depid', 'dept'
                                    )
                                );
                            ?>
                            <?= $validator->error('depid'); ?>

                        </div>
                        <div class="col-12">
                            <label for="fname">First Name</label>
                            <?= $form->textBox('fname', array('class' => 'form-control')); ?>
                            <?= $validator->error('fname'); ?>

                        </div>
                        <div class="col-12">
                            <label for="lname">Last Name</label>
                            <?= $form->textBox('lname', array('class' => 'form-control')); ?>
                            <?= $validator->error('lname'); ?>

                        </div>
                        <div class="col-12">
                            <label for="dage">Age</label>

                            <?= $form->textBox('dage', array('class' => 'form-control')); ?>
                            <?= $validator->error('dage'); ?>

                        </div>
                        <div class="col-12">
                            <label for="dphon">Phone</label>
                            <?= $form->textBox('dphon', array('class' => 'form-control')); ?>
                            <?= $validator->error('dphon'); ?>
                        </div>
                        <div class="col-12">
                            <label for="dmg">Image</label>
                            <?= $form->fileField('dmg', array('class' => 'form-control')); ?>
                            <?= $validator->error('dmg'); ?>
                        </div>
                        <div class="d-grid gap-2 mt-3">
                            <button type="submit" class="btn btn-primary" name="insert">Submit</button>
                        </div>
                    </form>
				</div>
			</div>
		</div>

        <!-- List -->
		<div class="col-lg-12">
			<div class="card">
				<div class="card-body">
					<h5 class="card-title">Doctors List</h5>
					<table class="table datatable">
						<thead>
							<tr>
                                <th scope="col">#</th>
                                <th scope="col">Image</th>
                                <th scope="col">First Name</th>
                                <th scope="col">Last Name</th>
                                <th scope="col">Department</th>
                                <th scope="col">Age</th>
                                <th scope="col">Phone</th>
                                <th scope="col" width="100px">Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $actions = array(
                                'edit' => array(
                                    'post' => false,
                                    'label' => "<i class='bi bi-pencil-fill'></i>",
                                    'link' => 'doced.php',
                                    'params' => array('docid' => 'docid'),
                                    'attributes' => array('class' => 'btn btn-warning')
                                ),
                                'delete' => array(
                                    'post' => true,
                                    'confirm' => 'delFun()',
                                    'label' => "<i class='bi bi-trash-fill'></i>",
                                    'link' => 'doc_del.php',
                                    'params' => array('docid' => 'docid'),
                                    'attributes' => array('class' => 'btn btn-danger')
                                )
                            );
                            $config = array(
                                'srno' => true,
                                'scope' => true,
                                'hiddenfields' => array('docid'),
                                'images' => array(array(
                                    'field' => 'dmg',
                                    'path' => '../uploads/',
                                    'attributes' => array('height' => '100')
                                ))
                            );
                            $join = array(
                                'dept' => array('doc.depid = dept.depid','join')
                            );
                            $fields = array('docid', 'dmg', 'fname', 'lname', 'dept', 'dage', 'dphon');
                            $users = $dao->selectAsTablePost($fields, 'doc', 1, $join, $actions, $config);
                            echo $users;
                            ?>
                        </tbody>
					</table>
				</div>
			</div>
		</div>

    </div>
</section>
<script>
        function delFun() {
            return confirm('Are you sure you want to delete this?');
        }
</script>
<?php include("footer.html"); ?>