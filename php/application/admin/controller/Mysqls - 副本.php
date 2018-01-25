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

//        $caseModel = model('Cases');
//        $param = $this->param;
//        $data =$caseModel->getDataList($keywords, $page, $limit);
//        return resultArray(['data' => $data]);

        $database=config('database');
        //配置信息
        $cfg_db_host = $database['hostname'];
        $cfg_db_name = $database['database'];
        $cfg_db_user = $database['username'];
        $cfg_db_pwd = $database['password'];
        $cfg_db_language = 'utf8';


        //链接数据库
        $link = mysql_connect($cfg_db_host,$cfg_db_user,$cfg_db_pwd);
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
        p($tabList);

        return resultArray(['data' => $tabList]);
//         p($tabList);die;


    }

        //数据库列表
       private function getTables(){
           $database=config('database');
           //配置信息
           $cfg_db_host = $database['hostname'];
           $cfg_db_name = $database['database'];
           $cfg_db_user = $database['username'];
           $cfg_db_pwd = $database['password'];
           $cfg_db_language = 'utf8';


           //链接数据库
           $link = mysql_connect($cfg_db_host,$cfg_db_user,$cfg_db_pwd);
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
       }

       //导出数据表
       private  function exportTables()
       {
           $to_file_name = APP_PATH .'../backup/'."sinoye".date("Y-m-d",time()).".sql";

           $tabList=$this->getTables();
           echo "运行中，请耐心等待...<br/>";
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

//           return resultArray(['data'=>'OK! 备份成功！']);
       }
}