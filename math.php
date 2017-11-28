<?php
/**
 * @author lei
 * @date 2017/11/27
 */

$danwei3 = ['零','壹','贰','叁','肆','伍','陆','柒','捌','玖'];


$danwei = ['元整','万','亿','万亿'];
// 1310
$danwei2 = ['','拾','佰','仟'];

$shuzi = 30103000;

$shuzi = $_GET['xiaoxie'];


//4位数字截断
$aa = str_split(strrev($shuzi),4);
foreach ($aa as $k=>$v)
{
    $vv['a'] = strrev($v);
    $vv['b'] = $danwei[$k];
    $bb[count($aa)-$k] = $vv;
}
ksort($bb);

foreach ($bb as &$v)
{
    $vvv = str_split(strrev($v['a']));
    foreach ($vvv as $k=>$va)
    {
        $vvvv[count($vvv)-$k] = ($va == 0) ? '零' : $danwei3[$va].$danwei2[$k];
    }
    ksort($vvvv);
    $vvvvstr = implode('',$vvvv);
    $vvvvstr = preg_replace('/(零)\1*$/','', $vvvvstr);
    $v['a'] = $vvvvstr;
}

//exit;
$str = '';
foreach ($bb as $vb) {
    if($vb['a'] != '')
    	$str .= implode('', $vb);
}

$str = preg_replace('/(零)\1+/','零',$str);
echo $str;



