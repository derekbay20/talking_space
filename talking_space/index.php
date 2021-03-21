<?php require ('core/init.php'); ?>

<?php 
//Create Model Object
$model = new Model;

//Create User Object
$user = new User;

//Get Template & Assign Vars
$template = new Template('templates/frontpage.php');

//Assign Vars
$template->topics = $model->getAllTopics();
$template->totalTopics = $model->getTotalTopics();
$template->totalCategories = $model->getTotalCategories();
$template->totalUsers = $user->getTotalUsers();

//display template
echo $template;

 ?>