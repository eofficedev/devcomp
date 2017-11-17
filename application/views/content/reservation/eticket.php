<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="content-type" content="text/html" />
	<meta name="author" content="Michael" />

	<title>Airline - eTicket</title>
<style>
    body {
        font-family: arial;
        font-size:14px;
    }
    
    #header{
        padding-left:15px;
        width:740px;
    }
    
    #content{
        padding-left:15px;
        width:740px;
    }
    
    #content h3 {
        font-weight: bold;
    }
    
    .section-header {
        width:740px;
        padding-left:15px;
        padding-top:2px;
        height:40px;
        color:white;
        background-color: black;
    }
    
    .section-header p{
        padding-bottom:0px;  
        font-weight: bold;  
    }
    
    #section-details {
        background-color: #333333;
        width:740px;
        padding-left:15px;
        height:30px;
        color:white;
    }
    #section-flight {
        background-color: #EFEFEF;
        width:755px;
        padding-top:15px;
        height:70px;
    }
    
    #passanger,#add-ons{
        padding-left:20px;
        background-color: #EFEFEF;
        height:50px;
        width:735px;
    }
    
    #passanger p {
        margin-top:0px;
        padding-top:20px;
    }
    
    #add-ons {
        margin-top:50px;
        background-color: white;
    }
</style>
</head>



<body onload="window.print();">
    <?php $row = $reservation->row(); ?>
<div id="header">
    <img src="<?php echo base_url(); ?>css/airline_logo/<?php echo $row->flight_code; ?>-big.jpg" style="width: 200px; height: 90px;"/>
    <h3>Booking Number : <b style="font-size:24px; color:red;"><?php echo $row->booking_id; ?></b></h3>
    <p>You will need to provide this confirmation number and your I.D during check-in for your boarding pass.</p>
</div>
<div id="content">
    
    <h3>Booking Details</h3>
    <div class="section-header">
        <p>Flight Details</p>
    </div>
    <div id="section-details">
        <table style="width: 600px;">
            <tr>
                <td>Depart</td>
                <td><?php echo $row->from_city; ?> to <?php echo $row->to_city; ?></td>
            </tr>
        </table>
    </div>
    <div id="section-flight">
    <table style="width: 900px; padding-left:10px;">
        <tr>
            <td><b><?php echo $row->flight_number; ?></b></td>
            <td><b><?php echo $row->from_city; ?></b></td>
            <td><b><?php echo $row->to_city; ?></b></td>
        </tr>
        <tr>
            <td></td>
            <td><?php echo $row->depart_date; ?>, <?php echo $row->depart_time; ?></td>
            <td><?php echo $row->arrive_date; ?>, <?php echo $row->arrive_time; ?></td>
        </tr>
        </table>
    </div>
    <div class="section-header" style="margin-top: 30px;">
        <p>Guest Details</p>
    </div>
    <div id="section-passanger">
        
    
    </div>
    
    <?php
        $j=1;
        foreach($passanger->result() as $row2){
            ?>
    <div id="passanger">
        <p><b>Guest <?php echo $j; ?> : <?php echo $row2->pas_firstname." ".$row2->pas_lastname; ?></b></p>
    </div>
    <?php
        $j++;
        }
    ?>
    
    
    <div id="add-ons">
        <p><b>Add Ons</b></p>
        
        <p style="margin-top: 40px;"><b>CGK-DPS</b> <br />
        Check-In Baggage - up to 15kg</p>
    </div>
    
</div>
<div id="footer">

</div>


</body>
</html>