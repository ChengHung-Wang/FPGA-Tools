<?php
    include "../conn.php";
    $_GET['prefix'] = "../";
    $_GET['title'] = "腳位轉換器";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "../includes/header.php" ?>
    <style>
        input[type='file'] {
            display: none;
        }
    </style>
    <script>
        let src = {
            src_file: {
                data_type: [],
                data: []
            },
            edit_file: {
                data_type: [],
                data: []
            }
        }
        let option = {
            sort: true,
            location: true,
            VREF: false,
            Standard: false,
            Reserved: false,
            hide_no_use_IO: true
        };
        $(function() {
            $("input[type='file']").change(function() {
                let this_file = $(this)[0]["files"][0];
                let reader = new FileReader();
                reader.readAsText(this_file);
                reader.onload = () => {
                    $.ajax({
                        url: api_url,
                        type: "post",
                        async: false,
                        data: {
                            option: "csv2json",
                            data: reader.result
                        },
                        success: (data) => {
                            src[$(this).attr("id")] = data;
                            table2html(
                                data.table_name, 
                                data.data, 
                                $("#" + $(this).attr("id") + "_table"), 
                                [option.Reserved ? "" : 'Reserved', option.Standard ? "" : 'I/O Standard'],
                                $(this).attr("id")
                            );
                            $("#" + $(this).attr("id") + "_name").text(this_file.name);
                        }
                    })
                }
            });
            $("input[type='checkbox']").click(function() {
                update($(this).attr("option"), $(this)[0].checked);
            })
        })
        function table2html(header, data, draw_site, hide_option = [], side) {
            let table_header = "";
            let main = "";
            header.forEach(e => {
                if(hide_option.indexOf(e) === -1) {
                    table_header = table_header + `<th scope="col" side="${side}">${e}</th>`;
                }
            });
            table_header = `<thead class="thead-dark"><tr>` + table_header + `</tr></thead>`;
            data.forEach((value) => {
                if(value.Direction == "Unknown" && option.hide_no_use_IO)
                    return;
                let cache = `<tr>`;
                for (const [key, this_main] of Object.entries(value)) {
                    if(hide_option.indexOf(key) === -1) {
                        cache = cache + `<td side="${side}">${this_main}</td>`;
                    }
                }
                main = main + cache;
            })
            draw_site.empty();
            draw_site.append(`<table class="table">` + table_header + main + `</table>`);
        }
        function update(this_type, value) {
            option[this_type] = value;
            if(src.src_file.data.length > 1)
                table2html(
                    src.src_file.table_name,
                    src.src_file.data,
                    $("#src_file_table"),
                    [option.Reserved ? "" : 'Reserved', option.Standard ? "" : 'I/O Standard'],
                    "src_file"
                );
            if(src.edit_file.data.length > 1)
                table2html(
                    src.edit_file.table_name,
                    src.edit_file.data,
                    $("#edit_file_table"),
                    [option.Reserved ? "" : 'Reserved', option.Standard ? "" : 'I/O Standard'],
                    "edit_file"
                );
        }
        function download() {
            if(src.src_file.data.length < 1 || src.edit_file.data.length < 1)
                return $.alert("未上傳對照文件或未上傳原始文件", "缺少必要文件");
            let ans = src.edit_file.table_name.join(",") + "\n";
            src.edit_file.data.forEach(e => {
                let this_pin = src.src_file.data.filter(this_e => {return this_e.To == e.To});
                if(this_pin.length > 0 && option.location) {
                    e.Location = this_pin[0].Location;
                }
                ans = ans + Object.values(e).join(",") + "\n";
            });
            console.log(ans);
            $("#download").attr("href", "data: text/txt," + ans)
                .attr("download", $("#edit_file_name").text())
                .text($("#edit_file_name").text());
            $("#download")[0].click();
        }
    </script>
</head>
<body>
    <?php include "../includes/navbar.php"; ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-2 bd-sidebar" style="border-right: 1px #ddd solid; top: 0; min-height: 100vh;">
                <div class="row" style="margin-top: 120px;">
                    <div class="col-12">
                        <h5 style="height: 33px;"><strong>操作選項</strong></h5>
                        <hr>
                    </div>
                    <div class="col-12 fbc pb-2 pt-2">
                        <span>同步排序</span>
                        <input option="sort" type="checkbox" checked>
                    </div>
                    <div class="col-12 fbc pb-2 pt-2">
                        <span>依接口名稱同步Location</span>
                        <input option="location" id="" type="checkbox" checked>
                    </div>
                    <div class="col-12 fbc pb-2 pt-2">
                        <span>同步VREF Group</span>
                        <input option="VREF" type="checkbox">
                    </div>
                    <div class="col-12 fbc pb-2 pt-2">
                        <span>顯示Standard</span>
                        <input option="Standard" type="checkbox">
                    </div>
                    <div class="col-12 fbc pb-2 pt-2">
                        <span>顯示Reserved</span>
                        <input option="Reserved" type="checkbox">
                    </div>
                    <div class="col-12 fbc pb-2 pt-2">
                        <span>隱藏未使用I/O</span>
                        <input option="hide_no_use_IO" type="checkbox" checked>
                    </div>
                    <div class="col-12 fbc pb-2 pt-2">
                        <span>輸出編碼</span>
                        <select name="" id="decode_option" class="border-0 text-secondary">
                            <option value="utf-8">UTF-8</option>
                            <option value="utf-8">BIG-5</option>
                            <option value="utf-8">GB-2312</option>
                        </select>
                    </div>
                    <div class="col-12" style="position: absolute; bottom: 30px;">
                        <button type="button" onclick="download()" class="btn btn-primary btn-lg btn-block" style="background: #0071c5!important;">下載</button>
                    </div>
                </div>
            </div>
            <div class="col-10">
                <div class="row" style="margin-top: 120px; margin-right: 30px;">
                    <div class="col-6">
                        <div class="d-flex">
                            <div class="w-50 fsc">
                                <h3 class="m-0">對照文件</h3>
                                <span class="badge badge-pill badge-primary ml-3" id="src_file_name"></span>
                            </div>
                            <div class="w-50 fec">
                                <input type="button" onclick="$('#src_file').click()" value="選擇檔案" class="btn btn-outline-primary btn-sm">
                            </div>
                        </div>
                        <hr>
                    </div>
                    <div class="col-6">
                        <div class="d-flex">
                            <div class="w-50 fsc">
                                <h3 class="m-0">欲修改文件</h3>
                                <span class="badge badge-pill badge-primary ml-3" id="edit_file_name"></span>
                            </div>
                            <div class="w-50 fec">
                                <input type="button" onclick="$('#edit_file').click()" value="選擇檔案" class="btn btn-outline-primary btn-sm">
                            </div>
                        </div>
                        <hr>
                    </div>
                    <div id="src_file_table" class="col-6">

                    </div>
                    <div id="edit_file_table" class="col-6">

                    </div>
                </div>
            </div>
        </div>
    </div>

    <input type="file" id="src_file">
    <input type="file" id="edit_file">
    <a href="" style="display: none" id="download"></a>
</body>
</html>