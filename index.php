   <!DOCTYPE html>
   <html>

   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Monitoring</title>
      <script src="js/jquery-3.5.1.min.js"></script>
      <?php include 'js/chartScript.php'; ?>
      <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js">
      </script>
      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
      <link rel="stylesheet" href="css/main.css?ver=17">
      <script>
         $(document).ready(function () {
            listTable = $('#ListTable').DataTable({
               "info": false,
               "ajax": "robotTableReader.php",
               "columns": [{
                     "data": "v1"
                  },
                  {
                     "data": "v2"
                  },
                  {
                     "data": "v3"
                  },
                  {
                     "data": "v4"
                  },
                  {
                     "data": "v5"
                  }
               ],
            });
            listTable.on('xhr', function (e, settings, json) {
               setTimeout(() => {
                  $('#ListTable tbody tr').click(function () {
                     chartclick(this);

                  })

               }, 500);
            })
         })
      </script>
   </head>

   <body>

      <!-- <header id="header">
      <h1 id="Logo">로고<a href="#"></a></h1>
      <nav id="GNB">
         <ul>
            <li><a href="index.php">Monitoring</a></li>
            <li><a href="#none">Prognostics</a></li>
         </ul>
      </nav>
   </header> -->
      <main>
         <div class="MonitoringWrap">
            <div class="Monitoring">
               <h2>모니터링 로봇 리스트</h2>
               <div class="tableButtonBox">
                  <button type="button" class="mainButton addRow">추가</button>
               </div>
               <table id="ListTable" class="DataTable display">
                  <thead>
                     <tr>
                        <th>No</th>
                        <th>위치</th>
                        <th>종류</th>
                        <th>센서수</th>
                        <th>상태</th>
                        <!-- <th>수정/삭제</th> -->
                     </tr>
                  </thead>
               </table>
               <div class="scrolling">
                  <section class="rawdata">
                     <h3>실시간 차트</h3>
                     <div class="chartgrid">
                        <div class="RobotWrap">
                           <div class="RobotImg"></div>
                           <div class="robotState">
                              <div class="stat_name"><span>코드네임 :</span><span>CDB-24Z5k</span></div>
                              <div class="stat_pos"><span>위치 :</span><span></span></div>
                              <div class="stat_work"><span>역할구분 :</span><span>조립</span></div>
                              <div class="stat_senNum"><span>센서 수 :</span><span>3</span></div>
                              <div class="stat_senwork"><span>센서 종류 :</span>
                                 <span>
                                    <p class="senwork_num">진동</p>
                                    <p class="senwork_num">진동</p>
                                    <p class="senwork_num">진동</p>
                                 </span>
                              </div>
                              <div class="stat_senRUL"><span>기대수명(분) :</span>
                                 <span>
                                    <p class="semRUL_num">3600</p>
                                    <p class="semRUL_num">2310</p>
                                    <p class="semRUL_num">4961</p>
                                 </span>
                              </div>
                           </div>
                        </div>
                        <div class="sensor">
                           <div class="conditionWrap">
                              <div class="condition status">위치:<span class="senserpos"></span> 종류:<span
                                    class="sensorwork">진동</span></div>
                              <div class="condition onOff"><span class="updatedDate"></span></div>
                              <div class="condition rul">RUL : <span class="rultime">3600</span> minute</div>
                              <div class="prog">Prognostics</div>
                           </div>
                           <div class="RTchartWrap demo-container">
                              <div id="chart1" class="RTchart demo-placeholder"></div>
                           </div>
                        </div>
                        <div class="sensor">
                           <div class="conditionWrap">
                              <div class="condition status">위치:<span class="senserpos"></span> 종류:<span
                                    class="sensorwork">진동</span></div>
                              <div class="condition onOff"><span class="updatedDate"></span></div>
                              <div class="condition rul">RUL : <span class="rultime">2310</span> minute</div>
                              <div class="prog">Prognostics</div>
                           </div>
                           <div class="RTchartWrap demo-container">
                              <div id="chart2" class="RTchart demo-placeholder"></div>
                           </div>
                        </div>
                        <div class="sensor">
                           <div class="conditionWrap">
                              <div class="condition status">위치:<span class="senserpos"></span> 종류:<span
                                    class="sensorwork">진동</span></div>
                              <div class="condition onOff"><span class="updatedDate"></span></div>
                              <div class="condition rul">RUL : <span class="rultime">4961</span> sminute</div>
                              <div class="prog">Prognostics</div>
                           </div>
                           <div class="RTchartWrap demo-container">
                              <div id="chart3" class="RTchart demo-placeholder"></div>
                           </div>
                        </div>
                     </div>
                  </section>
                  <section class="realData">
                     <h3>로그 및 프로세싱</h3>
                     <div class="sectionHeader">
                        <div class="tab showProcessing on">이벤트</div>
                        <div class="tab showLog">로그</div>
                     </div>
                     <div class="sectionBody">
                        <div class="event">
                           <p class="eventData"><span class="occuredDate">2020-11-05</span> <span
                                 class="occuredPosition"></span> <span class="happen">,3번 센서 데이터 수신</span></p>
                           <p class="eventData"><span class="occuredDate">2020-11-05</span> <span
                                 class="occuredPosition"></span> <span class="happen">,1번 센서 데이터 수신</span></p>
                           <p class="eventData"><span class="occuredDate">2020-11-05</span> <span
                                 class="occuredPosition"></span> <span class="happen">,2번 센서 데이터 수신</span></p>
                           <p class="eventData"><span class="occuredDate">2020-11-04</span> <span
                                 class="occuredPosition"></span> <span class="happen">,1번 센서 Prognostics Analysis alarm</span></p>
                           <p class="eventData"><span class="occuredDate">2020-11-04</span> <span
                                 class="occuredPosition"></span> <span class="happen">,3번 센서 정지</span></p>
                                 <p class="eventData"><span class="occuredDate">2020-11-04</span> <span
                                 class="occuredPosition"></span> <span class="happen">,2번 센서 데이터 수신</span></p>
                           <p class="eventData"><span class="occuredDate">2020-11-03</span> <span
                                 class="occuredPosition"></span> <span class="happen">,1번 센서 데이터 수신</span></p>
                           <p class="eventData"><span class="occuredDate">2020-11-03</span> <span
                                 class="occuredPosition"></span> <span class="happen">,2번 센서 데이터 수신</span></p>
                                 <p class="eventData"><span class="occuredDate">2020-11-03</span> <span
                                 class="occuredPosition"></span> <span class="happen">,3번 센서 데이터 수신</span></p>
                           <p class="eventData"><span class="occuredDate">2020-11-02</span> <span
                                 class="occuredPosition"></span> <span class="happen">,1번 센서 데이터 수신</span></p>
                           <p class="eventData"><span class="occuredDate">2020-11-02</span> <span
                                 class="occuredPosition"></span> <span class="happen">,2번 센서 데이터 수신</span></p>     
                        </div>
                        <div class="log">
                        <p class="eventData"><span class="occuredDate">2020-11-05</span> <span
                                 class="occuredPosition"></span> <span class="happen">,3번 센서 데이터 수신</span></p>
                           <p class="eventData"><span class="occuredDate">2020-11-05</span> <span
                                 class="occuredPosition"></span> <span class="happen">,1번 센서 데이터 수신</span></p>
                           <p class="eventData"><span class="occuredDate">2020-11-05</span> <span
                                 class="occuredPosition"></span> <span class="happen">,2번 센서 데이터 수신</span></p>
                           <p class="eventData"><span class="occuredDate">2020-11-04</span> <span
                                 class="occuredPosition"></span> <span class="happen">,1번 센서 Prognostics Analysis alarm</span></p>
                                 <p class="eventData"><span class="occuredDate">2020-11-04</span> <span
                                 class="occuredPosition"></span> <span class="happen">,3번 센서 데이터 수신</span></p>
                           <p class="eventData"><span class="occuredDate">2020-11-04</span> <span
                                 class="occuredPosition"></span> <span class="happen">,2번 센서 데이터 수신</span></p>
                                 <p class="eventData"><span class="occuredDate">2020-11-04</span> <span
                                 class="occuredPosition"></span> <span class="happen">,3번 센서 정지</span></p>
                           <p class="eventData"><span class="occuredDate">2020-11-04</span> <span
                                 class="occuredPosition"></span> <span class="happen">,3번 센서 데이터 불규칙</span></p>
                           <p class="eventData"><span class="occuredDate">2020-11-03</span> <span
                                 class="occuredPosition"></span> <span class="happen">,2번 센서 데이터 수신</span></p>
                                 <p class="eventData"><span class="occuredDate">2020-11-03</span> <span
                                 class="occuredPosition"></span> <span class="happen">,3번 센서 데이터 수신</span></p>
                           <p class="eventData"><span class="occuredDate">2020-11-02</span> <span
                                 class="occuredPosition"></span> <span class="happen">,1번 센서 중복 데이터 수신</span></p>
                        </div>
                     </div>
                  </section>
               </div>
            </div>
         </div>
      </main>
      <div class="add_List">
         <p class="List_topBar">로봇 리스트 추가입력</p>
         <span class="exitList"></span>
         <form action="robotTablePush.php" method="POST">
            <div class="list_w">
               <input type="text" name="Rposition" placeholder="로봇의 위치">
            </div>
            <div class="list_w">
               <input type="text" name="Rkind" placeholder="로봇의 종류 및 역할">
            </div>
            <div class="list_w">
               <input type="text" name="Rsensor" placeholder="로봇에 달린 센서 수">
            </div>
            <div class="list_w">
               <input type="text" name="Rcondition" placeholder="상태표시">
            </div>
            <button type="button" class="mainButton" onclick="submitForm( this.form );">추가하기</button>
         </form>
      </div>
      <script src="js/chart.js?ver=7"></script>
      <script src="js/main.js?ver=17"></script>
   </body>

   </html>