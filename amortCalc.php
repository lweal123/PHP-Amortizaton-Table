<?php
//include 'post_inputs.php';

$maxMonths = $_POST['term'] * 12;//n
$monthlyIntRate = ($_POST['intRate']/100)/12; //i
$discountFactor = ($monthlyIntRate>0) ? ($monthlyIntRate*(pow(1+$monthlyIntRate,$maxMonths))/(pow(1+$monthlyIntRate,$maxMonths)-1)) : 0;

$principal = $_POST['homeValue'] - $_POST['downPMT']+($_POST['discPoints']*(0.01*($_POST['homeValue'] - $_POST['downPMT'])));
$PMT = $principal*$discountFactor;
$initINTPMT = $monthlyIntRate * $principal;
$monthlyPropTaxes = $_POST['propTaxes']/12;
$monthlyPropInsurance = $_POST['propInsurance']/12;

$count = 0;
$totalInterestPayments = 0;
$totalLoanPayments = 0;
for ($i = 0; $i < $maxMonths; $i++) {
  $initINTPMT = $monthlyIntRate * $principal;

  if ($principal>0 && $principal<$PMT) {
    $PMT = $principal+$initINTPMT;
    $_POST['addPMT'] = 0;
  }

    if ($principal>0) {
    echo '<tr>';
    echo '<td>' . ($i+1) . '</td>';
    echo '<td>$' . number_format($principal,2) . '</td>'; //beginning balance of loan for the period
    echo '<td>$' . number_format($PMT+$_POST['addPMT'],2) . '</td>';//amortized monthly payment
    echo '<td><input id="' . ($i+1) . '" type="number" name="' . ($i+1) . '" maxlength="10" value="' . $_POST[$i+1] . '" step="1" min = "0" max = "1000000000"></td>';

    echo '<td>$' . number_format($initINTPMT,2) . '</td>';//monthly interest being paid on the principal amount
    echo '<td>$' . number_format($PMT-$initINTPMT+$_POST['addPMT']+$_POST[$i+1],2) . '</td>'; //principal payment
    $totalInterestPayments += $initINTPMT;
    $totalLoanPayments += $PMT+$_POST['addPMT']+$_POST[$i+1];
    $principal -= $PMT-$initINTPMT+$_POST['addPMT']+$_POST[$i+1];
    echo '<td>$' . number_format($principal,2) . '</td>'; //ending balance of loan for the period
    echo '<td>$' . number_format($PMT+$_POST['addPMT']+$_POST[$i+1]+$monthlyPropTaxes+$monthlyPropInsurance+$_POST['monthlyPMI'],2) . '</td>'; //Total payment
    echo '</tr>';
    $count ++;
    }

}

 ?>
