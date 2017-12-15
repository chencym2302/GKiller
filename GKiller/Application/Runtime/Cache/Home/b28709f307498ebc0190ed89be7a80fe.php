<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap4  -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.bootcss.com/popper.js/1.12.5/umd/popper.min.js"></script>
    <script src= "https://cdn.bootcss.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>

</head>
<script>
    $(document).ready(function(){
        $("#form_search").submit(function(e){
            e.preventDefault();
            //获取下拉框的值
            var select_school = $("#select_school").find("option:selected").val();
            var select_scourse = $("#select_course").find("option:selected").val();

            $.post("/GKiller/index.php/home/doclist/search",
                {
                    schoolId:select_school,
                    courseId:select_scourse
                },
                function(data,status){
                    if(status == "success") {
                        //data返回成功后执行操作
                        //循环插入攻略条目
                        //alert();
                        $("#document_list").empty();
                        for(var i in data){
                                var div="<div class=\"list-group\">\n" +
                                    "            <a href=\"#\" class=\"list-group-item list-group-item-action\">\n" +
                                    "                <h4 class=\"list-group-item-heading\">\n" + data[i].document_title +
                                    "                </h4>\n" +
                                    "                <p class=\"list-group-item-text\">\n" +
                                    "                    <span>" + data[i].school_id + "</span><span> "
                                                             + data[i].course_id +"</span><span>"
                                                            + data[i].teacher_name+ "</span>\n" +
                                    "                </p>\n" +
                                    "            </a>\n" +
                                    "    </div>\n";
                                $("#document_list").append(div);
                         }

                    }

                });
        });
    });

</script>
<body>

<div class="" >
    <img src="" width="30" height="30" style="margin: 2.5% auto 2.5% 2.5%" />
</div>
<div  class="container">
    <div class="form-group" >
        <form id="form_search"  method="post" onsubmit= "" role="form">
            <select id="select_school"  class="form-control">
                <option value="-1" selected="selected"></option>
                <?php if(is_array($arr1)): foreach($arr1 as $key=>$vo): ?><option value="<?php echo ($vo["school_id"]); ?>"><?php echo ($vo["school_name"]); ?></option><?php endforeach; endif; ?>
            </select>
            <select id="select_course" class="form-control" >
                <option value="-1" selected="selected"></option>
                <?php if(is_array($arr2)): foreach($arr2 as $key=>$vo): ?><option value="<?php echo ($vo["course_id"]); ?>"> <?php echo ($vo["course_name"]); ?> </option><?php endforeach; endif; ?>
            </select>
            <button id="bt_search"  type="submit" class="btn btn-default">查询</button>
        </form>
    </div>
</div>
<div id="document_list" class="container">
    <div class="list-group">
        <a href="#" class="list-group-item">
            <h4 class="list-group-item-heading">
                经院杀手《xxx》考试攻略1
            </h4>
            <p class="list-group-item-text">
                <span>学校 </span><span> 科目</span><span> 老师</span>
            </p>
        </a>
    </div>

</div>
</body>
</html>