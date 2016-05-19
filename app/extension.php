<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<?php require_once '../vendor/autoload.php'; ?>
<?php $loader = new Twig_Loader_Filesystem('../views/'); ?>

<?php $twig = new Twig_Environment($loader, array('debug' => true));

$tags = array('if');
$filters = array('upper');
$methods = array(
    'Article' => array('getTitle', 'getBody'),
);
$properties = array(
    'Article' => array('title', 'body'),
);
$functions = array('range');

$policy = new Twig_Sandbox_SecurityPolicy($tags, $filters, $methods, $properties, $functions);
 
$sandbox = new Twig_Extension_Sandbox($policy);
$twig->addExtension($sandbox);


$twig->addExtension(new Twig_Extension_Debug());

?>

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

$carousel_content_arr = array( 
	array('href'=>'http://sorgalla.com/jcarousel/assets/img/pic/img1.jpg','caption'=>'First Thumbnail label','description' =>'Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.','active'=>TRUE,'number'=>0),
	array('href'=>'http://sorgalla.com/jcarousel/assets/img/pic/img2.jpg','caption'=>'Second Thumbnail label','description' =>'Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.','active'=>FALSE,'number'=>1),
	array('href'=>'http://sorgalla.com/jcarousel/assets/img/pic/img3.jpg','caption'=>'Third Thumbnail label','description' =>'Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.','active'=>FALSE,'number'=>2),
	
	array('href'=>'http://sorgalla.com/jcarousel/assets/img/pic/img1.jpg','caption'=>'Fourth Thumbnail label','description' =>'Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.','active'=>FALSE,'number'=>3),
 );


$breadcrumb_content_arr = array( 
	array('href'=>'#','anchor_caption'=>'Home','active'=>FALSE,'caption'=>'/','lastlink'=>FALSE),
	array('href'=>'#','anchor_caption'=>'Library','active'=>FALSE,'caption'=>'/','lastlink'=>FALSE),
	
	array('href'=>'#','anchor_caption'=>'','active'=>TRUE,'caption'=>'Data','lastlink'=>TRUE),
	
 );


$navigation_content_arr = array( 
	array('href'=>'#','active'=>'active','anchor_caption'=>'hOme'),
	array('href'=>'#','active'=>'','anchor_caption'=>'Profile'),
	
	array('href'=>'#','active'=>'disabled','anchor_caption'=>'Messages'),
	
 );

//echo $twig->render('page2.html', array('myBox' => $mybox_arr ,'navigation'=>$navigation_arr));

$template = $twig->loadTemplate('macro_children.twig');

echo $template->render(array('myBox' => $mybox_arr ,
				'carousel_content'=>$carousel_content_arr,
				'breadcrumb_content'=>$breadcrumb_content_arr,
				'navigation_content'=>$navigation_content_arr,
			));



?>



