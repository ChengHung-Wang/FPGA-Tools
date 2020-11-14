<?php include("../conn.php") ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($_GET['title']) ? $_GET['title'] : "FPGA Tools" ?></title>
    <link rel="stylesheet" href="<?= url() ?>css/bootstrap.css">
    <link rel="stylesheet" href="<?= url() ?>css/style.css">
    <script src="<?= url() ?>js/jquery.min.js"></script>
    <script src="<?= url() ?>js/popper.min.js"></script>
    <script src="<?= url() ?>js/bootstrap.min.js"></script>
    <script>
        let api_url = "<?= url() ?>api.php";
        let str = "";
        let step_by2 = false;
        let lasted_id = 1;
        let data =  [
            {
                id: 1,
                title: "",
                text: [] // (text.split("") to explode any char)
            }
        ]
        $(function() {
            init();
        })
        function init() {
            if(localStorage.getItem("big5_data") != undefined) {
                data = JSON.parse(localStorage.getItem("big5_data"));
                $("#main").empty();
                data.forEach(e => {
                    $("#main").append(`
                        <div class="col-3" data="${e.id}">
                            <div class="sec_border" data="${e.id}">
                                <input onkeyup="update(${e.id}, 'title', $(this).val())" value="${e.title}" placeholder="變數名稱" type="text" class="form-control mb-2 p-0 border-0">
                                <hr class="p-0 m-0">
                                <input onkeyup="update(${e.id}, 'main', $(this).val())" value="${e.text.join("")}" placeholder="內容" type="text" class="form-control p-0 border-0">
                                ${e.id != 1 ? `<input type="button" onclick="remove(${e.id})" value="-" class="btn btn-danger btn-sm remove_btn" tabindex="-1">` : ''}
                            </div>
                        </div>
                    `);
                })
                return;
            }
            localStorage.setItem("big5_data", JSON.stringify(data));
        }
        function remove(remove_id) {
            parseInt(remove_id);
            data = data.filter(e => e.id != remove_id);
            $(`.col-3[data='${remove_id}']`).remove();
            localStrong_update();
        }
        function add() {
            lasted_id ++;
            $("#main").append(`
                <div class="col-3" data="${lasted_id}">
                    <div class="sec_border" data="${lasted_id}">
                        <input onkeyup="update(${lasted_id}, 'title', $(this).val())" placeholder="變數名稱" type="text" class="form-control mb-2 p-0 border-0">
                        <hr class="p-0 m-0">
                        <input onkeyup="update(${lasted_id}, 'main', $(this).val())" placeholder="內容" type="text" class="form-control p-0 border-0">
                        <input type="button" onclick="remove(${lasted_id})" value="-" class="btn btn-danger btn-sm remove_btn" tabindex="-1">
                    </div>
                </div>
            `);
            data.push({
                id: lasted_id,
                title: "",
                text: [] // (text.split("") to explode any char)
            });
            localStrong_update();
        }
        function update(id, site, value) {
            id = parseInt(id);
            let this_data = find(id);
            if(site == "title")
                this_data.title = value;
            else
                this_data.text = value.split("");
            localStrong_update();
        }
        function find(id) {
            id = parseInt(id);
            return data.filter(e => e.id == id)[0];
        }
        function localStrong_update() {
            localStorage.setItem("lasted_id", lasted_id.toString());
            localStorage.setItem("big5_data", JSON.stringify(data));
        }
        function localStrong_clear() {
            localStorage.removeItem("lasted_id");
            localStorage.removeItem("big5_data");
            location.reload();
        }
        function converter() {
            $.ajax({
                url: api_url,
                type: "post",
                data: {
                    option: "big5_encode_sivs",
                    data: JSON.stringify(data)
                },
                async: true,
                success: (e) => {
                    let max = e.data.map(e => e.length).sort().pop();
                    $("#converter_result").empty();
                    $("#converter_result").append(`
                        <div class="col-12">
                            <p>constant max_len : integer := ${max};</p>
                        </div>
                    `);
                    e.data.forEach(e => {
                        $("#converter_result").append(`
                            <div class="col-12">
                                <p>-- "${e.src.text.join("")}", ${e.length};</p>
                                <p>-- tts_txt(0 to ${e.length - 1} <= ${e.src.title};)</p>
                                <p>-- tts_txt_len <= ${e.length}</p>
                                <p>constant ${e.src.title} : txt_t(0 to ${e.length - 1}) := (<br>&nbsp;&nbsp;&nbsp;&nbsp;${e.big5_code}<br>);</p>
                            </div>
                        `);
                    })
                    $("#modal").modal({
                        show: true
                    })
                }
            })
        }
    </script>
    <style>
        .sec_border {
            border-radius: 15px;
            border: 1px rgba(0, 0, 0, .2) solid;
            padding: 7.5px 15px;
            margin: 15px 0;
        }
        .remove_btn {
            border-radius: 50%;
            position: absolute;
            right: 5px;
            top: 0px;
            width: 30px;
            height: 30px;
            line-height: 0;
        }
        .sec_border> hr {
            position: absolute;
            width: calc(100% - 30px);
            left: 15px;
            top: 50%;
        }
        .form-control:focus {
            outline: none!important;
            border: 0;
            box-shadow: none;
        }
        .modal-dialog.modal-dialog-centered.modal-dialog-scrollable {
            max-width: 1440px;
        }
        body {
            min-height: calc(100% - 120px);
        }
    </style>
</head>
<body>
<?php include "../includes/navbar.php"; ?>
<div class="container" style="margin-top: 120px;">
    <div class="row">
        <div class="col-12 fbc">
            <h3>Big5內碼查詢</h3>
            <div class="btn-group">
                <input type="button" class="btn btn-outline-primary btn-sm" onclick="localStrong_clear()" value="clear">
                <input type="button" class="btn btn-outline-primary btn-sm" onclick="add()" value="＋">
            </div>
        </div>
        <div class="col-12">
            <hr>
        </div>
    </div>
    <div class="row" id="main">
        <div class="col-3" data="1">
            <div class="sec_border" data="1">
                <input onkeyup="update(1, 'title', $(this).val())" placeholder="變數名稱" type="text" class="form-control mb-2 p-0 border-0">
                <hr class="p-0 m-0">
                <input onkeyup="update(1, 'main', $(this).val())" placeholder="內容" type="text" class="form-control p-0 border-0">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 fbc">
            <br>
            <input type="submit" value="確認" class="btn btn-outline-primary" onclick="converter()" data-toggle="modal" data-target="#modal">
        </div>
    </div>
</div>
<!-- Button trigger modal
<!-- Modal -->
<div class="modal fade" id="modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">轉換結果</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row" id="converter_result">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>