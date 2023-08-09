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
                                'images' => array(array('field' => 'dmg', 'path' => '../uploads/', 'attributes' => array("style"=>"height:100px;width:auto;"))),

                            );


                            $join = array(

                            );
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