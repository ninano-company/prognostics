<?php
    $list = array();
foreach(glob('../json/*.json') as $filename){
    array_push($list, $filename);
}
 ?>
 
<script>
    let fileList = new Array();
    fileList = <?php echo json_encode($list) ?> ;
    let indexStart, indexEnd;
    let name = new Array();
    for (let i = 0; i < fileList.length; i++) {
        indexStart = fileList[i].indexOf('n/');
        indexEnd = fileList[i].indexOf('.json');
        name[i] = fileList[i].substring(indexStart + 2, indexEnd);
        name[i] = Number(name[i])
    }
    // console.log(Math.max.apply(null , name))

    function choseBig(myArray) {
        var result = [],
            firstBig, secondBig;

        // select the biggest value
        firstBig = Math.max.apply(Math, myArray);

        // find its index
        var index = myArray.indexOf(firstBig);

        // remove the biggest value from the original array 
        myArray.splice((index), 1);


        secondBig = Math.max.apply(Math, myArray);

        // push the results into a new array
        result.push(firstBig, secondBig);

        return result;
    }

    let jsonData = new Array();
    let timing = new Array();
    let lastIndexBefore = 0;
    let lastIndexNow;

    function calljsonData(url, timdefat) {
        $.ajax({
            url: '../json/' + url + '.json',
            async: true,
            dataType: 'json',
            success: function (json) {
                lastIndexNow = lastIndexBefore + Math.floor(json.channel3.length/10);
                let sumAll = new Array();
                for (let i = lastIndexBefore, j = 0; i < lastIndexNow, j < Math.floor(json.channel3.length/10); i++, j++) {
                    let sumTen =0 ;
                    for(let k=j*10; k<j*10 + 10; k++){
                        sumTen = sumTen + json.channel3[k]
                    }
                    sumAll[j] = sumTen/10
                    if (i == lastIndexBefore) {
                        //  타이밍 첫 값은 변수
                        timing[i] = timdefat
                    } else {
                        timing[i] = timing[i - 1] + 1 / Math.floor(json.channel3.length/10)
                    }
                    jsonData[i] = [timing[i], sumAll[j]];
                }
                lastIndexBefore = lastIndexNow
            }
        })
    }
    function drawchart() {
   let newFile = choseBig(name);
 calljsonData(newFile[0], 0);


   var data = [{
      data: jsonData,
      xaxis: 1,
      yaxis: 1,
      lines: {
         show: true
      }
   }];
   var plot = $.plot("#rawdatachart", data, {
      xaxes: [{
         mode: 'time',
         timeformat: "%b %y"
      }],
      yaxes: [{
         position: 'left',
         autoScale: 'loose',
         min: -100,
         max: 0
         
      }],
      
      zoom: {
         interactive: true
      },
      pan: {
         interactive: true
      }
   });

   function update() {

      data = [{
         data: jsonData,
         xaxis: 1,
         yaxis: 1,
         lines: {
            show: true
         }
      }];
      plot.setData(data);
      plot.setupGrid(true);
      plot.draw();
      
      window.requestAnimationFrame(update);
   }

   window.requestAnimationFrame(update);

};
drawchart();
</script>