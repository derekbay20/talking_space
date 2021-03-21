<?php require ('core/init.php'); ?>

<?php 
//Create Model Object
$model = new Model;

//Get ID From URL
$topic_id = $_GET['id'];

//process Reply
if (isset($_POST['do_reply'])) {
	//Create Validator Object
	$validate = new Validator;

	//Create Data Array
	$data = array();
	$data['topic_id'] = $_GET['id'];
	$data['body'] = $_POST['body'];
	$data['user_id'] = getUser()['user_id'];

	//Required Fields
	$field_array = array('body');

	if ($validate->isRequired($field_array)) {
			//Resgister User
				if ($user->reply($data)) {
					redirect('topic.php?id='.$topic_id, 'Your Reply has been posted' , 'success');
				} else {
					redirect('topic.php?id='.$topic_id, 'Something went wrong with your reply', 'error');
				}
			
			} else {
				redirect('topic.php?id='.$topic_id, 'Your Reply Form is Blank!', 'error');
			}
}

//Get Template & Assign Vars
$template = new Template('templates/topic.php');


//Assign Vars
$template->topic = $model->getTopic($topic_id);
$template->replies = $model->getReplies($topic_id);
$template->title = $model->getTopic($topic_id)->title;

//display template
echo $template;

 ?>