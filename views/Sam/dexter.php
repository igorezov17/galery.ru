<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>
<h1>Это твой первый вывод на экран </h1>
<?php
//echo $_SERVER['SERVER_NAME'];
$r =56;
$t =7;
 function test()
{
    global $r,$t;
    $r = $r+$t;
}
define(c, 8);
echo c;
?>