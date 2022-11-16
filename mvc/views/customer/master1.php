<!-- component home page -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="/LuCamLong_B1809478/public/fonts/fontawesome-free-5.15.3-web/css/all.min.css">
    <link rel="stylesheet" href="/LuCamLong_B1809478/public/css/main.css" type='text/css'>
    <link rel="icon" type="image/x-icon" href="/LuCamLong_B1809478/public/img/logo/logo2.png">
    <title>Client</title>
</head>
<body>
    <div class="container">
        <?php
        require_once "./mvc/views/Customer/blocks/header.php";

        ?>
        <div class="container">
            <?php
            require_once "./mvc/views/Customer/blocks/carousel.php";
            ?>
            <div class="row">
                <div id="leftCol" class="col-3">
                    <?php
                    require_once "./mvc/views/Customer/blocks/sidebar.php";
                    ?>
                </div>
                <div id="rightCol" class="col-9">
                    <?php
                    require_once "./mvc/views/Customer/pages/" . $data['page'] . ".php";
                    ?>
                </div>
            </div>
        </div>
        
    </div>
    <br>
    <?php
        require_once "./mvc/views/Customer/blocks/footer.php";
    ?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="/LuCamLong_B1809478/public/js/main.js"></script>
</body>

</html>
