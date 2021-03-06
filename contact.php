<!DOCTYPE html>
<html lang="en">

<head>
    <title>Contact | WAMP InfoTech</title>
    <meta name="description"
        content="We will give you clear information about our creative solutions. You can contact us on NUMBER or connect with us through the contact form on our website." />
    <meta name="keywords"
        content="contact wamp, wamp contact, wamp infotech contact, contact wamp infotech, digital marketing agency, web development company, digital marketing company" />

    <meta itemprop="url" content="https://www.wampinfotech.com/contact" />
    <meta property="og:url" content="https://www.wampinfotech.com/contact" />
    <meta itemprop="headline" content="Contact | WAMP InfoTech" />
    <meta property="og:title" content="Contact | WAMP InfoTech" />
    <meta property="og:description"
        content="We will give you clear information about our creative solutions. You can contact us on NUMBER or connect with us through the contact form on our website." />
    <meta name="twitter:site" content="https://www.wampinfotech.com/contact">
    <meta name="twitter:title" content="Contact | WAMP InfoTech">
    <meta name="twitter:description"
        content="We will give you clear information about our creative solutions. You can contact us on NUMBER or connect with us through the contact form on our website.">

    <?php include "includes/head.inc.php"; ?>
    <link rel="stylesheet" href="css/contact.css" />
</head>

<body>
    <?php include "layouts/nav.inc.html"; ?>
    <div class="scrollable grey lighten-3">
        <header>
            <img src="images/contactbanner.jpg" class="home-banner" alt="WAMP Banner" />
        </header>
        <section class="card-panel" id="contact">
            <h4 class="center-align fw-600">Contact Us</h4>
            <hr class="short-border" />
            <br />
            <div class="row">
                <div class="col s12 l4 push-l8 border-1 grey-border border-lighten-2 border-radius-8 p-0"
                    id="contact_form">
                    <div class="progress-holder hide">
                        <div class="progress">
                            <div class="indeterminate bg-primary"></div>
                        </div>
                    </div>
                    <div class="prevent-overlay hide full border-radius-8"></div>

                    <form class="validate px-4 py-2">

                        <div class="input-field"><input type="text" name="name" id="c_name" required
                                value="<?=@$_SESSION[name]?>">
                            <label for="c_name">
                                Name
                            </label>
                        </div>
                        <div class="input-field"><input type="email" name="email" id="c_email" required
                                value="<?=@$_SESSION[email]?>">
                            <label for="c_email">
                                Email
                            </label>
                        </div>
                        <div class="input-field"><input type="tel" name="number" id="c_number" required minlength="10"
                                maxlength="12" value="<?=@$_SESSION[number]?>">
                            <label for="c_number">
                                Number
                            </label>
                        </div>
                        <div class="input-field">
                            <select name="country">
                                <option value="" disabled selected>Choose your Country</option>
                                <option value="1">United States</option>
                                <option value="2">India</option>
                                <option value="3">Others</option>
                            </select>
                        </div>
                        <div class="input-field"><select name="service">
                                <option value="" disabled selected>Choose your Service</option>
                                <option value="Web Design">Web Design</option>
                                <option value="Web Development">Web Development</option>
                                <option value="Web App Development">Web App Development</option>
                                <option value="Software Development">Software Development</option>
                                <option value="Android Development">Android Development</option>
                                <option value="E-Commerce Solution">E-Commerce Solution</option>
                                <option value="Web Maintenance">Web Maintenance</option>
                                <option value="Tech Support">Tech Support</option>
                                <option value="Others">Others</option>
                            </select>

                        </div>
                        <div class="input-field">
                            <input type="text" name="company" id="c_company">
                            <label for="c_company">
                                Company
                            </label>
                        </div>
                        <div class="input-field">
                            <textarea id="c_message" class="materialize-textarea" data-length="100" required
                                name="message"></textarea>
                            <label for="c_message">Message</label>
                        </div>
                        <button type="submit" class="btn bg-primary white-text right">Send</button>
                        <br clear="both" />
                    </form>
                </div>
                <div class="col s12 l8 pull-l4">
                    <h6 class="mb-2"><strong>WAMP Infotech</strong></h6>
                    <div>Email: <a href="mailto:support@wampinfotech.com"
                            class="grey-text text-darken-2 fw-500">support@wampinfotech.com</a></div>
                    <div class="mb-4">Call Us: <a href="tel:+918376075908"
                            class="grey-text text-darken-2 fw-500 mr-4">+91-8376075908</a></div>
                    <p class="grey-text text-darken-2">C-23, near Dena Bank, South Extension-I, New Delhi- 110049</p>
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14015.453625052016!2d77.27247867726743!3d28.573864155478354!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xdf07264ac61cd280!2sWAMP+InfoTech+Pvt+Ltd!5e0!3m2!1sen!2sin!4v1541507859537"
                        allowfullscreen class="map"></iframe>
                </div>
            </div>
        </section>
        <!-- <section class="card-panel" id="address">
            <h4 class="center-align">Address</h4>
            <hr class="short-border" />
            <br />
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14015.453625052016!2d77.27247867726743!3d28.573864155478354!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xdf07264ac61cd280!2sWAMP+InfoTech+Pvt+Ltd!5e0!3m2!1sen!2sin!4v1541507859537"
            allowfullscreen class="map"></iframe>
            <br />
        </section> -->
        <?php include "layouts/footer.inc.html"; ?>
    </div>

    <?php include "includes/scripts.inc.php"; ?>
    <script src="ui-scripts/contact.js"></script>
</body>

</html>