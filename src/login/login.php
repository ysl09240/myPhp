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
if($action == 'login'){
    $user = stripslashes($_POST['user']);
    $pass = stripslashes($_POST['pass']);
    if(empty($user)){
        echo '用户名不能为空';
        exit;
    }
    if(empty($pass)){
        echo '密码不能为空';
        exit;
    }
    $md5pass = md5($pass);//密码使用md5加密
    $sql = "select * from t_user where user_name='$user'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // 输出每行数据
//        while($row = $result->fetch_assoc()) {
//            echo "<br> id: ". $row["id"]. " - Name: ". $row["user_name"]. " " . $row["age"];
//        }
        $us = is_array($row=$result->fetch_assoc());
        $ps = $us ? $md5pass == md5($row['password']) : FALSE;
        if ($ps) {
            $counts = $row['login_counts'] + 1;
            $_SESSION['user'] = $row['user_name'];
            $_SESSION['login_time'] = $row['login_time'];
            $_SESSION['login_counts'] = $counts;
            $ip = $_SERVER["REMOTE_ADDR"]; //获取登录IP
            $time = date('Y-m-d H:i:s', time());
            $rs = $conn->query("update t_user set login_time='$time', login_ip='$ip',
        login_counts='$counts',age=20 where user_name='$user'");
            if ($rs) {
                 //2010-08-29
                $arr['success'] = 1;
                $arr['msg'] = '登录成功!';
                $arr['user'] = $_SESSION['user'];
                $arr['login_time'] = $_SESSION['login_time'];
                $arr['login_counts'] = $_SESSION['login_counts'];
            } else {
                $arr['success'] = 0;
                $arr['msg'] = '登录失败';
            }
        } else {
            $arr['success'] = 0;
            $arr['msg'] = '用户名或密码错误！';
        }
        echo json_encode($arr); //输出json数据
    } else {
        echo "0 results";
    }

}
elseif ($action == 'logout') {  //退出
    unset($_SESSION);
    session_destroy();
    echo '1';
}
?>