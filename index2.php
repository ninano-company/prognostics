<!DOCTYPE html>
<html>

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Monitoring</title>
   <script src="js/jquery-3.5.1.min.js"></script>
   <?php include 'js/chartScript.php'; ?>
   </script>
   <!-- <link rel="stylesheet" href="css/main.css"> -->
</head>

<body>
   <div>
      <nav>
         <ul>
            <li class="robotName">
               
            </li>
            <li class="robotName">
               
            </li>
            <li class="robotName">
               
            </li>
         </ul>
      </nav>
   </div>
   <main>
      <div class="MonitoringWrap">
         <div class="Monitoring">
            <h2>모니터링 로봇 리스트</h2>
            <div class="tableButtonBox">
               <button type="button" class="mainButton addRow">추가</button>
            </div>
            <div class="scrolling2">
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
                     </div>
                     <div class="log">
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
      <form action="allPush.php" method="POST">
         <div class="list_w">
            <input type="text" name="Rname" placeholder="로봇 이름(파일저장명)">
         </div>
         <div class="list_w">
            <input type="text" name="Rposition" placeholder="로봇의 위치">
         </div>
         <div class="list_w">
            <input type="text" name="Rkind" placeholder="로봇의 종류">
         </div>
         <div class="list_w">
            <input type="number" name="Rsensor" placeholder="로봇에 달린 센서 수">
         </div>
         <!-- <div class="list_s">
            <input type="text" name="Sname" placeholder="센서 이름(파일저장명)">
            <input type="text" name="Spos" place="센서의 위치">
            <select name="Skind">
               <option value="0" selected>로봇의 종류를 선택해주세요</option>
               <option value="1">진동</option>
               <option value="2">압력</option>
               <option value="3">발열</option>
            </select>
         </div> -->
         <button type="button" class="mainButton" onclick="submitForm( this.form );">추가하기</button>
      </form>
   </div>
   <script src="js/chart.js?ver=7"></script>
   <script src="js/main.js?ver=17"></script>
   <?php include 'js/makeOneChart.php' ?>
   <script>
      // 추가입력
      $('.list_w input[name=Rsensor]').on('change',function(){
         $('.list_s').detach()
        var senNum = $(this).val();
        for(let i=0; i<senNum; i++){
         var sensorTag = '<div class="list_s"><input type="text" name="Sname'+i+'" placeholder="센서 이름(파일저장명)"><input type="text" name="Spos'+i+'" placeholder="센서의 위치"><select name="Skind'+i+'"><option value="0" selected>로봇의 종류를 선택해주세요</option><option value="1">진동</option><option value="2">압력</option><option value="3">발열</option></select></div>'
           $(this).parents('form').append(sensorTag)
        }
      })
      $('.prog').click(function(){
         makeChart(this);
      })
   </script>
</body>

</html>