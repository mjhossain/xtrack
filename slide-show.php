<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        .carousel-wrap{
            width: 500px;
        }
    </style>
</head>
<body>
    <div class="carousel-wrap">
        <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="3000">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>
            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                <div class="item active">
                    <img src="images/checkout.gif" alt="Los Angeles" style="width:100%;">
                </div>
                <div class="item">
                    <img src="images/receipt.gif" alt="Chicago" style="width:100%;">
                </div>
                
                <div class="item">
                    <img src="images/wallet.gif" alt="Chicago" style="width:100%;">
                </div>
                
            </div>
            <div class="carousel-wrap">
                
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script> 
    <script>
        $(document).ready(function(){
            // Activate Carousel
        })
    </script>
</body>
</html>
