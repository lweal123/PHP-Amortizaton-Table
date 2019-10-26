<?php
$_POST['homeValue'] = (isset($_POST['homeValue'])) ? $_POST['homeValue'] : 250000;
$_POST['downPMT'] = (isset($_POST['downPMT'])) ? $_POST['downPMT'] : 25000;
$_POST['intRate'] = (isset($_POST['intRate'])) ? $_POST['intRate'] : 3.5;
$_POST['term'] = (isset($_POST['term'])) ? $_POST['term'] : 30;
$_POST['discPoints'] = (isset($_POST['discPoints'])) ? $_POST['discPoints'] : 0;
$_POST['monthlyPMI'] = (isset($_POST['monthlyPMI'])) ? $_POST['monthlyPMI'] : 100;

$_POST['propTaxes'] = (isset($_POST['propTaxes'])) ? $_POST['propTaxes'] : 4000;
$_POST['propInsurance'] = (isset($_POST['propInsurance'])) ? $_POST['propInsurance'] : 2500;
$_POST['addPMT'] = (isset($_POST['addPMT'])) ? $_POST['addPMT'] : 0;

for ($c = 0; $c < ($_POST['term']*12); $c++) {
  $_POST[$c+1] = (isset($_POST[$c+1])) ? $_POST[$c+1] : 0;
}
?>
