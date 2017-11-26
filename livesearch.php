<?php
include("../../class.mysql.php");
include("../../class.config.php");
include("../../store/functions.php");

$q=$_GET["q"];
$hint = "";

if ($q == '') {
  $hint = "No suggestion";
  } else {	
$db1 = new project_DB_Sql;
$content_qry = "SELECT crew_id, last_name, first_name FROM crew WHERE (last_name LIKE '" .$q. "%' AND `display` = 1) ORDER BY last_name, first_name";
$db1->query($content_qry);

$sql_count=mysql_query($content_qry);
$rows = mysql_num_rows($sql_count);

if ($rows == 0) {

echo "No suggestion";

} else {
while($db1->next_record()) {
    $id = $db1->f('crew_id');
    $l = $db1->f('last_name');
    $f = $db1->f('first_name');
    // $hint = $hint .'<a href=get_user.php?id=' . $id .' onClick=showUser(this.form)>' . $l . ', ' . $f . '</a><br />';
    $hint = $hint .'<a href=javascript:showUser(' . $id . ')>' . $l . ', ' . $f . '</a><br />';
    // echo $hint;
  }
echo $hint;
}

}

?>