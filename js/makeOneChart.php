<script>
   function pushName(pushdata) {
      $.ajax({
         method: 'post',
         url: 'js/makeUandN.php',
         traditional: true,
         data: {
            'pushdata' : pushdata,
         },
         success: function () {
            console.log(pushdata)
            setTimeout(() => {
               $.ajax({
                  url: 'js/makeUandN.php',
                  dataType: 'json',
                  success:function(data){
                     gg = data.data;
                     console.log(gg)
                  }
               })
            });
            
         }
      })
   }
   function DoafterGet(ajaxdata){
      alert();
   }

   function makeChart(obj) {
      let gg = '';
      // var machineName = $(obj).html();
      var machineName = 'machine1';
      pushName(machineName);
      
      }
      // var formData = new FormData( form );
      // formData.append('pushdata', 'machineName');
       

</script>