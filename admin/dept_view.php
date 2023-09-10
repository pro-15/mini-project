<html>

<body>
    <?php
    require('../config/autoload.php');
    include('header.html');


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
        <div class="col-md-6 grid-margin stretch-card">
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
                        <button type="submit" class="btn btn-gradient-primary mr-2" name="insert">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Departments List</h4>
                    <p class="card-description">
                        List of all departments
                    </p>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width:2em; word-wrap: break-word;">Id</th>
                                <th>Department</th>
                                <th>Image</th>
                                <th style="width:4em; word-wrap: break-word;">Edit</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            $actions = array(
                                'edit' => array('label' => 'Edit', 'link' => 'dept_edit.php', 'params' => array('id' => 'id'), 'attributes' => array('class' => 'btn btn-inverse-warning btn-sm')),

                                'delete' => array('label' => 'Delete', 'link' => 'editspecilization.php', 'params' => array('id' => 'id'), 'attributes' => array('class' => 'btn btn-inverse-danger btn-sm'))

                            );

                            $config = array(
                                'srno' => true,
                                'hiddenfields' => array('id'),
                                'images' => array(array('field' => 'dmg', 'path' => '../uploads/', 'attributes' => array("style" => "height:100px;width:auto;"))),

                            );


                            $join = array();
                            $fields = array('id', 'dept', 'dmg');

                            $users = $dao->selectAsTable($fields, 'dept', 1, $join, $actions, $config);

                            echo $users;


                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <?php
    include("footer.html");
    ?>