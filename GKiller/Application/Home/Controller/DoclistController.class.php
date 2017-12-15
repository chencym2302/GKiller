<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/14
 * Time: 19:49
 */

namespace Home\Controller;
use Think\Controller;

class DocListController extends Controller
{
    public function index()
    {
        $User = M("school");
        $data = $User->where('')->select();
        // var_dump($data);die();
        $this->assign('arr1', $data);

        $User = M("course");
        $data = $User->where('')->select();
        // var_dump($data);die();
        $this->assign('arr2', $data);
        $this->display();

        $User = M("document");
        $data = $User->where('')->select();
    }

    /**
     *  select 数据库所有满足条件的攻略
     *
     */
    public function search()
    {
        //获取指定学校id，课程id
        $schoolId = $_POST['schoolId'];
        $courseId = $_POST['courseId'];
        //var_dump($schoolId); var_dump($courseId);die();

        //查询Document表中满足指定学校，课程名的数据
        $User = M("document");
        //无筛选条件
        if($courseId == -1 && $schoolId == -1 ){
            $data = $User->where('')->select();//补充按日期顺序返回
        }
        //筛选条件
        else{
            if( $courseId != 1 && $courseId != -1)
            {   //选定指定学校和指定课程
                $condition['School_id'] = $schoolId;
                $condition['Course_id']= $courseId;
                $condition['_logic'] = 'AND';
            }else{
                ////只选定某一学校 / 课程
            }
            $data = $User->where($condition)->order('Create_time')->select();
        }
        //var_dump($data);die();

        //以json返回数据
        $this->ajaxReturn($data);
    }
}