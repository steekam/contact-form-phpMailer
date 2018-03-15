function main() {
    $('[data-toggle="popover"]').popover();
    validation();    
   
}

$(document).ready(main);

var isError = 0;

function validation() {
  
    $("#submit").click(function () {
        $("form").submit(function (e) {
            e.preventDefault();
        });

        if ($("#email").val() == "") {
            var error = "The email field is required";
            $('#email').popover({
                title: "Error!",
                content: error,
                placement: "left",
                trigger: "manual"
            });
            $("#email").popover('show');
            isError++;
        }
        else {
            $("#email").popover('hide');
            
        }

        if ($("#subject").val() == "") {
            var error = "The subject field is required";
            $('#subject').popover({
                title: "Error!",
                content: error,
                placement: "left",
                trigger: "manual"
            });
            $("#subject").popover('show');
            isError++;
        }
        else{
            $("#subject").popover('hide');
            
        }

        if ($("#contentTextArea").val() == "") {
            var error = "The content field is required.";

            $('#contentTextArea').popover({
                title: "Error!",
                content: error,
                placement: "left",
                trigger: "manual"
            });
            $("#contentTextArea").popover('show');
            isError++;
        }
        else {
            $("#contentTextArea").popover('hide');
        
        }

        if (isError == 0) {
            $("form").unbind("submit").submit();
        }
    });
    
}

