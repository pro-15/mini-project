<?php 
require('../config/autoload.php'); 
include("oghead.php");


$file = new FileUpload();
$elements = array("nam" => "", "ag" => "", "ph" => "");


$form = new FormAssist($elements,$_POST);


$dao = new DataAccess();


$labels = array('nam' => "Name", 'ag' => "Age", "ph" => "Phone");


$rules=array(
    "nam" => array("required" => true, "minlength" => 3, "maxlength" => 30, "alphaonly" => true),
    "ag" => array("required" => true, "minlength" => 2, "maxlength" => 2, "integeronly" => true),
    "ph" => array("required" => true, "minlength" => 10, "maxlength" => 10, "integeronly" => true)
);


$validator = new FormValidator($rules,$labels);


if(isset($_POST["insert"])) {
    if($validator->validate($_POST)) {
        $data=array(
            'nam'=>$_POST['nam'],
            'ag'=>$_POST['ag'],
            'ph' => $_POST['ph']
        );

        print_r($data);
        if($dao->insert($data,"emp")) {
            echo "<script> alert('New record created successfully');</script> ";
        }
    }
}


?>
<html>
<head>
</head>
<body>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-6">
                Name:

                <?= $form->textBox('nam',array('class'=>'form-control')); ?>
                <?= $validator->error('nam'); ?>

            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                Age:

                <?= $form->textBox('ag',array('class'=>'form-control')); ?>
                <?= $validator->error('ag'); ?>

            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                Phone:

                <?= $form->textBox('ph',array('class'=>'form-control')); ?>
                <?= $validator->error('ph'); ?>

            </div>
        </div>

        <button type="submit" name="insert">Submit</button>
    </form>
</body>
</html>