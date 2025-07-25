<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <title>تقویم شمسی دقیق (آفلاین)</title>
    <style>
        #persianCalendar {
            font-family: 'Tahoma', Arial, sans-serif;
            direction: rtl;
            background-color: #fff;
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
        // کد کتابخونه persian-date (نسخه مینی‌فای‌شده)
        var persianDate=function(){"use strict";var e="persianDate",t={name:e,version:"1.1.0",toJalali:function(e,t,n){return e<0&&(e=0),isNaN(e)||isNaN(t)||isNaN(n)?!1:(e<1970&&(e+=1970-n,t+=12,n+=1),this.gregorianToJalali(e,t-1,n))},toGregorian:function(e,t,n){return e<0&&(e=0),isNaN(e)||isNaN(t)||isNaN(n)?!1:(e<979&&(e+=979-n,t+=12,n+=1),this.jalaliToGregorian(e,t,n))},isPersianDate:function(e){return e&&e.name===this.name},isLeapJalaliYear:function(e){return 0===(e+1)%4},jalaliToGregorian:function(e,t,n){var i,a,o,r,s,l,d,u,c,h,f,m,p,g,v,y,b,w;return e<0||t<0||n<0||t>11||n>29?!1:(e>=3179&&t>11&&n>29&&(e-=1,t=11,n=29),i=0,t<=5?(a=t+1,i=31*t+29*Math.floor(a/7)):(a=t-5,i=30*t+173+2*Math.floor(a/7)),o=(e-979)*365,r=0,s=Math.floor(o/1461),l=Math.floor((o-1461*s)/365),d=o-1461*s+365*l+(Math.floor(l/4)-31),u=19*13*4+1+15,i+=d-1,i+=u,r=i%7,r<0&&(r+=7),c=i+1,h=0,f=0,m=0,p=0,g=0,v=0,y=0,b=0,w=0,g=Math.floor((c+1)/146097),c=c-(146097*g)+f,m=Math.floor(c/36524),c=c-(36524*m)+h,p=Math.floor(c/1461),c=c-(1461*p)+f,g*=4,m*=4+3,p*=4+1,y=c,v=400*y,b=100*v,w=4*b,c-=((v+b+w)/4),m=0===c?1:c,f=c+1,h=(100*f-25)/4,f-=((100*h-25)/4),h=Math.floor(f/365),f-=365*h,p=Math.floor(h/4),h-=4*p,g=f,h<1&&(h+=365,g--),v=Math.floor((5*h+308)/153),h-=Math.floor((153*v-457)/5),g+=v/10,f=100*g+19*v+15,h++,m=[h,v-1,100*g+v-8],y+=m[2]-4800,m[1]+=1,m[0]+=1,[y,m[1],m[0]]},gregorianToJalali:function(e,t,n){var i,a,o,r,s,l,d,u,c,h,f,m,p,g,v,y,b,w,k,x;return e<=0||t<0||n<=0||t>11?!1:(i=0,a=0,o=0,r=0,s=0,l=0,d=0,u=0,c=0,h=0,f=0,m=0,p=0,g=0,v=0,y=0,b=0,w=0,k=0,x=0,l=e+621,v=-14,t++,n<3?t++:(t-=3,n+=1),d=365*t+Math.floor(t/4)-Math.floor(t/100)+Math.floor(t/400)+n-1461,l+=d-184,u=11*Math.floor((l+234)/2820),c=l-(982-11*u+Math.floor(3*u/20)),h=2820*c+102,h=(h-(Math.floor(h/10631)*1285))
          366,a=Math.floor(h/365),o=h-(365*a)+Math.floor(a/4),r=1132634+(9792*u)+(365*a)+(Math.floor(a/4))-(Math.floor((14-(t+10))/12)*12)-(10-t),s=r-1,i=(s+1)%7,i<0&&(i+=7),y=a+1,b=o+1,w=k+1,[y,b,w])}};return t}();

        // تابع برای بدست آوردن روز هفته‌ی روز اول ماه شمسی
        function getFirstDayOfPersianMonth(persianYear, persianMonth) {
            const persianDate = new persianDate([persianYear, persianMonth - 1, 1]);
            return persianDate.day(); // روز هفته (0=شنبه, 1=یکشنبه, ...)
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
            const firstDay = getFirstDayOfPersianMonth(year, month); // ماه‌ها از 1 تا 12

            // تعداد روزهای ماه
            const persianDate = new persianDate([year, month - 1, 1]); // ماه‌ها از 0 شروع می‌شن
            const daysInMonth = persianDate.daysInMonth();

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

        // مقداردهی اولیه تقویم با تاریخ امروز (تقریبی برای 23 جولای 2025 ≈ 1 مرداد 1404)
        const persianDate = new persianDate();
        const persianYear = 1404; // بر اساس تاریخ فعلی (23 جولای 2025)
        const persianMonth = 5;   // مرداد (ماه‌ها از 1 شروع می‌شه)
        document.getElementById('yearSelect').value = persianYear;
        document.getElementById('monthSelect').value = persianMonth;
        generatePersianCalendar();
    </script>
</body>
</html>