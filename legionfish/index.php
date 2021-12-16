<?php
    $npc = ["Ша'лет", "Бесс", "Иллисия Водная", "Хранительница Рейна", "Акуле Речной Рог", "Корбин"];
    $npc_colors = ["black", "purple", "red", "green", "blue", "#795548"];

    $number_cal_days = cal_days_in_month(CAL_GREGORIAN, date('m'), date('Y'));
    $first_day_in_month = date('N',mktime(0, 0, 0, date('m'), 1));
    $template_th = "";
    $template_body = "";

    $itter = 0;

    function getNameOfDay($day) {
        switch($day) {
            case 1: return "Понедельник"; break;
            case 2: return "Вторник"; break;
            case 3: return "Среда"; break;
            case 4: return "Четверг"; break;
            case 5: return "Пятница"; break;
            case 6: return "Суббота"; break;
            case 7: return "Воскресенье"; break;
        }
    }

    for($i = 1; $i < 8; $i++) {
        $getNameOfDay = getNameOfDay($i);
        $template_th .= "<th>{$getNameOfDay}</th>";
    }

    $calendar_table_itter = -1;
    $calendar_number = 1;
    $calendar_npc = 4;
    $calendar_break = 0;

    function generateCalendar($i, $color, $value) {

        $value = "<span style='background: {$color}; padding: 10px; margin: 10px; color: #fff; display: block;'>{$value}</span>";
        
        if($i == 0) {
            return "<tr><td>{$value}</td>";
        } else {
            if($i % 7 == 0) {
                return "<tr><td>{$value}</td>";
            } else {
                return "<td>{$value}</td>";
            }
        }
    }

    while(true) {

        $calendar_table_itter++;
        if($calendar_table_itter >= $first_day_in_month-1) {

            if($number_cal_days+$calendar_break*2 == $calendar_table_itter) {
                break;
            }

            $nameOfNpc = $npc[$calendar_npc];
            if($calendar_npc == 5) {
                $calendar_npc = 0;
            } else {
                $calendar_npc++;
            }
            if($calendar_number < $number_cal_days+1) {
                $template_body .= generateCalendar($calendar_table_itter, $npc_colors[$calendar_npc], "[".$calendar_number."] ".$nameOfNpc);
                $calendar_number++;
            } else {
                $template_body .= generateCalendar($calendar_table_itter, "", "");
            }
        } else {
            $calendar_break++;
            $template_body .= generateCalendar($calendar_table_itter, "", "");
        }

    }
?>
<html>
    <head>
        <title>Legion NPC Fishing Friends</title>
    </head>
    <body>
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap');

            body {
                font-family: 'Open Sans', sans-serif;
            }

            table th {
                text-align: center;
                width: 10vw;
            }
            table td {
                border: 1px solid gray;
                text-align: center;
            }
            textarea {
                width: 500px;
                height: 200px;
                text-align: center;
                font-size: 18px;
            }
        </style>
        <h1>Legion NPC Fishing Friends</h1>
        <h3>Расписание Идеалов рыбной ловли для Гордунни-EU [Дата: <?php echo date('Y-m-d H:m:s'); ?>]</h3>
        <h5>ВСЕ NPC ОБНОВЛЯЮТСЯ В 10:00 ПО МОСКОВСКОМУ ВРЕМЕНИ! <a href="https://ru.wowhead.com/achievement=11725/%D0%B4%D1%80%D1%83%D0%B3-%D1%80%D1%8B%D0%B1%D0%BE%D0%BB%D0%BE%D0%B2%D0%BE%D0%B2">[АЧИВКА]</a></h5>
        <table style="border: 1px solid gray;">
            <thead>
                <?php echo $template_th; ?>
            </thead>
            <tbody>
                <?php echo $template_body; ?>
            </tbody>
        </table>
        <p>
            <textarea>
Ша'лет в Сурамаре /way 51 49
Бесс на Расколотом Берегу /way 34 50
Илиссия Водная в Азсуне /way 43 41
Хранительница Рейна в Валь'шаре /way 53 73
Акуле Речной Рог в Крутогорьи, в Громовом Тотеме /way 32 41
Корбин в Штормхейме /way 90.54 10.66
            </textarea>
            <p>Адомит-Гордунни</p>
            <p><a href="https://github.com/Tellarion">GitHub Profile</a></p>
        </p>
    </body>
    <!-- Yandex.Metrika counter -->
    <script type="text/javascript" >
    (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
    m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
    (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

    ym(86885525, "init", {
            clickmap:true,
            trackLinks:true,
            accurateTrackBounce:true
    });
    </script>
    <noscript><div><img src="https://mc.yandex.ru/watch/86885525" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
    <!-- /Yandex.Metrika counter -->
</html>