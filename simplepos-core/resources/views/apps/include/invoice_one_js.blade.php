<script type="text/javascript">
    var loadFile = function(event,row) {
        console.log($(row).attr("data-id"));
        var iniID=$(row).attr("data-id");
        var output = document.getElementById(iniID);
        output.src = URL.createObjectURL(event.target.files[0]);
    };

    $(document).ready(function(e){
        $(".upload_image").click(function(e){
            $(this).parent().parent().find(".uploadNewImage").click();
        });


        $(".text_changer_field").click(function(){
            $(this).parent().children("span").toggle();
            $(this).parent().children("input").toggle();
            $(this).parent().children("textarea").toggle();
        });

        $(".text_changer").keyup(function(){
            var textData=$(this).val();
            $(this).parent().children("span").html(textData);
        });
        
        $("#saveInvice").click(function(e) {

            e.preventDefault(); // avoid to execute the actual submit of the form.
        
            var form = $("#loneInvS");
            var url = form.attr('action');
        
            $.ajax({
                   type: "POST",
                   url: url,
                   data: form.serialize(), // serializes the form's elements.
                   success: function(data)
                   {
                       alert(data); // show response from the php script.
                   }
                 });
        
        
        });

    });

</script>