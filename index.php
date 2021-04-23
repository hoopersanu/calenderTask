<?php
  include 'function.php';
?>
<!DOCTYPE html>
<html>
<head>

	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

  <link rel="stylesheet" href="https://jqueryui.com/resources/demos/style.css"> 
  <!-- working header end -->
   <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<!-- timepicker -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>

  <style>
  	body {
  	font-size: 14px;	
}


.main {
  margin-left: 15.625rem; 
  padding-right: 30px;
}
img{
	margin: 0.3125rem;
}
.imgSideNav{
	width: 4.75rem;
	margin-left: 4.5rem;
	margin-top: unset;
	height: 1.25rem;
	margin-bottom: 4%;
}
.ui-state-highlight, .ui-widget-content .ui-state-highlight, .ui-widget-header .ui-state-highlight{
  background: red;
}
  </style>


</head>
<body>


<!-- ========================[main body start]======================== -->
<div class="main">
  
  <div class="row">
    <div class="col-xl-5 col-md-5 col-4 ml-3">
      <h1 class="page-title hTitle" style="font: normal normal bold 20px/23px Arial;">Meetings</h1>
    </div>
    <div class="col-xl-6 col-md-6 col-8">
      
  <!-- working area start -->

            <div class="container">
                <!-- Trigger the modal with a button -->
                    <button type="button" class="btn btn-lg btn-color border-radius text-white" data-toggle="modal" data-target="#myModal">+ Create Event</button>

                <!-- Modal -->
                <div class="modal fade" id="myModal" role="dialog">
                  	<div class="modal-dialog">
                  
	                  <!-- Modal content-->
	                    <div class="modal-content">
	                        <div class="modal-header">
	                        	<button type="button" class="close" data-dismiss="modal">&times;</button>
	                        </div>
	                        <!-- [model body start] -->
		                    <div class="modal-body">
		               
<!-- ==============[meeting detail section start]=========== -->

<div class="row ml-2">
    <div class="col-xl-5 col-md-5  col-sm-5 col-12 ">
        <h1 class="page-title titleSize"> Event Details</h1>
    </div>
    <div class="col-xl-6 col-md-6  col-sm-6 col-12">
        <a href="">
          <i class="fa fa-chevron-left" style="margin-right: 1.875rem;" aria-hidden="true"></i></a>
        <a href=""><i class="fa fa-chevron-right" aria-hidden="true"></i></a>
    </div>
</div>
<div class="container ml-2">
	<div class="row">
			
	
<div class="col-xl-7 col-md-7">
  <form action="function.php" method="POST">
	    <div class="row">
			      <div class="col">
			        <label for="email2" class="mb-2 mr-sm-2">Event Name</label>
			        <input type="text" id="eventName" class="form-control mb-2 mr-sm-2 inputStyle" name="eventName"  value="" required="required">			    
			      </div>
	    </div>
      <div class="row">
			      <div class="col">
			        <label for="email2" class="mb-2 mr-sm-2">Event date</label>
			        <input type="text" id="datepicker" class="form-control mb-2 mr-sm-2 inputStyle" name="eventDate"  value="" required="required">			    
			      </div>			      
	    </div>

		<label for="appt-time" class="mb-2 mr-sm-2">Event time</label>
		<div class="input-group" >
      <input class="form-control mb-2 mr-sm-2 dateStyle timepicker" id="appt-time eventTime" type="time" name="appt-time" value="13:30">
      <button class="btn btn-primary" type="submit" name="submit" onclick="calenderFunction()">Add Event</button>
		</div>   
  </form>

</div>
</div>
</div>
		                    </div>
		                    <!-- [model body end] -->
	                    </div>
                    
                  	</div>
                </div>
                
            </div>

          <!-- working area end -->
    </div>
  </div>
  
  <hr class="new4">

    
<div class="row">

  <div class="col-xl-2 col-md-6 col-12"> 
    
    <div id="cal" onchange="eventClick()"></div>
    <!-- <p><div id="datepicker" onchange="eventClick()"></div></p> -->

        <p id="showDate"></p>
  </div>
  <div class="col-xl-3 col-md-6 col-12" style="padding-left: 26px;"> 
    <h1 class="page-title ml-3 titleSize" style="font: normal normal bold 16px/18px Arial;">Booked Meetings</h1>

    <div class="vertical-menu ml-3" id="showLoop"></div>
  </div>

  <div class="col-xl-6 col-md-6 col-12"> 

    <h1>Hello sanu</h1>
    <?php 
      $fetchQuery = "SELECT * FROM events";
      $fetchData  = mysqli_query($conn, $fetchQuery);
    
    if ($fetchData->num_rows > 0) {
    echo "<table  class='table table-striped'><thead><tr><th>Event Name</th><th>Event Date</th><th>Event time</th></tr></thead>";
    
    
    // output data of each row
    while($row = $fetchData->fetch_assoc()) {
        echo "<tbody><tr><td>" . $row["event_name"]. "</td><td>" . $row["event_date"]. " </td> <td>" . $row["event_time"]. "</td></tr></tbody>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
   
 ?>

  </div>

<!-- working -->
<!-- ==============[meeting detail section start]=========== -->



<!-- ==============[meeting detail section end]=========== -->

<!-- working -->

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#datepicker1" ).datepicker();

  } );
  </script>

 

  <script type="text/javascript">
   

    function formatDate(date) {
        var d = new Date(date);
         month = '' + (d.getUTCMonth() + 1);
         day = '' + d.getUTCDate();
         year = d.getUTCFullYear();
         hour = d.getUTCHours();
         min = d.getUTCMinutes();
         sec = d.getUTCSeconds();

        exacttime = [year, month, day].join('-')+" "+hour+":"+min+":"+sec;
        return exacttime;
    }
//==============[calendar javascript function is start]====================

  $( function() {
    $( "#datepicker" ).datepicker();

  } );



  function eventClick(){
    var currentDate = $( "#cal" ).datepicker( "getDate" );
    // alert(currentDate);
  document.getElementById("showDate").innerHTML = currentDate;

    // var cardLoop = '<div class="row"><div class="col-md-4"><p class="d-flex">4th Sun</p> </div><div class="col-md-8"><div class="card" id="eventShow" style="width: 8.5rem; height: 3rem;text-align: left;font: normal normal normal 12px/14px Arial;letter-spacing: 0px; background-color: #843D96"> <div class="card-body"> <h6 class="card-title text-white">ABC Interprises</h6><span class="text-white">02:00</span> <span class="text-white">-</span> <span class="text-white">06:00</span> </div> </div> <br> </div> </div>';

    var text = "";
    var i;
    for (i = 0; i < 5; i++) {
      text += cardLoop;  

    var cardLoop = '<p class="monthDate"  value="">Oct 4th, Sun</p> <div class="parentCard" id="card'+i+'" onclick="cardActiveBg(card'+i+')"> <div class="card" id="eventShow" style="width: 11rem; height: 3rem;text-align: left;font: normal normal normal 12px/14px Arial;letter-spacing: 0px; border-radius: unset; background-color: #843D96">  <div class="card-body items" >    <h6 class="card-title text-white">ABC Interprises</h6>    <span class="text-white">02:00</span> <span class="text-white">-</span>    <span class="text-white">06:00</span>  </div></div></div><br>';
    }

    document.getElementById("showLoop").innerHTML = text;
  }

$(document).ready(function(){
  eventClick();
})

//===============[calendar javascript function end]==================   

  </script>

    <script type="text/javascript">
      var events = [
  {
    ID: 1,
    Title: "Event 1",
    Date: new Date("10/03/2020"),
    Date_2: new Date("10/05/2020"),
    Tipo: "abc"
  },
  {
    ID: 2,
    Title: "Event 2",
    Date: new Date("10/25/2020"),
    Date_2: "",
    Tipo: "Post lunch"
  },
  {
    ID: 3,
    Title: "Event 3",
    Date: new Date("10/20/2020"),
    Date_2: new Date("10/22/2020"),
    Tipo: "Normal"
  }
];

$(function() {
  $("#cal").datepicker({
    dateFormat: "dd/mm/yy",
    changeMonth: true,
    changeYear: true,
    beforeShowDay: function(date) {
      var result = [true, "", null];
      var matching = $.grep(events, function(event) {
        return event.Date.valueOf() === date.valueOf();

      });
      if (matching.length) {
        result = [true, "highlight", matching[0].Title];
      }
      return result;
    }
  });
});

$(function() {
  $.grep(events, function(event) {
   
    var data = event.Date;
    var day = data.getDate();
    if (day.toString().length == 1) {
      day = "0" + day;
    }

    var mon = data.getMonth() + 1;
    if (mon.toString().length == 1) {
      mon = "0" + mon;
    }

    var yr = data.getFullYear();
    data_final = day + "/" + mon + "/" + yr;

    $("#events").append(
      "<div data-date='" +
        data_final +
        "'>" +
        event.Title +
        " - " +
        data_final +
        " - " +
        event.Tipo +
        "</>"
    );
  });
  $("#events").on("click", "div", function() {
    var date = $(this).data("date");
    $("#cal").datepicker("setDate", date);
  });
});

    </script>
<script>
  $(document).ready(function(){
    // $( "#card1" ).click(function() {
    //   debugger;
    //       $(this).addClass('active');
    //       $('#card2').removeClass('active');
    //   });
    // $( "#card2" ).click(function() {
    //   debugger;
    //        $(this).addClass('active');
    //        $('#card1').removeClass('active');
    //   });



  });

  var eventName     = document.getElementById('eventName');
  var eventData     = document.getElementById('datepicker');
  var timeControl   = document.querySelector('input[type="time"]');
  timeControl.value = HTMLInputElement.value;
  function calenderFunction(){
      console.log(eventName.value);
      console.log(eventData.value);
      console.log(timeControl.value);

  }

  function cardActiveBg(id){
    // debugger; 
    // console.log(id);
          $("div.parentCard").removeClass("active");
          $(id).addClass('active');

          // $(".card-body").css("background-color", "yellow");

          // $(id).removeClass('active');
    // debugger;
  }
</script>

<style>


hr.new4 {
  border: 1px solid #843D96;
  /*margin-right: 1.5625rem;*/
}
.btn-color{
  background-color: #843D96;
  font: normal normal bold 14px/16px Arial;
}
.border-radius {
  padding: 5px;
  border-radius: 50px 50px;
}
.ui-state-default, .ui-widget-content .ui-state-default, .ui-widget-header .ui-state-default, .ui-button, html .ui-button.ui-state-disabled:hover, html .ui-button.ui-state-disabled:active {
    border: none;
    /* background-color: #ffffff; */
}

.ui-datepicker-inline.ui-datepicker.ui-widget.ui-widget-content.ui-helper-clearfix.ui-corner-all {
    border: none;
    width: 12.0625rem;
}
.ui-datepicker-header.ui-widget-header.ui-helper-clearfix.ui-corner-all {
    background: #fff;
    border: none;
    width: 10.625rem;
}
.card-body {
    padding: unset;
    text-align: center;
}
.final a{
    color:red !important;
}  

    table.ui-datepicker-calendar tbody td.highlight > a {
    color: red;
} 

#events{
    font-size:18px;
    color:black;
    text-decoration: none;
} 
.ui-datepicker select.ui-datepicker-month, .ui-datepicker select.ui-datepicker-year {
     width: 50%;
    border: none;
    background: #fff;
    font-size: 14px;

}

.vertical-menu {
  width: 12.3125rem;
  height: 70%;
  overflow-y: auto;
}

.vertical-menu a {
  background-color: #eee;
  color: black;
  display: block;
  padding: 0.75rem;
  text-decoration: none;
}
/*============[color change in booked meeting button]==========*/
.parentCard.active .card-body{
  background-color:red;
}
.page-title.ml-4 {
    font-size: 16px;
}
.page-title{
  font-size: 20px;
}

select {
    -webkit-appearance: none;
    -moz-appearance: none;
    text-indent: 1px;
    text-overflow: '';
}
.ui-datepicker table {
    width: 10.3125rem;
    height: 9.3125rem;
    font-size: 9px;
}
.ui-datepicker th{
	font-weight: normal;
}
.inputStyle{
	border-radius: unset; 
	height: 32px;
}
.one{
	padding: 5px;
}
.pStyle{
	border-radius: unset; 
	height: 121px;
}
.modal-content {
    width: 688px;
}

</style>

</div>
<!-- ========================[main body end]======================== -->


</body>
<script>
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
</script>

</html>