

// add_list
$('.addRow').click(function(){
    $('.add_List .list_w input').val('')
    $('.add_List').animate({bottom :'0'},100)
})
$('.exitList').click(function(){
    $('.add_List').animate({bottom :'-50%'},100)
})
// click Table
function chartclick(obj){
    $('.scrolling').slideDown()
    let senpos = $(obj).find('td:eq(1)').html();
    let machwork = $(obj).find('td:eq(2)').html();
    $('.senserpos').html(senpos)
    $('.stat_pos span:eq(1)').html(senpos)
    $('.stat_work span:eq(1)').html(machwork)
    drawchart();
    $('.occuredPosition').html(senpos)
    // let logLine = '<p class="eventData"><span class="occuredDate">2020-11-05</span> <span class="occuredPosition"></span> <span class="happen"></span></p>'
}
// updated date

let newFilename = choseBig(name);
let nowDate = new Date();
let timestamp = nowDate.getTime();
console.log(timestamp)
console.log(newFilename[0]);
$(document).ready(function(){
    let prename = Number(localStorage.getItem('preName'));
    let nowname = newFilename[0];
    console.log($('.rultime').html());
    if( prename !== nowname){
        $('.onOff').css('backgroundColor','rgba(0, 255, 0, 0.7)').html('동작상태 : 정상')
        localStorage.setItem('timestamp',timestamp)
    }
    else if( $('.rultime').html() < '1000' ){
        $(this).$('.onOff').css('backgroundColor','rgba(255, 251, 0, 0.7)').html('동작상태 : 주의')
    }
    else {
        $('.onOff').html('동작상태 : 정상')
        let timetravel = localStorage.getItem('timestamp')
        if ( timestamp - timetravel > 86400000){
        $('.onOff').css('backgroundColor','red').html('동작상태 : 비정상')
        }
    }
    localStorage = localStorage.setItem('preName',newFilename[0])
})
// reload
setTimeout(function(){
    window.location.reload();
},3600000)
// submit form
function submitForm ( object ) {
    object.submit();
}
// tab
$('.tab').click(function () {
    $('.tab').removeClass('on')
    $(this).addClass('on')
    if ($(this).hasClass('showLog')) {
        $('.sectionBody .event').hide();
        $('.sectionBody .log').show();
    }
    else { 
        $('.sectionBody .log').hide();
        $('.sectionBody .event').show();
    }
})
// popup
$('.prog').click(function(){
    let popwidth = (screen.width/10)*6;
    let popheight = screen.height;
    let popright = screen.width - popwidth;
    window.open("popup/popup_prog.php",'prognostics',"width="+ popwidth +", height="+ popheight +", left="+ popright +", top=0")
})
// resize 
$(window).resize(function(){
    $('.flot-base').width('100%')
})