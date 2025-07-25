<!DOCTYPE html>
<html lang="fa">
<head>
  <meta charset="UTF-8">
  <title>دفتر یادداشت</title>
  <style>
    body {
      margin: 0;
      font-family: "Vazir", sans-serif;
      background: #f4f4f4;
      direction: rtl;
    }

    /* منوی همبرگری */
    #menuIcon {
      width: 30px;
      margin: 15px;
      cursor: pointer;
      position: fixed;
      top: 0;
      right: 0;
      z-index: 1000;
    }
    #menuIcon div {
      width: 100%;
      height: 4px;
      margin: 6px 0;
      background-color: #333;
      border-radius: 2px;
    }

    /* نوار کناری */
    #sidebar {
      height: 100%;
      width: 0;
      position: fixed;
      right: 0;
      top: 0;
      background-color: #333;
      overflow-x: hidden;
      transition: 0.4s;
      padding-top: 60px;
      z-index: 999;
    }
    #sidebar a {
      padding: 10px 25px;
      text-decoration: none;
      color: white;
      display: block;
      transition: 0.3s;
      font-size: 18px;
    }
    #sidebar a:hover {
      background-color: #575757;
    }
    #sidebar.active {
      width: 250px;
    }

    /* دفتر یادداشت */
    .notebook-container {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      flex-direction: column;
    }
    .cover {
      width: 300px;
      height: 400px;
      background: #8B4513;
      color: white;
      border-radius: 12px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 22px;
      cursor: pointer;
      box-shadow: 0 4px 8px rgba(0,0,0,0.3);
      transition: 0.4s;
    }
    .cover:hover {
      transform: scale(1.05);
    }

    .notebook {
      display: none;
      flex-direction: column;
      align-items: center;
      margin-top: 30px;
    }
    .notebook.open {
      display: flex;
    }
    textarea {
      width: 300px;
      height: 200px;
      margin-bottom: 10px;
      padding: 10px;
      font-size: 16px;
      resize: vertical;
    }
    button {
      margin: 5px;
      padding: 8px 16px;
      border: none;
      background: #333;
      color: white;
      border-radius: 6px;
      cursor: pointer;
    }
    button:hover {
      background: #555;
    }
  </style>
</head>
<body>

<!-- آیکن منو -->
<div id="menuIcon" onclick="toggleMenu()">
  <div></div>
  <div></div>
  <div></div>
</div>
<!-- نوار کناری -->
<div id="sidebar">
  <a href="alarm.php">⏰ یادآوری یادداشت </a>
  <a href="clock.php">📅 تقویم و ساعت</a>
  <a href="dakhlexarj.php">💰 دخل و خرج</a>
  <a href="abvahava.php">⛅️ آب و هوا</a>
  <a href="map.php">نقشه </a>
</div>

<!-- دفتر یادداشت -->
<div class="notebook-container">
  <div class="cover" onclick="openNotebook()">دفتر یادداشت</div>

  <div class="notebook" id="notebook">
    <textarea placeholder="یادداشت خود را وارد کنید..."></textarea>
    <div>
      <button onclick="saveNote()">ذخیره</button>
      <button onclick="deleteNote()">حذف</button>
    </div>
  </div>
</div>

<script>
  function toggleMenu() {
    document.getElementById("sidebar").classList.toggle("active");
  }

  function openNotebook() {
    document.querySelector(".cover").style.display = "none";
    document.getElementById("notebook").classList.add("open");
  }

  function saveNote() {
    alert("یادداشت ذخیره شد!");
  }

  function deleteNote() {
    document.querySelector("textarea").value = "";
    alert("یادداشت حذف شد.");
  }
</script>

</body>
</html>