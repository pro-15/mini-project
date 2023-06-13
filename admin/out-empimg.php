<html>
<?php require('../config/autoload.php'); ?>

<?php
$dao=new DataAccess();



?>
<?php include('oghead.php'); ?>

    
    <div class="container_gray_bg" id="home_feat_1">
    <div class="container">
    	<div class="row">
            <div class="col-md-12">
                <table border="1" class="table" style="margin-top:100px;">
                    <tr>

                        <th>Id</th>
                        <th>Name</th>
                        <th>Age</th>
                        <th>Image</th>
                        <th>Edit</th>

                    </tr>
<?php
    
    $actions=array(
    'edit'=>array('label'=>'Edit','link'=>'editspecilization.php','params'=>array('eid'=>'eid'),'attributes'=>array('class'=>'btn btn-success')),
    
    'delete'=>array('label'=>'Delete','link'=>'editspecilization.php','params'=>array('eid'=>'eid'),'attributes'=>array('class'=>'btn btn-success'))
    
    );

    $config=array(
        'srno'=>true,
        'hiddenfields'=>array('eid'),
        'images'=>array(array('field'=>'eimage', 'path'=>'../uploads/', 'attributes' => array('height' => '100'))),
        
        
    );

   
   $join=array(
        
    );
     $fields=array('eid', 'ename', 'eage', 'eimage');

    $users=$dao->selectAsTable($fields,'employee',1,$join,$actions,$config);
    
    echo $users;
                    

?>
             
                </table>
            </div>    

            
            
            
            
        </div><!-- End row -->
    </div><!-- End container -->
    </div><!-- End container_gray_bg -->
    
    
</body>
</html>