<!DOCTYPE html>
<html lang="en">

<head>
    <title>Digital Marketing Agency, Web Development Company | WAMP InfoTech</title>

    <meta name="description"
        content="New Delhi based digital marketing agency pushing boundaries in the creative field of web development and help in growing brands to the next level." />

    <meta name="keywords"
        content="digital marketing agency, web development company, digital marketing company, web design company, digital marketing services, social media agency, digital marketing agency in delhi" />

    <meta itemprop="url" content="https://www.wampinfotech.com" />
    <meta property="og:title" content="Digital Marketing Agency, Web Development Company | WAMP InfoTech" />
    <meta property="og:url" content="https://www.wampinfotech.com" />
    <meta property="og:image" content="https://www.wampinfotech.com/images/banner1.jpg" />
    <meta property="og:image:width" content="640" />
    <meta property="og:image:height" content="320" />
    <meta property="og:image:type" content="image/jpeg" />
    <meta property="og:image:alt" content="Hand joining in radial form" />
    <meta itemprop="headline" content="Digital Marketing Agency , Web Development Company | WAMP InfoTech" />
    <meta name="twitter:site" content="https://www.wampinfotech.com">
    <meta name="twitter:card" content="https://www.wampinfotech.com/images/banner1.jpg">
    <?php include "includes/head.inc.php"; ?>
    <!-- < ? php // include "includes/home.css.php"; ? > -->
    <!-- <link rel="stylesheet" href="css/ihover.css" /> -->
    <link rel="stylesheet" href="css/home.css" />
</head>

<body>
    <?php include "layouts/nav.inc.html"; ?>
    <!-- Tap Target Structure -->
    <div class="tap-target bg-primary" data-target="quick_query">
        <div class="tap-target-content">
            <h5>Quick Query</h5>
            <p>Your search for digital partner ends here!<br />
            </p>
        </div>
    </div>

    <div class="scrollable grey lighten-3">
        <header class="mb-4">
            <img src="images/banner1_x600.jpg" class="home-banner lazy" data-src="images/banner_1400.jpg"
                data-srcset="images/banner_600.jpg 600w, images/banner_1000.jpg 1000w, images/banner_1200.jpg 1200w, images/banner_large.jpg 1600w, images/banner_1400.jpg 1400w"
                alt="WAMP Home Banner" />
        </header>
        <br class="hide-on-small-only" />
        <br class="hide-on-small-only" />
        <section class="px-4" id="about">
            <div class="flex row">
                <div class="col s12 m12 l6">
                    <div class="full">
                        <div class="home-video white z-depth-2 border-2 grey-border border-radius-8">
                            <div class="start-button border-2 primary-border border-round"
                                onclick="window.location.href='admin'"></div>


                            <div class="youtube-video-place yt-video"
                                data-yt-url="https://www.youtube.com/embed/WL44vPIqkds?rel=0&showinfo=0&autoplay=1">
                                <img src="images/thumbnail.jpg" async class="play-youtube-video full">
                                <div class="play-icon">
                                    <svg height="100%" version="1.1" viewBox="0 0 68 48" width="100%">
                                        <path class="ytp-large-play-button-bg"
                                            d="M66.52,7.74c-0.78-2.93-2.49-5.41-5.42-6.19C55.79,.13,34,0,34,0S12.21,.13,6.9,1.55 C3.97,2.33,2.27,4.81,1.48,7.74C0.06,13.05,0,24,0,24s0.06,10.95,1.48,16.26c0.78,2.93,2.49,5.41,5.42,6.19 C12.21,47.87,34,48,34,48s21.79-0.13,27.1-1.55c2.93-0.78,4.64-3.26,5.42-6.19C67.94,34.95,68,24,68,24S67.94,13.05,66.52,7.74z"
                                            fill="#212121" fill-opacity="0.8"></path>
                                        <path d="M 45,24 27,14 27,34" fill="#fff"></path>
                                    </svg>
                                </div>
                            </div>

                            <!--  <iframe src="https://www.youtube.com/embed/WL44vPIqkds" frameborder="0"
                                allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen class="yt-video"></iframe> -->
                        </div>
                    </div>
                </div>
                <div class="col m12 l6">
                    <h2 class="mt-0">We are <span class="fw-700">WAMP</span>.</h2>
                    <br>
                    <strong>We like making your online presence simpler for you.</strong>
                    <br>
                    <p class="text-justify">WAMP InfoTech is a digital agency helping businesses, small or big to get
                        better results of
                        their online presence. We are working on a set of goals or we can actually say ‘your goals’.
                        Our expertise extends over a wide range of services which includes website development, social
                        media management, media planning and search engine optimization.</p>

                    <a href="overview" class="waves-effect waves-light btn bg-primary">Learn
                        more</a>
                </div>
            </div>
        </section>

        <section class="section px-4" id="services">
            <h3 class="mb-2">What we <span class="fw-700">do</span>.</h3>
            <div class="row">
                <?php 
                $services = array_filter(getJson("./data/services.json", "services"), function($value) {
                    return $value['in_home'];
                });
                usort($services, function($a,$b) {
                    return $a['order'] <=> $b['order'];
                });
                foreach ($services as $service) { ?>
                <div class="col s12 m6 l4 my-2 py-2">
                    <a href="services/<?=$service['url']?>">
                        <div class="row mb-0 valign-wrapper">
                            <div class="col s4">
                                <div class="image-block">
                                    <img src="<?=$service['src']?>" alt="<?=$service['title']?> Icon" class="icon" />
                                </div>
                            </div>
                            <div class="col s8">
                                <h5 class="mt-0 fw-600">
                                    <?=$service['title']?>
                                </h5>
                                <p class="grey-text text-darken-1 text-justify">
                                    <?=$service['desc']?>
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
                <?php } ?>
            </div>
        </section>
        <section>
            <div class="row mb-0" id="our-works">
                <div class="col s12 m12 l12 xl6 bg-primary">
                    <div class="p-4">
                        <h4 class="white-text mb-4"><span class="fw-700">Projects</span> close to our heart!<a
                                href="work" class="btn waves-effect right white text-primary mt-2">View
                                more</a></h4>
                        <h5 class="white-text">Are you looking for a class-apart website for your business?</h5>
                        <h5><a href="contact" class="white-text">Get in touch with us for free estimation.</a></h5>
                    </div>
                </div>

                <?php 

                $works = array_filter(getJson("./data/our-works.json", "our_works"), function($value) {
                    return $value['in_home'];
                });
                usort($works, function($a,$b) {
                    return $a['order'] <=> $b['order'];
                });

                foreach ($works as $work) { ?>

                <div class="col s12 m6 l4 xl3 black">
                    <div class="ih-item square effect6 from_top_and_bottom"><a href="work">
                            <div class="img full"><img class="lazy" src="<?=$work['srclow']?>"
                                    data-src="<?=$work['src']?>" data-srcset="<?=$work['src']?> 2x,<?=$work['src']?> 1x"
                                    alt="<?=$work['title']?>" /></div>
                            <div class="info valign-wrapper">
                                <div class="w-full">
                                    <h4 class="white-text text-z-depth-2">
                                        <?=$work['title']?>
                                    </h4>
                                    <button class="btn bg-primary waves-effect"
                                        onclick=window.location.href="<?=$work['url']?>">Details
                                    </button>
                                </div>
                            </div>
                        </a></div>
                </div>
                <?php } ?>
            </div>
        </section>
        <section class="p-4 my-m-2">
            <h4 class="fw-600">Let us give you reasons, why you need to hire us?</h4>
            <p class="text-justify">WAMP InfoTech is a 360 degree digital marketing agency based in New Delhi. We have a
                team of experienced
                professionals in designing, creating, and maintaining. Due to this reason we’ve got a great number of
                happy clients.</p>
            <div class="row">
                <div class="col s12 m6">
                    <div class="left my-2 mr-1"><i class="medium material-icons">stars</i></div>
                    <div class="left col s9">
                        <h5 class="fw-600">Our services are performance-based</h5>
                        <p class="text-justify">We make sure that our work is result-driven. We try climbing the ladder
                            from the basics of
                            particular digital strategies.</p>
                    </div>
                </div>
                <div class="col s12 m6">
                    <div class="left my-2 mr-1"><i class="medium material-icons">alarm_on</i></div>
                    <div class="left col s9">
                        <h5 class="fw-600">We deliver our projects on time</h5>
                        <p class="text-justify">When it comes to delivering the projects we make sure that we set
                            realistic customer
                            expectation.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col s12 m6">
                    <div class="left my-2 mr-1"><i class="medium material-icons">thumb_up</i></div>
                    <div class="left col s9">
                        <h5 class="fw-600">Strong commitment</h5>
                        <p class="text-justify">We believe in having a strong relationship with our clients that lasts
                            for years. As we
                            ensure
                            our work commitments are fulfilled as per their expectations.</p>
                    </div>
                </div>
                <div class="col s12 m6">
                    <div class="left my-2 mr-1"><i class="medium material-icons">mood</i></div>
                    <div class="left col s9">
                        <h5 class="fw-600">We keep our approach customer focused</h5>
                        <p class="text-justify">It is said that the real assets of a company are its customers therefore
                            we make sure to
                            grab as much information from our customers as possible. </p>
                    </div>
                </div>
            </div>
        </section>
        <section class="p-4 grey darken-2 lazy-background" id="testimonial">
            <div class="border-2 grey-border border-radius-8">
                <h3 class="text-capitalize white-text center-align px-2 fw-600">What People say</h3>
                <hr class="short-border" />

                <div class="carousel carousel-slider center">
                    <?php 
                    require_once "php/db.php";
                    $sql = "SELECT * FROM `feeds`,`users` WHERE `approved`=1 AND `users`.`_uid`=`feeds`.`_uid`";
                    $result = DB::getConnection()->query($sql);
                    while ($testimonial = $result->fetch_assoc()) { 
                        ?>
                    <div class="carousel-item white-text" href="#one!">
                        <p class="white-text px-4 text-justify">
                            <?=$testimonial['feed']?>
                        </p>
                        <h2 class="text-capitalize">
                            <?=$testimonial['name']?> | <?=$testimonial['company']?>
                        </h2>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </section>

        <section class="px-4 py-2 my-4 center-align">
            <h3 class="text-uppercase fw-600 my-4">We hope to hear from you soon</h3>
            <a href="contact" class="btn btn-large waves-effect waves-light bg-primary text-capitalize">Get
                in touch</a>
            <br clear="both" />
        </section>
        <?php include "layouts/footer.inc.html"; ?>
    </div>
    <?php include "includes/scripts.inc.php"; ?>
    <!-- < ? php // require_once "includes/home.js.php"; ? > -->

    <script src="ui-scripts/home.js"></script>
</body>

</html>