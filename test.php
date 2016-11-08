<!DOCTYPE html>
<html>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function (){
        $("#click").click(function (){
            $('html, body').animate({
                scrollTop: $("#div1").offset().top
            }, 2000);
        });
    });

</script>
<div id="div1" style="height: 1000px; width 100px">
    Test
</div>
<br/>
<div id="div2" style="height: 1000px; width 100px">
    Test 2
</div>
<button id="click">Click me</button>
</html>