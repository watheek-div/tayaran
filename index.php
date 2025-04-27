<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>طيران</title>
    <link rel="stylesheet" href="public-style.css" />
    <link rel="stylesheet" href="index-style.css" />
    <link
      href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700&display=swap"
      rel="stylesheet"
    />
  </head>
  <body>
    <script
      src="https://kit.fontawesome.com/b89d0a4b8f.js"
      crossorigin="anonymous"
    ></script>
    <?php
    require_once 'connection.php';
    if(isset($_GET['destination'])) {
      $departure_date = $_GET['departure-date'];
      $destination = $_GET['destination'];
      $departure_from = $_GET['departure-from'];
      echo "<script>console.log('$departure_date')</script>";
    } else {
      $departure_date = date('Y-m-d'); // Default to today's date
      $destination = 'المدينة'; // Default destination
      $departure_from = 'المدينة'; // Default departure location
    }
    ?>
    <header>
      <div>
        <div class="logo-container">
          <img
            width="70px"
            src="Assets/Icons/icons8_american_airlines_512px.png"
            alt=""
          />
          <h1>طيران</h1>
        </div>
        <ul>
          <li class="navigation-items"><a href="#about">نبذة</a></li>
          <li class="navigation-items">الرحلات</li>
          <li class="navigation-items"><a href="log-in.php">لوحة التحكم</a></li>
          <li class="navigation-items">عنا</li>
        </ul>
        <button class="log-in">تسجيل الدخول</button>
      </div>
    </header>
    <main>
      <section class="about" id="about">
        <p>حلق في سماء جديدة مع طيران! نحن نقدم لك تجربة سفر فريدة تجمع بين</p>
        <a href="#flights">احجز الآن</a>
      </section>
      <section class="services-section">
        <div class="service-item">
          <div class="service-text">
            <i class="fas fa-plane"></i>
            <h3>حجز الطيران</h3>
            <p>
              احجز رحلات محلية ودولية بأسعار تنافسية. نقدم مجموعة واسعة من
              خيارات الطيران مع أفضل شركات الطيران العالمية. استمتع برحلات مريحة
              وآمنة مع خدمة عملاء متميزة.
            </p>
            <ul class="service-features">
              <li><i class="fas fa-check"></i> حجز سريع وسهل</li>
              <li><i class="fas fa-check"></i> أسعار تنافسية</li>
              <li><i class="fas fa-check"></i> خيارات دفع متعددة</li>
            </ul>
          </div>
          <img
            class="service-image"
            height="500px"
            src="Assets/images/airplane-tickets-document-case-near-toy-aircraft-removebg-preview.png"
            alt=""
          />
        </div>
        <div class="service-item reverse">
          <div class="service-text">
            <i class="fas fa-tag"></i>
            <h3>أفضل العروض</h3>
            <p>
              استمتع بأفضل العروض والخصومات الحصرية على حجوزات الطيران. نقدم
              عروضاً موسمية وباقات سفر متكاملة تناسب جميع الميزانيات.
            </p>
            <ul class="service-features">
              <li><i class="fas fa-check"></i> خصومات موسمية</li>
              <li><i class="fas fa-check"></i> عروض حصرية</li>
              <li><i class="fas fa-check"></i> برنامج مكافآت</li>
            </ul>
          </div>
          <img
            class="service-image"
            height="500px"
            src="Assets/images/2150040398__2_-removebg-preview.png"
            alt=""
          />
        </div>
        <div class="service-item">
          <div class="service-text">
            <i class="fas fa-clock"></i>
            <h3>دعم على مدار الساعة</h3>
            <p>
              فريق خدمة العملاء متاح 24/7 لمساعدتك في كل ما تحتاج. نحن هنا
              للإجابة على استفساراتك وحل أي مشكلة قد تواجهك أثناء الحجز أو
              السفر.
            </p>
            <ul class="service-features">
              <li><i class="fas fa-check"></i> دعم فني متواصل</li>
              <li><i class="fas fa-check"></i> مساعدة فورية</li>
              <li><i class="fas fa-check"></i> خدمة عملاء احترافية</li>
            </ul>
          </div>
          <img
            class="service-image"
            height="500px"
            src="Assets/images/39927-removebg-preview.png"
            alt=""
          />
        </div>
      </section>
      <section class="flights-section" id="flights">
        <h2>احجز رحلتك الآن</h2>
        <form action="index.php" method="GET">
          <div class="flight-form">
            <div class="form-group">
              <label for="destination">الوجهة</label>
              <select name="destination" id="destination">
                <?php
                $sql = "SELECT DISTINCT destination FROM flights";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<option value='" . $row['destination'] . "'>" . $row['destination'] . "</option>";
                    }
                } else {
                    echo "<option value=''>لا توجد وجهات متاحة</option>";
                }
                ?>
              </select>
            </div>
            <div class="form-group">
              <label for="departure-from">مغادرة من</label>
              <select id="departure-from" name="departure-from">
                <?php
                $sql = "SELECT DISTINCT departure_from FROM flights";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<option value='" . $row['departure_from'] . "'>" . $row['departure_from'] . "</option>";
                    }
                } else {
                    echo "<option value=''>لا توجد وجهات متاحة</option>";
                }
                ?>
              </select>
            </div>
            <div class="form-group">
              <label for="departure-date">تاريخ المغادرة</label>
              <input type="date" name="departure-date" id="departure-date" />
            </div>
            <button type="submit">بحث</button>
          </div>
        </form>

        <table>
          <thead>
            <tr>
              <th>الوجهة</th>
              <th>مغادرة من</th>
              <th>ناريخ المغادر</th>
              <th>السعر</th>
              <th>احجز الآن</th>
            </tr>
          </thead>
          <tbody >
            <?php
            $sql = "SELECT * FROM flights where departure_date >= $departure_date and destination = '$destination' and departure_from = '$departure_from'";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['destination'] . "</td>";
                    echo "<td>" . $row['departure_from'] . "</td>";
                    echo "<td>" . $row['price'] . "</td>";
                    echo "<td>" . $row['departure_date'] . "</td>";
                    echo '<td><a href="book.php?id=' . $row['id'] . '">احجز الآن</a></td>';
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>لا توجد رحلات متاحة</td></tr>";
            }
            mysqli_close($conn);
            ?>
          </tbody>
        </table>
    </main>
    <script src="script.js"></script>
  </body>
</html>
