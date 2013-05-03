<!doctype html>
<head>
        <title>Dólar blue - Cotización</title>
        <meta name="description" content="Cotización del Dólar Blue actualizada al instante.">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <style>
        body{
            font-family: 'Open Sans', sans-serif;
            font-weight: 300;
        }
        .content{
            width: 960px;
            margin: 0 auto;
        }
        .dolar{
            text-align: center;
        }
        .top{
            font-size: 48px;
            margin-top: 25px;
        }
        .val{
            color: #3d79d0;
            font-size: 200px;
        }
        #chart{
            width: 900px;
            height: 350px;
            margin: 0 auto;
            margin-top: -30px;
        }
        .social{
                padding-top: 40px;
                text-align: center;
        }
        .social .item{
                display: inline-block;
        }
        .social .item.middle{
                margin: 0 30px;
        }
    </style>
    <?php
    $data = json_decode(file_get_contents('data.txt'), true);
    ?>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
        google.load("visualization", "1", {packages:["corechart"]});
        google.setOnLoadCallback(drawChart);
        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['', '']
                <?php
                $first = true;
                foreach (array_reverse($data) as $date => $val) {
                        ?>
                    ,['<?=$date?>', <?=$val?>]
                        <?php
                }
                ?>
            ]);

            var options = {
                legend: {position: 'none'},
                vAxis: {format:'$#.##'}
            };
            
            var chart = new google.visualization.LineChart(document.getElementById('chart'));
            chart.draw(data, options);
        }
    </script>
</head>
<body>
        <script type="text/javascript">

          var _gaq = _gaq || [];
          _gaq.push(['_setAccount', 'UA-38497854-1']);
          _gaq.push(['_trackPageview']);

          (function() {
                var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
                ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
                var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
          })();

        </script>
    <div class="content">
            <div class="dolar">
            <div class="top">El dólar blue cuesta:</div>
            <div class="val">$<?=(str_replace('.', ',', array_shift($data)))?></div>
        </div>
        <div id="chart"></div>
        <div class="social">
                <div class="item">
                        <a href="http://twitter.com/share" class="twitter-share-button" data-url="http://www.superblue.com.ar" data-count="vertical"></a>
                </div>
                <div class="item middle">
                        <g:plusone size="tall" href="http://www.superblue.com.ar"></g:plusone>
                </div>
                <div class="item">
                        <iframe src="//www.facebook.com/plugins/like.php?href=http%3A%2F%2Fwww.superblue.com.ar&amp;send=false&amp;layout=box_count&amp;width=75&amp;show_faces=false&amp;font&amp;colorscheme=light&amp;action=like&amp;height=61&amp;appId=108101006013113" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:75px; height:61px;" allowTransparency="true"></iframe>
                </div>
                <script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
                        <script type="text/javascript" src="https://apis.google.com/js/plusone.js"></script>
        </div>
    </div>
</body>
</html>