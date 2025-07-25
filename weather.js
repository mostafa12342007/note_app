const data = {
  tehran: {
    city: "تهران",
    temp: "۳۳°",
    status: "ابری",
    range: "۴۲° / ۲۰°",
    icon: "☁️",
    aqi: "71",
    forecast: [
      { day: "امروز", icon: "🌙", min: "۲۰°", max: "۴۲°" },
      { day: "فردا", icon: "☀️", min: "۱۹°", max: "۳۹°" },
      { day: "شنبه", icon: "☀️", min: "۱۹°", max: "۳۷°" }
    ]
  },
  qazvin: {
    city: "قزوین",
    temp: "۳۱°",
    status: "آفتابی",
    range: "۴۰° / ۱۸°",
    icon: "☀️",
    aqi: "68",
    forecast: [
      { day: "امروز", icon: "☀️", min: "۱۸°", max: "۴۰°" },
      { day: "فردا", icon: "☀️", min: "۱۷°", max: "۳۸°" },
      { day: "شنبه", icon: "⛅️", min: "۱۸°", max: "۳۶°" }
    ]
  }
};

function switchCity(city) {
  const w = data[city];
  const box = document.getElementById("weather-box");
  box.innerHTML = 
    <div class="city-name">${w.city}</div>
    <div class="temp">${w.temp}</div>
    <div class="icon">${w.icon}</div>
    <div class="status">${w.status} ${w.range}</div>
    <div class="aqi">AQI ${w.aqi}</div>

    <div class="forecast">
      <h3>پیش‌بینی ۳ روزه</h3>
      ${w.forecast.map(item => 
        <div class="forecast-item">
          <span>${item.day}</span>
          <span>${item.icon}</span>
          <span>${item.min} / ${item.max}</span>
        </div>
      ).join("")}
    </div>
  ;
}

switchCity("tehran");