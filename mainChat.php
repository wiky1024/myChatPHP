<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8" />
    <title>聊天吧</title>
    <script src="jquery-2.1.4.min.js"></script>
    <script src="jsrender.min.js"></script>
    <script id="msgTemplate" type="text/x-jsrender">
        <tr>
            <td>{{:msgTime}}</td>
            <td>{{:userName}}</td>
            <td>{{:msgText}}</td>
        </tr>
    </script>
    <script>
        $(function(){
            $("#inputText").click(function(){
                insertChat();
            });
        });

        function insertChat(){
            $.ajax({
                type: 'GET',
                url: 'InsertChat.php',
                data: { userName:$("#inputName"),msgText:$("#inputText") },
                dataType: 'json',
                //timeout: 300,
                success: function (data) {
                    console.log(data);
                    $("#inputText").empty();
                },
                error: function (xhr, type) {
                    alert('获取失败！')
                }
            });
        }
        function getChat(){
            $.ajax({
                type: 'GET',
                url: 'GetChat.php',
                //data: { userName:$("#inputName"),msgText:$("#inputText") },
                dataType: 'json',
                //timeout: 300,
                success: function (data) {
                    console.log(data);
                    $( "#showMsgs" ).html(
                        $( "#msgTemplate" ).render(data)
                    );
                },
                error: function (xhr, type) {
                    alert('获取失败！')
                }
            });
        }
    </script>
</head>
<body>
<table>
    <thead>
    <tr>
        <td>时间</td>
        <td>发送人</td>
        <td>内容</td>
    </tr>
    </thead>
    <tbody id="showMsgs"></tbody>
</table>
<label for="inputName">输入名字</label><input type="text" id="inputName" value="">
<label for="inputText">输入内容</label><input type="text" id="inputText" value="">
<input type="button" id="btnSubmit">
</body>
</html>