<?php
/**
 * Created by PhpStorm.
 * User: lxw
 * Date: 2017/12/22
 * Time: 17:14
 * 1.展示数据表
 * 2.导出到本地
 */

namespace app\admin\controller;


class Mysqls extends  ApiCommon
{
    public function index()
    {
        header("Content-type:text/html;charset=utf-8");

        $database=config('database');
        //配置信息
        $cfg_db_host = $database['hostname'];
        $cfg_db_name = $database['database'];
        $cfg_db_user = $database['username'];
        $cfg_db_pwd = $database['password'];
        $cfg_db_language = 'utf8';
        $to_file_name = APP_PATH .'../backup/'."sinoye".date("Y-m-d",time()).".sql";//本地
//        $to_file_name = ROOT_PATH."/backup/sinoye".date("Y-m-d",time()).".sql";    //服务器
        //链接数据库
        $link = mysql_connect($cfg_db_host,$cfg_db_user, $cfg_db_pwd);
        mysql_select_db($cfg_db_name);
        //选择编码
        mysql_query("set names ".$cfg_db_language);
        //数据库中有哪些表
        $tables = mysql_list_tables($cfg_db_name);
        //将这些表记录到一个数组
        $tabList = array();
        while($row = mysql_fetch_row($tables)){
            $tabList[] = $row[0];
        }

//        echo "运行中，请耐心等待...<br/>";
        $info = "-- ----------------------------\r\n";
        $info .= "-- 日期：".date("Y-m-d H:i:s",time())."\r\n";
        $info .= "-- 仅用于测试和学习,本程序不适合处理超大量数据\r\n";
        $info .= "-- ----------------------------\r\n\r\n";
        file_put_contents($to_file_name,$info,FILE_APPEND);

        //将每个表的表结构导出到文件
        foreach($tabList as $val){
            $sql = "show create table ".$val;
            $res = mysql_query($sql,$link);
            $row = mysql_fetch_array($res);
            $info = "-- ----------------------------\r\n";
            $info .= "-- Table structure for `".$val."`\r\n";
            $info .= "-- ----------------------------\r\n";
            $info .= "DROP TABLE IF EXISTS `".$val."`;\r\n";
            $sqlStr = $info.$row[1].";\r\n\r\n";
            //追加到文件
            file_put_contents($to_file_name,$sqlStr,FILE_APPEND);
            //释放资源
            mysql_free_result($res);
        }

        //将每个表的数据导出到文件
        foreach($tabList as $val){
            $sql = "select * from ".$val;
            $res = mysql_query($sql,$link);
            //如果表中没有数据，则继续下一张表
            if(mysql_num_rows($res)<1) continue;
            //
            $info = "-- ----------------------------\r\n";
            $info .= "-- Records for `".$val."`\r\n";
            $info .= "-- ----------------------------\r\n";
            file_put_contents($to_file_name,$info,FILE_APPEND);
            //读取数据
            while($row = mysql_fetch_row($res)){
                $sqlStr = "INSERT INTO `".$val."` VALUES (";
                foreach($row as $zd){
                    $sqlStr .= "'".$zd."', ";
                }
                //去掉最后一个逗号和空格
                $sqlStr = substr($sqlStr,0,strlen($sqlStr)-2);
                $sqlStr .= ");\r\n";
                file_put_contents($to_file_name,$sqlStr,FILE_APPEND);
            }
            //释放资源
            mysql_free_result($res);
            file_put_contents($to_file_name,"\r\n",FILE_APPEND);
        }

        $rs=mysql_query("show table status from ".$cfg_db_name);
        $list = array();//声明一个数组用来存放数据
        //$row 为取出来的一行的数据，把他放到$list里面
        //$rs就是你从数据库查询出来的资源
        while($row = mysql_fetch_assoc($rs)) {
            $list[] = $row;
        }
//        dump($list);
        return resultArray(['data'=>$list]);
    }

    public function download()
    {
//        $path=$_SERVER['HTTP_HOST'].substr($_SERVER['SCRIPT_NAME'],0,5);
//        $loadAdress= $path."/backup/sinoye".date("Y-m-d",time()).".sql";

        $path=substr($_SERVER['SERVER_NAME'].$_SERVER['SCRIPT_NAME'],0,-9);
        $loadAdress= "http://".$path.'backup/'."sinoye".date("Y-m-d",time()).".sql";
//        dump($loadAdress);
        return resultArray(['data'=>$loadAdress]);
    }

    //导出数据库到本地
//    public function download(){
//
//        //下载文件存放位置
//        $filename=array_pop(explode('/', $_SESSION['dir']));
//        $filePath=APP_PATH .'../backup/'."sinoye".date("Y-m-d",time()).".sql";
////        $filePath="D:\phpStudy\PHPTutorial\WWW\vuethink\php\backup\sinoye2017-12-25.sql";
//        //下载文件存放目录
//        if (!file_exists( $filePath )) {
//            header("Content-type:text/html;charset=utf-8");
//            echo "File not found!";
//            exit ();
//        } else {
//            if( headers_sent() )
//                die('Headers Sent');
//            // Required for some browsers
//            if(ini_get('zlib.output_compression'))
//                ini_set('zlib.output_compression', 'Off');
//
//            $fsize = filesize( $filePath );
//            $path_parts = pathinfo( $filePath );
//            $ext = strtolower($path_parts["extension"]);
//            // Determine Content Type
//            switch ($ext) {
//                case "txt": $ctype="text/plain"; break;
//                case "pdf": $ctype="application/pdf"; break;
//                case "exe": $ctype="application/octet-stream"; break;
//                case "sql": $ctype="application/sql"; break;
//                case "rar": $ctype="application/rar"; break;
//                case "doc": $ctype="application/msword"; break;
//                case "xls": $ctype="application/vnd.ms-excel"; break;
//                case "ppt": $ctype="application/vnd.ms-powerpoint"; break;
//                case "gif": $ctype="image/gif"; break;
//                case "png": $ctype="image/png"; break;
//                case "jpeg":
//                case "jpg": $ctype="image/jpg"; break;
//                default: $ctype="application/force-download";
//            }
//            header("Pragma: public"); // required
//            header("Expires: 0");
//            header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
//            header("Cache-Control: private",false); // required for certain browsers
//            header("Content-Type: $ctype");
//            header("Content-Disposition: attachment; filename=". $filename .";" );
//            header("Content-Transfer-Encoding: binary");
//            header("Content-Length: ".$fsize);
//            ob_clean();
//            flush();
//            readfile( $filePath  );
//        }
//    }


}