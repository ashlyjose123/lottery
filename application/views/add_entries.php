<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lot Form</title>
    <style>
        form{
            display:grid;
            width:20%;
            background:#fff;
            padding: 15px;
            box-shadow:2px 3px 5px rgba(0,0,0,0.2);
        }
        input,select{
            padding:10px;
            margin:5px;
        }
        p {
            text-align:start;
            margin: 2px 5px;
            color:red;
        }
        center {
            margin-top:10%;
            
        }
        .btnrow button{
            width:97%;
            padding:10px;
            background:blue;
            color:#fff;
            border:none;
        }
        h2 {
            font-family:"calibri",sans-serif;
            text-transform:uppercase;
            color:blue;
        }
        ::placeholder{
            color:black;
        }
        body{
            font-family:"calibri",sans-serif !important;
            background:#efefef;
        }    
    </style>
</head>
<body>
    <center> 
    <div class="form-wrap">
    <?php echo form_open('welcome/insert'); ?>
        <h2>Insert Lot Data</h2>
        <input type="text" id="lotone" name="lotone" placeholder="Enter the Value">
        <?php echo form_error('lotone'); ?>
        <input type="text" id="lottwo" name="lottwo" placeholder="Enter the Value">
        <?php echo form_error('lottwo'); ?>
        <input type="text" id="lotthree" name="lotthree" placeholder="Enter the Value">
        <?php echo form_error('lotthree'); ?>
        <input type="text" id="lotfour" name="lotfour" placeholder="Enter the Value">
        <?php echo form_error('lotfour'); ?>
        <input type="text" id="lotfive" name="lotfive" placeholder="Enter the Value">
        <?php echo form_error('lotfive'); ?>
        <input type="date" id="dates" name="dates" >
        <select name="hours" id="hours">
            <option value="">Select Hours</option>
            <option value="09">09</option>
            <option value="10">10</option>
            <option value="11">11</option>
            <option value="12">12</option>
            <option value="13">13</option>
            <option value="14">14</option>
            <option value="15">15</option>
            <option value="16">16</option>
            <option value="17">17</option>
            <option value="18">18</option>
        </select>
        <select name="minutes" id="minutes">
            <option value="">Select Minutes</option>
            <option value="00">00</option>
            <option value="15">15</option>
            <option value="30">30</option>
            <option value="45">45</option>
        </select>
        <select name="division" id="division">
            <option value="AM">AM</option>
            <option value="PM">PM</option>
        </select>
        <div class="btnrow">
            <button type="submit">Submit</button>
        </div>
    </div>
    <?php echo form_close(); ?>
    </center>
</body>
</html>