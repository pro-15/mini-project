<?php 

 require('../config/autoload.php'); 
include("oghead.php");

$file=new FileUpload();
$elements=array(
        "dept"=>"",'dmg'=>"");


$form=new FormAssist($elements,$_POST);



$dao=new DataAccess();

$labels=array('dept'=>"Department name",'dmg'=>"Department image");

$rules=array(
    "dept"=>array("required"=>true,"minlength"=>3,"maxlength"=>30,"alphaonly"=>true),
    "dmg"=>array("filerequired"=>true)
     
);
    
    
$validator = new FormValidator($rules,$labels);

if(isset($_POST["insert"]))
{

if($validator->validate($_POST))
{
	
    if($fileName=$file->doUploadRandom($_FILES['dmg'],array('.jpg','.png','.jpeg'),100000,1,'../uploads'))	
    {

$data=array(

       
        'dept'=>$_POST['dept'],
        'dmg'=>$fileName
        
         
    );

    print_r($data);
  
    if($dao->insert($data,"dept"))
    {
        echo "<script> alert('New record created successfully');</script> ";

    }
    else
        {$msg="Registration failed";} ?>


<?php
    
}
else
echo $file->errors();
}

}


?>
<html>
<head>
</head>
<body>

    <form action="" method="POST" enctype="multipart/form-data">

    <div class="row">
        <div class="col-md-6">
        Department name:

            <?= $form->textBox('dept',array('class'=>'form-control')); ?>
            <?= $validator->error('dept'); ?>

        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
        Department Image:

            <?= $form->fileField('dmg',array('class'=>'form-control')); ?>
            <span style="color:red;"><?= $validator->error('dmg'); ?></span>

        </div>
    </div>

    <button type="submit" name="insert">Submit</button>
    </form>


</body>

</html>


