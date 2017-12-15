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
                    var document = data['Document_id'];
                    var school = data['School_id'];
                    var course = data['Course_id'];
                    var teacher = data['Teacher_ame'];
                    $('#gl1').html(document);
                }

            });
    });
});
