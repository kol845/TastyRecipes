<!DOCTYPE html>
<html lang = "en">
<head>
    <link rel="stylesheet" type="text/css" href="resources/css/reset.css">
    <link rel="stylesheet" type="text/css" href="resources/css/main.css">
    <link rel="stylesheet" type="text/css" href="resources/css/calendar.css">
    <meta charset="UTF-8">
    <?php
    include "../fragments/header.php";     

    ?>
    <title>Calendar</title>
</head>
<body>

    <?php
    session_start();
     showHeader(3); ?>

<div class = "header">
  <p class = "date">November</p>
  <p class = "date">2018</p>
</div>



<div class="flex-grid">
  <div class="days">Monday</div>
  <div class="days">Tuesday</div>
  <div class="days">Wednesday</div>
  <div class="days">Thursday</div>
  <div class="days">Friday</div>
  <div class="days">Saturday</div>
  <div class="days">Sunday</div>
</div>
<div class="flex-grid">
  <div class="box-for-old-month">29</div>
  <div class="box-for-old-month">30</div>
  <div class="box-for-old-month">31</div>
  <div class="box">1</div>
  <div class="box">2</div>
  <div class="box">3</div>
  <div class="box">4</div>
</div>
<div class="flex-grid">
  <div class="box">5</div>
  <div class="box">6
    <a href="resources/views/recipe1.php"><img src="https://truffle-assets.imgix.net/pxqrocxwsjcc_2EcZowoTZeyUaqG4gosWkM_sweet-spicy-meatballs_landscapeThumbnail_en.png"
     alt="Meatballs"></a>

  </div>
  <div class="box">7</div>
  <div class="box">8</div>
  <div class="box">9</div>
  <div class="box">10</div>
  <div class="box">11</div>
</div>
<div class="flex-grid">
  <div class="box">12</div>
  <div class="box">13</div>
  <div class="box">14
    <a href="resources/views/recipe2.php"><img src="https://www.graceandgoodeats.com/wp-content/uploads/2015/01/homemade-pancakes.jpg" alt="Pancakes">
    </a>
  </div>
  <div class="box">15</div>
  <div class="box">16</div>
  <div class="box">17</div>
  <div class="box">18</div>
</div>
<div class="flex-grid">
  <div class="box">19</div>
  <div class="box">20</div>
  <div class="box">21</div>
  <div class="box">22</div>
  <div class="box">23</div>
  <div class="box">24</div>
  <div class="box">25</div>
</div>


</body>
</html>
