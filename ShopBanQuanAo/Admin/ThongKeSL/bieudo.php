<!DOCTYPE html>
<html lang="en-US">
    <body>

        <h1 style="font-size: 1.5em;">Thống kê biểu đồ</h1>

        <div id="piechart"></div>

        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <script type="text/javascript">
    // Load google charts
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    // Draw the chart and set the chart values
    function drawChart() {
    var data = google.visualization.arrayToDataTable([
        ['Danh mục', 'Số lượng sản phẩm'],
    <?php 
        $tongdm = count($dsLoai);
        $i = 1;
        foreach ($dsLoai as $loai) {
            extract($loai);
            if($i <> $tongdm){
                echo "['".$tenLoai."', ".$countsp."],";
            } else {
                echo "['".$tenLoai."', ".$countsp."]";
            }
            $i += 1;

        }  
    ?>

    ]);

    // Optional; add a title and set the width and height of the chart
    var options = {'title':'Thống kê số lượng sản phẩm theo loại', 'width':700, 'height':500};

    // Display the chart inside the <div> element with id="piechart"
    var chart = new google.visualization.PieChart(document.getElementById('piechart'));
    chart.draw(data, options);
    }
    </script>

    </body>
</html>
