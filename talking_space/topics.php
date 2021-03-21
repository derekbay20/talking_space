<?php require ('core/init.php'); ?>

<?php 
//Create Model Object
$model = new Model;

//Get category from URL
$category = isset($_GET['category']) ? $_GET['category'] : null;

//Get user from URL
$user_id = isset($_GET['user']) ? $_GET['user'] : null;


//Get Template & Assign Vars
$template = new Template('templates/topics.php');

//Assign Template Variables
if (isset($category)) {
	$template->topics = $model->getByCategory($category);
	$template->title = 'Posts In "'.$model->getCategory($category)->name.'"';

}

//Check For User Filter
if (isset($user_id)) {
	$template->topics = $model->getByUser($user_id);
	//$template->title = 'Posts In "'.$user->getUser($user_id)->username.'"';

}

if (!isset($category) && !isset($user_id)){
	$template->topics = $model->getAllTopics();
}

//Assign Vars
$template->totalTopics = $model->getTotalTopics();
$template->totalCategories = $model->getTotalCategories();

//display template
echo $template;

 ?>