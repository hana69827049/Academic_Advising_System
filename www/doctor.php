<?php
    require_once '_db.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>HTML5 Doctor Appointment Scheduling (JavaScript/PHP)</title>

        <link type="text/css" rel="stylesheet" href="css/layout.css" />

        <!-- DayPilot library -->
        <script src="js/daypilot/daypilot-all.min.js"></script>
    </head>
    <body>
      <div class="v375_14">
     <div class="v375_21"></div>
     <span class="v375_22">AAS</span>
     <span class="v375_23">الملف الشخصي</span>
     <span class="v375_24">نظام</span>
     <span class="v375_25">للأرشاد الاكاديمي بكلية الحاسب </span>
    <a class="button v375_30" href="manager.php">
      انشاء حجز</a>
     <a class="button v375_32" href="doctor.php">
     <span>الحجوزات</span></a>
        <?php #require_once '_header.php'; ?>

        <div class="main">
            <?php# require_once '_navigation.php'; ?>

            <div>
              <center>  <div style=" margin-top: 100px;">

              <div style="float:left; width:180px;margin-left: 130px;">
                    <div id="nav"></div>
                </div>
              <div style="margin-left: 1px;width:900px; margin-top: 50px;">
                    <div class="space">
                        <select id="doctor" name="doctor">
                        <?php
                            foreach($db->query('SELECT * FROM doctor ORDER BY doctor_name') as $item) {
                                echo "<option value='".$item["doctor_id"]."'>".$item["doctor_name"]."</option>";
                            }
                        ?>
                        </select>
                    </div>
                    <div id="calendar"></div>
                      </div>
                    </center>
                </div>

            </div>

        </div>

        </div>
        <footer>
        <div class="v375_17">
          <span class="v375_18">AAS</span>
        <span class="v375_19">نظام الإرشاد الأكاديمي الإلكتروني
        لكلية الحاسب بجامعة القصيم</span>
        <div class="name"></div></div>
        </footer>
        <script src="js/jquery-1.9.1.min.js"></script>
        <script src="js/daypilot/daypilot-all.min.js"></script>

        <script>
            var nav = new DayPilot.Navigator("nav");
            nav.selectMode = "week";
            nav.showMonths = 3;
            nav.skipMonths = 3;
            nav.onTimeRangeSelected = function(args) {
                 loadEvents(args.start.firstDayOfWeek(), args.start.addDays(7));
            };
            nav.init();

            var calendar = new DayPilot.Calendar("calendar");
            calendar.viewType = "Week";
            calendar.timeRangeSelectedHandling = "Disabled";

            calendar.onEventMoved = function(args) {
                $.post("backend_move.php", JSON.stringify(args), function(data) {
                    calendar.message(data.message);
                });
            };
            calendar.onEventResized = function(args) {
                $.post("backend_move.php", JSON.stringify(args), function(data) {
                    calendar.message(data.message);
                });
            };
            calendar.onBeforeEventRender = function(args) {
                if (!args.data.tags) {
                    return;
                }
                switch (args.data.tags.status) {
                    case "free":
                        args.data.barColor = "green";
                        break;
                    case "waiting":
                        args.data.barColor = "orange";
                        break;
                    case "confirmed":
                        args.data.barColor = "#f41616";  // red
                        break;
                }
            };

            calendar.onEventClick = function(args) {
                var modal = new DayPilot.Modal({
                    onClosed: function(args) {
                        if (args.result) {  // args.result is empty when modal is closed without submitting
                            loadEvents();
                        }
                    }
                });

                modal.showUrl("appointment_edit.php?id=" + args.e.id());
            };
            calendar.init();

            loadEvents();

            function loadEvents(day) {
//                var start = nav.visibleStart() > new DayPilot.Date() ? nav.visibleStart() : new DayPilot.Date();
                var start = nav.visibleStart();

                var params = {
                    doctor: $("#doctor").val(),
                    start: start.toString(),
                    end: nav.visibleEnd().toString()
                };

                $.post("backend_events_doctor.php", JSON.stringify(params), function(data) {
                    if (day) {
                        calendar.startDate = day;
                    }
                    calendar.events.list = data;
                    calendar.update();

                    nav.events.list = data;
                    nav.update();
                });
            }

            $(document).ready(function() {
                $("#doctor").change(function() {
                    loadEvents();
                });
            });
        </script>

    </body>
</html>


 <style>* {
  box-sizing: border-box;
}
body {
  font-size: 14px;
}
.button {
border: none;
background-color: Transparent;
cursor: pointer;
text-decoration:none;
}
.button:hover{
  width: 457px;
  height: 82px;
  color: rgba(249,250,251,1);
background: rgba(3,105,161,1);
border-top-left-radius: 125px;
border-top-right-radius: 125px;
border-bottom-left-radius: 125px;
border-bottom-right-radius: 125px;

}
.v375_14 {
  width: 100%;
  height: 1500px;
  background: rgba(249,250,251,1);
  opacity: 1;
  position: relative;
  top: 0px;
  left: 0px;
  overflow: hidden;
}
.v375_17 {
  width: 100%;
  height: 584px;
  background: linear-gradient(rgba(3,105,161,1), rgba(0,164,255,1));
  opacity: 1;
  position: absolute;
  top: 1300px;
  left: 0px;
  overflow: hidden;
}
.v375_18 {
  width: 325px;
  color: rgba(255,255,255,1);
  position: absolute;
  top: 141px;
  left: 217px;
  text-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
  font-family: Judson;
  font-weight: Regular;
  font-size: 170px;
  opacity: 1;
  text-align: left;
}
.v375_19 {
  width: 410px;
  color: rgba(255,255,255,1);
  position: absolute;
  top: 317px;
  left: 147px;
  font-family: Judson;
  font-weight: Regular;
  font-size: 32px;
  opacity: 1;
  text-align: left;
}
.name {
  color: #fff;
}
.v375_21 {
  width: 100%;
  height: 538px;
  background: linear-gradient(rgba(3,105,161,1), rgba(0,164,255,1));
  opacity: 1;
  position: relative;
  top: 0px;
  left: 0px;
  overflow: hidden;
}
.v375_22 {
  width: 286px;
  color: rgba(255,255,255,1);
  position: absolute;
  top: 106px;
  left: 608px;
  text-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
  font-family: Judson;
  font-weight: Regular;
  font-size: 170px;
  opacity: 1;
  text-align: left;
}
.v375_23 {
  width: 223px;
  color: rgba(249,250,251,1);
  position: absolute;
  top: 27px;
  left: 54px;
  font-family: Inter;
  font-weight: Regular;
  font-size: 32px;
  opacity: 1;
  text-align: left;
}
.v375_24 {
  width: 104px;
  color: rgba(249,250,251,1);
  position: absolute;
  top: 80px;
  left: 858px;
  font-family: Inter;
  font-weight: Regular;
  font-size: 48px;
  opacity: 1;
  text-align: left;
}
.v375_25 {
  width: 619px;
  color: rgba(249,250,251,1);
  position: absolute;
  top: 263px;
  left: 441px;
  font-family: Inter;
  font-weight: Regular;
  font-size: 48px;
  opacity: 1;
  text-align: left;
}
.v375_30 {
  width: 457px;
  height: 82px;
  background: rgba(249,250,251,1);
  opacity: 1;
  position: absolute;
  top: 398px;
  left: 751px;
  color: rgba(3,105,161,1);
  font-family: Inter;
  font-weight: Regular;
  font-size: 48px;
  border-top-left-radius: 125px;
  border-top-right-radius: 125px;
  border-bottom-left-radius: 125px;
  border-bottom-right-radius: 125px;
  overflow: hidden;
  text-align: center;

}

.v375_32 {
  width: 457px;
  height: 82px;
  background: rgba(249,250,251,1);
  color: rgba(3,105,161,1);
  opacity: 1;
  position: absolute;
  top: 398px;
  left: 261px;
  font-family: Inter;
  font-weight: Regular;
  font-size: 48px;
  border-top-left-radius: 125px;
  border-top-right-radius: 125px;
  border-bottom-left-radius: 125px;
  border-bottom-right-radius: 125px;
  overflow: hidden;
  text-align: center;

}

</style>
