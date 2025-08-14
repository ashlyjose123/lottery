<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
table {
  width: 100%;
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
tr:nth-child(even){background-color: #f2f2f2;}
.maintenancemode{
  background-color: #ffff;
  width: 30%;
  margin:10%;
  padding:50px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
}
.footer-note{
  background:blue;
  color:#fff;
  padding:5px;
}
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
<?php if ($shutdown_value == 0): ?>
 <div class="maintenancemode">
  <p>Our website is currently under construction. We will be back soon!</p>
  <p>Thank you for your patience and understanding.</p>
  <p class="footer-note">Copyright <?php echo date('Y');?></p>
  </div>
  <?php else: ?>
<h2>Lottery Results</h2>
<?php echo form_open('welcome/fetchbydate'); ?>
<input type="text" id="datepicker" name="datepicker" placeholder="View Previous Result">
<button type="submit">Submit</button>
<?php echo form_close(); ?>
<p class="date-of-result"> Lottery Results for <?php echo date('d-m-Y ');?></p>
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
     foreach ($gets as $g): 
        ?>
    <tr>   
      <td><?php echo $g->ltime; ?></td>
      <td><?php echo $g->lot1; ?></td>
      <td><?php echo $g->lot2; ?></td>
      <td><?php echo $g->lot3; ?></td>
      <td><?php echo $g->lot4; ?></td>
      <td><?php echo $g->lot5; ?></td> 
    </tr>
    <?php endforeach; ?> 
  </table>
</div>
<?php endif; ?>
</center>
<script>
    $(document).ready(function(){
      $("#datepicker").datepicker({
        maxDate: 0 
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