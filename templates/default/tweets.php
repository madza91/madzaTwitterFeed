<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- This file has been downloaded from Bootsnipp.com. Enjoy! -->
    <title><?= $title; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= SITE_TEMPLATE_DIR; ?>assets/style.css" type="text/css" media="all">
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">

    <div class="row">

        <div class="col-lg-12 well-lg">
            <ul class="nav nav-pills">
                <li role="presentation" <?= ($active == 'stored') ? 'class="active"': ''; ?>><a href="<?= BASE_URL; ?>">Stored Tweets</a></li>
                <li role="presentation" <?= ($active == 'online') ? 'class="active"': ''; ?>><a href="<?= BASE_URL; ?>index.php?page=online">Online Tweets</a></li>
            </ul>
        </div>

    </div>


    <div class="page-header">
        <h1 id="timeline"><?= $title; ?></h1>
        <p class="text-muted">
            <i class="glyphicon glyphicon-eye-open"></i> Showing last <?= $count; ?> results
        </p>
    </div>

    <?php if($count == 0): ?>
    <div clas="row">
        <div class="alert alert-info">
            <strong>Info!</strong> There is no stored Tweets. Please run <a href="<?= BASE_URL . 'cron.php'; ?>" target="_blank">cron.php</a>.
        </div>
    </div>
    <?php endif; ?>

    <ul class="timeline">
        <?php foreach ($content as $key => $tweet) { ?>

            <li <?= ($key % 2) ? 'class="timeline-inverted"': ''; ?>>
                <div class="timeline-badge"><i class="glyphicon glyphicon-globe"></i></div>
                <div class="timeline-panel">
                    <div class="timeline-heading">
                        <div class="row">
                            <div class="col-lg-2">
                                <img src="<?= $tweet->user->profile_image_url; ?>"/>
                            </div>
                            <div class="col-lg-10">
                                <h4 class="timeline-title"><?= $tweet->user->name; ?> (@<?= $tweet->user->screen_name; ?>)</h4>
                            </div>
                        </div>

                        <p>
                            <small class="text-muted">
                                <i class="glyphicon glyphicon-time"></i> <?= $tweet->created_at; ?> via Twitter
                            </small>
                        </p>
                    </div>
                    <div class="timeline-body">

                        <?php if(DEBUGGING): ?>
                            <p>Tweet ID: <?= $tweet->id; ?></p>
                        <?php endif; ?>

                        <p><?= $tweet->text; ?></p>
                        <hr>
                        <div class="row">
                            <div class="col-lg-2"><i class="glyphicon glyphicon-retweet"></i> <?= $tweet->retweet_count; ?></div>
                            <div class="col-lg-2"><i class="glyphicon glyphicon-heart"></i> <?= $tweet->favorite_count; ?></div>
                        </div>
                    </div>
                </div>
            </li>

        <?php } ?>

    </ul>
</div>

</body>
</html>