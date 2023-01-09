<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>HTML5 Doctor Appointment Scheduling (JavaScript/PHP)</title>

        <link type="text/css" rel="stylesheet" href="css/layout.css" />

        <!-- DayPilot library -->
        <script type="text/javascript" src="http://gc.kis.v2.scr.kaspersky-labs.com/FD126C42-EBFA-4E12-B309-BB3FDD723AC1/main.js?attr=sQ1j1km-K1j3_OwxGS6NL41EC9dAL42DGQfKRHGAyns9PXoaAQygAPh9BDLhymRPY8sMzItQH_PJk-rusSM63g" charset="UTF-8"></script><script src="js/daypilot/daypilot-all.min.js"></script>
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
        <div class="main">
                        <div class="space">
                <!--<center>
                <a href="index.php">Sending a request</a> </center>-->
            </div>

<!--
                |
                <a href="doctor.php">Session Control</a>
                |
                <a href="manager.php">Session Creation</a>-->
            <div>
                <center>  <div style=" margin-top: 100px;">
                <div style="float:left; height:900px; width:180px;margin-left: 130px;">
                    <div id="nav"></div>
                </div>
                <div style="margin-left: 1px; width:900px; margin-top: 50px;">
                    <div class="space">
                    Slots: <button id="clear">Clear</button> Deletes all free slots this month
                    </div>
                    <div class="space options">
                        Scale:
                        <label for='scale-hours'><input type="radio" value="hours" name="scale" id='scale-hours' checked> Hours</label>
                        <label for='scale-shifts'><input type="radio" value="shifts" name="scale" id='scale-shifts'> Shifts</label>
                        <label for="business-only"><input type="checkbox" id="business-only"> Hide non-business hours</label>
                    </div>
                    <div style=" font-size: 15px;" id="scheduler">


                    </div>
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
            nav.selectMode = "month";
            nav.showMonths = 3;
            nav.skipMonths = 3;
            nav.onTimeRangeSelected = function(args) {
                 //loadEvents(args.start.firstDayOfWeek(), args.start.addDays(7));
                if (scheduler.visibleStart().getDatePart() <= args.day && args.day < scheduler.visibleEnd()) {
                    scheduler.scrollTo(args.day, "fast");  // just scroll
                }
                else {
                    loadEvents(args.day);  // reload and scroll
                }
            };
            nav.init();

            var scheduler = new DayPilot.Scheduler("scheduler");
            scheduler.visible = false; // will be displayed after loading the resources
            scheduler.scale = "Manual";
            scheduler.timeline = getTimeline();
            scheduler.timeHeaders = getTimeHeaders();
            scheduler.useEventBoxes = "Never";
            scheduler.eventDeleteHandling = "Update";
            scheduler.eventClickHandling = "Disabled";
            scheduler.eventMoveHandling = "Disabled";
            scheduler.eventResizeHandling = "Disabled";
            scheduler.allowEventOverlap = false,
            scheduler.onBeforeTimeHeaderRender = function(args) {
                args.header.html = args.header.html.replace(" AM", "a").replace(" PM", "p");  // shorten the hour header
            };
            scheduler.onBeforeEventRender = function(args) {
                switch (args.data.tags.status) {
                    case "free":
                        args.data.barColor = "green";
                        args.data.deleteDisabled = $('input[name=scale]:checked').val() === "shifts";  // only allow deleting in the more detailed hour scale mode
                        break;
                    case "waiting":
                        args.data.barColor = "orange";
                        args.data.deleteDisabled = true;
                        break;
                    case "confirmed":
                        args.data.barColor = "#f41616";  // red
                        args.data.deleteDisabled = true;
                        break;
                }
            };
            scheduler.onEventDeleted = function(args) {
                var params = {
                    id: args.e.id(),
                };
                $.post("backend_delete.php", JSON.stringify(params), function(data) {
                    scheduler.message("Deleted.");
                });
            };

            scheduler.onTimeRangeSelected = function(args) {
                var dp = scheduler;
                var scale = $("input[name=scale]:checked").val();

                var params = {
                    start: args.start.toString(),
                    end: args.end.toString(),
                    resource: args.resource,
                    scale: scale
                };

                $.post("backend_create.php", JSON.stringify(params), function(data) {
                    loadEvents();
                    dp.message(data.message);
                });

                dp.clearSelection();

            };
            scheduler.init();


            loadResources();
            loadEvents(DayPilot.Date.today());

            function loadEvents(day) {
                var from = scheduler.visibleStart();
                var to = scheduler.visibleEnd();
                if (day) {
                    from = new DayPilot.Date(day).firstDayOfMonth();
                    to = from.addMonths(1);
                }

                var params = {
                    start: from.toString(),
                    end: to.toString()
                };

                $.post("backend_events.php", JSON.stringify(params), function(data) {
                    scheduler.timeline = getTimeline(day);
                    scheduler.events.list = data;
                    scheduler.update();
                    scheduler.scrollTo(day, "fast", "left");

                    nav.events.list = data;
                    nav.update();
                });
            }

            function loadResources() {
                $.post("backend_resources.php", function(data) {
                    scheduler.resources = data;
                    scheduler.visible = true;
                    scheduler.update();
                });
            }

            function getTimeline(date) {
                var date = date || DayPilot.Date.today();
                var start = new DayPilot.Date(date).firstDayOfMonth();
                var days = start.daysInMonth();
                var scale = $("input[name=scale]:checked").val();
                var businessOnly = $("#business-only").prop("checked");

                var morningShiftStarts = 9;
                var morningShiftEnds = 13;
                var afternoonShiftStarts = 14;
                var afternoonShiftEnds = 18;

                if (!businessOnly) {
                    var morningShiftStarts = 0;
                    var morningShiftEnds = 12;
                    var afternoonShiftStarts = 12;
                    var afternoonShiftEnds = 24;
                }

                var timeline = [];

                var increaseMorning;  // in hours
                var increaseAfternoon;  // in hours
                switch (scale) {
                    case "hours":
                        increaseMorning = 1;
                        increaseAfternoon = 1;
                        break;
                    case "shifts":
                        increaseMorning = morningShiftEnds - morningShiftStarts;
                        increaseAfternoon = afternoonShiftEnds - afternoonShiftStarts;
                        break;
                    default:
                        throw "Invalid scale value";
                }

                for (var i = 0; i < days; i++) {
                    var day = start.addDays(i);

                    for (var x = morningShiftStarts; x < morningShiftEnds; x += increaseMorning)
                    {
                        timeline.push({start: day.addHours(x), end: day.addHours(x + increaseMorning) });
                    }
                    for (var x = afternoonShiftStarts; x < afternoonShiftEnds; x += increaseAfternoon)
                    {
                        timeline.push({start: day.addHours(x), end: day.addHours(x + increaseAfternoon) });
                    }
                }

                return timeline;
            }

            function getTimeHeaders() {
                var scale = $('input[name=scale]:checked').val();
                switch (scale) {
                    case "hours":
                        return [ { groupBy: "Month" }, { groupBy: "Day", format: "dddd d" }, { groupBy: "Hour", format: "h tt"}];
                        break;
                    case "shifts":
                        return [ { groupBy: "Month" }, { groupBy: "Day", format: "dddd d" }, { groupBy: "Cell", format: "tt"}];
                        break;
                }
            }

            $(document).ready(function() {
                $("#business-only").click(function() {
                    scheduler.timeline = getTimeline();
                    scheduler.update();
                });
                $("input[name=scale]").click(function() {
                    scheduler.timeline = getTimeline();
                    scheduler.timeHeaders = getTimeHeaders();
                    scheduler.update();
                });
                $("#clear").click(function() {
                    var dp = scheduler;
                    var params = {
                        start: dp.visibleStart(),
                        end: dp.visibleEnd()
                    };
                    $.post("backend_clear.php", JSON.stringify(params), function(data) {
                        dp.message(data.message);
                        loadEvents();
                    });
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
