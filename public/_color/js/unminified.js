/*   
Template Name: Color Admin - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.5
Version: 1.9.0
Author: Sean Ngu
Website: http://www.seantheme.com/color-admin-v1.9/admin/
*/

var blue="#348fe2",
blueLight="#5da5e8",
blueDark="#1993E4",
aqua="#49b6d6",
aquaLight="#6dc5de",
aquaDark="#3a92ab",
green="#00acac",
greenLight="#33bdbd",
greenDark="#008a8a",
orange="#f59c1a",
orangeLight="#f7b048",
orangeDark="#c47d15",
dark="#2d353c",
grey="#b6c2c9",
purple="#727cb6",
purpleLight="#8e96c5",
purpleDark="#5b6392",
red="#ff5b57";
var handleBasicChart=function() {
    "use strict";
    var e=[];
    for(var t=0;
    t<Math.PI*2;
    t+=.25) {
        e.push([t, Math.sin(t)])
    }
    var n=[];
    for(var r=0;
    r<Math.PI*2;
    r+=.25) {
        n.push([r, Math.cos(r)])
    }
    var i=[];
    for(var s=0;
    s<Math.PI*2;
    s+=.1) {
        i.push([s, Math.tan(s)])
    }
    if($("#basic-chart").length!==0) {
        $.plot($("#basic-chart"), [ {
            label: "data 1", data: e, color: purple, shadowSize: 0
        }
        , {
            label: "data 2", data: n, color: green, shadowSize: 0
        }
        , {
            label: "data 3", data: i, color: dark, shadowSize: 0
        }
        ], {
            series: {
                lines: {
                    show: true
                }
                , points: {
                    show: false
                }
            }
            , xaxis: {
                tickColor: "#ddd"
            }
            , yaxis: {
                min: -2, max: 2, tickColor: "#ddd"
            }
            , grid: {
                borderColor: "#ddd", borderWidth: 1
            }
        }
        )
    }
}

;
var handleStackedChart=function() {
    "use strict";
    function v(e, t, n) {
        $('<div id="tooltip" class="flot-tooltip">'+n+"</div>").css( {
            top: t, left: e+35
        }
        ).appendTo("body").fadeIn(200)
    }
    var e=[];
    for(var t=0;
    t<=5;
    t+=1) {
        e.push([t, parseInt(Math.random()*5)])
    }
    var n=[];
    for(var r=0;
    r<=5;
    r+=1) {
        n.push([r, parseInt(Math.random()*5+5)])
    }
    var i=[];
    for(var s=0;
    s<=5;
    s+=1) {
        i.push([s, parseInt(Math.random()*5+5)])
    }
    var o=[];
    for(var u=0;
    u<=5;
    u+=1) {
        o.push([u, parseInt(Math.random()*5+5)])
    }
    var a=[];
    for(var f=0;
    f<=5;
    f+=1) {
        a.push([f, parseInt(Math.random()*5+5)])
    }
    var l=[];
    for(var c=0;
    c<=5;
    c+=1) {
        l.push([c, parseInt(Math.random()*5+5)])
    }
    var h=[[0,
    "Monday"],
    [1,
    "Tuesday"],
    [2,
    "Wednesday"],
    [3,
    "Thursday"],
    [4,
    "Friday"],
    [5,
    "Saturday"]];
    var p= {
        xaxis: {
            tickColor: "transparent", ticks: h
        }
        ,
        yaxis: {
            tickColor: "#ddd", ticksLength: 10
        }
        ,
        grid: {
            hoverable: true, tickColor: "#ccc", borderWidth: 0, borderColor: "rgba(0,0,0,0.2)"
        }
        ,
        series: {
            stack:true,
            lines: {
                show: false, fill: false, steps: false
            }
            ,
            bars: {
                show: true, barWidth: .5, align: "center", fillColor: null
            }
            ,
            highlightColor:"rgba(0,0,0,0.8)"
        }
        ,
        legend: {
            show: true, labelBoxBorderColor: "#ccc", position: "ne", noColumns: 1
        }
    }
    ;
    var d=[ {
        data:e,
        color:purpleDark,
        label:"China",
        bars: {
            fillColor: purpleDark
        }
    }
    ,
    {
        data:n,
        color:purple,
        label:"Russia",
        bars: {
            fillColor: purple
        }
    }
    ,
    {
        data:i,
        color:purpleLight,
        label:"Canada",
        bars: {
            fillColor: purpleLight
        }
    }
    ,
    {
        data:o,
        color:blueDark,
        label:"Japan",
        bars: {
            fillColor: blueDark
        }
    }
    ,
    {
        data:a,
        color:blue,
        label:"USA",
        bars: {
            fillColor: blue
        }
    }
    ,
    {
        data:l,
        color:blueLight,
        label:"Others",
        bars: {
            fillColor: blueLight
        }
    }
    ];
    $.plot("#stacked-chart", d, p);
    var m=null;
    var g=null;
    $("#stacked-chart").bind("plothover", function(e, t, n) {
        if(n) {
            var r=n.datapoint[1]-n.datapoint[2];
            if(m!=n.series.label||r!=g) {
                m=n.series.label;
                g=r;
                $("#tooltip").remove();
                v(n.pageX, n.pageY, r+" "+n.series.label)
            }
        }
        else {
            $("#tooltip").remove();
            m=null;
            g=null
        }
    }
    )
}

;
var handleTrackingChart=function() {
    "use strict";
    function r() {
        o=null;
        var e=u;
        var t=i.getAxes();
        if(e.x<t.xaxis.min||e.x>t.xaxis.max||e.y<t.yaxis.min||e.y>t.yaxis.max) {
            return
        }
        var n,
        r,
        a=i.getData();
        for(n=0;
        n<a.length;
        ++n) {
            var f=a[n];
            for(r=0;
            r<f.data.length;
            ++r) {
                if(f.data[r][0]>e.x) {
                    break
                }
            }
            var l,
            c=f.data[r-1],
            h=f.data[r];
            if(c===null) {
                l=h[1]
            }
            else if(h===null) {
                l=c[1]
            }
            else {
                l=c[1]+(h[1]-c[1])*(e.x-c[0])/(h[0]-c[0])
            }
            s.eq(n).text(f.label.replace(/=.*/, "= "+l.toFixed(2)))
        }
    }
    var e=[],
    t=[];
    for(var n=0;
    n<14;
    n+=.1) {
        e.push([n, Math.sin(n)]);
        t.push([n, Math.cos(n)])
    }
    if($("#tracking-chart").length!==0) {
        var i=$.plot($("#tracking-chart"), [ {
            data: e, label: "Series1", color: dark, shadowSize: 0
        }
        , {
            data: t, label: "Series2", color: red, shadowSize: 0
        }
        ], {
            series: {
                lines: {
                    show: true
                }
            }
            , crosshair: {
                mode: "x", color: grey
            }
            , grid: {
                hoverable: true, autoHighlight: false, borderColor: "#ccc", borderWidth: 0
            }
            , xaxis: {
                tickLength: 0
            }
            , yaxis: {
                tickColor: "#ddd"
            }
            , legend: {
                labelBoxBorderColor: "#ddd", backgroundOpacity: .4, color: "#fff", show: true
            }
        }
        );
        var s=$("#tracking-chart .legendLabel");
        s.each(function() {
            $(this).css("width", $(this).width())
        }
        );
        var o=null;
        var u=null;
        $("#tracking-chart").bind("plothover", function(e) {
            u=e;
            if(!o) {
                o=setTimeout(r, 50)
            }
        }
        )
    }
}

;
var handleBarChart=function() {
    "use strict";
    if($("#bar-chart").length!==0) {
        var e=[["January",
        10],
        ["February",
        8],
        ["March",
        4],
        ["April",
        13],
        ["May",
        17],
        ["June",
        9]];
        $.plot("#bar-chart", [ {
            data: e, color: purple
        }
        ], {
            series: {
                bars: {
                    show: true, barWidth: .4, align: "center", fill: true, fillColor: purple, zero: true
                }
            }
            , xaxis: {
                mode: "categories", tickColor: "#ddd", tickLength: 0
            }
            , grid: {
                borderWidth: 0
            }
        }
        )
    }
}

;
var handleInteractivePieChart=function() {
    "use strict";
    if($("#interactive-pie-chart").length!==0) {
        var e=[];
        var t=3;
        var n=[purple,
        dark,
        grey];
        for(var r=0;
        r<t;
        r++) {
            e[r]= {
                label: "Series"+(r+1), data: Math.floor(Math.random()*100)+1, color: n[r]
            }
        }
        $.plot($("#interactive-pie-chart"), e, {
            series: {
                pie: {
                    show: true
                }
            }
            , grid: {
                hoverable: true, clickable: true
            }
            , legend: {
                labelBoxBorderColor: "#ddd", backgroundColor: "none"
            }
        }
        )
    }
}

;
var handleDonutChart=function() {
    "use strict";
    if($("#donut-chart").length!==0) {
        var e=[];
        var t=3;
        var n=[dark,
        green,
        purple];
        var r=["Unique Visitor",
        "Bounce Rate",
        "Total Page Views",
        "Avg Time On Site",
        "% New Visits"];
        var i=[20,
        14,
        12,
        31,
        23];
        for(var s=0;
        s<t;
        s++) {
            e[s]= {
                label: r[s], data: i[s], color: n[s]
            }
        }
        $.plot($("#donut-chart"), e, {
            series: {
                pie: {
                    innerRadius:.5, show:true, combine: {
                        color: "#999", threshold: .1
                    }
                }
            }
            , grid: {
                borderWidth: 0, hoverable: true, clickable: true
            }
            , legend: {
                show: false
            }
        }
        )
    }
}

;
var handleInteractiveChart=function() {
    "use strict";
    function e(e, t, n) {
        $('<div id="tooltip" class="flot-tooltip">'+n+"</div>").css( {
            top: t-45, left: e-55
        }
        ).appendTo("body").fadeIn(200)
    }
    if($("#interactive-chart").length!==0) {
        var t=[[0,
        42],
        [1,
        53],
        [2,
        66],
        [3,
        60],
        [4,
        68],
        [5,
        66],
        [6,
        71],
        [7,
        75],
        [8,
        69],
        [9,
        70],
        [10,
        68],
        [11,
        72],
        [12,
        78],
        [13,
        86]];
        var n=[[0,
        12],
        [1,
        26],
        [2,
        13],
        [3,
        18],
        [4,
        35],
        [5,
        23],
        [6,
        18],
        [7,
        35],
        [8,
        24],
        [9,
        14],
        [10,
        14],
        [11,
        29],
        [12,
        30],
        [13,
        43]];
        $.plot($("#interactive-chart"), [ {
            data:t, label:"Page Views", color:purple, lines: {
                show: true, fill: false, lineWidth: 2
            }
            , points: {
                show: false, radius: 5, fillColor: "#fff"
            }
            , shadowSize:0
        }
        , {
            data:n, label:"Visitors", color:green, lines: {
                show: true, fill: false, lineWidth: 2, fillColor: ""
            }
            , points: {
                show: false, radius: 3, fillColor: "#fff"
            }
            , shadowSize:0
        }
        ], {
            xaxis: {
                tickColor: "#ddd", tickSize: 2
            }
            , yaxis: {
                tickColor: "#ddd", tickSize: 20
            }
            , grid: {
                hoverable: true, clickable: true, tickColor: "#ccc", borderWidth: 1, borderColor: "#ddd"
            }
            , legend: {
                labelBoxBorderColor: "#ddd", margin: 0, noColumns: 1, show: true
            }
        }
        );
        var r=null;
        $("#interactive-chart").bind("plothover", function(t, n, i) {
            $("#x").text(n.x.toFixed(2));
            $("#y").text(n.y.toFixed(2));
            if(i) {
                if(r!==i.dataIndex) {
                    r=i.dataIndex;
                    $("#tooltip").remove();
                    var s=i.datapoint[1].toFixed(2);
                    var o=i.series.label+" "+s;
                    e(i.pageX, i.pageY, o)
                }
            }
            else {
                $("#tooltip").remove();
                r=null
            }
            t.preventDefault()
        }
        )
    }
}

;
var handleLiveUpdatedChart=function() {
    "use strict";
    function e() {
        o.setData([t()]);
        o.draw();
        setTimeout(e, i)
    }
    function t() {
        if(n.length>0) {
            n=n.slice(1)
        }
        while(n.length<r) {
            var e=n.length>0?n[n.length-1]: 50;
            var t=e+Math.random()*10-5;
            if(t<0) {
                t=0
            }
            if(t>100) {
                t=100
            }
            n.push(t)
        }
        var i=[];
        for(var s=0;
        s<n.length;
        ++s) {
            i.push([s, n[s]])
        }
        return i
    }
    if($("#live-updated-chart").length!==0) {
        var n=[],
        r=150;
        var i=1e3;
        $("#updateInterval").val(i).change(function() {
            var e=$(this).val();
            if(e&&!isNaN(+e)) {
                i=+e;
                if(i<1) {
                    i=1
                }
                if(i>2e3) {
                    i=2e3
                }
                $(this).val(""+i)
            }
        }
        );
        var s= {
            series: {
                shadowSize:0,
                color:purple,
                lines: {
                    show: true, fill: true
                }
            }
            ,
            yaxis: {
                min: 0, max: 100, tickColor: "#ddd"
            }
            ,
            xaxis: {
                show: true, tickColor: "#ddd"
            }
            ,
            grid: {
                borderWidth: 1, borderColor: "#ddd"
            }
        }
        ;
        var o=$.plot($("#live-updated-chart"), [t()], s);
        e()
    }
}

;
var Chart=function() {
    "use strict";
    return {
        init:function() {
            handleBasicChart();
            handleStackedChart();
            handleTrackingChart();
            handleBarChart();
            handleInteractivePieChart();
            handleDonutChart();
            handleInteractiveChart();
            handleLiveUpdatedChart()
        }
    }
}

()

































/*   
Template Name: Color Admin - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.5
Version: 1.9.0
Author: Sean Ngu
Website: http://www.seantheme.com/color-admin-v1.9/admin/
*/
var handleDatepicker = function() {
        $("#datepicker-default").datepicker({
            todayHighlight: !0
        }), $("#datepicker-inline").datepicker({
            todayHighlight: !0
        }), $(".input-daterange").datepicker({
            todayHighlight: !0
        }), $("#datepicker-disabled-past").datepicker({
            todayHighlight: !0
        }), $("#datepicker-autoClose").datepicker({
            todayHighlight: !0,
            autoclose: !0
        })
    },
    handleIonRangeSlider = function() {
        $("#default_rangeSlider").ionRangeSlider({
            min: 0,
            max: 5e3,
            type: "double",
            prefix: "$",
            maxPostfix: "+",
            prettify: !1,
            hasGrid: !0
        }), $("#customRange_rangeSlider").ionRangeSlider({
            min: 1e3,
            max: 1e5,
            from: 3e4,
            to: 9e4,
            type: "double",
            step: 500,
            postfix: " €",
            hasGrid: !0
        }), $("#customValue_rangeSlider").ionRangeSlider({
            values: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
            type: "single",
            hasGrid: !0
        })
    },
    handleFormMaskedInput = function() {
        "use strict";
        $("#masked-input-date").mask("99/99/9999"), $("#masked-input-phone").mask("(999) 999-9999"), $("#masked-input-tid").mask("99-9999999"), $("#masked-input-ssn").mask("999-99-9999"), $("#masked-input-pno").mask("aaa-9999-a"), $("#masked-input-pkey").mask("a*-999-a999")
    },
    handleFormColorPicker = function() {
        "use strict";
        $("#colorpicker").colorpicker({
            format: "hex"
        }), $("#colorpicker-prepend").colorpicker({
            format: "hex"
        }), $("#colorpicker-rgba").colorpicker()
    },
    handleFormTimePicker = function() {
        "use strict";
        $("#timepicker").timepicker()
    },
    handleFormPasswordIndicator = function() {
        "use strict";
        $("#password-indicator-default").passwordStrength(), $("#password-indicator-visible").passwordStrength({
            targetDiv: "#passwordStrengthDiv2"
        })
    },
    handleJqueryAutocomplete = function() {
        var e = ["ActionScript", "AppleScript", "Asp", "BASIC", "C", "C++", "Clojure", "COBOL", "ColdFusion", "Erlang", "Fortran", "Groovy", "Haskell", "Java", "JavaScript", "Lisp", "Perl", "PHP", "Python", "Ruby", "Scala", "Scheme"];
        $("#jquery-autocomplete").autocomplete({
            source: e
        })
    },
    handleBootstrapCombobox = function() {
        $(".combobox").combobox()
    },
    handleTagsInput = function() {
        $(".bootstrap-tagsinput input").focus(function() {
            $(this).closest(".bootstrap-tagsinput").addClass("bootstrap-tagsinput-focus")
        }), $(".bootstrap-tagsinput input").focusout(function() {
            $(this).closest(".bootstrap-tagsinput").removeClass("bootstrap-tagsinput-focus")
        })
    },
    handleSelectpicker = function() {
        $(".selectpicker").selectpicker("render")
    },
    handleJqueryTagIt = function() {
        $("#jquery-tagIt-default").tagit({
            availableTags: ["c++", "java", "php", "javascript", "ruby", "python", "c"]
        }), $("#jquery-tagIt-inverse").tagit({
            availableTags: ["c++", "java", "php", "javascript", "ruby", "python", "c"]
        }), $("#jquery-tagIt-white").tagit({
            availableTags: ["c++", "java", "php", "javascript", "ruby", "python", "c"]
        }), $("#jquery-tagIt-primary").tagit({
            availableTags: ["c++", "java", "php", "javascript", "ruby", "python", "c"]
        }), $("#jquery-tagIt-info").tagit({
            availableTags: ["c++", "java", "php", "javascript", "ruby", "python", "c"]
        }), $("#jquery-tagIt-success").tagit({
            availableTags: ["c++", "java", "php", "javascript", "ruby", "python", "c"]
        }), $("#jquery-tagIt-warning").tagit({
            availableTags: ["c++", "java", "php", "javascript", "ruby", "python", "c"]
        }), $("#jquery-tagIt-danger").tagit({
            availableTags: ["c++", "java", "php", "javascript", "ruby", "python", "c"]
        })
    },
    handleDateRangePicker = function() {
        $("#default-daterange").daterangepicker({
            opens: "right",
            format: "MM/DD/YYYY",
            separator: " to ",
            startDate: moment().subtract("days", 29),
            endDate: moment(),
            minDate: "01/01/2012",
            maxDate: "12/31/2018"
        }, function(e, t) {
            $("#default-daterange input").val(e.format("MMMM D, YYYY") + " - " + t.format("MMMM D, YYYY"))
        }), $("#advance-daterange span").html(moment().subtract("days", 29).format("MMMM D, YYYY") + " - " + moment().format("MMMM D, YYYY")), $("#advance-daterange").daterangepicker({
            format: "MM/DD/YYYY",
            startDate: moment().subtract(29, "days"),
            endDate: moment(),
            minDate: "01/01/2012",
            maxDate: "12/31/2015",
            dateLimit: {
                days: 60
            },
            showDropdowns: !0,
            showWeekNumbers: !0,
            timePicker: !1,
            timePickerIncrement: 1,
            timePicker12Hour: !0,
            ranges: {
                Today: [moment(), moment()],
                Yesterday: [moment().subtract(1, "days"), moment().subtract(1, "days")],
                "Last 7 Days": [moment().subtract(6, "days"), moment()],
                "Last 30 Days": [moment().subtract(29, "days"), moment()],
                "This Month": [moment().startOf("month"), moment().endOf("month")],
                "Last Month": [moment().subtract(1, "month").startOf("month"), moment().subtract(1, "month").endOf("month")]
            },
            opens: "right",
            drops: "down",
            buttonClasses: ["btn", "btn-sm"],
            applyClass: "btn-primary",
            cancelClass: "btn-default",
            separator: " to ",
            locale: {
                applyLabel: "Submit",
                cancelLabel: "Cancel",
                fromLabel: "From",
                toLabel: "To",
                customRangeLabel: "Custom",
                daysOfWeek: ["Su", "Mo", "Tu", "We", "Th", "Fr", "Sa"],
                monthNames: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
                firstDay: 1
            }
        }, function(e, t) {
            $("#advance-daterange span").html(e.format("MMMM D, YYYY") + " - " + t.format("MMMM D, YYYY"))
        })
    },
    handleSelect2 = function() {
        $(".default-select2").select2(), $(".multiple-select2").select2({
            placeholder: "Select a state"
        })
    },
    handleDateTimePicker = function() {
        $("#datetimepicker1").datetimepicker(), $("#datetimepicker2").datetimepicker({
            format: "LT"
        }), $("#datetimepicker3").datetimepicker(), $("#datetimepicker4").datetimepicker(), $("#datetimepicker3").on("dp.change", function(e) {
            $("#datetimepicker4").data("DateTimePicker").minDate(e.date)
        }), $("#datetimepicker4").on("dp.change", function(e) {
            $("#datetimepicker3").data("DateTimePicker").maxDate(e.date)
        })
    },
    FormPlugins = function() {
        "use strict";
        return {
            init: function() {
                handleDatepicker(), handleIonRangeSlider(), handleFormMaskedInput(), handleFormColorPicker(), handleFormTimePicker(), handleFormPasswordIndicator(), handleJqueryAutocomplete(), handleBootstrapCombobox(), handleSelectpicker(), handleTagsInput(), handleJqueryTagIt(), handleDateRangePicker(), handleSelect2(), handleDateTimePicker()
            }
        }
    }();