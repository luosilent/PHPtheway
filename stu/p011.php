<?php
/**
 * Created by PhpStorm.
 * User: luosilent
 * Date: 2018/8/15
 * Time: 9:14
 */

$json_string = file_get_contents("regions.json");// ���ļ��ж�ȡ���ݵ�PHP����
$data = json_decode($json_string,true);// ��JSON�ַ���ת��PHP����
foreach ($data as &$d) {
    $d['code'] = substr($d['code'], 0, 2);
    if(is_array($d['cities'])){
        foreach ($d['cities'] as &$lc) {
            $lc['code'] = substr($lc['code'], 0, 4);
        }
    }
}

$json_strings = json_encode($data);

file_put_contents("change5.json",$json_strings);//д��