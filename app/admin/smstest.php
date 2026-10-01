<!DOCTYPE html>
<html>
    <head>
        <title>SMS Test</title>
    </head>
    <body>
        <button class="btn btn-primary btn-xs send_sms" >SEND SMS</button>
        <?php
        $url = "http://sms6.rmlconnect.net:8080/bulksms/bulksms";

        $params = array(
            'username' => 'SRFCTRANS',
            'password' => 'Srfc@123',
            'source' => 'SRFCPL',
            'type' => '0',
            'dlr' => '1',
            'destination' => '918103934917',
            'entityid' => '1001314966537007000',
            'tempid' => '1007870232671285063',
            'message' => "1121 is your OTP( shri ram finance)");
        ?>
        <script src="../assets/js/jquery-3.5.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/1.0.0/p5.min.js"></script>

        <script>
            $(document).ready(function () {
                $(document).on('click', '.send_sms', function () {
                    $.ajax({
                        url: 'http://sms6.rmlconnect.net:8080/bulksms/bulksms',
                        method: "POST",
//                        contentType: 'application/json; charset=utf-8',
                        dataType: "JSON",
                        data: <?php echo json_encode($params) ?>,
                        success: function (response,mobile,token) {
                            console.log(mobile);
                            alert("success");
                        }
                    });
                });
            });
        </script>
    </body>
</html>
