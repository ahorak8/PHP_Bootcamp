#!/usr/bin/php
<?PHP
function error(){
    echo "Wrong Format\n";
    exit();
}

function get_month($str)
{
    if (preg_match("/[Jj]anvier/", $str))
        return 1;
    if (preg_match("/[Ff]vrier/", $str))
        return 2;
    if (preg_match("/[Mm]ars/", $str))
        return 3;
    if (preg_match("/[Aa]vril/", $str))
        return 4;
    if (preg_match("/[Mm]ai/", $str))
        return 5;
    if (preg_match("/[Jj]uin/", $str))
        return 6;
    if (preg_match("/[Jj]uillet/", $str))
        return 7;
    if (preg_match("/[Aa]out/", $str))
        return 8;
    if (preg_match("/[Ss]eptembre/", $str))
        return 9;
    if (preg_match("/[Oo]ctobre/", $str))
        return 10;
    if (preg_match("/[Nn]ovembre/", $str))
        return 11;
    if (preg_match("/[Dd]ecembre/", $str))
        return 12;
}
$tab = explode(" ", $argv[1]);
$month = get_month($tab[2]);

if (!preg_match("/([Ll]undi|[Mm]ardi|[Mm]ercredi|[Jj]eudi|[Vv]endredi|[Ss]amedi|[Dd]imanche)/", $tab[0]))
    error();

if (!preg_match("/([Jj]anvier|[Ff]vrier|[Mm]ars|[Aa]vril|[Mm]ai|[Jj]uin|[Jj]uillet|[Aa]out|[Ss]eptembre|[Oo]ctobre|[Nn]ovembre|[Dd]ecembre)/", $tab[2]))
    error();
if (!preg_match("/([0-9]{2})/", $tab[1]))
    error();
if (!preg_match("/[0-9]{4}/", $tab[3]))
    error;
if (!preg_match("/([0-9]{2}):([0-9]{2}):([0-9]{2})/", $tab[4]))
    error;

$x = array_shift($tab);
$tab = array_values(array_filter($tab));
$out = "$tab[0].$month.$tab[2].$tab[3]";
echo strtotime($out)."\n";
?>