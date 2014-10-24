
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Raphaël · Gear</title>
        <link rel="stylesheet" href="demo.css" media="screen">
        <link rel="stylesheet" href="demo-print.css" media="print">
        <script src="raphael.js"></script>
        <script>
        Raphael("holder", 640, 480, function () {
            var r = this,
                p = r.path("M295.186,122.908c12.434,18.149,32.781,18.149,45.215,0l12.152-17.736c12.434-18.149,22.109-15.005,21.5,6.986l-0.596,21.49c-0.609,21.992,15.852,33.952,36.579,26.578l20.257-7.207c20.728-7.375,26.707,0.856,13.288,18.29l-13.113,17.037c-13.419,17.434-7.132,36.784,13.971,43.001l20.624,6.076c21.103,6.217,21.103,16.391,0,22.608l-20.624,6.076c-21.103,6.217-27.39,25.567-13.971,43.001l13.113,17.037c13.419,17.434,7.439,25.664-13.287,18.289l-20.259-7.207c-20.727-7.375-37.188,4.585-36.578,26.576l0.596,21.492c0.609,21.991-9.066,25.135-21.5,6.986L340.4,374.543c-12.434-18.148-32.781-18.148-45.215,0.001l-12.152,17.736c-12.434,18.149-22.109,15.006-21.5-6.985l0.595-21.492c0.609-21.991-15.851-33.951-36.578-26.576l-20.257,7.207c-20.727,7.375-26.707-0.855-13.288-18.29l13.112-17.035c13.419-17.435,7.132-36.785-13.972-43.002l-20.623-6.076c-21.104-6.217-21.104-16.391,0-22.608l20.623-6.076c21.104-6.217,27.391-25.568,13.972-43.002l-13.112-17.036c-13.419-17.434-7.439-25.664,13.288-18.29l20.256,7.207c20.728,7.374,37.188-4.585,36.579-26.577l-0.595-21.49c-0.609-21.992,9.066-25.136,21.5-6.986L295.186,122.908z").attr({stroke: "#666", opacity: .3, "stroke-width": 10}),
                over = r.path().attr({stroke: "#fff"}),
                len = p.getTotalLength(),
                e = r.ellipse(0, 0, 7, 3).attr({stroke: "none", fill: "#fff"}).onAnimation(function () {
                    var t = this.attr("transform");
                    over.attr({path: "M316,248L" + t[0][1] + "," + t[0][2] + "z"});
                });
            r.circle(316, 248, 5).attr({stroke: "none", fill: "#fff"});
            r.customAttributes.along = function (v) {
                var point = p.getPointAtLength(v * len);
                return {
                    transform: "t" + [point.x, point.y] + "r" + point.alpha
                };
            };
            e.attr({along: 0});
            
            var rotateAlongThePath = true;
            function run() {
                e.animate({along: 1}, 2e4, function () {
                    e.attr({along: 0});
                    setTimeout(run);
                });
            }
            run();


            // logo
            var logo = r.set(
            r.rect(13, 13, 116, 116, 30).attr({stroke: "none", fill: "#fff", transform: "r45", opacity: .2}),
            r.path("M129.657,71.361c0,3.812-1.105,7.451-3.153,10.563c-1.229,1.677-2.509,3.143-3.829,4.408l-0.095,0.095c-6.217,5.912-13.24,7.588-19.2,7.588c-3.28,0-6.24-0.508-8.566-1.096C81.19,89.48,66.382,77.757,59.604,60.66c3.65,1.543,7.662,2.396,11.869,2.396c15.805,0,28.849-12.04,30.446-27.429l22.073,22.072C127.645,61.351,129.657,66.201,129.657,71.361zM18.953,85.018c-3.653-3.649-5.663-8.5-5.663-13.656c0-5.16,2.01-10.011,5.661-13.656l14.934-14.935c-3.896,13.269-5.569,27.23-4.674,40.614c0.322,4.812,0.987,9.427,1.942,13.831L18.953,85.018zM44.482,46.869c3.279,25.662,23.592,50.991,47.552,57.046c3.903,0.986,7.729,1.472,11.432,1.472c0.055,0,0.107-0.005,0.161-0.005l-18.501,18.503c-3.647,3.646-8.498,5.654-13.652,5.654c-3.591,0-7.021-0.993-10.01-2.815l0.007-0.01c-1.177-0.78-2.298-1.66-3.388-2.593c-0.084-0.082-0.176-0.153-0.26-0.236l-3.738-3.738c-7.688-8.825-12.521-21.957-13.561-37.517C39.736,70.853,41.149,58.578,44.482,46.869").attr({fill: "#f89938", stroke: "none", opacity: .5}),
            r.circle(71, 32, 19).attr({stroke: "none", fill: "#39f", opacity: .5}));
            logo.transform("t245,177...");
            // logo end
        });
        </script>
    </head>
    <body>
        <div id="holder"></div>
        <p id="copy">Demo of <a href="http://raphaeljs.com/">Raphaël</a>—JavaScript Vector Library</p>
    </body>
</html>