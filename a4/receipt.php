<!DOCTYPE html>
<html lang='en'>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Assignment 4</title>

  <!-- tools.php module is -->
  <?php
  include("tools.php");
  if (empty($_SESSION)) {
    header("Location: index.php");
  } else {
    $booking = processReceiptPage();
    deleteStorage();
  }
  ?>

  <!-- Keep wireframe.css for debugging, add your css to style.css -->
  <link id='wireframecss' type="text/css" rel="stylesheet" href="../wireframe.css" disabled>
  <link id='stylecss' type="text/css" rel="stylesheet" href="../style.css">



  <!-- Add css file and links for google fonts -->
  <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900" rel="stylesheet" />
  <link rel="stylesheet" href="style.css">
  <script src="scripts/receipt.js"></script>
  <script src='../wireframe.js'></script>



</head>

<body>
  <header class="not-printable">
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

  <!-- debug module is here -->
  <main>
    <section id="invoice-section" class="printable">
      <div id="invoice-container" class="printable">
        <div id="invoice-header">
          <div id="invoice-header__brand">
            <img src="media/logo_transparent.png">
            <div>
              Cinemax
              <span id="header__slogan">-Hollywood in town- </span>
            </div>
          </div>
          <div id="invoice-header__company-info">
            130 Tran Nguyen Han <br>
            Nha Trang, Khanh Hoa, VN <br>
            +84 123456789 <br>
            Cinemax.hd.rmit.edu.vn <br>
            ABN - 00 123 456 789
          </div>
        </div>
        <hr class="invoice-section__line-break">
        <div id="invoice-info">
          <div>
            <div id="invoice-info__id">Invoice # 123</div>
            <div id="invoice-info__date">Date Issued: <?php echo $booking['date']; ?></div>
            <div id="invoice-info__movie">Movie: <?php echo getMovieName($booking['movieId']) . ' / ' . $booking['movieDay'] . '-' . $booking['movieHour']; ?></div>
          </div>
          <div id="invoice-info__customer">
            <div id="invoice-info__customer__name"><?php echo $booking['name']; ?></div>
            <div id="invoice-info__customer__email"><?php echo $booking['email']; ?></div>
            <div id="invoice-info__customer__mobile"><?php echo $booking['mobile']; ?></div>
          </div>
        </div>
        <div id="invoice-details">
          <table id="invoice-details__table">
            <tr>
              <th>Seat Code</th>
              <th>Quantity</th>
              <th>Price</th>
              <th>Sub Total</th>
            </tr>
            <tr>
              <td>STA</td>
              <td><?php echo $booking['STA']; ?></td>
              <td><?php echo '$' . (isDiscounted($booking) ? '14.00' : '19.80'); ?></td>
              <td><?php echo '$' . (isDiscounted($booking) ? number_format(14.00 * $booking['STA'], 2, '.', ' ') : number_format(19.80 * $booking['STA'], 2, '.', ' ')); ?></td>
            </tr>
            <tr>
              <td>STP</td>
              <td><?php echo $booking['STP']; ?></td>
              <td><?php echo '$' . (isDiscounted($booking) ? '12.50' : '17.50'); ?></td>
              <td><?php echo '$' . (isDiscounted($booking) ? number_format(12.50 * $booking['STP'], 2, '.', ' ') : number_format(17.50 * $booking['STP'], 2, '.', ' ')); ?></td>
            </tr>
            <tr>
              <td>STC</td>
              <td><?php echo $booking['STC']; ?></td>
              <td><?php echo '$' . (isDiscounted($booking) ? '11.00' : '15.30'); ?></td>
              <td><?php echo '$' . (isDiscounted($booking) ? number_format(11.00 * $booking['STC'], 2, '.', ' ') : number_format(15.30 * $booking['STC'], 2, '.', ' ')); ?></td>
            </tr>
            <tr>
              <td>FCA</td>
              <td><?php echo $booking['FCA']; ?></td>
              <td><?php echo '$' . (isDiscounted($booking) ? '24.00' : '30.00'); ?></td>
              <td><?php echo '$' . (isDiscounted($booking) ? number_format(24.00 * $booking['FCA'], 2, '.', ' ') : number_format(30.00 * $booking['FCA'], 2, '.', ' ')); ?></td>
            </tr>
            <tr>
              <td>FCP</td>
              <td><?php echo $booking['FCP']; ?></td>
              <td><?php echo '$' . (isDiscounted($booking) ? '22.50' : '27.00'); ?></td>
              <td><?php echo '$' . (isDiscounted($booking) ? number_format(22.50 * $booking['FCP'], 2, '.', ' ') : number_format(27.00 * $booking['FCP'], 2, '.', ' ')); ?></td>
            </tr>
            <tr>
              <td>FCC</td>
              <td><?php echo $booking['FCC']; ?></td>
              <td><?php echo '$' . (isDiscounted($booking) ? '21.00' : '24.00'); ?></td>
              <td><?php echo '$' . (isDiscounted($booking) ? number_format(21.00 * $booking['FCC'], 2, '.', ' ') : number_format(24.00 * $booking['FCC'], 2, '.', ' ')); ?></td>
            </tr>
          </table>
        </div>
        <div id="invoice-total">
          Total Amount: <span id="invoice-total__amount"><?php echo '$' . number_format($booking['total'], 2, '.', ' '); ?></span> <br>
          GST: <span id="invoice-total__GST"><?php echo '$' . number_format((1 / 11) * $booking['total'], 2, '.', ' '); ?></span> <br>
          Total Balance: <span id="invoice-total__balance"><?php echo '$' . number_format((12 / 11) * $booking['total'], 2, '.', ' '); ?></span>
        </div>
      </div>
    </section>
    <!-- Ticket section -->
    <session id="tickets-section">
      <div id="tickets__buttons-container" class="not-printable">
        <button onClick="switchTicketType(this)">Group Ticket</button>
        <button onClick="switchTicketType(this)">Individual Tickets</button>
      </div>
      <div id="tickets-container">
      </div>

    </session>
  </main>

  <hr style="border-color: #d0ffa3" class="not-printable">
  <footer class="not-printable">
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

  <div style="font-size: 2rem" class="not-printable">
    Debug Module
    <br>
    <?php
    echo "GET: ";
    preShow($_GET);
    echo "POST: ";
    preShow($_POST);
    echo "SESSION: ";
    preShow($_SESSION);
    echo "PAGE CODE: ";
    printMyCode();
    session_unset();
    ?>
  </div>

</body>

</html>