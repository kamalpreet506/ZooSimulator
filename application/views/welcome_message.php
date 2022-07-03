<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8"> <?php $ctym = time(); ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome to Animal Zoo</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.css'); ?>" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>" />
    <script src="<?php echo base_url('assets/js/jquery.js'); ?>"></script>
    <script src="<?php echo base_url('assets/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
</head>

<body>
    <div class="alert alert-success col-lg-12" role="alert">
        <div class="container">
            <h3>Welcome To Animal Zoo</h3>
        </div>
    </div>
    <div id="container" class="container">

        <div class="row">

            <div class="col-lg-12 mb-4 p-0">
                <div class="time"><?php echo "Today is " . date("Y-m-d H:i:s", strtotime("+{$hour} hours")) . "<br>"; ?>
                </div>
            </div>
            <div class="anilmals row">

                <?php
foreach ($animals as $value) {
?>
                <!--- animal card start here --->
                <div class="card <?php if ($value['health'] < $value['min_health']) { echo 'dead-animation'; }?>">
                    <div class="banner img-fuid"
                        style=' background-image: url("assets/images/<?php echo $value['type']?>.jpg"); '>
                        <!---<img src="<?php echo site_url('assets/images/m1.jpeg'); ?>"  style='height: 100%; width: 100%; object-fit: contain'>-->
                    </div>

                    <h2 class="name"><?php echo $value['name']; ?></h2>
                    <div class="actions">
                        <div class="follow-info">
                            <h2><a href="#"><span style="color:#<?php if ($value['health'] < $value['min_health']) {
			echo 'fa867e';
		}?>;"><?php echo $value['health']; ?></span><small id="healthtitle">Health</small></a></h2>
                            <h2><a href="#"><span style="color:#<?php if ($value['health'] < $value['min_health']) {
			echo 'fa867e';
		}?>;"><?php if ($value['health'] < $value['min_health']) {
			echo 'Dead';
		}
		else {
			echo 'Alive';
		}?></span><small id="healthtitle">Status</small></a></h2>

                        </div>

                    </div>
                </div>
                <!--- animal card end here --->
                <?php
}
?>
            </div>
        </div>

    </div>
    <div class="col-lg-12" id="bottomdiv">
        <div class="container">
            <a href="ZooAnimals/interval" class="btn btn-primary m-2" data-toggle="tooltip" data-placement="top"
                title="Provoke An Hour of Time"> Interval</a>
            <a href="ZooAnimals/feed" class="btn btn-success m-2" data-toggle="tooltip" data-placement="top"
                title="Feed the Zoo"> Feed</a>
            <a href="ZooAnimals/reset" class="btn btn-danger m-2" data-toggle="tooltip" data-placement="top"
                title="Reset All the Data"> Reset</a>
        </div>
    </div>
</body>
<script>
$(document).ready(function() {
    $('[data-toggle="tooltip"]').tooltip();
});
</script>

</html>