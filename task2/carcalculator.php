<!--
    ## TASK2- Calculator
    ## CREATED BY: DEBRAJ GHOSH
    ## DATED : 16/11/2018
-->
<!DOCTYPE html>
<html>
<head>
<title>Car Insurance Calculator</title>
<link href="style.css" type="text/css" rel="stylesheet" />
<script src="jquery.min.js"></script>
<script type="text/javascript">
  
// Add zero before minute in time part  
   function addZero(i) {
    if (i < 10) {
        i = "0" + i;
    }
    return i;
}

//Get User date and time
    function usertime() {
        var d = new Date();
        var h = addZero(d.getHours());
        var m = addZero(d.getMinutes());
        document.getElementById('time').value = h + ":" + m;
        var date = d.getDate();
        var month = d.getMonth()+1; //month is 0-indexed while days are 1-indexed
        var year = d.getFullYear();
        document.getElementById('date').value = year + "-" + month + "-" + date;

}

</script>
</head>
<body onload="usertime()">
    <h3>TASK 2 - Calculator</h3>
<div class="container">
  <form action="?" name="form1" id="form1" method="POST">
    <!-- Passing date and time value with form in the process page-->
    <input type="hidden" id="time" name="time" value="" />
    <input type="hidden" id="date" name="date" value="" />
    <label for="fname">Estimated value of the car </label>
    <input type="text" id="pricerange" name="pricerange" placeholder="Estimated Value" value="100">
    <!-- Range Slider for Estimated value of the car -->
    <div class="slidecontainer">
        <input type="range" min="100" max="100000" value="50" class="slider" id="slider">
    </div>

    <label for="tax">Tax percentage(%)</label>
    <input type="text" id="tax" name="tax" placeholder="Tax percentage" value="0.00">
    <!-- Range Slider for Tax percentage -->
    <div class="slidecontainer">
        <input type="range" min="0" max="100" step="0.1" value="0.00" class="slider" id="slider1">
    </div>
    <label for="instalments">Number of Instalments</label>
    <select id="instalments" name="instalments">
    <?php for( $i = 1; $i <=12; $i++ ){?>
      <option value="<?php echo $i;?>"><?php echo $i;?></option>
    <?php }?>
    </select>
    <input type="submit" value="Calculate">
  </form>
  <div id="display"></div>
</div>
</body>
</html>

<script>
    // Script for Range Slider of Car Values //

$('#slider').on('input change',function(){
    $('#pricerange').val($(this).val());
});

$('#pricerange').keyup(function(e){
  if (e.keyCode==13) {   //only activates after pressing Enter key
      var val = $(this).val().replace(/\D/g,'');   // check only for digits
      $('#slider').val(val);
  }
});

    // Script for Range Slider of Tax //

$('#slider1').on('input change',function(){
    $('#tax').val($(this).val());
});

$('#tax').keyup(function(e){
  if (e.keyCode==13) {   //only activates after pressing Enter key
      var val = $(this).val().replace(/\D/g,'');   // check only for digits
      $('#slider1').val(val);
  }
});
    // Script for Form Submit using Jquery//

       $(function () {

        $('form').on('submit', function (e) {

          e.preventDefault();

          $.ajax({
            type: 'post',
            url: 'process.php',
            data: $('form').serialize(),
            success: function (result) {
              $("#display").html(result);
            }
          });

        });

      });

</script>