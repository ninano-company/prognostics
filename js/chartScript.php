<?php
    $list = array();
foreach(glob('json/*.json') as $filename){
    array_push($list, $filename);
}
 ?>
<script language="javascript" type="text/javascript" src="chart/lib/jquery.mousewheel.js"></script>
<script language="javascript" type="text/javascript" src="chart/source/jquery.canvaswrapper.js"></script>
<script language="javascript" type="text/javascript" src="chart/source/jquery.colorhelpers.js"></script>
<script language="javascript" type="text/javascript" src="chart/source/jquery.flot.js"></script>
<script language="javascript" type="text/javascript" src="chart/source/jquery.flot.saturated.js"></script>
<script language="javascript" type="text/javascript" src="chart/source/jquery.flot.browser.js"></script>
<script language="javascript" type="text/javascript" src="chart/source/jquery.flot.drawSeries.js"></script>
<script language="javascript" type="text/javascript" src="chart/source/jquery.flot.uiConstants.js"></script>
<script>
    let fileList = new Array();
    fileList = <?php echo json_encode($list) ?> ;
    let indexStart, indexEnd;
    let name = new Array();
    for (let i = 0; i < fileList.length; i++) {
        indexStart = fileList[i].indexOf('/');
        indexEnd = fileList[i].indexOf('.');
        name[i] = fileList[i].substring(indexStart + 1, indexEnd);
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
            url: 'json/' + url + '.json',
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
    // function calljsonData(url,timdefat){
    //     $.ajax({
    //             url: 'json/'+ url +'.json',
    //             async: true,
    //             dataType: 'json',
    //             success: 
    //                 function (json) {
    //                 lastIndexNow =lastIndexBefore + json.channel3.length;
    //                 for (let i = lastIndexBefore , j = 0; i < lastIndexNow , j < json.channel3.length; i++, j++) {
    //                      if (i == lastIndexBefore) {
    //                         //  타이밍 첫 값은 변수
    //                         timing[i] = timdefat + url
    //                     } else {
    //                         timing[i] = timing[i - 1] + 1 /json.channel3.length*1000;
    //                     }
    //                     jsonData[i] = [timing[i], json.channel3[j]];
    //                 }
    //                 lastIndexBefore = lastIndexNow
    //             }
    //         })
    // }
</script>