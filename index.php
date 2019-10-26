<?php
include 'post_inputs.php';
 ?>

<!DOCTYPE HTML>
<HTML>
   <HEAD>

     <link rel="stylesheet" href="stylesheet.css">
      <TITLE>Amortization Table</TITLE>
   </HEAD>
   <BODY>
     <form method="post" action="">
      <div id="headBar">
        <div id="titleBar">
          <div id="title">
            Amortization Table
          </div>
        </div>

        <div id="inputs">

          <div id="tableOne">
            <table>
              <thead>
                <tr><th>Item</th><th>Value</th><th class="tableSep"></th><th>Item</th><th>Value</th></tr>
              </thead>
              <tbody>
                <tr>
                  <td><label>Home Value</label></td>
                  <td class="inputValues"><input id="homeValue" type="number" name="homeValue" maxlength="10" value="<?php echo $_POST['homeValue']; ?>" step="1" min = "0" max = "1000000000"></td>
                  <td class="tableSep"></td>
                  <td><label>Annual Property Taxes</label></td>
                  <td class="inputValues"><input id="propTaxes" type="number" name="propTaxes" maxlength="10" value="<?php echo $_POST['propTaxes']; ?>" step="1" min = "0" max = "1000000000"></td>
                </tr>
                <tr>
                  <td><label>Down Payment</label></td>
                  <td class="inputValues"><input id="downPMT" type="number" name="downPMT" maxlength="10" value="<?php echo $_POST['downPMT']; ?>" step="1" min = "0" max = "1000000000"></td>
                  <td class="tableSep"></td>
                  <td><label>Annual Property Insurance</label></td>
                  <td class="inputValues"><input id="propInsurance" type="number" name="propInsurance" maxlength="10" value="<?php echo $_POST['propInsurance']; ?>" step="1" min = "0" max = "1000000000"></td>
                </tr>
                <tr>
                  <td><label>Interest Rate</label></td>
                  <td class="inputValues"><input id="intRate" type="number" name="intRate" maxlength="10" value="<?php echo $_POST['intRate']; ?>" step=".01" min = "0" max = "100"></td>
                  <td class="tableSep"></td>
                  <td><label>Additional Monthly PMT</label></td>
                  <td class="inputValues"><input id="addPMT" type="number" name="addPMT" maxlength="10" value="<?php echo $_POST['addPMT']; ?>" step="1" min = "0" max = "1000000000"></td>
                </tr>
                <tr>
                  <td><label>Mortgage Term (yrs)</label></td>
                  <td class="inputValues"><input id="term" type="number" name="term" maxlength="3" value="<?php echo $_POST['term']; ?>" step="1" min = "0" max = "100"></td>
                  <td class="tableSep"></td>
                  <td class="empty"></td>
                  <td class="empty"></td>
                </tr>
                <tr>
                  <td><label>Discount Points</label></td>
                  <td class="inputValues"><input id="discPoints" type="number" name="discPoints" maxlength="3" value="<?php echo $_POST['discPoints']; ?>" step="1" min = "0" max = "100"></td>
                  <td class="tableSep"></td>
                  <td class="empty"></td>
                  <td class="empty"></td>
                </tr>
                <tr>
                  <td><label>Monthly PMI</label></td>
                  <td class="inputValues"><input id="monthlyPMI" type="number" name="monthlyPMI" maxlength="10" value="<?php echo $_POST['monthlyPMI']; ?>" step="1" min = "0" max = "1000000000"></td>
                  <td class="tableSep"></td>
                  <td class="empty"></td>
                  <td class="empty"><button id="formSubmit" type="submit" name="submitCalc">Amortize!</button></td>
                </tr>
              </tbody>
            </table>
          </div>
          <div id="note">
            * Total Monthly PMT includes insurance, taxes, and PMI allocated on a monthly basis.
          </div>

        </div><?php //end inputs ?>
      </div>
      <div id="primarybody">
        <div id="amortTable">
          <table>
            <thead>
              <tr>
                <th>PMT#</th>
                <th>Loan Balance</th>
                <th>Monthly Payment</th>
                <th>Additional Payment</th>
                <th>Interest</th>
                <th>Principal Payment</th>
                <th>Ending Balance</th>
                <th>Total Monthly PMT *</th>
              </tr>
            </thead>
            <tbody>
              <?php
              include 'amortCalc.php';
               ?>
            </tbody>
          </table>
        </div>
      </div>
      <div id="summaryTable">
        <table>
          <thead>
            <tr>
              <th>Total Payments in loan</th>
              <th>Total of Payments for the Life of the Loan</th>
              <th>Total of Interest Payments for the Life of the Loan</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><?php echo $count; ?></td>
              <td><?php echo '$' . number_format($totalLoanPayments,2); ?></td>
              <td><?php echo '$' . number_format($totalInterestPayments,2); ?></td>
            </tr>
          </tbody>
        </table>
      </div>
    </form>
   </BODY>
</HTML>
