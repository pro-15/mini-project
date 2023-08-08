<?php

require('../config/autoload.php');
include("header.html");

$file = new FileUpload();
$elements = array(
    "dept" => "",
    "dmg" => ""
);


$form = new FormAssist($elements, $_POST);



$dao = new DataAccess();

$labels = array('dept' => "Department name", 'dmg' => "Department image");

$rules = array(
    "dept" => array("required" => true, "minlength" => 3, "maxlength" => 30, "alphaonly" => true),
    "dmg" => array("filerequired" => true)

);


$validator = new FormValidator($rules, $labels);

if (isset($_POST["insert"])) {

    if ($validator->validate($_POST)) {

        if ($fileName = $file->doUploadRandom($_FILES['dmg'], array('.jpg', '.png', '.jpeg'), 100000, 1, '../uploads')) {

            $data = array(


                'dept' => $_POST['dept'],
                'dmg' => $fileName


            );

            print_r($data);

            if ($dao->insert($data, "dept")) {
                echo "<script> alert('New record created successfully');</script> ";

            } else {
                $msg = "Registration failed";
            } ?>


            <?php

        } else
            echo $file->errors();
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
                            <label for="dept">Name</label>

                            <?= $form->textBox('dept', array('class' => 'form-control')); ?>
                            <?= $validator->error('dept'); ?>

                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="dmg">Image</label>

                            <?= $form->fileField('dmg', array('class' => 'form-control')); ?>
                            <span style="color:red;">
                                <?= $validator->error('dmg'); ?>
                            </span>
                            
                        </div>
                    </div>
                    
                    <!-- <div class="form-group">
                        <label>File upload</label>
                        <input type="file" name="img[]" class="file-upload-default">
                        <div class="input-group col-xs-12">
                          <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                          <span class="input-group-append">
                            <button class="file-upload-browse btn btn-gradient-primary" type="button">Upload</button>
                          </span>
                        </div> 
                      </div> -->

                    <button type="submit" class="btn btn-gradient-primary mr-2" name="insert">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
include("footer.html");
?>