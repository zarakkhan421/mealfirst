<?php
include 'includes/db.php';
?>


<?php
$query = "SELECT * FROM category";
$select = mysqli_query($connection, $query);
$row = mysqli_fetch_assoc($select);
if (isset($_GET['cat_id'])) {
  $cat_id = $_GET['cat_id'];
} else {
  $cat_id = $row['cat_id'];
}
?>
<!doctype html>
<html lang="en">

<head>
  <title>MealFirst &mdash; Restaurant Website </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css?family=Playfair+Display:300,400,700,800|Open+Sans:300,400,700" rel="stylesheet">
  <link rel="icon" href="mf.png" type="image/png" size="50x50">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/animate.css">
  <link rel="stylesheet" href="css/owl.carousel.min.css">

  <link rel="stylesheet" href="css/magnific-popup.css">
  <link rel="stylesheet" href="css/aos.css">

  <link rel="stylesheet" href="css/bootstrap-datepicker.css">
  <link rel="stylesheet" href="css/jquery.timepicker.css">

  <link rel="stylesheet" href="fonts/ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="fonts/fontawesome/css/font-awesome.min.css">

  <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

  <!-- Theme Style -->
  <link rel="stylesheet" href="css/style.css">

</head>

<body class="bg-light">

  <body data-spy="scroll" data-target="#ftco-navbar-spy" data-offset="0">

    <div class="site-wrap">

      <nav class="site-menu" id="ftco-navbar-spy">
        <div class="site-menu-inner" id="ftco-navbar">
          <ul class="list-unstyled">
            <li><a href="#section-home">Home</a></li>
            <li><a href="#section-about">About Us</a></li>
            <li><a href="#section-menu">Our Menu</a></li>
            <li><a href="#section-reservation">Reserve A Table</a></li>
            <li><a href="#section-contact">Contact</a></li>
          </ul>
        </div>
      </nav>

      <header class="site-header">
        <div class="row align-items-center">
          <div class="col-5 col-md-3">

          </div>
          <div class="col-2 col-md-6 text-center site-logo-wrap">
            <a href="index.php" class="site-logo">M</a>
          </div>
          <div class="col-5 col-md-3 text-right menu-burger-wrap">
            <a href="#" class="site-nav-toggle js-site-nav-toggle"><i></i></a>

          </div>
        </div>

      </header> <!-- site-header -->

      <div class="main-wrap " id="section-home">

        <div class="cover_1 overlay bg-light">
          <div class="img_bg" style="background-image: url(images/slider-1.jpg);" data-stellar-background-ratio="0.5">
            <div class="container">
              <div class="row align-items-center justify-content-center text-center">
                <div class="col-md-10" data-aos="fade-up">
                  <h2 class="heading mb-5">Welcome to Meal</h2>
                  <p><a href="#section-reservation" class="smoothscroll btn btn-outline-white px-5 py-3">Reserve A Table</a></p>
                </div>
              </div>
            </div>
          </div>
        </div> <!-- .cover_1 -->

        <div class="section" data-aos="fade-up">
          <div class="container">
            <div class="row section-heading justify-content-center mb-5">
              <div class="col-md-8 text-center">
                <h2 class="heading mb-3">Find your best food</h2>
                <p class="sub-heading mb-5">Free Website Template For Restaurants Made by Colorlib</p>
              </div>
            </div>
            <div class="row">

              <div class="ftco-46">
                <div class="ftco-46-row d-flex flex-column flex-lg-row">
                  <div class="ftco-46-image" style="background-image: url(images/img_1.jpg);"></div>
                  <div class="ftco-46-text ftco-46-arrow-left">
                    <h4 class="ftco-46-subheading">Vegies</h4>
                    <h3 class="ftco-46-heading">Beef Empanadas</h3>
                    <p class="mb-5">Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
                    <p><a href="#" class="btn-link">Learn More <span class="ion-android-arrow-forward"></span></a></p>
                  </div>
                  <div class="ftco-46-image" style="background-image: url(images/img_2.jpg);"></div>
                </div>

                <div class="ftco-46-row d-flex flex-column flex-lg-row">
                  <div class="ftco-46-text ftco-46-arrow-right">
                    <h4 class="ftco-46-subheading">Food</h4>
                    <h3 class="ftco-46-heading">Buttermilk Chicken Jibaritos</h3>
                    <p class="mb-5">A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
                    <p><a href="#" class="btn-link">Learn More <span class="ion-android-arrow-forward"></span></a></p>
                  </div>
                  <div class="ftco-46-image" style="background-image: url(images/img_3.jpg);"></div>
                  <div class="ftco-46-text ftco-46-arrow-up">
                    <h4 class="ftco-46-subheading">Food</h4>
                    <h3 class="ftco-46-heading">Chicken Chimichurri Croquettes</h3>
                    <p class="mb-5">Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life.</p>
                    <p><a href="#" class="btn-link">Learn More <span class="ion-android-arrow-forward"></span></a></p>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div> <!-- .section -->

        <div class="section pb-3 bg-white" id="section-about" data-aos="fade-up">
          <div class="container">
            <div class="row align-items-center justify-content-center">
              <div class="col-md-12 col-lg-8 section-heading">
                <h2 class="heading mb-5">The Restaurant</h2>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
                <p>It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
              </div>
            </div>
          </div>
        </div> <!-- .section -->


        <div class="section bg-white pt-2 pb-2 text-center" data-aos="fade">
          <p><img src="images/bg_hero.png" alt="Image" class="img-fluid"></p>
        </div> <!-- .section -->

        <div class="section bg-white" data-aos="fade-up">
          <div class="container">
            <div class="row mb-5">
              <div class="col-md-12 section-heading text-center">
                <h2 class="heading mb-5">Meet The Chefs</h2>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 pr-md-5 text-center mb-5">
                <div class="ftco-38">
                  <div class="ftco-38-img">
                    <div class="ftco-38-header">
                      <img src="images/chef_1.jpg" alt="Image">
                      <h3 class="ftco-38-heading">Daniel Graham</h3>
                      <p class="ftco-38-subheading">Master Chef</p>
                    </div>
                    <div class="ftco-38-body">
                      <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
                      <p>Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean. It is a paradisematic country.</p>
                      <p>
                        <a href="#" class="p-2"><span class="fa fa-facebook"></span></a>
                        <a href="#" class="p-2"><span class="fa fa-twitter"></span></a>
                        <a href="#" class="p-2"><span class="fa fa-instagram"></span></a>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6 pl-md-5 text-center mb-5">
                <div class="ftco-38">
                  <div class="ftco-38-img">
                    <div class="ftco-38-header">
                      <img src="images/chef_2.jpg" alt="Image">
                      <h3 class="ftco-38-heading">Nick Browning</h3>
                      <p class="ftco-38-subheading">Master Chef</p>
                    </div>
                    <div class="ftco-38-body">
                      <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
                      <p>Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean. It is a paradisematic country.</p>
                      <p>
                        <a href="#" class="p-2"><span class="fa fa-facebook"></span></a>
                        <a href="#" class="p-2"><span class="fa fa-twitter"></span></a>
                        <a href="#" class="p-2"><span class="fa fa-instagram"></span></a>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
              <!-- <div class="col-md-4"></div> -->
            </div>
          </div>
        </div> <!-- .section -->

        <div class="section bg-light" id="section-menu" data-aos="fade-up">
          <div class="container">
            <div class="row section-heading justify-content-center mb-5">
              <div class="col-md-8 text-center">
                <h2 class="heading mb-3">Menu</h2>
              </div>
            </div>
            <div class="row justify-content-center">
              <div class="col-md-8">
                <?php

                $select = mysqli_query($connection, $query);
                ?>
                <ul class="nav site-tab-nav" id="menu">
                  <?php while ($row = mysqli_fetch_assoc($select)) : ?>
                    <li class="nav-item">
                      <a class="nav-link <?php if ($cat_id == $row['cat_id']) {
                                            echo "active";
                                          } ?>" href="index.php?cat_id=<?php echo $row['cat_id']; ?>#menu"><?php echo $row['cat_name']; ?></a>
                    </li>
                  <?php endwhile; ?>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                  <div class="tab-pane fade show active" id="pills-1" role="tabpanel" aria-labelledby="pills-breakfast-tab">
                    <?php
                    $query = "SELECT category.cat_id, menu.menu_id, category.cat_name, menu.menu_name, menu.menu_image, menu.menu_price, menu.menu_detail
                    FROM
                    category
                    INNER JOIN
                    menu_category_relationships ON category.cat_id=menu_category_relationships.cat_id
                    INNER JOIN 
                    menu ON menu_category_relationships.menu_id=menu.menu_id WHERE category.cat_id = $cat_id";
                    $select = mysqli_query($connection, $query);
                    ?>
                    <?php while ($row = mysqli_fetch_assoc($select)) : ?>
                      <div class="d-block d-md-flex menu-food-item">
                        <div class="text order-1 mb-3">
                          <img src="<?php echo 'uploads/original-' . $row['menu_image']; ?>" alt="Image">
                          <h3><a href="#"><?php echo $row['menu_name']; ?></a></h3>
                          <p><?php echo $row['menu_detail']; ?></p>
                        </div>
                        <div class="price order-2">
                          <strong>$<?php echo $row['menu_price']; ?></strong>
                        </div>
                      </div> <!-- .menu-food-item -->
                    <?php endwhile; ?>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div> <!-- .section -->

        <div class="section bg-white services-section" data-aos="fade-up">
          <div class="container">
            <div class="row section-heading justify-content-center mb-5">
              <div class="col-md-8 text-center">
                <h2 class="heading mb-3">Other Services</h2>
                <p class="sub-heading mb-5">Free Website Template For Restaurants Made by Colorlib</p>
              </div>
            </div>
            <div class="row">
              <div class="col-m mb-5d-6 col-lg-4" data-aos="fade-up">
                <div class="media feature-icon d-block text-center">
                  <div class="icon">
                    <span class="flaticon-soup"></span>
                  </div>
                  <div class="media-body">
                    <h3>Quality Cuisine</h3>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                  </div>
                </div>
              </div>
              <div class="col-md-6 col-lg-4 mb-5" data-aos="fade-up" data-aos-delay="100">
                <div class="media feature-icon d-block text-center">
                  <div class="icon">
                    <span class="flaticon-vegetables"></span>
                  </div>
                  <div class="media-body">
                    <h3>Fresh Food</h3>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                  </div>
                </div>
              </div>
              <div class="col-md-6 col-lg-4 mb-5" data-aos="fade-up" data-aos-delay="300">
                <div class="media feature-icon d-block text-center">
                  <div class="icon">
                    <span class="flaticon-pancake"></span>
                  </div>
                  <div class="media-body">
                    <h3>Bread &amp; Pancake</h3>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                  </div>
                </div>
              </div>
              <div class="col-md-6 col-lg-4 mb-5" data-aos="fade-up" data-aos-delay="500">
                <div class="media feature-icon d-block text-center">
                  <div class="icon">
                    <span class="flaticon-tray"></span>
                  </div>
                  <div class="media-body">
                    <h3>Reserve Now</h3>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                  </div>
                </div>
              </div>

              <div class="col-md-6 col-lg-4 mb-5" data-aos="fade-up" data-aos-delay="300">
                <div class="media feature-icon d-block text-center">
                  <div class="icon">
                    <span class="flaticon-salad"></span>
                  </div>
                  <div class="media-body">
                    <h3>Fresh Vegies Salad</h3>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                  </div>
                </div>
              </div>
              <div class="col-md-6 col-lg-4 mb-5" data-aos="fade-up" data-aos-delay="500">
                <div class="media feature-icon d-block text-center">
                  <div class="icon">
                    <span class="flaticon-chicken"></span>
                  </div>
                  <div class="media-body">
                    <h3>Whole Chicken</h3>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div> <!-- .section -->

        <div class="section bg-light" data-aos="fade-up" id="section-reservation">
          <div class="container">
            <div class="row section-heading justify-content-center mb-5">
              <div class="col-md-8 text-center">
                <h2 class="heading mb-3">Reservation</h2>
                <p class="sub-heading mb-5">Free Website Template For Restaurants Made by Colorlib</p>
              </div>
            </div>
            <div class="row justify-content-center">
              <div class="col-md-10 p-5 form-wrap">
                <form action="includes/reservation.php" method="post">
                  <div class="row mb-4">
                    <div class="form-group col-md-4">
                      <label for="name" class="label">Name</label>
                      <div class="form-field-icon-wrap">
                        <span class="icon ion-android-person"></span>
                        <input type="text" class="form-control" id="name" name="name">
                      </div>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="email" class="label">Email</label>
                      <div class="form-field-icon-wrap">
                        <span class="icon ion-email"></span>
                        <input type="email" class="form-control" id="email" name="email">
                      </div>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="phone" class="label">Phone</label>
                      <div class="form-field-icon-wrap">
                        <span class="icon ion-android-call"></span>
                        <input type="text" class="form-control" id="phone" name="phone">
                      </div>
                    </div>

                    <div class="form-group col-md-4">
                      <label for="persons" class="label">Number of Persons</label>
                      <div class="form-field-icon-wrap">
                        <span class="icon ion-android-arrow-dropdown"></span>
                        <select id="persons" class="form-control" name="count">
                          <option value="1">1 person</option>
                          <option value="2">2 persons</option>
                          <option value="3">3 persons</option>
                          <option value="4">4 persons</option>
                          <option value="5+">5+ persons</option>
                        </select>
                      </div>
                    </div>

                    <div class="form-group col-md-4">
                      <label for="date" class="label">Date</label>
                      <div class="form-field-icon-wrap">
                        <input type="date" class="form-control" name="date">
                      </div>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="time" class="label">Time</label>
                      <div class="form-field-icon-wrap">
                        <input type="time" class="form-control" name="time">
                      </div>
                    </div>
                  </div>
                  <div class="row justify-content-center">
                    <div class="col-md-4">
                      <input type="submit" name="submit" class="btn btn-primary btn-outline-primary btn-block" value="Reserve Now">
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div> <!-- .section -->

        <div class="section bg-white" data-aos="fade-up">
          <div class="container">
            <div class="row section-heading justify-content-center mb-5">
              <div class="col-md-8 text-center">
                <h2 class="heading mb-3">Customer Reviews</h2>
              </div>
            </div>
            <div class="row justify-content-center text-center" data-aos="fade-up">
              <div class="col-md-8">
                <div class="owl-carousel home-slider-loop-false">


                  <div class="item">
                    <blockquote class="testimonial">
                      <p>&ldquo;A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.&rdquo;</p>
                      <div class="author">
                        <img src="images/person_1.jpg" alt="Image placeholder" class="mb-3">
                        <h4>Maxim Smith</h4>
                        <p>CEO, Founder</p>
                      </div>
                    </blockquote>
                  </div>
                  <div class="item">
                    <blockquote class="testimonial">
                      <p>&ldquo;Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.&rdquo;</p>
                      <div class="author">
                        <img src="images/person_2.jpg" alt="Image placeholder" class="mb-3">
                        <h4>Geert Green</h4>
                        <p>CEO, Founder</p>
                      </div>
                    </blockquote>
                  </div>
                  <div class="item">
                    <blockquote class="testimonial">
                      <p>&ldquo;Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.&rdquo;</p>
                      <div class="author">
                        <img src="images/person_3.jpg" alt="Image placeholder" class="mb-3">
                        <h4>Dennis Roman</h4>
                        <p>CEO, Founder</p>
                      </div>
                    </blockquote>
                  </div>
                  <div class="item">
                    <blockquote class="testimonial">
                      <p>&ldquo;The Big Oxmox advised her not to do so, because there were thousands of bad Commas, wild Question Marks and devious Semikoli, but the Little Blind Text didn’t listen. She packed her seven versalia, put her initial into the belt and made herself on the way.&rdquo;</p>
                      <div class="author">
                        <img src="images/person_2.jpg" alt="Image placeholder" class="mb-3">
                        <h4>Geert Green</h4>
                        <p>CEO, Founder</p>
                      </div>
                    </blockquote>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div> <!-- .section -->

        <div class="section" data-aos="fade-up" id="section-contact">
          <div class="container">
            <div class="row section-heading justify-content-center mb-5">
              <div class="col-md-8 text-center">
                <h2 class="heading mb-3">Get In Touch</h2>
              </div>
            </div>
            <div class="row justify-content-center">
              <div class="col-md-10 p-5 form-wrap">
                <form action="includes/message.php" method="post">
                  <div class="row mb-4">
                    <div class="form-group col-md-4">
                      <label for="name" class="label">Name</label>
                      <div class="form-field-icon-wrap">
                        <span class="icon ion-android-person"></span>
                        <input type="text" class="form-control" id="name" name="name">
                      </div>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="email" class="label">Email</label>
                      <div class="form-field-icon-wrap">
                        <span class="icon ion-email"></span>
                        <input type="email" class="form-control" id="email" name="email">
                      </div>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="phone" class="label">Phone</label>
                      <div class="form-field-icon-wrap">
                        <span class="icon ion-android-call"></span>
                        <input type="text" class="form-control" id="phone" name="phone">
                      </div>
                    </div>

                    <div class="form-group col-md-12">
                      <label for="message" class="label">Message</label>
                      <textarea name="message" id="message" cols="30" rows="10" class="form-control"></textarea>
                    </div>
                  </div>
                  <div class="row justify-content-center">
                    <div class="col-md-4">
                      <input type="submit" name="submit" class="btn btn-primary btn-outline-primary btn-block" value="Send Message">
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div> <!-- .section -->

        <footer class="ftco-footer">
          <div class="container">

            <div class="row">
              <div class="col-md-4 mb-5">
                <div class="footer-widget">
                  <h3 class="mb-4">About Meal</h3>
                  <p>The Big Oxmox advised her not to do so, because there were thousands of bad Commas, wild Question Marks and devious Semikoli, but the Little Blind Text didn’t listen. </p>

                  <p><a href="#" class="btn btn-primary btn-outline-primary">Read More</a></p>
                </div>
              </div>
              <div class="col-md-4 mb-5">
                <div class="footer-widget">
                  <h3 class="mb-4">Lunch Service</h3>
                  <p>Booking from 12:00pm &mdash; 1:30pm</p>
                  <h3 class="mb-4">Dinner Service</h3>
                  <p>Everyday: <br> Booking from 6:00pm &mdash; 9:00pm</p>
                </div>
              </div>

              <div class="col-md-4">
                <div class="footer-widget">
                  <h3 class="mb-4">Follow Along</h3>
                  <ul class="list-unstyled social">
                    <li><a href="#"><span class="fa fa-tripadvisor"></span></a></li>
                    <li><a href="#"><span class="fa fa-twitter"></span></a></li>
                    <li><a href="#"><span class="fa fa-facebook"></span></a></li>
                    <li><a href="#"><span class="fa fa-instagram"></span></a></li>
                  </ul>
                </div>
                <div class="footer-widget">
                  <h3 class="mb-4">Newsletter</h3>
                  <form action="#" class="ftco-footer-newsletter">
                    <div class="form-group">
                      <button class="button"><span class="fa fa-envelope"></span></button>
                      <input type="email" class="form-control" placeholder="Enter Email">
                    </div>
                  </form>
                </div>
              </div>

            </div>

            <div class="row pt-5">
              <div class="col-md-12 text-center">
                <p>
                  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                  Copyright &copy;<script>
                    document.write(new Date().getFullYear());
                  </script> All rights reserved | This template is made with <i class="fa fa-heart text-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                </p>
              </div>
            </div>
          </div>
        </footer>

      </div>

      <!-- loader -->
      <div id="loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
          <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
          <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#ff7a5c" /></svg></div>

      <script src="js/jquery-3.2.1.min.js"></script>
      <script src="js/jquery-migrate-3.0.1.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/owl.carousel.min.js"></script>
      <script src="js/jquery.waypoints.min.js"></script>

      <script src="js/bootstrap-datepicker.js"></script>
      <script src="js/jquery.timepicker.min.js"></script>
      <script src="js/jquery.stellar.min.js"></script>

      <script src="js/jquery.easing.1.3.js"></script>

      <script src="js/aos.js"></script>


      <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>

      <script src="js/main.js"></script>

  </body>

</html>