<?php require ('core/init.php'); ?>

<?php 
//Create Model Object
$model = new Model;

if (isset($_POST['do_create'])) {
	//Create Validator Object
	$validate = new Validator;

	//Create data Array
	$data = array();
	$data['title'] = $_POST['title'];
	$data['body'] = $_POST['body'];
	$data['category_id'] = $_POST['category'];
	$data['user_id'] = getUser()['user_id'];
	$data['last_activity'] = date("Y-m-d H:i:s");

	//Required Fields
	$field_array = array('title', 'body', 'category');

	if ($validate->isRequired($field_array)) {
			//Resgister User
				if ($model->create($data)) {
					redirect('index.php', 'Your topic has been posted' , 'success');
				} else {
					redirect('index.php?id='.$topic_id, 'Something went wrong with your post', 'error');
				}
			
			} else {
				redirect('create.php', 'Please fill in your all required fields', 'error');
			}
}

//Get Template & Assign Vars
$template = new Template('templates/create.php');

//Assign Vars
 

//display template
echo $template;

 ?>