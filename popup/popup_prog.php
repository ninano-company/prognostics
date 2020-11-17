<!DOCTYPE html>
<html>

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Prognostics</title>
   <link rel="stylesheet" href="css/pop.css?ver=9">
   <?php include 'charting/popupScript.php'; ?>
</head>

<body>
   <div id="contentWrap">
      <div id="content">
         <h1 class="hidden">Prognostics</h1>
         <div class="sensorBox">
            <div class="senName">Name : <span>CDB-24Z5k</span></div>
            <div class="senStatus">Status : <span>라인1, 3열<br>진동</span></div>
            <div class="senRUL">RUL : <span>3600 (min)</span></div>
         </div>
         <section id="analysis">
            <h2>Analysis</h2>
            <div class="analyBox">
               <p>Entrophy of 100Hz cycle reaches 80% of RUL - Min(RUL) : 2650 min , Max(RUL) : 2880 min</p>
            </div>
         </section>
         <section id="rawdata">
            <h2>Raw Data Chart</h2>
            <div class="RTchartWrap demo-container">
               <div id="rawdatachart" class="RTchart demo-placeholder"></div>
            </div>
         </section>
         <section id="replot">
            <h2>Data Replot</h2>
            <span>(value / cycle)</span>
            <div class="replotBox">
               <div class="r1hz">
                  <p>1hz</p>
                  <div class="ChartBox">
                     <div class="Chart"></div>
                  </div>
               </div>
               <div class="r2hz">
                  <p>2hz</p>
                  <div class="ChartBox">
                     <div class="Chart"></div>
                  </div>
               </div>
               <div class="r5hz">
                  <p>5hz</p>
                  <div class="ChartBox">
                     <div class="Chart"></div>
                  </div>
               </div>
               <div class="r10hz">
                  <p>10hz</p>
                  <div class="ChartBox">
                     <div class="Chart"></div>
                  </div>
               </div>
               <div class="r20hz">
                  <p>20hz</p>
                  <div class="ChartBox">
                     <div class="Chart"></div>
                  </div>
               </div>
               <div class="r50hz">
                  <p>50hz</p>
                  <div class="ChartBox">
                     <div class="Chart"></div>
                  </div>
               </div>
               <div class="r100hz">
                  <p>100hz</p>
                  <div class="ChartBox">
                     <div class="Chart"></div>
                  </div>
               </div>
               <div class="r200hz">
                  <p>200hz</p>
                  <div class="ChartBox">
                     <div class="Chart"></div>
                  </div>
               </div>
               <div class="r400hz">
                  <p>400hz</p>
                  <div class="ChartBox">
                     <div class="Chart"></div>
                  </div>
               </div>
               <div class="r800hz">
                  <p>800hz</p>
                  <div class="ChartBox">
                     <div class="Chart"></div>
                  </div>
               </div>
               <div class="r1000hz">
                  <p>1000hz</p>
                  <div class="ChartBox">
                     <div class="Chart"></div>
                  </div>
               </div>
               <div class="r2000hz">
                  <p>2000hz</p>
                  <div class="ChartBox">
                     <div class="Chart"></div>
                  </div>
               </div>
            </div>
         </section>
         <section id="entrophyCal">
            <h2>Entrophy Calulation</h2>
            <span>(value / cycle)</span>
            <div class="entrophyBox">
               <div class="e1hz">
                  <p>1hz</p>
                  <div class="ChartBox">
                     <div class="Chart"></div>
                  </div>
               </div>
               <div class="e2hz">
                  <p>2hz</p>
                  <div class="ChartBox">
                     <div class="Chart"></div>
                  </div>
               </div>
               <div class="e5hz">
                  <p>5hz</p>
                  <div class="ChartBox">
                     <div class="Chart"></div>
                  </div>
               </div>
               <div class="e10hz">
                  <p>10hz</p>
                  <div class="ChartBox">
                     <div class="Chart"></div>
                  </div>
               </div>
               <div class="e20hz">
                  <p>20hz</p>
                  <div class="ChartBox">
                     <div class="Chart"></div>
                  </div>
               </div>
               <div class="e50hz">
                  <p>50hz</p>
                  <div class="ChartBox">
                     <div class="Chart"></div>
                  </div>
               </div>
               <div class="e100hz">
                  <p>100hz</p>
                  <div class="ChartBox">
                     <div class="Chart"></div>
                  </div>
               </div>
               <div class="e200hz">
                  <p>200hz</p>
                  <div class="ChartBox">
                     <div class="Chart"></div>
                  </div>
               </div>
               <div class="e400hz">
                  <p>400hz</p>
                  <div class="ChartBox">
                     <div class="Chart"></div>
                  </div>
               </div>
               <div class="e800hz">
                  <p>800hz</p>
                  <div class="ChartBox">
                     <div class="Chart"></div>
                  </div>
               </div>
               <div class="e1000hz">
                  <p>1000hz</p>
                  <div class="ChartBox">
                     <div class="Chart"></div>
                  </div>
               </div>
               <div class="e2000hz">
                  <p>2000hz</p>
                  <div class="ChartBox">
                     <div class="Chart"></div>
                  </div>
               </div>
            </div>
         </section>
      </div>
   </div>
   <?php include 'charting/raw.php'; ?>
   <?php include 'charting/replot1.php'; ?>
   <?php 
   include 'charting/entrophy.php'; ?>
   <script>
      $(window).resize(function () {
         $('.flot-base').width('100%')
      })
   </script>
</body>

</html>