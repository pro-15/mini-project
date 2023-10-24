<?php
include('header.php');

$dao = new DataAccess();
$info = $dao->getData('*', 'doc', 'docid=' . $_GET['docid']);
$file = new FileUpload();
$elements = array(
    "depid" => $info[0]['depid'],
    "fname" => $info[0]['fname'],
    "lname" => $info[0]['lname'],
    "dage" => $info[0]['dage'],
    "dphon" => $info[0]['dphon'],
    'dmg' => ''
);
$form = new FormAssist($elements, $_POST);
$labels = array(
    'depid' => 'Department',
    'fname' => "First Name",
    'lname' => "Last Name",
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
        "alphaspaceonly" => true
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
    )
);

$flag = false;
$validator = new FormValidator($rules, $labels);

if (isset($_POST["update"])) {
    if ($validator->validate($_POST)) {
        if ($fileName = $file->doUploadRandom(
            $_FILES['dmg'],
            array('.jpg', '.png', '.jpeg'),
            100000,
            1,
            '../uploads/'
        )) { $flag = true; }
        $data = array(
            'depid' => $_POST['depid'],
            'fname' => $_POST['fname'],
            'lname' => $_POST['lname'],
            'dage' => $_POST['dage'],
            'dphon' => $_POST['dphon'],
        );
        $condition = "docid=" . $_GET['docid'];
        if ($flag) $data['dmg'] = $fileName;
        if ($dao->update($data, "doc", $condition))
            $msg = "Success : Update";
        else $msg = "Failed : Update";
        echo "<script>
            alert('$msg');
            location.replace('doc.php');
        </script>";
    } else
        echo $file->errors();
}
?>

<div class="pagetitle">
    <h1>Doctors</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item"><a href="doc.php">Doctors</a></li>
            <li class="breadcrumb-item active">Edit</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section">
    <div class="row">

        <!-- Add form -->
        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Add Doctors</h5>
                    <form action="" method="POST" class="row g-3" enctype="multipart/form-data">
                        <div class="col-12">
                            <label for="depid">Department</label>
                            <?=
                            $form->dropDownList(
                                'depid',
                                array('class' => 'form-control'),
                                $dao->createOptions(
                                    'dept',
                                    'depid',
                                    'dept'
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
                            <button type="submit" class="btn btn-primary" name="update">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</section>
<?php include("footer.html"); ?>