<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Autocomplete Search Box in PHP MySQL - Tutsmake.com</title>
 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" />
 
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
  <!-- Bootstrap Css -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body> 
<div class="container">
  <div class="row">
     <h2>Search Here</h2>
     <input type="text" name="term" id="term" placeholder="search here...." class="form-control">  
  </div>
</div>
<script type="text/javascript">
  $(function() {
     $( "#term" ).autocomplete({
       source: 'searchs.php',
     });
  });
</script>
</body>
</html>