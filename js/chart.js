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

   var plot = $.plot("#chart1", data, {
      xaxes: [{
         axisLabel: 'seconds',
         showTickLabels: "major",
         
         mode: 'time',
         timeformat: "%b %y"
      }],
      yaxes: [{
         position: 'left',
         showTicks: 'none',
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
   var plot2 = $.plot("#chart2", data, {
      xaxes: [{
         axisLabel: 'seconds',
         showTickLabels: "major",
      }],
      yaxes: [{
         position: 'left',
         showTicks: 'none',
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
   var plot3 = $.plot("#chart3", data, {
      xaxes: [{
         axisLabel: 'seconds',
         showTickLabels: "major",
      }],
      yaxes: [{
         position: 'left',
         showTicks: 'none',
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
      plot2.setData(data);
      plot2.setupGrid(true);
      plot2.draw();
      plot3.setData(data);
      plot3.setupGrid(true);
      plot3.draw();
      window.requestAnimationFrame(update);
   }

   window.requestAnimationFrame(update);

};

// let timestamp = 1599470491;
// let date = new Date(timestamp * 1000);
// console.log(date);