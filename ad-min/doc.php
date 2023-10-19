<?php
    include('header.php');

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

            if ($dao->insert($data, "doc")) {
                echo "<script> alert('New record created successfully');</script> ";
            }
        }
    }

    ?>


    <div class="row" id="proBanner">
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

                        <button type="submit" class="btn btn-gradient-primary mr-2" name="insert">Submit</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- chart-->
        <!-- <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Doughnut chart</h4>
                    <canvas id="doughnutChart" style="height:250px"></canvas>
                </div>
            </div>
        </div> -->
        <!-- chart end -->


    </div>


    <div class="row">
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
    </div>
<!-- partial -->
</div>
<!-- main-panel ends -->
</div>
<!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<!-- plugins:js -->
<script src="assets/vendors/js/vendor.bundle.base.js"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<script src="assets/vendors/chart.js/Chart.min.js"></script>
<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="assets/js/off-canvas.js"></script>
<script src="assets/js/hoverable-collapse.js"></script>
<script src="assets/js/misc.js"></script>
<!-- endinject -->
<!-- Custom js for this page -->
<script src="assets/js/dashboard.js"></script>
<script src="assets/js/todolist.js"></script>

<script src="../../assets/js/chart.js"></script>

<!-- End custom js for this page -->
</body>
</html>