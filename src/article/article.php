<?php
/**
 * Created by IntelliJ IDEA.
 * User: Administrator
 * Date: 2016/5/26
 * Time: 17:24
 */
session_start();
require_once ('../utils/connect.php');
$action = $_POST['action'];
if($action == 'article'){
    $title = stripslashes($_POST['title']);
    $content = stripslashes($_POST['content']);
    if(empty($title)){
        echo '标题不能为空';
        exit;
    }
    if(empty($content)){
        echo '内容不能为空';
        exit;
    }
    $userId = $_SESSION['userId'];
    $sql = "INSERT INTO t_article (title,content,user_id) values('$title','$content',$userId)";
    $result = $conn->query($sql);//返回true 或false
    if ($result) {
        $arr['success'] = 1;
        $arr['msg'] = '发布成功';
    } else {
         $arr['success'] = 0;
         $arr['msg'] = '发布失败！';
    }
        echo json_encode($arr); //输出json数据

}
else if($action="article/list"){
    $sql = "select * from t_article";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
        while($row=$result->fetch_assoc()){
            
        }
    }else{
        echo "0 result";
    }
}
elseif ($action == 'logout') {  //退出
    unset($_SESSION);
    session_destroy();
    echo '1';
}
?>