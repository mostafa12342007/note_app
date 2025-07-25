<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>نقشه آفلاین ایران</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            direction: rtl;
            margin: 0;
            background: #1a1a1a;
            color: #fff;
            text-align: center;
        }
        .map-container {
            max-width: 1000px;
            margin: 20px auto;
            padding: 20px;
            background: #2c2c2c;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 255, 204, 0.3);
        }
        #mapCanvas {
            width: 100%;
            height: 600px;
            background: #333;
            position: relative;
            overflow: hidden;
            border: 2px solid #00ffcc;
        }
        .marker {
            position: absolute;
            font-size: 1.2em;
            color: #00ffcc;
            background: #2c2c2c;
            padding: 5px;
            border-radius: 50%;
            cursor: pointer;
            animation: glow 1.5s infinite alternate;
        }
        @keyframes glow {
            from { box-shadow: 0 0 5px #00ffcc; }
            to { box-shadow: 0 0 20px #00ffcc, 0 0 30px #00ffcc; }
        }
        .controls {
            margin: 10px 0;
        }
        button {
            padding: 10px 20px;
            margin: 5px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            background: #4CAF50;
            color: #fff;
            cursor: pointer;
        }
        button:hover {
            background: #45a049;
        }
    </style>
</head>
<body>
    <div class="map-container">
        <h2>نقشه آفلاین ایران</h2>
        <div class="controls">
            <button onclick="zoomIn()">زوم +</button>
            <button onclick="zoomOut()">زوم -</button>
            <button onclick="resetZoom()">بازنشانی</button>
        </div>
        <div id="mapCanvas"></div>
    </div>

    <script>
        const canvas = document.getElementById('mapCanvas');
        let scale = 1;
        let markers = JSON.parse(localStorage.getItem('markers') || '[]');

        // داده‌های دستی نمونه (مختصات نسبی روی تصویر 1000x600)
        const defaultMarkers = [
            { name: 'تخت جمشید', x: 30, y: 40, type: 'گردشگری' },
            { name: 'بازار تهران', x: 80, y: 60, type: 'تجاری' },
            { name: 'هتل پارسیان', x: 85, y: 65, type: 'هتل' },
            { name: 'خیابان ولیعصر', x: 82, y: 61, type: 'خیابان' }
        ];
        if (markers.length === 0) {
            markers = defaultMarkers;
            localStorage.setItem('markers', JSON.stringify(markers));
        }

        // فرض می‌کنیم تصویر نقشه رو با ID "mapImage" لود می‌کنیم
        const img = new Image();
        img.src = 'iran.jpg'; // اینجا باید آدرس تصویر نقشه ایران رو بذاری
        img.onload = () => drawMap();

        function drawMap() {
            canvas.innerHTML = '';
            const ctx = document.createElement('canvas');
            ctx.width = 1000 * scale;
            ctx.height = 600 * scale;
            const ctx2d = ctx.getContext('2d');
            ctx2d.drawImage(img, 0, 0, ctx.width, ctx.height);
            canvas.appendChild(ctx);

            markers.forEach(m => {
                const marker = document.createElement('div');
                marker.className = 'marker';
                marker.style.left = ${m.x * scale}%;
                marker.style.top = ${m.y * scale}px;
                marker.textContent = m.name.charAt(0);
                marker.title = ${m.name} (${m.type});
                canvas.appendChild(marker);
            });
        }

        function zoomIn() {
            scale += 0.2;
            if (scale > 2) scale = 2;
            drawMap();
        }

        function zoomOut() {
            scale -= 0.2;
            if (scale < 0.5) scale = 0.5;
            drawMap();
        }

        function resetZoom() {
            scale = 1;
            drawMap();
        }
        // بارگذاری اولیه
        drawMap();
    </script>
</body>
</html>