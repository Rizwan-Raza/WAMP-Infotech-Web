<?php
session_start();
if (isset($_GET['url'])) {
    require_once "includes/fetcher.php";
    $services = array_filter(getJson("./data/services.json", "services"), function ($value) {
        return $value['url'] == $_GET['url'];
    });

    if (count($services) != 1) {
        header("Location: ../5OO");
        return;
    }

    foreach ($services as $service) {
        extract($service, EXTR_SKIP);
    }
} else {
    header("Location: ../4O4");
    return;
} ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <base href="../">
    <title>
        <?= $meta['title'] ?> | WAMP InfoTech
    </title>
    <meta name="description" content="<?= $meta['desc'] ?>" />
    <meta name="keywords" content="<?= implode(', ', $meta['keywords']) ?>" />
    <meta itemprop="url" content="https://www.wampinfotech.com/services/<?= $url ?>" />
    <meta property="og:url" content="https://www.wampinfotech.com/services/<?= $url ?>" />
    <meta itemprop="headline" content="<?= $meta['title'] ?> | WAMP InfoTech" />
    <meta property="og:title" content="<?= $meta['title'] ?> | WAMP InfoTech" />
    <meta property="og:image" content="https://www.wampinfotech.com/<?= $image ?>" />
    <meta property="og:image:width" content="640" />
    <meta property="og:image:height" content="320" />
    <meta property="og:image:type" content="image/jpeg" />
    <meta property="og:image:alt" content="An image, with text '<?= $title ?>' written on it." />

    <meta property="og:description" content="<?= $meta['desc'] ?>" />
    <meta name="twitter:site" content="https://www.wampinfotech.com/services/<?= $url ?>">
    <meta name="twitter:card" content="https://www.wampinfotech.com/<?= $image ?>">
    <meta name="twitter:title" content="<?= $meta['title'] ?> | WAMP InfoTech">
    <meta name="twitter:description" content="<?= $meta['desc'] ?>">

    <?php include "includes/head.inc.php"; ?>
    <link rel="stylesheet" href="css/ihover.css" />
    <link rel="stylesheet" href="css/services.css" />

</head>

<body>
    <?php include "layouts/nav.inc.html"; ?>
    <div class="scrollable grey lighten-3">
        <header>
            <img src="<?= $image ?>" class="home-banner" alt="<?= $title ?>" />
        </header>
        <section id="overview" class="card-panel flow-text">
            <h1 class="center-align fw-600 h4">
                <?= $title ?>
            </h1>
            <hr class="short-border" />
            <br />
            <?= $content ?>
            <?php include "layouts/service-work.php"; ?>
            <?= getWork($url) ?>
        </section>

        <?php include "layouts/footer.inc.html"; ?>
    </div>

    <?php include "includes/scripts.inc.php"; ?>
    <script src="ui-scripts/services.js"></script>
    <?php if ($_GET['url'] == "domain-and-hosting") { ?>
    <div id="congratsModal" class="modal border-radius-8" style="max-width: 336px">
        <div class="modal-content center" style="padding:0;line-height: 0;font-size:0">
            <a href="//namecheap.pxf.io/c/1878977/386451/5618" style="line-height: 0;font-size:0"><img src="//a.impactradius-go.com/display-ad/5618-386451" border="0" alt="Domain names for just 88 cents!" width="336" height="280" /></a><img height="0" width="0" src="//namecheap.pxf.io/i/1878977/386451/5618" style="position:absolute;visibility:hidden;" border="0" />
        </div>
    </div>
    <script>
        if (!sessionStorage.getItem("rewardShown")) {
            setTimeout(() => {
                $("#congratsModal").modal("open");
                sessionStorage.setItem("rewardShown", true);
            }, 10 * 1000);
        }
    </script>

    <?php } ?>
</body>

</html>