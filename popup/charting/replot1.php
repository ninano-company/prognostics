<script>
function replot1() {
  let replotData = new Array();
  for(let i=0; i<100; i++){
     replotData[i]= [i,5+i*i/400000]
  }
  
  let replotData2 = new Array();
  for(let i=0; i<100; i++){
     replotData2[i]= [i,5+i*i/100000]
  }
  let replotData3 = new Array();
  for(let i=0; i<100; i++){
     replotData3[i]= [i,5+i*i/40000]
  }

   var data = [{
      data: replotData,
      xaxis: 1,
      yaxis: 1,
      lines: {
         show: true
      }
   }];
   var data2 = [{
      data: replotData2,
      xaxis: 1,
      yaxis: 1,
      lines: {
         show: true
      }
   }];
   var data3 = [{
      data: replotData3,
      xaxis: 1,
      yaxis: 1,
      lines: {
         show: true
      }
   }];
   let plot = new Array();
   for(let j=0; j<12; j++){
      if (j == 4 || j == 10) {
                plot[j] = $.plot(".replotBox > div:eq(" + j + ") .Chart", data2, {
                    xaxes: [{
                        timeformat: "%b %y"
                    }],
                    yaxes: [{
                        position: 'left',
                        autoScale: 'false',
                        min: 4.5,
                        max: 5.5
                    }],
                    zoom: {
                        interactive: true
                    },
                    pan: {
                        interactive: true
                    }
                });
            }
            else if (j ==6) {
                plot[j] = $.plot(".replotBox > div:eq(" + j + ") .Chart", data3, {
                    xaxes: [{
                        timeformat: "%b %y"
                    }],
                    yaxes: [{
                        position: 'left',
                        autoScale: 'false',
                        min: 4.5,
                        max: 5.5
                    }],
                });
            } 
             else {


                plot[j] = $.plot(".replotBox > div:eq(" + j + ") .Chart", data, {
                    xaxes: [{
                        timeformat: "%b %y"
                    }],
                    yaxes: [{
                        position: 'left',
                        autoScale: 'false',
                        min: 4.5,
                        max: 5.5
                    }],
                });
            }
   }
   

   

};
replot1();
</script>

 
