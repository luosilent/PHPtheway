<?php
/**
 * Created by PhpStorm.
 * User: luosilent
 * Date: 2018/8/18
 * Time: 9:38
 */
//ֱ�Ӷ�ȡjson�ļ���Ҳ���Դ����ݿ��ȡ
$json_string = file_get_contents("regions.json");// ���ļ��ж�ȡ���ݵ�PHP����
//$data = json_decode($json_string,true);// ��JSON�ַ���ת��PHP����
//$json_strings = json_encode($data);

return $json_string;