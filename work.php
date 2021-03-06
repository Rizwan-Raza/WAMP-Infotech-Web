<!DOCTYPE html>
<html lang="en">

<head>
    <title>Work | WAMP InfoTech </title>
    <meta name="description" content="We let our work speak for us, as we ensure to push our limits with each project we work on. Take a look at our portfolio to see our work from branding to web design. " />

    <meta name="keywords" content="wamp work, wamp infotehch work, wamp portfolio, wamp infotech portfolio, digital marketing agency, web development company, digital marketing company" />

    <meta itemprop="url" content="https://www.wampinfotech.com/work" />
    <meta property="og:url" content="https://www.wampinfotech.com/work" />
    <meta itemprop="headline" content="Work | WAMP InfoTech" />
    <meta property="og:title" content="Work | WAMP InfoTech" />
    <meta property="og:image" content="https://www.wampinfotech.com/images/our-work.jpg" />
    <meta property="og:image:width" content="640" />
    <meta property="og:image:height" content="320" />
    <meta property="og:image:type" content="image/jpeg" />
    <meta property="og:image:alt" content="Scattered Photos" />
    <meta property="og:description" content="We let our work speak for us, as we ensure to push our limits with each project we work on. Take a look at our portfolio to see our work from branding to web design." />
    <meta name="twitter:site" content="https://www.wampinfotech.com/work">
    <meta name="twitter:card" content="https://www.wampinfotech.com/images/our-work.jpg">
    <meta name="twitter:title" content="Work | WAMP InfoTech">
    <meta name="twitter:description" content="We let our work speak for us, as we ensure to push our limits with each project we work on. Take a look at our portfolio to see our work from branding to web design.">

    <?php include "includes/head.inc.php"; ?>
    <link rel="stylesheet" href="css/ihover.css" />
    <link rel="stylesheet" href="css/work.css" />
</head>

<body>
    <?php include "layouts/nav.inc.html"; ?>
    <div class="scrollable grey lighten-3">
        <header><img src="images/our-work.jpg" class="home-banner" alt="WAMP Banner" /></header>
        <section id="work" class="card-panel flow-text">
            <h4 class="center-align fw-600">Our Work</h4>
            <hr class="short-border" />
            <p class="center-align">
                We ensure to build something you’ll love. We have a team of skilled
                professionals who begin with deep research and come up with a smooth
                customer journey. Our strategists will work for your business to grow
                into a brand; the motive is to make a project that engages the
                customers.
            </p>
            <br />
            <div class="divider"></div>
            <div class="section row m-0">
                <?php $works = getJson("./data/our-works.json", "our_works"); foreach
          ($works as $work) { 
              $title = $work['title'];
              $url = $work['url'];
              $desc = $work['desc'];
              $src = $work['src'];
              
            ?>

                <div class="col s12 m4 m-0 p-0">
                    <div class="ih-item square effect6 from_top_and_bottom">
                        <a href="javascript:openWork('<?=$title?>','<?=$url?>','<?=$desc?>', '<?=$src?>');" class="lh-0">
                            <div class="full">
                                <img src="<?=$src?>" alt="<?=$title?>" class="img" />
                            </div>
                            <div class="info valign-wrapper">
                                <div class="w-full">
                                    <h4 class="white-text text-z-depth-2">
                                        <?=$title?>
                                    </h4>
                                    <button class="btn bg-primary waves-effect" onclick="openWork('<?=$title?>','<?=$url?>','<?=$desc?>', '<?=$src?>');">
                                        Details
                                    </button>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <?php } ?>
            </div>
        </section>

        <?php include "layouts/footer.inc.html"; ?>

        <!-- Modal Structure -->
        <div id="work_modal" class="modal border-radius-8" style="max-width: 500px;">
            <div class="modal-content card p-0 m-0 flow-text">
                <div class="card-image">
                    <div class="image-wrapper">
                        <img src="images/works/kaliram-chaats.jpg" class="modal-back-image" alt="Kaliram Chat" />
                    </div>
                    <span class="card-title text-z-depth-2 fw-500">Card Title</span>
                    <a class="btn-floating halfway-fab waves-effect waves-light red" target="_blank"><i class="material-icons">public</i></a>
                </div>
                <div class="card-content">
                    <p>
                        I am a very simple card. I am good at containing small bits of
                        information. I am convenient because I require little markup to
                        use effectively.
                    </p>
                </div>
                <div class="card-action">
                    <button class="modal-close waves-effect waves-dark btn btn-flat right">
                        Close
                    </button>
                    <br clear="all" />
                </div>
            </div>
            <!--
          <div class="modal-footer px-4 mb-2">
              <button class="modal-close waves-effect waves-dark btn btn-flat ">
                  Close
              </button>
              <a href="javascript:;" class="waves-effect waves-light btn bg-primary ml-1">
                  Visit Website
              </a>
          </div>
        -->
        </div>
    </div>

    <?php include "includes/scripts.inc.php"; ?>
    <script src="ui-scripts/work.js"></script>
</body>

</html>