<?php
require('../config/autoload.php');
include("header.html");


$file = new FileUpload();
$elements = array("dname" => "", "dage" => "", "dphon" => "");


$form = new FormAssist($elements, $_POST);


$dao = new DataAccess();


$labels = array('dname' => "Name", 'dage' => "Age", "dphon" => "Phone");


$rules = array(
    "dname" => array("required" => true, "minlength" => 3, "maxlength" => 30, "alphaonly" => true),
    "dage" => array("required" => true, "minlength" => 2, "maxlength" => 2, "integeronly" => true),
    "dphon" => array("required" => true, "minlength" => 10, "maxlength" => 10, "integeronly" => true)
);


$validator = new FormValidator($rules, $labels);


if (isset($_POST["insert"])) {
    if ($validator->validate($_POST)) {
        $data = array(
            'dname' => $_POST['dname'],
            'dage' => $_POST['dage'],
            'dphon' => $_POST['dphon']
        );

        print_r($data);
        if ($dao->insert($data, "doc")) {
            echo "<script> alert('New record created successfully');</script> ";
        }
    }
}


?>
<div class="row" id="proBanner">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <form action="" method="POST" class="forms-sample" enctype="multipart/form-data">
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="dname">Name</label>

                            <?= $form->textBox('dname', array('class' => 'form-control')); ?>
                            <?= $validator->error('dname'); ?>

                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="dage">Age</label>

                            <?= $form->textBox('dage', array('class' => 'form-control')); ?>
                            <?= $validator->error('dage'); ?>

                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="dphon">Phone</label>

                            <?= $form->textBox('dphon', array('class' => 'form-control')); ?>
                            <?= $validator->error('dphon'); ?>

                        </div>
                    </div>

                    <button type="submit" class="btn btn-gradient-primary mr-2" name="insert">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
    include("footer.html");
?>