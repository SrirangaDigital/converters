<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Basic Page Needs
    –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <meta charset="utf-8">
    <title>Converters</title>
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Mobile Specific Metas
    –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Javascript calls
    –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
    
    <!-- CSS
    –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" href="css/navbar.css?v=1.0">
    <link rel="stylesheet" href="css/homepage.css?v=1.0">
</head>
<body>
    <!-- Navigation
    –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <nav id="mainNavBar" class="navbar navbar-light navbar-expand-lg fixed-top">
        <div class="container-fluid clear-paddings">
            <a class="navbar-brand" href="#"><img src="images/logo_sriranga.png" alt="Logo" class="Sriranga logo"></a>
            <p class="navbar-text" id="navbarText">Sriranga Digital Software Technologies<br /><small>Private Limited</small></p>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
<?php

	require "menu.php";
	require "Akruti2Unicode/akrutitounicode.php";

?>

        </div>
    </nav>
    <!-- End Navigation
    –––––––––––––––––––––––––––––––––––––––––––––––––– -->    

<?php

    if(isset($_POST['inputtext'])){

        $inputNudiText = $_POST['inputtext'];

        $akruti2unicode = new Akrutidevtounicode();
        $outputText = $akruti2unicode->akrutidev2Unicode($inputNudiText);
    }

?>


    <div class="container footer">
        <div class="row converter-box">
            <div class="col-md-12">
                <h1>Akruti Dev Bharati to Unicode converter</h1>
            </div>
            <div class="col-md-12">
                <form action="akruti2Unicode.php" method="POST">
                    <div class="form-group">
                        <label for="inputtext">Input Text (Akruti Dev Bharati)</label>
                        <textarea class="form-control" id="inputtext" name="inputtext" rows="8"><?php if(isset($_POST['inputtext'])){ echo $_POST['inputtext'];} ?></textarea>
                    </div>
                    <div class="text-center"> 
                        <button type="submit" class="btn btn-primary">Convert Akruti Dev Bharati to Unicode</button>&nbsp;
                        <button type="reset" id="clear" class="btn btn-primary">clear</button>
                    </div>
                    <div class="form-group">
                        <label for="inputtext">Output Text (Unicode)</label>
                        <textarea class="form-control" id="outputtext" name="outputtext" rows="8"><?php  if(isset($outputText)){ echo $outputText; }?></textarea>
                    </div>
                </form>
            </div>
        </div>
    </div>    


    <div class="container footer"><!-- container -->
        <div class="row justify-content-center"><!-- row -->
            <div class="col-md-12 text-center">
                <p><small>© 2018 Sriranga Digital Software Technologies Private Limited</small></p>
            </div>
        </div>
    </div>

    <script>

$(document).ready(function(){
    $("button#clear").click(function(){
        $("#inputtext").html("");
        $("#outputtext").html("");
    });
});

    </script>    
</body>
</html>
