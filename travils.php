<!DOCTYPE html>
<html lang="ar" dir="rtl">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>لوحة التحكم</title>
    <link rel="stylesheet" href="public-style.css" />
    <link rel="stylesheet" href="control-panel.css" />
    <link rel="stylesheet" href="manage.css" />
  </head>
  <body>
    <?php
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "tayaran";
    $conn = mysqli_connect($server, $username, $password, $database);
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }else{
    $query = "SELECT * FROM flights";
    $result = mysqli_query($conn, $query);
    }

    ?>
    <div class="grid-container">
      <header class="header">
        <div class="logo-container">
          <img
            width="70px"
            src="Assets/Icons/icons8_american_airlines_512px.png"
            alt=""
          />
          <h1>طيران</h1>
        </div>
        <nav>
          <!-- <ul>
                    <li><a href="#">الصفحة الرئيسية</a></li>
                    <li><a href="#">من نحن</a></li>
                    <li><a href="#">الخدمات</a></li>
                    <li><a href="#">اتصل بنا</a></li>
                </ul> -->
        </nav>
      </header>

      <aside class="sidebar">
        <ul>
          <li><a href="#">الرئيسية</a></li>
          <li><a href="#" class="active">قاعدة البيانات</a></li>
          <li><a href="#">رابط 3</a></li>
          <li><a href="#">رابط 4</a></li>
        </ul>
      </aside>

      <main class="main-content">
        <div class="input-container"></div>
          <form action="">
            <div class="input-group">
              <label for="destination">الوجهة</label>
              <input type="text" id="destination" name="destination" />
            </div>
            <div class="input-group">
              <label for="departure">مغادرة من</label>
              <input type="text" id="departure" name="departure" />
            </div>
            <div class="input-group">
              <label for="airline">شركة الطيران</label>
              <input type="text" id="airline" name="airline" />
            </div>
            <div class="input-group">
              <label for="price">السعر</label>
              <input type="number" id="price" name="price" />
            </div>
            <div class="input-group">
              <label for="departure-date">تاريخ الاقلاع</label>
              <input type="date" id="departure-date" name="departure-date" />
            </div>
            <div class="input-group">
              <label for="arrival-date">تاريخ الوصول</label>
              <input type="date" id="arrival-date" name="arrival-date" />
            </div>
            <button type="submit">إضافة</button>
          </form>
 
        
        <table>
          <thead>
            <tr>
              <th>الرقم</th>
              <th>الوجهة</th>
              <th>مغادرة من</th>
              <th>شركة الطيران</th>
              <th>السعر</th>
              <th>تاريخ الاقلاع</th>
              <th>تاريخ الوصول</th>
              <th colspan="2">sdas</th>
            </tr>
          </thead>
          <tbody>
            <?php
            if ($result) {
              while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['destination'] . "</td>";
                echo "<td>" . $row['departure_from'] . "</td>";
                echo "<td>" . $row['airline'] . "</td>";
                echo "<td>" . $row['price'] . "</td>";
                echo "<td>" . $row['departure_date'] . "</td>";
                echo "<td>" . $row['arrival_date'] . "</td>";
                echo '<td><img class="action" src="Assets/Icons/icons8_edit_96px.png" alt="Edit" /></td>';
                echo '<td><img class="action" src="Assets/Icons/icons8_delete_96px.png" alt="Delete" /></td>';
                echo "</tr>";
              }
            } else {
              echo "Error: " . mysqli_error($conn);
            }
            mysqli_close($conn);
            ?>
          </tbody>
        </table>
      </main>
    </div>
  </body>
</html>
