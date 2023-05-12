<html>
<head>
    <style>
        tr:nth-child(even) {
            background-color: #f0f0f0;
        }
    </style>
</head>
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
                        <th>Edit</th>

                    </tr>
<?php
    
    $actions=array(
    'edit'=>array('label'=>'Edit','link'=>'editspecilization.php','params'=>array('cid'=>'cid'),'attributes'=>array('class'=>'btn btn-success')),
    
    'delete'=>array('label'=>'Delete','link'=>'editspecilization.php','params'=>array('cid'=>'cid'),'attributes'=>array('class'=>'btn btn-success'))
    
    );

    $config=array(
        'srno'=>true,
        'hiddenfields'=>array('cid'),
        
        
    );

   
   $join=array(
        
    );
     $fields=array('cid','cnam');

    $users=$dao->selectAsTable($fields,'cat',1,$join,$actions,$config);
    
    echo $users;
                    

?>
             
                </table>
            </div>    

            
            
            
            
        </div><!-- End row -->
    </div><!-- End container -->
    </div><!-- End container_gray_bg -->
    
    
</body>
</html>