<!DOCTYPE html>
<html lang='en'>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Assignment 4</title>

  <!-- Keep wireframe.css for debugging, add your css to style.css -->
  <link id='wireframecss' type="text/css" rel="stylesheet" href="../wireframe.css" disabled>
  <link id='stylecss' type="text/css" rel="stylesheet" href="../style.css">



  <!-- Add css file and links for google fonts -->
  <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900" rel="stylesheet" />
  <link rel="stylesheet" href="style.css">
  <script src="scripts/index.js"></script>
  <script src='../wireframe.js'></script>

  <?php
  include("tools.php");
  list($cust, $nameErr, $emailErr, $mobileErr, $cardErr, $expiryErr, $seatErr, $movieErr) = validateData();
  ?>

</head>

<body>
  <header>
    <div>
      <div>
        <img id="header__logo" src="media/logo_transparent.png">
      </div>
      <div id="header__brand-container">
        <h1 id="header__brand"> CINEMAX </h1>
        <span id="header__slogan">- Hollywood in town - </span>
      </div>
    </div>
    <hr id="header__underline">
  </header>

  <nav id="navbar">
    <div id="navbar__container">
      <ul id="navbar__list">
        <li class="navbar__item"><a id="home_link" class="current_link" onclick="addCurrentLinkEffect(this);" href="#">Home</a></li>
        <li class="navbar__item"><a id="about-us_link" onclick="addCurrentLinkEffect(this);" href="#about-us-section">About Us</a></li>
        <li class="navbar__item"><a id="price_link" onclick="addCurrentLinkEffect(this);" href="#price-section">Prices</a></li>
        <li class="navbar__item"><a id="now-showing_link" onclick="addCurrentLinkEffect(this);" href="#now-showing-section">Now Showing</a></li>
      </ul>
    </div>
  </nav>

  <main>
    <!-- ABOUT-US SECTION -->
    <section id="about-us-section" class="section-container section-container--about">
      <div id="intro-info">
        <h2 class="heading-primary heading-primary--main u-margin-top-medium">GRAND REOPENING</h2>
        <h3 class="heading-primary heading-primary--sub">Extensive Improvements and Renovations</h3>
      </div>

      <div class="u-margin-bottom-huge">
        <h2 class="heading-secondary">New Seats</h2>
        <hr class="h2-underline">
        <div class="row">
          <div class="col-1-of-2">
            <div class="card">
              <div class="card__image">
                <img src="media/standard-seat.jpg">
              </div>
              <h3 class="heading-tertinary">Standard</h3>
            </div>
          </div>
          <div class="col-1-of-2">
            <div class="card">
              <div>
                <img class="card__image" src="media/premium-seat.jpg">
              </div>
              <h3 class="heading-tertinary">First class</h3>
            </div>
          </div>
        </div>
      </div>

      <h2 class="heading-secondary">New Technology</h2>
      <hr class="h2-underline u-margin-bottom-large">
      <div id="dolby-info">
        <div>
          <h2 class="u-margin-bottom-medium">NEW PROJECTION AND SOUND SYSTEMS</h2>
          <h3 class="u-margin-bottom-small">- 3D Dolby Vision projection -</h3>
          <h3 class="u-margin-bottom-medium">- Dolby Atmos sound -</h3>
          <a href="https://www.dolby.com/us/en/cinema " target="_blank" class="btn-text">Learn More</a>
        </div>
      </div>
    </section>

    <!-- PRICE SECTION -->
    <section id="price-section" class="section-container section-container--price">
      <div class="u-margin-top-medium">
        <h2 class="heading-secondary">Prices</h2>
        <hr class="h2-underline">
      </div>
      <div id="table-container" class="u-margin-to-medium">
        <table id="price-table">
          <tr>
            <th>Seat Type</th>
            <th>Seat Code</th>
            <th>Every Monday & Wednesday
              <br> AND at 12pm on other weekdays
            </th>
            <th>All other times</th>
          </tr>
          <tr>
            <td>Standard Adult</td>
            <td>STA</td>
            <td>$14.00</td>
            <td>$19.80</td>
          </tr>
          <tr>
            <td>Standard Concession</td>
            <td>STP</td>
            <td>$12.50</td>
            <td>$17.50</td>
          </tr>
          <tr>
            <td>Standard Child</td>
            <td>STC</td>
            <td>$11.00</td>
            <td>$15.30</td>
          </tr>
          <tr>
            <td>First Class Adult</td>
            <td>FCA</td>
            <td>$24.00</td>
            <td>$30.00</td>
          </tr>
          <tr>
            <td>First Class Concession</td>
            <td>FCP</td>
            <td>$22.50</td>
            <td>$27.00</td>
          </tr>
          <tr>
            <td>First Class Child</td>
            <td>FCC</td>
            <td>$21.00</td>
            <td>$24.00</td>
          </tr>
        </table>
      </div>
    </section>

    <!-- NOW-SHOWING SECTION -->
    <section id="now-showing-section" class="section-container section-container--now-showing">
      <div>
        <h2 class="heading-secondary"> Now Showing </h2>
        <hr class="h2-underline">
      </div>

      <div id="panel-container">
        <div class="panel" onClick="panelOnClickHandler(this, 0)">
          <div class="panel__poster">
            <img src="media/avegers.jpg">
          </div>
          <div class="panel__content">
            <div class="panel__content__title">Avengers: Endgame</div>
            <div class="panel__content__rating">PG</div>
            <div class="panel__content__schedule">
              Monday - N/A <br>
              Tuesday - N/A <br>
              Wednesday - 9pm <br>
              Thursday - 9pm <br>
              Friday - 9pm <br>
              Saturday - 6pm <br>
              Sunday - 6pm <br>
            </div>
          </div>
        </div>

        <div class="panel" onClick="panelOnClickHandler(this, 1)">
          <div class="panel__poster">
            <img src="media/wedding.jpg">
          </div>
          <div class="panel__content">
            <div class="panel__content__title">Top End Wedding</div>
            <div class="panel__content__rating">M</div>
            <div class="panel__content__schedule">
              Monday - 6pm <br>
              Tuesday - 6pm <br>
              Wednesday - N/A <br>
              Thursday - N/A <br>
              Friday - N/A <br>
              Saturday - 3pm <br>
              Sunday - 3pm <br>
            </div>
          </div>
        </div>
        <div class="panel" onClick="panelOnClickHandler(this, 2)">
          <div class="panel__poster">
            <img src="media/dumbo.jpg">
          </div>
          <div class="panel__content">
            <div class="panel__content__title">Dumbo</div>
            <div class="panel__content__rating">PG</div>
            <div class="panel__content__schedule">
              Monday - 12pm <br>
              Tuesday - 12pm <br>
              Wednesday - 6pm <br>
              Thursday - 6pm <br>
              Friday - 6pm <br>
              Saturday - 12pm <br>
              Sunday - 12pm <br>
            </div>
          </div>
        </div>

        <div class="panel" onClick="panelOnClickHandler(this, 3)">
          <div class="panel__poster">
            <img src="media/happy-prince.jpg">
          </div>
          <div class="panel__content">
            <div class="panel__content__title">The Happy Prince</div>
            <div class="panel__content__rating">R</div>
            <div class="panel__content__schedule">
              Monday - N/A <br>
              Tuesday - N/A <br>
              Wednesday - 12pm <br>
              Thursday - 12pm <br>
              Friday - 12pm <br>
              Saturday - 9pm <br>
              Sunday - 9pm <br>
            </div>
          </div>
        </div>
      </div>
      <div id="synopsis" class="invisible">
        <div id="synopsis-box">
          <div id="synopsis__content">
            <div id="synopsis__content__title"></div>
            <div id="synopsis__content__rating"></div>

            <div id="synopsis__content__plot">
            </div>
          </div>
          <div id="synopsis__trailer">
            <iframe id="synopsis__trailer__video" width="580" height="400" src="https://www.youtube.com/embed/TcMBFSGVi1c" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
          </div>
          <div id="synopsis__booking-bar">
            <h2>
              Make A Booking:
            </h2>
            <div id="booking-button__container">
              <a href="#booking-form" class="synopsis__booking-bar__button" onClick="updateBookingForm(this)"></a>
              <a href="#booking-form" class="synopsis__booking-bar__button" onClick="updateBookingForm(this)"></a>
              <a href="#booking-form" class="synopsis__booking-bar__button" onClick="updateBookingForm(this)"></a>
              <a href="#booking-form" class="synopsis__booking-bar__button" onClick="updateBookingForm(this)"></a>
              <a href="#booking-form" class="synopsis__booking-bar__button" onClick="updateBookingForm(this)"></a>
              <a href="#booking-form" class="synopsis__booking-bar__button" onClick="updateBookingForm(this)"></a>
              <a href="#booking-form" class="synopsis__booking-bar__button" onClick="updateBookingForm(this)"></a>
            </div>
          </div>
        </div>
      </div>

      <div id="booking-form-container" class="invisible">
        <form id="booking-form" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
          <div class="input-box input-box--left">
            <input type=hidden id="movie-id" name="movie[id]" value="ACT">
            <input type=hidden id="movie-day" name="movie[day]" value="MON">
            <input type=hidden id="movie-hour" name="movie[hour]" value="T12">
            <div id="movie-title">
            </div>
            <fieldset class="seats-selection-box">
              <legend class="seat-type">Standard</legend>
              <label for="seats[STA]">Adults:</label>
              <select id="seats-STA" name="seats[STA]" onChange="updateTotalAmount(this)">
                <option value="">please select</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
              </select><br>

              <label for="seats[STP]">Concession:</label>
              <select id="seats-STP" name="seats[STP]" onChange="updateTotalAmount(this)">
                <option value="">please select</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
              </select><br>
              <label for="seats[STC]">Children:</label>
              <select id="seats-STC" name="seats[STC]" onChange="updateTotalAmount(this)">
                <option value="">please select</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
              </select><br>
            </fieldset>
            <fieldset class="seats-selection-box">
              <legend class="seat-type">First class</legend>
              <label for="seats[FCA]">Adults:</label>
              <select id="seats-FCA" name="seats[FCA]" onChange="updateTotalAmount(this)">
                <option value="">please select</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
              </select><br>

              <label for="seats[FCP]">Concession:</label>
              <select id="seats-FCP" name="seats[FCP]" onChange="updateTotalAmount(this)">
                <option value="">please select</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
              </select><br>
              <label for="seats[FCC]">Children:</label>
              <select id="seats-FCC" name="seats[FCC]" onChange="updateTotalAmount(this)">
                <option value="">please select</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
              </select><br>
            </fieldset>
            <div id="total-amount-box">
              Total $ <span id="total-amount">0</span> <br>
              <span class="err_message"><?php echo $seatErr; ?></span>
              <span class="err_message"><?php echo $movieErr; ?></span>

            </div>
          </div>
          <div class="input-box input-box--right">
            <div id="customer-info-box">
              <label for="cust[name]">Name</label>
              <input type="text" id="cust-name" name="cust[name]" value="<?php echo $cust["name"] ?>"> <br>
              <span class="err_message"><?php echo $nameErr; ?></span> <br>

              <label for="cust[email]">Email</label>
              <input type="email" id="cust-email" name="cust[email]" value="<?php echo $cust["email"] ?>"> <br>
              <span class="err_message"><?php echo $emailErr; ?></span> <br>

              <label for="cust[mobile]">Mobile</label>
              <input type="tel" id="cust-mobile" name="cust[mobile]" value="<?php echo $cust["mobile"] ?>"> <br>
              <span class="err_message"><?php echo $mobileErr; ?></span> <br>

              <label for="cust[card]">Credit Card</label>
              <input type="text" id="cust-card" name="cust[card]" value="<?php echo $cust["card"] ?>"> <br>
              <span class="err_message"><?php echo $cardErr; ?></span> <br>

              <div style="padding-left: 8rem ">
                <label for="cust[expiry]">Expiry</label>
                <input type="month" id="cust-expiry" name="cust[expiry]" value="<?php echo $cust["expiry"] ?>" onClick="updateCurrentTime()"> <br>
                <span class="err_message"><?php echo $expiryErr; ?></span> <br>
              </div>

            </div>
            <div>
              <input type="submit" id="order" name="order" value="Order" onclick="onSubmit()"> <br>
            </div>
          </div>
        </form>
    </section>
  </main>

  <footer>
    <div>
      Phone: +84 123456789 <br>
      Contact Email: cinemax@gmail.com <br>
      Address: 130 Tran Nguyen Han, Nha Trang, Khanh Hoa, Vietnam <br>
      <a href="https://github.com/s3695516/wp.git" style="color: yellow" target="_blank">Git Hub Repo Link - Click Here
        </Cick> </a>
    </div>
    <hr style="border-color: #d0ffa3; margin: 20px 0px;">
    <div>
      &copy;
      <script>
        document.write(new Date().getFullYear());
      </script>
      Group 2: Le Quang Hien - s3695516 and Dang Ba Minh - s3685119. Last modified
      <?= date("Y F d  H:i", filemtime($_SERVER['SCRIPT_FILENAME'])); ?>.
    </div>
    <div>Disclaimer: This website is not a real website and is being developed as part of a School of Science Web
      Programming course at RMIT University in Melbourne, Australia.
    </div>
    <div><button id='toggleWireframeCSS' onclick='toggleWireframe()'>Toggle Wireframe CSS</button></div>
  </footer>


  <div style="font-size: 18px">
    <-- Debug Module -->
      <br>
      <?php
      echo "GET: ";
      preShow($_GET);
      echo "POST: ";
      preShow($_POST);
      echo "SESSION: ";
      preShow($_SESSION);
      echo "PAGE CODE: ";
      printMyCode()
      ?>
  </div>

</body>

</html>