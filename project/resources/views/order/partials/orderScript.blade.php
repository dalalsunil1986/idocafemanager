<script type="text/javascript">
    window.onload = function () {

        var optionSelect = document.getElementById('theOption');
        $("#table-number").hide();
        optionSelect.onchange = function () {
            if(optionSelect.selectedIndex !== 2){
                $("#table-number").hide("fast");
            }else{
                $("#table-number").show("fast");
            }
        }
    }
</script>