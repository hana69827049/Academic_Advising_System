<!DOCTYPE html>
<html>
    <head>
      <link rel="stylesheet" href="footerandheaderstyle.css">
        <meta charset="UTF-8" />
        <title>Professor reservation</title>

        <link type="text/css" rel="stylesheet" href="css/layout.css" />

        <script src="js/daypilot/daypilot-all.min.js"></script>
    </head>
    <body>
      <div class="v242_6">
      <!-- بدايه الهيدر -->
      <div class="v194_23"> </div>
      <span class="v194_24">AAS</span>
      <button class="button v194_25 ">الملف الشخصي</button>
      <span class="v194_26">نظام</span>
      <span class="v194_27">للإرشاد الأكاديمي بكلية الحاسب</span>
      <button class="button v194_28">الاسالة الشائعة</button>
      <button class="button v194_29">الانذارات</button>
      <button class="button v194_30">اقتراحات لتدريب الصيفي</button>
      <button class="button v194_31">وصف المقررات</button>
      <button class="button v194_33">
      <span>ارسال ايميل </span>
      </button>
      <button class="button v194_32"> <span>  حجز موعد </span></button>
      <button class="button v194_34"> <span>  دليلك للحاسب </span></button>
    <!--نهاية الهدير -->

        <div class="main">
            <?php #require_once '_navigation.php'; ?>

          <center>  <div style=" margin-top: 100px;">

                <div style="float:left; width:180px;margin-left: 130px;">
                    <div id="nav"></div>
                </div>
              <div style="margin-left: 1px;width:900px; margin-top: 50px;">
                    <div class="space"></div>
                    <div id="calendar"></div>
                </div>

            </div></center>

        </div>

        <footer>
        <!--بداية الفوتر  -->
        <div class="v194_19">
           <div class="name1"></div>
        <span class="v194_20">AAS</span>
        <span class="v194_21">نظام الإرشاد الأكاديمي الإلكتروني
         لكلية الحاسب بجامعة القصيم</span>
        </div>
        <!--نهاية الفوتر -->
        </footer>
      </div>


        <script src="js/jquery-1.9.1.min.js"></script>
        <script src="js/daypilot/daypilot-all.min.js"></script>

        <script>
            var nav = new DayPilot.Navigator("nav");
            nav.selectMode = "week";
            nav.showMonths = 2;
            nav.skipMonths = 2;
            nav.onTimeRangeSelected = function(args) {
                 loadEvents(args.start.firstDayOfWeek(), args.start.addDays(7));
            };
            nav.init();

            var calendar = new DayPilot.Calendar("calendar");
            calendar.viewType = "Week";
            calendar.timeRangeSelectedHandling = "Disabled";
            calendar.eventMoveHandling = "Disabled";
            calendar.eventResizeHandling = "Disabled";
            calendar.onBeforeEventRender = function(args) {
                if (!args.data.tags) {
                    return;
                }
                switch (args.data.tags.status) {
                    case "free":
                        args.data.barColor = "green";
                        args.data.html = "Available<br/>" + args.data.tags.doctor;
                        args.data.toolTip = "Click to request this time slot";
                        break;
                    case "waiting":
                        args.data.barColor = "orange";
                        args.data.html = "Your appointment, waiting for confirmation";
                        break;
                    case "confirmed":
                        args.data.barColor = "#f41616";  // red
                        args.data.html = "Your appointment, confirmed";
                        break;
                }
            };
            calendar.onEventClick = function(args) {
                if (args.e.tag("status") !== "free") {
                    calendar.message("You can only request a new appointment in a free slot.");
                    return;
                }

                var modal = new DayPilot.Modal({
                    onClosed: function(args) {
                        if (args.result) {  // args.result is empty when modal is closed without submitting
                            loadEvents();
                        }
                    }
                });

                modal.showUrl("appointment_request.php?id=" + args.e.id());
            };
            calendar.init();

            loadEvents();

            function loadEvents(day) {
                var start = nav.visibleStart() > new DayPilot.Date() ? nav.visibleStart() : new DayPilot.Date();

                var params = {
                    start: start.toString(),
                    end: nav.visibleEnd().toString()
                };

                $.post("backend_events_free.php", JSON.stringify(params), function(data) {
                    if (day) {
                        calendar.startDate = day;
                    }
                    calendar.events.list = data;
                    calendar.update();

                    nav.events.list = data;
                    nav.update();

                });
            }
        </script>

    </body>
</html>
<style>*

 {
  box-sizing: border-box;
}
body {
    background:  rgba(249,250,251,1);;
}
.v242_6 {
  width: 100%;
  height: 2000px;
  background: rgba(249,250,251,1);
  opacity: 1;
  position: absolute;
  top: 0px;
  left: 0px;
  overflow: hidden;
}
