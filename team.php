<!DOCTYPE html>
<html lang="en">

<head>
  <title>Our Team | WAMP InfoTech</title>

  <meta name="description"
    content="WAMP stands for We Are Making People and the creative digital agency works for your brand growth. From website creation to brand building they handle it all." />

  <meta name="keywords"
    content="wamp team, wamp infotech team, team wamp, team of wamp, team of wamp infotech, digital marketing agency, web development company" />

  <meta itemprop="url" content="https://www.wampinfotech.com/team" />
  <meta property="og:url" content="https://www.wampinfotech.com/team" />
  <meta itemprop="headline" content="Our Team | WAMP InfoTech" />
  <meta property="og:title" content="Our Team | WAMP InfoTech" />
  <meta property="og:image" content="https://www.wampinfotech.com/images/banner3.jpg" />
  <meta property="og:image:width" content="640" />
  <meta property="og:image:height" content="320" />
  <meta property="og:image:type" content="image/jpeg" />
  <meta property="og:image:alt" content="Scattered Electronic Communication Devices on a table" />
  <meta property="og:description"
    content="WAMP stands for We Are Making People and the creative digital agency works for your brand growth. From website creation to brand building they handle it all." />
  <meta name="twitter:site" content="https://www.wampinfotech.com/team" />
  <meta name="twitter:card" content="https://www.wampinfotech.com/images/banner3.jpg" />
  <meta name="twitter:title" content="Our Team | WAMP InfoTech" />
  <meta name="twitter:description"
    content="WAMP stands for We Are Making People and the creative digital agency works for your brand growth. From website creation to brand building they handle it all." />

  <?php include "includes/head.inc.php"; ?>
  <!--
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    -->
  <link rel="stylesheet" href="css/team.css" />
</head>

<body>
  <?php include "layouts/nav.inc.html"; ?>
  <div class="scrollable white lighten-3">
    <header><img src="images/banner3.jpg" class="home-banner" alt="WAMP Banner" /></header>
    <section id="our-team" class="my-4 pt-2 px-4 flow-text">
      <h4 class="center-align fw-600">Our Team</h4>
      <hr class="short-border" />
      <br />
      <p class="text-justify">
        Our working professionals are highly qualified in their respective
        fields to give you the best understanding in the form of a creative
        digital world, with over 15 years of combined experience of the senior
        staff. The group is trained to deliver you a customer-friendly and
        fully fledged website. Our team includes Website Developers, Project
        Coordinators, Client Relationship Managers, Project Managers,
        Technical Analysts, Content Writers, Artistic Heads, Web Marketing
        Strategists, and SEO executives, Digital Advertisers, Mobile App
        Developers, Social Media Executives, and Quality Analysts. Each
        individual from the team of
        <a href="overview">WAMP InfoTech Pvt. Ltd</a>. is a promising
        individual and deliver best services in their respective fields.
      </p>
      <!--
          <p class="center-align">
              Our group of working professionals are highly qualified in their respective fields to give you the best
              experience in the form of a creative digital world. The group is trained to deliver you a qualified and
              fully fledged website with, Website Developers, Project Coordinators, Client Relationship Management
              (CRM), Project Managers, Technical Analysts, Content Writers, Artistic Heads, Web Marketing
              Strategists, and SEO executives, Pay per Click (PPC) Services, Mobile App Developers, Social Media
              Executives, Google AdWords and Quality Analysts. Each individual from the team of WAMP InfoTech Pvt.
              Ltd. is a bunch of promising individuals.
          </p>
        -->
      <br />
      <!-- <div class="row"> -->
      <?php $team = getJson("./data/our-team.json", "our_team"); usort($team,
        function($a,$b) { return $a['order'] <=> $b['order']; }); foreach ($team
        as $member) { ?>

      <div class="divider"></div>
      <div class="section row">
        <br />
        <div class="col s12 m3 l2" id="<?=$member['id']?>">
          <div class="avatar border-radius-8 z-depth-2">
            <img src="<?=$member['src']?>" alt="<?=$member['title']?>" class="w-full responsive-img" />
          </div>
          <div class="center my-1">
            <?php if(isset($member['email'])) { ?>
            <a href="mailto:<?=$member['email']?>" class="waves-effect waves-light btn btn-flat bg-primary my-1">
              <i class="material-icons">email</i>
            </a>
            <?php } ?> <?php if(isset($member['linkedin'])) { ?>
            <a href="<?=$member['linkedin']?>" class="waves-effect waves-light btn btn-flat bg-primary my-1"
              target="_blank">
              <img
                src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiPz48IURPQ1RZUEUgc3ZnIFBVQkxJQyAiLS8vVzNDLy9EVEQgU1ZHIDEuMS8vRU4iICJodHRwOi8vd3d3LnczLm9yZy9HcmFwaGljcy9TVkcvMS4xL0RURC9zdmcxMS5kdGQiPjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiB3aWR0aD0iMjQiIGhlaWdodD0iMjQiIHZpZXdCb3g9IjAgMCAyNCAyNCI+PHBhdGggZmlsbD0iI2ZmZiIgZD0iTTIxLDIxSDE3VjE0LjI1QzE3LDEzLjE5IDE1LjgxLDEyLjMxIDE0Ljc1LDEyLjMxQzEzLjY5LDEyLjMxIDEzLDEzLjE5IDEzLDE0LjI1VjIxSDlWOUgxM1YxMUMxMy42Niw5LjkzIDE1LjM2LDkuMjQgMTYuNSw5LjI0QzE5LDkuMjQgMjEsMTEuMjggMjEsMTMuNzVWMjFNNywyMUgzVjlIN1YyMU01LDNBMiwyIDAgMCwxIDcsNUEyLDIgMCAwLDEgNSw3QTIsMiAwIDAsMSAzLDVBMiwyIDAgMCwxIDUsM1oiIC8+PC9zdmc+"
                style="margin:4px -4px 0px -4px" alt="linkedin" />
            </a>
            <?php } ?>
            <!--
                <button class="btn btn-flat waves-light waves-effect bg-primary my-1"><i class="material-icons">email</i></button>
                <button class="btn btn-flat waves-light waves-effect bg-primary my-1"><i class="material-icons">call</i></button>
              -->
          </div>
        </div>
        <div class="col s12 m9 l10">
          <h4 class="black-text mt-0 fw-500"><?=$member['title']?></h4>
          <h5><?=$member['role']?></h5>
          <p class="grey-text text-darken-1 text-justify"><?=$member['desc']?></p>
        </div>
      </div>
      <?php } ?>
      <!-- </div> -->
    </section>
    <?php include "layouts/footer.inc.html"; ?>
  </div>

  <?php include "includes/scripts.inc.php"; ?>
  <!-- <script src="ui-scripts/about.js"></script> -->
</body>

</html>