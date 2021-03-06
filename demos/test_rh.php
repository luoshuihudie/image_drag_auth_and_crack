<?php
include_once '../grafika/src/autoloader.php';
use Grafika\Grafika;
$editor = Grafika::createEditor();
$editor->open( $image, './images/rh.png' );
$filter = Grafika::createFilter('Sobel');
$editor->apply( $image, $filter );

$filter = Grafika::createFilter('Contrast', 100);//对比度的取值和之前的也差不多，-100至-1，对比度减少；0不变；1至100，对比度增加
$editor->apply( $image, $filter );
$editor->apply( $image, $filter );
$editor->apply( $image, $filter );

//$filter = Grafika::createFilter('Dither', 'ordered');//使用Dither来给图像添加噪点，其参数取值只有两个diffusion：扩散；ordered：规整的
//$editor->apply( $image, $filter );

$editor->save($image,'./images/rh2.png');
$filter = Grafika::createFilter('Brightness', 60);
$editor->apply( $image, $filter ); // 将滤镜应用到图片 
$filter = Grafika::createFilter('Sobel');
$editor->apply( $image, $filter );

$filter = Grafika::createFilter('Sharpen',90);//使用参数Sharpen可以处理锐化，其取值为1-100（包含）。
$editor->apply( $image, $filter );

$editor->crop( $image, 240, 145, 'top-left' ); //截取要验证的图片
$editor->save( $image, './images/rh3.png' );


?>