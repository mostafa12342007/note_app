<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $note = $_POST['note'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $sound = $_POST['sound'];

    // ذخیره توی فایل (آفلاین نسبی)
    $data = "$note|$date|$time|$sound\n";
    file_put_contents('alarms.txt', $data, FILE_APPEND);
}
?>
<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>آلارم هشدار</title>
    <style>
        body { background-color: #1a1a1a; color: #fff; text-align: center; }
        input, select, button { padding: 10px; margin: 5px; }
        #alarms { margin-top: 20px; }
    </style>
</head>
<body>
    <h2>آلارم هشدار</h2>
    <form method="POST">
        <input type="text" name="note" placeholder="یادداشت">
        <input type="text" name="date" placeholder="تاریخ (1404/05/02)">
        <input type="time" name="time">
        <select name="sound">
            <option value="alarm1.mp3">آهنگ ۱</option>
            <option value="alarm2.mp3">آهنگ ۲</option>
        </select>
        <button type="submit">اضافه کردن آلارم</button>
    </form>
    <div id="alarms">
        <?php
        if (file_exists('alarms.txt')) {
            $lines = file('alarms.txt', FILE_IGNORE_NEW_LINES);
            foreach ($lines as $line) {
                list($note, $date, $time, $sound) = explode('|', $line);
                echo "$note - $date $time<br>";
            }
        }
        ?>
    </div>

    <script>
        setInterval(() => {
            const now = new Date().toLocaleString('fa-IR');
            <?php if (file_exists('alarms.txt')) {
                $lines = file('alarms.txt', FILE_IGNORE_NEW_LINES);
                foreach ($lines as $line) {
                    list($note, $date, $time, $sound) = explode('|', $line);
                    echo "if (now.includes('$date $time')) {
                        const audio = new Audio('$sound');
                        audio.play();
                        alert('$note');
                    }";
                }
            } ?>
        }, 10000);
    </script>
</body>
</html>