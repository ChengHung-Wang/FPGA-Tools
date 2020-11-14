<?php include("../conn.php") ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "../includes/header.php" ?>

    <script>
        let str = "";
        let step_by2 = false;
        $(function() {
            $("#str").on("keyup", function() {
                update();
            })
        })
        function split_step2(str) {
            let strArr = [];
            let n = 2;
            for (let i = 0, l = str.length; i < l/n; i++) {
                let a = str.slice(n*i, n*(i+1));
                strArr.push(a);
            }
            return strArr;
        }
        function update(set = false) {
            if(set)
                step_by2 = !step_by2;

            $.ajax({
                url: api_url,
                async: false,
                type: "post",
                data: {
                    option: "big5_code",
                    text: JSON.stringify(($("#str").val()).split(""))
                },
                success: function(data) {
                    $("#ans").empty();
                    if(data.data.join("") == "")
                        return;
                    if(step_by2)
                        $("#ans").append(`X"` + split_step2(data.data.join("")).join(`", X"`).toUpperCase() + `"`);
                    else
                        $("#ans").append(`X"` + data.data.join(`", X"`).toUpperCase() + `"`);
                }
            });
        }
    </script>
    <style>
        input[type='text'] {
            border: 0;
            border-bottom: 1px #ddd solid;
            padding-bottom: 5px;
            outline: none;
        }
    </style>
</head>
<body>
<?php include "../includes/navbar.php"; ?>
<div class="container" style="margin-top: 120px;">
    <div class="row">
        <div class="col-12">
            <h3>Big5內碼查詢</h3>
        </div>
        <div class="col-1">
            <span>原始字串</span>
        </div>
        <div class="col-11">
            <input type="text" id="str" class="w-100">
        </div>
        <div class="col-2 mt-4 fbc">
            <h6 class="m-0">兩個字就分割</h6>
            <input type="checkbox" onclick="update(true)" id="cut_step2">
        </div>
        <div class="col-12">
            <br><br><br>
            <h5>結果：</h5>
            <h2 id="ans"></h2>
        </div>
    </div>
</div>
</body>
</html>