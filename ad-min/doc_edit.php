<?php
require('../config/autoload.php');
include("header.html");

$dao = new DataAccess();
$info = $dao->getData('*', 'doc', 'did='. $_GET['id']);
$elements = array("dname" => $info[0]["dname"], "dage" => $info[0]["dage"], "dphon" => $info[0]["dphon"]);

$form = new FormAssist($elements, $_POST);

$labels = array('dname' => "Name", 'dage' => "Age", "dphon" => "Phone");


$rules = array(
    "dname" => array("required" => true, "minlength" => 3, "maxlength" => 30, "alphaonly" => true),
    "dage" => array("required" => true, "minlength" => 2, "maxlength" => 2, "integeronly" => true),
    "dphon" => array("required" => true, "minlength" => 10, "maxlength" => 10, "integeronly" => true)
);


$validator = new FormValidator($rules, $labels);


if (isset($_POST["update"])) {
    if ($validator->validate($_POST)) {
        $data = array(
            'dname' => $_POST['dname'],
            'dage' => $_POST['dage'],
            'dphon' => $_POST['dphon']
        );
        $condition = 'did=' . $_GET['id'];
        if ($dao->update($data, "doc", $condition)) {
            $msg = "Successfullly Updated";
		} else
			$msg = "Failed";
        ?>

		<span style="color:red;">
			<?php echo "<script> alert('$msg'); </script>" ?>
		</span>
        <?php
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

                    <button type="submit" class="btn btn-gradient-primary mr-2" name="update">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
include("footer.html");
?>