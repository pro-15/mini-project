<html>
<body>
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
                        <th>Phone</th>
                        <th>Edit</th>

                    </tr>
<?php
    
    $actions=array(
    'edit'=>array('label'=>'Edit','link'=>'editspecilization.php','params'=>array('id'=>'id'),'attributes'=>array('class'=>'btn btn-success')),
    
    'delete'=>array('label'=>'Delete','link'=>'editspecilization.php','params'=>array('id'=>'id'),'attributes'=>array('class'=>'btn btn-success'))
    
    );

    $config=array(
        'srno'=>true,
        'hiddenfields'=>array('id'),
        
        
    );

   
   $join=array(
        
    );
     $fields=array('id', 'nam', 'ag', 'ph');

    $users=$dao->selectAsTable($fields,'emp',1,$join,$actions,$config);
    
    echo $users;
                    

?>
             
                </table>
            </div>    

            
            
            
            
        </div><!-- End row -->
    </div><!-- End container -->
    </div><!-- End container_gray_bg -->
    
    
</body>
</html>