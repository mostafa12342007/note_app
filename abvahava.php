<!DOCTYPE html>
<html lang="fa">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>پیش‌بینی هوای قزوین</title>
  <style>
    body {
      font-family: 'Tahoma', sans-serif;
      background: linear-gradient(135deg, #0f2027, #203a43, #2c5364);
      color: #fff;
      margin: 0;
      padding: 20px;
    }
    h1 {
      text-align: center;
      margin-bottom: 30px;
    }
    .forecast {
      display: flex;
      justify-content: space-between;
      gap: 15px;
      flex-wrap: wrap;
    }
    .day-card {
      background: rgba(255, 255, 255, 0.07);
      border-radius: 15px;
      padding: 15px;
      flex: 1 0 18%;
      display: flex;
      flex-direction: column;
      align-items: center;
      transition: 0.3s ease;
      box-shadow: 0 0 10px rgba(0,0,0,0.2);
    }
    .day-card:hover {
      background: rgba(255, 255, 255, 0.12);
      transform: scale(1.05);
    }
    .date {
      font-size: 15px;
      margin-bottom: 10px;
      font-weight: bold;
    }
    .weather-block {
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 5px 0;
    }
    .icon {
      font-size: 24px;
      margin-left: 8px;
    }
    .temp {
      font-size: 18px;
    }
    .wind {
      font-size: 13px;
      opacity: 0.85;
      margin-top: 5px;
    }
  </style>
</head>
<body>

  <h1>پیش‌بینی ۵ روز آینده قزوین</h1>
  <div class="forecast">
    <div class="day-card">
      <div class="date">جمعه<br>3 مرداد</div>
      <div class="weather-block">
        <span class="icon">☀️</span><span class="temp">۴۱°</span>
      </div>
      <div class="weather-block">
        <span class="icon">🌙</span><span class="temp">۱۸°</span>
      </div>
      <div class="wind">۷.۴ km/h ↑</div>
    </div>
    <div class="day-card">
      <div class="date">شنبه<br>4 مرداد</div>
      <div class="weather-block">
        <span class="icon">☀️</span><span class="temp">۳۷°</span>
      </div>
      <div class="weather-block">
        <span class="icon">🌙</span><span class="temp">۱۹°</span>
      </div>
      <div class="wind">۹.۳ km/h ↖️</div>
    </div>
    <div class="day-card">
      <div class="date">یکشنبه<br>5 مرداد</div>
      <div class="weather-block">
        <span class="icon">⛅️</span><span class="temp">۳۷°</span>
      </div>
      <div class="weather-block">
        <span class="icon">🌙</span><span class="temp">۲۱°</span>
      </div>
      <div class="wind">۹.۳ km/h ↑</div>
    </div>
    <div class="day-card">
      <div class="date">دوشنبه<br>6 مرداد</div>
      <div class="weather-block">
        <span class="icon">☀️</span><span class="temp">۳۸°</span>
      </div>
      <div class="weather-block">
        <span class="icon">🌙</span><span class="temp">۲۳°</span>
      </div>
      <div class="wind">۹.۳ km/h ↑</div>
    </div>
    <div class="day-card">
      <div class="date">سه شنبه<br>7 مرداد</div>
      <div class="weather-block">
        <span class="icon">⛅️</span><span class="temp">۳۹°</span>
      </div>
      <div class="weather-block">
        <span class="icon">🌙</span><span class="temp">۲۱°</span>
      </div>
      <div class="wind">۱۱.۱ km/h ↑</div>
    </div>
  </div>

</body>
</html>