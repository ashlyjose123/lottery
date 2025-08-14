<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
table {

  width: 100%;
  border: 1px solid #ddd;
  background:#fff;
  border: 1px solid black;
}

th{
	background:blue;
	color:white;
  border: 1px solid black;
}
th, td {
  text-align: left;
  padding: 8px;
  border: 1px solid black;
}
body{
  background-color: #f2f2f2;
  font-family:"calibri", Arial,serif;
}
tr:nth-child(odd){background-color:rgb(243, 243, 243);}
input#datepicker {
    padding:10px 15px;
    border:1px solid #dbdbdb;
}
button{
    padding:10px 15px;
    border:none;
    background:blue;
    color:#fff;
}
.date-of-result{
  color:red;
  font-weight:600;
}
</style>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <!-- Include jQuery UI CSS and JS -->
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
</head>
<body>
<center>
<h2>Lottery Results</h2>
<?php
 $selectedDate = $this->input->post('datepicker');
 $formattedDate = DateTime::createFromFormat('m/d/Y', $selectedDate)->format('d-m-Y');
 ?>
<?php echo form_open('welcome/fetchbydate'); ?>
<input type="text" id="datepicker" name="datepicker" placeholder="View Previous Result">
<button type="submit">Submit</button>
<?php echo form_close(); ?>
<p class="date-of-result"> Result of : <?php echo $formattedDate;?></p>
<div style="overflow-x:auto;">
  <table>
    <tr>
      <th>Time</th>
      <th>Lot1</th>
      <th>Lot2</th>
      <th>Lot3</th>
      <th>Lot4</th>
      <th>Lot5</th>
    </tr>
    <?php
   if (!empty($results)):
     foreach ($results as $r):
        ?>
    <tr>
      <td><?php echo $r->ltime; ?></td>
      <td><?php echo $r->lot1; ?></td>
      <td><?php echo $r->lot2; ?></td>
      <td><?php echo $r->lot3; ?></td>
      <td><?php echo $r->lot4; ?></td>
      <td><?php echo $r->lot5; ?></td>
    </tr>
    <?php endforeach; ?>
    <?php else: 
        echo '
        <td></td>
        <td></td>
        <td></td>
        <td style="text-align: center; font-weight:600">Result Not published</td>
        <td></td>
        <td></td>';
    endif;
        ?>
  </table>
</div>
</center>
<script>
    $(document).ready(function(){
      $("#datepicker").datepicker({
        maxDate: 0 // Disable future dates
      });
    });
  </script>
  <script>
    document.querySelector('form').onsubmit = function() {
        var selectedDate = document.getElementById('datepicker').value;
        if (!selectedDate) {
            alert("Please select a date.");
            return false; 
        }
        return true;
    };
</script>
</body>
</html>
