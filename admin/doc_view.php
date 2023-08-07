<html>

<body>
    <?php require('../config/autoload.php'); ?>

    <?php
    $dao = new DataAccess();



    ?>
    <?php include('header.html'); ?>

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

                                'delete' => array('label' => 'Delete', 'link' => 'editspecilization.php', 'params' => array('id' => 'did'), 'attributes' => array('class' => 'btn btn-inverse-danger btn-sm'))

                            );

                            $config = array(
                                'srno' => true,
                                'hiddenfields' => array('did'),


                            );


                            $join = array(

                            );
                            $fields = array('did', 'dname', 'dage', 'dphon');

                            $users = $dao->selectAsTable($fields, 'doc', 1, $join, $actions, $config);

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