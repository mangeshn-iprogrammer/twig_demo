<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<?php require_once '../vendor/autoload.php'; ?>
<?php $loader = new Twig_Loader_Filesystem('../views/'); ?>

<?php $twig = new Twig_Environment($loader, array('debug' => true)); ?>

<?php //echo $twig->render('page.html', array('text' => 'Hello world!')); ?>

<?php //echo $twig->render('page2.html', array('text' => 'Hello world!')); ?>

<?php
class Box
{

    public $shape = 'square';

    public function displayShape() {
        return $this->shape;
    }
}
$myBox = new Box(); 
$mybox_arr  = array(
	'shape' => $myBox->shape,
	'display-Shape' => $myBox->displayShape(),
	'test' =>array('fname'=>'gRame','lname'=>'swith')
);

$navigation_arr = array( 
	array('href'=>'http://google.com','caption'=>'Google'),
	array('href'=>'http://yahoo.com','caption'=>'Yahoo'),
	array('href'=>'http://stackoverflow.com/','caption'=>'Stackoverflow'),
	array('href'=>'https://github.com/','caption'=>'Github'),
	
 );

//echo $twig->render('page2.html', array('myBox' => $mybox_arr ,'navigation'=>$navigation_arr));

$template = $twig->loadTemplate('page2.html');
echo $template->render(array('myBox' => $mybox_arr ,'navigation'=>$navigation_arr));



?>



