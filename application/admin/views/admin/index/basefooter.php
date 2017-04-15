<script>
    $(document).ready(function(){

    });
    window.onload=function(){
        $(".i-checks").iCheck({checkboxClass:"icheckbox_square-green",radioClass:"iradio_square-green"});
        $(".i-checksAll").on('ifChecked', function(event){
            $("tbody input").iCheck('check');
        });
        $(".i-checksAll").on('ifUnchecked', function(event){
            $("tbody input").iCheck('uncheck');
        });
    }
</script>
</body>
</html>