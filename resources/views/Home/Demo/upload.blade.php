<!DOCTYPE html>
<!--[if IE 9]>         <html class="no-js lt-ie10" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <script src="{{asset('js/vendor/jquery-2.2.4.min.js')}}"></script>

</head>
<body>
<input type="file">

<script>
    $.ajaxFileUpload
    (
        {
            url: 'handler/UploadImageHandler.ashx?userid=1&name=abc',
            secureuri: false,
            fileElementId: 'fileToUpload',
            dataType: 'html',
            beforeSend: function() {
                $("#loading").show();
            },
            complete: function() {
                $("#loading").hide();
            },
            success: function(data, status) {
                if (typeof (data.error) != 'undefined') {
                    if (data.error != '') {
                        alert(data.error);
                    } else {
                        alert(data.msg);
                    }
                }
            },
            error: function(data, status, e) {
                alert(e);
            }
        }
    )
</script>
</body>