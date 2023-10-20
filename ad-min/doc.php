<?php
include('header.php');

$dao = new DataAccess();
$file = new FileUpload();
$elements = array(
    "dname" => "",
    "dage" => "",
    "dphon" => "",
    'dmg' => ''
);
$form = new FormAssist($elements, $_POST);
$labels = array(
    'dname' => "Name",
    'dage' => "Age",
    "dphon" => "Phone",
    'dmg' => 'Image'
);
$rules = array(
    "dname" => array(
        "required" => true,
        "minlength" => 3,
        "maxlength" => 30,
        "alphaonly" => true
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
                '../uploads'
            ))
        {
            $data = array(
                'dname' => $_POST['dname'],
                'dage' => $_POST['dage'],
                'dphon' => $_POST['dphon'],
                'dmg' => $fileName
            );
            if ($dao->insert($data, "dept"))
                $msg = "Success : Insert";
            else
                $msg = "Failed : Insert";
            echo "<script>alert('$msg');</script>";
        } else echo $file->errors();
    }
}
?>

<section class="section">
<div class="row" id="proBanner">

<div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Doctors List</h4>
                <p class="card-description">
                    List of all doctors
                </p>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Age</th>
                            <th>Phone</th>
                            <th>Edit</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        $actions = array(
                            'edit' => array('label' => 'Edit', 'link' => 'doc_edit.php', 'params' => array('id' => 'did'), 'attributes' => array('class' => 'btn btn-inverse-warning btn-sm')),

                            'delete' => array('label' => 'Delete', 'link' => 'doc_del.php', 'params' => array('id' => 'did'), 'attributes' => array('class' => 'btn btn-inverse-danger btn-sm'))

                        );

                        $config = array(
                            'srno' => true,
                            'hiddenfields' => array('did'),


                        );


                        $join = array();
                        $fields = array('did', 'dname', 'dage', 'dphon');

                        $users = $dao->selectAsTable($fields, 'doc', 'stat = 1', $join, $actions, $config);

                        echo $users;


                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Add Doctors</h4>
                <form action="" method="POST" class="forms-sample" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="dname">Name</label>

                        <?= $form->textBox('dname', array('class' => 'form-control')); ?>
                        <?= $validator->error('dname'); ?>

                    </div>
                    <div class="form-group">
                        <label for="dage">Age</label>

                        <?= $form->textBox('dage', array('class' => 'form-control')); ?>
                        <?= $validator->error('dage'); ?>

                    </div>
                    <div class="form-group">
                        <label for="dphon">Phone</label>
                        <?= $form->textBox('dphon', array('class' => 'form-control')); ?>
                        <?= $validator->error('dphon'); ?>
                    </div>
                    <div class="col-12">
						<label for="admg">Image</label>
						<?= $form->fileField('dmg', array('class' => 'form-control', 'id' => 'admg')); ?>
						<?= $validator->error('dmg'); ?>
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