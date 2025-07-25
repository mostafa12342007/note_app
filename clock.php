<!DOCTYPE html>
<html lang="en">
<head>
    <title>Dark Clock</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="clock">
        <div class="hour">
            <div class="hr"></div>
        </div>
        <div class="min">
            <div class="mn"></div>
        </div>
        <div class="sec">
            <div class="sc"></div>
        </div>
    </div>
    <script src="script.js"></script>
</body>
</html>
<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <title>تقویم شمسی ساده (بدون کتابخونه)</title>
    <style>
        #persianCalendar {
            font-family: 'Tahoma', Arial, sans-serif;
            direction: rtl;
            background-color: gray;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
            margin: 50px auto; /* مرکز صفحه با فاصله از بالا */
        }

        #persianCalendar select {
            padding: 8px;
            margin: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
            width: 120px;
        }

        #persianCalendar #calendarGrid {
            margin-top: 15px;
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 2px;
            width: 280px;
            margin: 0 auto;
        }

        #persianCalendar .day {
            background-color: #e0e0e0;
            padding: 10px;
            text-align: center;
            border-radius: 5px;
            font-size: 14px;
        }

        #persianCalendar .day:first-child,
        #persianCalendar .day:nth-child(7n+1) {
            color: #d32f2f; /* رنگ قرمز برای شنبه */
        }

        #persianCalendar .day:hover {
            background-color: #d0d0d0;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div id="persianCalendar">
        <select id="yearSelect" onchange="generatePersianCalendar()"></select>
        <select id="monthSelect" onchange="generatePersianCalendar()">
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
        <div id="calendarGrid"></div>
    </div>

    <script>
        // تابع برای تشخیص سال کبیسه (مضرب 4، با استثناها)
        function isLeapPersianYear(year) {
            return (year % 33 === 1 || year % 33 === 5 || year % 33 === 9 || year % 33 === 13 ||
                    year % 33 === 17 || year % 33 === 22 || year % 33 === 26 || year % 33 === 30);
        }

        // تابع برای محاسبه روز اول ماه شمسی
        function getFirstDayOfPersianMonth(persianYear, persianMonth) {
            // تبدیل تقریبی به تاریخ میلادی (نوروز ≈ 21 مارس)
            const baseYear = 1399; // سال پایه برای محاسبه
            const baseGregorian = new Date(2020, 2, 20); // 20 مارس 2020 ≈ 1 فروردین 1399
            let totalDays = 0;

            // محاسبه روزهای گذشته از سال پایه تا سال مورد نظر
            for (let y = baseYear; y < persianYear; y++) {
                totalDays += 365 + (isLeapPersianYear(y) ? 1 : 0);
            }

            // محاسبه روزهای گذشته از ابتدای سال جاری تا ماه مورد نظر
            for (let m = 1; m < persianMonth; m++) {
                totalDays += (m <= 6) ? 31 : 30;
                if (m === 12 && isLeapPersianYear(persianYear)) totalDays++; // اسفند کبیسه
            }

            // اضافه کردن به تاریخ پایه و محاسبه روز هفته
            const targetDate = new Date(baseGregorian.getTime() + totalDays * 86400000);
            return (targetDate.getDay() + 6) % 7; // تنظیم برای شروع از شنبه (0=شنبه)
        }

        function generatePersianCalendar() {
            const yearSelect = document.getElementById('yearSelect');
            const monthSelect = document.getElementById('monthSelect');
            const grid = document.getElementById('calendarGrid');
            grid.innerHTML = '';
            // پر کردن لیست سال‌ها (1400 تا 1410)
            if (yearSelect.innerHTML === '') {
                for (let y = 1400; y <= 1410; y++) {
                    const option = document.createElement('option');
                    option.value = y;
                    option.text = y;
                    yearSelect.appendChild(option);
                }
            }

            const year = parseInt(yearSelect.value);
            const month = parseInt(monthSelect.value);

            // بدست آوردن روز هفته‌ی روز اول ماه
            const firstDay = getFirstDayOfPersianMonth(year, month);

            // تعداد روزهای ماه (با در نظر گرفتن سال کبیسه)
            const daysInMonth = (month <= 6) ? 31 : (month <= 11 ? 30 : (isLeapPersianYear(year) ? 30 : 29));

            // نمایش روزهای هفته
            const days = ['ش', 'ی', 'د', 'س', 'چ', 'پ', 'ج']; // شنبه تا جمعه
            days.forEach(day => {
                const dayElement = document.createElement('div');
                dayElement.className = 'day';
                dayElement.textContent = day;
                grid.appendChild(dayElement);
            });

            // پر کردن سلول‌های خالی قبل از روز اول
            for (let i = 0; i < firstDay; i++) {
                const emptyDay = document.createElement('div');
                emptyDay.className = 'day';
                grid.appendChild(emptyDay);
            }

            // پر کردن روزهای ماه
            for (let day = 1; day <= daysInMonth; day++) {
                const dayElement = document.createElement('div');
                dayElement.className = 'day';
                dayElement.textContent = day;
                grid.appendChild(dayElement);
            }
        }

        // مقداردهی اولیه تقویم با تاریخ تقریبی امروز (1 مرداد 1404 ≈ 23 جولای 2025)
        document.getElementById('yearSelect').value = 1404;
        document.getElementById('monthSelect').value = 5; // مرداد
        generatePersianCalendar();
    </script>
</body>
</html>
