<script>
    function entrophy() {
        let entrophyData = new Array();
        for (let i = 0; i < 100; i++) {
            entrophyData[i] = [i, 40 + 20 * Math.cos(i * 3.14 * 0.003)]
        }
        let entrophyData2 = new Array();
        for (let i = 0; i < 100; i++) {
            entrophyData2[i] = [i, 40 + 20 * Math.cos(i * 3.14 * 0.005)]
        }
        let entrophyData3 = new Array();

        for (let i = 0; i < 100; i++) {
            entrophyData3[i] = [i, 40 + 20 * Math.cos(i * 3.14 * 0.007)]
        }

        
        var entrodata = [{
            data: entrophyData,
            xaxis: 1,
            yaxis: 1,
            lines: {
                show: true
            }
        }];
        var entrodata2 = [{
            data: entrophyData2,
            xaxis: 1,
            yaxis: 1,
            lines: {
                show: true
            }
        }];
        var entrodata3 = [{
            data: entrophyData3,
            xaxis: 1,
            yaxis: 1,
            lines: {
                show: true
            }
        }];
        let plot = new Array();
        for (let j = 0; j < 12; j++) {
            if (j == 4 || j == 10) {
                plot[j] = $.plot(".entrophyBox > div:eq(" + j + ") .Chart", entrodata2, {
                    xaxes: [{
                        timeformat: "%b %y"
                    }],
                    yaxes: [{
                        position: 'left',
                        autoScale: 'false',
                        min: 20,
                        max: 70
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
                plot[j] = $.plot(".entrophyBox > div:eq(" + j + ") .Chart", entrodata3, {
                    xaxes: [{
                        timeformat: "%b %y"
                    }],
                    yaxes: [{
                        position: 'left',
                        autoScale: 'false',
                        min: 20,
                        max: 70
                    }],
                });
            } 
             else {


                plot[j] = $.plot(".entrophyBox > div:eq(" + j + ") .Chart", entrodata, {
                    xaxes: [{
                        timeformat: "%b %y"
                    }],
                    yaxes: [{
                        position: 'left',
                        autoScale: 'false',
                        min: 20,
                        max: 70
                    }],
                });
            }
        }
    };
    entrophy();
</script>