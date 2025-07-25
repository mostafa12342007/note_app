<!DOCTYPE html>
<html lang="fa">
<head>
  <meta charset="UTF-8">
  <title>دفتر دخل و خرج</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    :root {
      --bg-light: #f4f4f4;
      --text-light: #333;
      --card-light: #fff;
      --accent-light: #8d6e63;

      --bg-dark: #1c1c1c;
      --text-dark: #eee;
      --card-dark: #2c2c2c;
      --accent-dark: #ff9800;
    }

    body {
      font-family: 'Tahoma', sans-serif;
      background-color: var(--bg-light);
      color: var(--text-light);
      margin: 0;
      padding: 20px;
      direction: rtl;
      transition: 0.4s;
    }

    body.dark {
      background-color: var(--bg-dark);
      color: var(--text-dark);
    }

    h1 {
      text-align: center;
      margin-bottom: 30px;
    }

    .toggle-mode {
      display: block;
      margin: auto;
      background: var(--accent-light);
      border: none;
      color: white;
      padding: 10px 20px;
      font-size: 16px;
      border-radius: 20px;
      cursor: pointer;
      transition: 0.3s;
    }

    body.dark .toggle-mode {
      background: var(--accent-dark);
    }

    .section {
      background-color: var(--card-light);
      border-radius: 15px;
      padding: 20px;
      margin: 20px auto;
      max-width: 600px;
      box-shadow: 0 6px 20px rgba(0,0,0,0.1);
      transition: 0.4s;
    }

    body.dark .section {
      background-color: var(--card-dark);
      box-shadow: 0 0 10px rgba(255,255,255,0.1);
    }

    textarea, input, select, button {
      width: 100%;
      padding: 10px;
      margin-top: 10px;
      margin-bottom: 15px;
      border-radius: 8px;
      border: 1px solid #ccc;
      font-size: 16px;
    }

    body.dark textarea, 
    body.dark input, 
    body.dark select {
      background-color: #444;
      color: #fff;
      border: 1px solid #666;
    }

    button {
      background-color: var(--accent-light);
      color: white;
      cursor: pointer;
      transition: 0.3s;
      border: none;
    }

    body.dark button {
      background-color: var(--accent-dark);
    }

    .entry {
      background-color: rgba(0,0,0,0.03);
      padding: 10px;
      border-radius: 10px;
      margin-top: 10px;
      display: flex;
      align-items: center;
      gap: 10px;
    }

    body.dark .entry {
      background-color: rgba(255,255,255,0.05);
    }

    .entry i {
      font-style: normal;
      font-size: 18px;
    }

    /* ماشین حساب */
    .calculator {
      max-width: 300px;
      margin: auto;
      background: #2f2f2f;
      padding: 20px;
      border-radius: 15px;
      box-shadow: 0 8px 25px rgba(0,0,0,0.3);
      transition: 0.3s;
    }

    body.dark .calculator {
      background: #444;
    }

    #calc-display {
      width: 100%;
      height: 50px;
      font-size: 22px;
      padding: 10px;
      border-radius: 10px;
      border: none;
      margin-bottom: 15px;
      background: #000;
      color: #00ff00;
      text-align: left;
      direction: ltr;
    }

    .calc-buttons {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      gap: 12px;
    }

    .calc-buttons button {
      padding: 15px;
      font-size: 20px;
      border: none;
      border-radius: 10px;
      background: #555;
      color: #fff;
      cursor: pointer;
    }

    .calc-buttons button:hover {
      background: #777;
    }

    .calc-buttons .operator {
      background: #ff9800;
    }

    .calc-buttons .clear {
      grid-column: span 4;
      background: #f44336;
    }

    .calc-buttons .clear:hover {
      background: #d32f2f;
    }

  </style>
</head>
<body>

<button class="toggle-mode" onclick="toggleMode()">🌓 تغییر حالت روز/شب</button>

<h1>دفتر دخل و خرج</h1>

<!-- ✅ ماشین حساب -->
<div class="section" id="calculator-section">
  <h3>🧮 ماشین‌حساب</h3>
  <div class="calculator">
    <input type="text" id="calc-display" readonly>
    <div class="calc-buttons">
      <button>7</button>
      <button>8</button>
      <button>9</button>
      <button class="operator">/</button>
      <button>4</button>
      <button>5</button>
      <button>6</button>
      <button class="operator">*</button>

      <button>1</button>
      <button>2</button>
      <button>3</button>
      <button class="operator">-</button>

      <button>0</button>
      <button>.</button>
      <button>=</button>
      <button class="operator">+</button>

      <button class="clear">C</button>
    </div>
  </div>
</div>

<!-- ✅ یادداشت آزاد -->
<div class="section">
  <h3>📝 یادداشت آزاد</h3>
  <textarea placeholder="مثلاً: امروز ۲۰۰ هزار تومان پس‌انداز کردم..."></textarea>
  <button>💾 ذخیره یادداشت</button>
</div>

<!-- ✅ خرج‌های دسته‌بندی‌شده -->
<div class="section">
  <h3>💳 ثبت خرج دسته‌بندی‌شده</h3>
  <input type="text" placeholder="مبلغ (مثلاً: ۱۲۰۰۰۰)">
  <select>
    <option>☕️ کافه</option>
    <option>👕 پوشاک</option>
    <option>🎮 تفریح</option>
    <option>🍔 غذا</option>
    <option>🚌 حمل و نقل</option>
    <option>📦 سایر</option>
  </select>
  <button>➕ ثبت خرج</button>

  <!-- نمونه نمایش خرج‌ها -->
  <div class="entry"><i>☕️</i> ۵۰۰۰۰ تومان برای کافه</div>
  <div class="entry"><i>👕</i> ۱۲۰۰۰۰ تومان برای پوشاک</div>
</div>

<script>
  // ماشین حساب
  const display = document.getElementById("calc-display");
  const buttons = document.querySelectorAll(".calc-buttons button");

  buttons.forEach(button => {
    button.addEventListener("click", () => {
      const value = button.textContent;
      if (value === "C") {
        display.value = "";
      } else if (value === "=") {
        try {
          display.value = eval(display.value);
        } catch {
          display.value = "خطا!";
        }
      } else {
        display.value += value;
      }
    });
  });

  // تغییر حالت شب/روز
  function toggleMode() {
    document.body.classList.toggle("dark");
  }
</script>

</body>
</html>
<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <title>نمودار دخل و خرج</title>
    <style>
        #expenseChart {
            font-family: 'Tahoma', Arial, sans-serif;
            direction: rtl;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 600px;
            text-align: center;
            margin: 50px auto;
        }

        #chartCanvas {
            border: 1px solid #ccc;
            margin-top: 20px;
        }

        .input-group {
            margin: 10px 0;
        }

        input {
            padding: 5px;
            margin: 0 5px;
            width: 80px;
        }

        button {
            padding: 5px 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div id="expenseChart">
        <h2>نمودار دخل و خرج ماهانه</h2>
        <div class="input-group">
            <label>ماه:</label>
            <select id="monthSelect" onchange="updateChart()">
                <option value="1">فروردین</option>
                <option value="2">اردیبهشت</option>
                <option value="3">خرداد</option>
                <option value="4">تیر</option>
                <option value="5">مرداد</option>
                <option value="6">شهریور</option>
                <option value="7">مهر</option>
                <option value="8">آبان</option>
                <option value="9">آذر</option>
                <option value="10">دی</option>
                <option value="11">بهمن</option>
                <option value="12">اسفند</option>
            </select>
            <label>دخل:</label>
            <input type="number" id="income" value="0" onchange="updateChart()">
            <label>خرج:</label>
            <input type="number" id="expense" value="0" onchange="updateChart()">
            <label>پس‌انداز:</label>
            <input type="number" id="savings" value="0" onchange="updateChart()">
            <button onclick="resetChart()">بازنشانی</button>
        </div>
        <canvas id="chartCanvas" width="600" height="300"></canvas>
    </div>

    <script>
        const canvas = document.getElementById('chartCanvas');
        const ctx = canvas.getContext('2d');

        // داده‌های اولیه (برای ماه فعلی ≈ مرداد 1404)
        let data = {
            months: ['فروردین', 'اردیبهشت', 'خرداد', 'تیر', 'مرداد', 'شهریور', 'مهر', 'آبان', 'آذر', 'دی', 'بهمن', 'اسفند'],
            incomes: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
            expenses: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
            savings: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0]
        };

        function drawChart() {
            ctx.clearRect(0, 0, canvas.width, canvas.height);

            // محورها
            ctx.beginPath();
            ctx.moveTo(50, 250);
            ctx.lineTo(550, 250); // محور افقی
            ctx.moveTo(50, 250);
            ctx.lineTo(50, 50);   // محور عمودی
            ctx.stroke();

            // برچسب‌ها
            ctx.font = '12px Arial';
            ctx.fillText('مبلغ (هزار تومان)', 20, 50);
            ctx.save();
            ctx.translate(50, 260);
            ctx.rotate(-Math.PI / 2);
            ctx.fillText('ماه‌ها', 0, 0);
            ctx.restore();

            // رسم میله‌ها
            const barWidth = 40;
            const spacing = 20;
            const maxValue = Math.max(...data.incomes, ...data.expenses, ...data.savings) || 100;
            const selectedMonth = parseInt(document.getElementById('monthSelect').value) - 1;

            for (let i = 0; i < 12; i++) {
                const x = 70 + i * (barWidth + spacing);
                const heightIncome = (data.incomes[i] / maxValue) * 200;
                const heightExpense = (data.expenses[i] / maxValue) * 200;
                const heightSavings = (data.savings[i] / maxValue) * 200;
                // میله دخل (آبی)
                ctx.fillStyle = 'blue';
                ctx.fillRect(x, 250 - heightIncome, barWidth / 2, heightIncome);
                ctx.fillStyle = 'black';
                ctx.fillText(data.incomes[i], x, 250 - heightIncome - 5);

                // میله خرج (قرمز)
                ctx.fillStyle = 'red';
                ctx.fillRect(x + barWidth / 2, 250 - heightExpense, barWidth / 2, heightExpense);
                ctx.fillStyle = 'black';
                ctx.fillText(data.expenses[i], x + barWidth / 2, 250 - heightExpense - 5);

                // میله پس‌انداز (سبز)
                ctx.fillStyle = 'green';
                ctx.fillRect(x + barWidth, 250 - heightSavings, barWidth / 2, heightSavings);
                ctx.fillStyle = 'black';
                ctx.fillText(data.savings[i], x + barWidth, 250 - heightSavings - 5);

                // برچسب ماه
                ctx.fillStyle = 'black';
                ctx.fillText(data.months[i].substring(0, 2), x + barWidth / 2, 260);
            }

            // برجسته کردن ماه انتخاب‌شده
            if (selectedMonth >= 0 && selectedMonth < 12) {
                const x = 70 + selectedMonth * (barWidth + spacing);
                ctx.strokeStyle = 'black';
                ctx.lineWidth = 2;
                ctx.strokeRect(x, 50, barWidth + spacing, 200);
            }
        }

        function updateChart() {
            const month = parseInt(document.getElementById('monthSelect').value) - 1;
            data.incomes[month] = parseInt(document.getElementById('income').value) || 0;
            data.expenses[month] = parseInt(document.getElementById('expense').value) || 0;
            data.savings[month] = parseInt(document.getElementById('savings').value) || 0;
            drawChart();
        }

        function resetChart() {
            data.incomes.fill(0);
            data.expenses.fill(0);
            data.savings.fill(0);
            document.getElementById('income').value = 0;
            document.getElementById('expense').value = 0;
            document.getElementById('savings').value = 0;
            drawChart();
        }

        // مقداردهی اولیه
        document.getElementById('monthSelect').value = 5; // مرداد 1404
        drawChart();
    </script>
</body>
</html>