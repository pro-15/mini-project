<?php
require('../config/autoload.php');
include("header.html");


$dao = new DataAccess();
$info=$dao->getData('*','dept','id='.$_GET['id']);
$file = new FileUpload();
$elements = array(
    "dept" => $info[0]['dept'],
    "dmg" => "",
);

$form = new FormAssist($elements, $_POST);


$labels = array('dept' => "Department name", 'dmg' => "Department image");

$rules = array(
    "dept" => array("required" => true, "minlength" => 3, "maxlength" => 30, "alphaonly" => true),
    "dmg" => array("filerequired" => true)

);


$validator = new FormValidator($rules, $labels);

if (isset($_POST["update"])) {
    if ($validator->validate($_POST)) {
        if ($fileName = $file->doUploadRandom($_FILES['dmg'], array('.jpg', '.png', '.jpeg'), 100000, 1, '../uploads')) {
            $flag=true;
        }
            $data = array(
                'dept' => $_POST['dept'],
                'dmg' => ''
            );
            $condition = "id=".$_GET['id'];
            if(isset($flag)){
                $data['dmg'] = $fileName;
            }
            if ($dao->update($data, "dept", $condition)) {
                $msg = "Updated successfully";
            } else {
                $msg = "Updation failed";
            } 
            echo "<script> alert('$msg'); </script>";
    }
}


?>
<div class="row" id="proBanner">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <form action="" method="POST" class="forms-sample" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="dept">Department Name</label>

                        <?= $form->textBox('dept', array('class' => 'form-control', 'placeholder' => 'Name')); ?>
                        <span class="text-danger">
                            <?= $validator->error('dept'); ?>
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="dmg">Department Image</label>
                        <?= $form->fileField('dmg', array('class' => 'form-control')); ?>
                        <!-- <div class="form-group">
                            <label for="dmg">Department Image</label>
                            <input type="file" name="dmg" class="file-upload-default">
                            <div class="input-group col-xs-6">
                                <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                                <span class="input-group-append">
                                    <button class="file-upload-browse btn btn-gradient-primary" type="button">Upload</button>
                                </span>
                            </div> -->
                        <span class="text-danger">
                            <?= $validator->error('dmg'); ?>
                        </span>
                    </div>
                    <button type="submit" class="btn btn-gradient-primary mr-2" name="update">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
include("footer.html");
?>