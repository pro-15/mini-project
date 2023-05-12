<?php 
require('../config/autoload.php'); 
include("oghead.php");


$file = new FileUpload();
$elements = array("cnam" => "");


$form = new FormAssist($elements,$_POST);


$dao = new DataAccess();


$labels = array('cnam' => "Category Name");


$rules=array(
    "cnam" => array("required" => true, "minlength" => 3, "maxlength" => 30, "alphaspaceonly" => true)

);


$validator = new FormValidator($rules,$labels);


if(isset($_POST["insert"])) {
    if($validator->validate($_POST)) {
        $data=array(
            'cnam'=>$_POST['cnam']
        );

        print_r($data);
        if($dao->insert($data,"cat")) {
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
                Category Name:

                <?= $form->textBox('cnam',array('class'=>'form-control')); ?>
                <?= $validator->error('cnam'); ?>

            </div>
        </div>

        <button type="submit" name="insert">Submit</button>
    </form>
</body>
</html>