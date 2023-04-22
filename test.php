<!DOCTYPE html>
<html>
    <head>
        <title>Bootstrap Datepicker Disable Past Dates Example - itsolutionstuff.com/</title>
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.css">
        <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    </head>
<body>
    
<div class="container">
    <input type="text" name="date" class="form-control datepicker" autocomplete="off">
</div>
    
</body>
     
<script type="text/javascript">
   
    $('.datepicker').datepicker({ 
        startDate: new Date()
    });
  
</script>
</html>




<script>
    $(function() {
      $("#datepicker1").datepicker({
        dateFormat: 'yy/mm/dd'
      });
      local = ['sunday', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday'];

      $('#datepicker1').datepicker()
        .on("change", function() {
          var today = new Date($('#datepicker1').datepicker('getDate'));
          //alert(local[today.getDay()]);
          $('#day').val(local[today.getDay()]);
        });

    });
  </script>
