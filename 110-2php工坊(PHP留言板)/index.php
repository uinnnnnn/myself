<?php
include("datatable.php");
$statement = getAllComments();
?>
<html>

<head>
    <meta charset="UTF-8">
    <title>Guestbook</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

    <style>
        .card {
            width: 500px;
            margin: 0 auto;
        }

        .form {
            width: 300px;
            margin: 0 auto;
        }
    </style>
</head>

<body style="background-color:F0F0F0;">
    <a href="../sign/index_1.php" style="margin-left: 940px;">註冊</a>
    <a href="../sign/index.php">登入</a>
    <div class="card mt-5">
        <h1 class="mt-4 text-center">Guestbook</h1>
        <div class="form p-3">
            <!-- action`:資料傳送位置 -->
            <div id="input">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text text-light bg-dark">暱稱: </span>
                    </div>
                    <input class="form-control" type="text" name="name" required="required" id="name" placeholder="輸入暱稱">
                    <!-- 暱稱新增id=name (input)-->
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text text-light bg-dark">評論: </span>
                    </div>
                    <textarea class="form-control" name="comment" required="required" cols="40" rows="5" id="comment" placeholder="輸入評論"></textarea>
                    <!-- 文章新增id=comment (textarea) -->
                </div>
                <input type="hidden" name="id" value="id">
                <button type="submit" name="submit" class="btn btn-dark" id="submit">新增資料</button>
            </div>
        </div>
    </div>

    <div id='response' style='display:none;'></div>

    <div>
        <h2 class="mt-4 text-center">All Comment</h2>
        <?php foreach ($statement as $row) { ?>
            <div class="card">
                <h5 class="mx-3 mt-2"><?php echo $row['id'] . "." . $row['name'] ?></h5>
                <p class="mx-3"><?php echo $row['comment'] ?></p>
                <div>
                    <a href="./edit_comment.php?id=<?php echo $row['id'] ?>">
                        <input type="submit" value="修改" class="btn btn-dark mx-3" style="float:right">
                    </a>
                    <form method="POST" action="./delete_comment.php" onsubmit="return myform();">
                        <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                        <input type="submit" value="刪除" class="btn btn-danger" style="float:right">
                    </form>
                </div>
            <?php } ?>
            </div>
</body>

</html>

<script>
    function myform() {
        var ans = confirm("確認是否刪除此筆留言？");

        if (ans == true) {
            return teue;
        } else {
            return false;
        }
    }

    $(document).on('click', '#submit', function(){//使用$(document).on()的原因是如果id為submit的按鈕是一開始沒有載入、透過ajax互動後才產生的DOM，那用$().click會抓不到，需以$(document).on()才行
                
        // var name = $('#name').val();
        // var comment = $('#comment').val();
        // $.ajax({
        //     url:'create_comment.php',
        //     method:'POST',
        //     data:{
        //         name:name,
        //         comment:comment
        //     },
        //     success:function(create_comment){
        //         $('#response').show().html(create_comment);
        //     }
        // })
    });

    // $(function() {
    //     $('#form1').submit(function() { //当提交表单时，会发生 submit 事件。
    //         var name = $('#name').val();
    //         var comment = $('#comment').val();
    //         $.ajax({
    //         url:'create_comment.php',
    //         method:'POST',
    //         data:{
    //             name:name,
    //             comment:comment
    //         },
    //             success:function(create_comment){
    //                 alert("用户！");
    //             }
    //         })
    //     });
    // });
    

    // $('from').on('click', '#submit', function(){//使用$(document).on()的原因是如果id為submit的按鈕是一開始沒有載入、透過ajax互動後才產生的DOM，那用$().click會抓不到，需以$(document).on()才行
    //     var name = $('#name').val();
    //     var comment = $('#comment').val();
    //     $.ajax({
    //     url:'create_comment.php',
    //     method:'POST',
    //     data:{
    //         name:name
    //         comment:comment
    //     },
    //         success:function(create_comment){
    //         }
    //     })
    // });

</script>