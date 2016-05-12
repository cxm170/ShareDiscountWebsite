<?php
// if  'term' empty, exit
if ( !isset($_REQUEST['term']) )
	{echo "no input"; exit;}
  
// mysql connection
$dblink =mysql_connect("localhost","root","polyu") or die( mysql_error() );
mysql_select_db('project');
 
//  search table for 'term'
$rs = mysql_query('select * from m_posts where post_title like "%'. mysql_real_escape_string($_REQUEST['term']) .'%" OR post_content like "%'. mysql_real_escape_string($_REQUEST['term']) .'%" order by ID', $dblink);
 
// result returned and format for jQuery
$data = array();
if ( $rs && mysql_num_rows($rs) )
{
	while( $row = mysql_fetch_array($rs, MYSQL_ASSOC) )
	{
		$data[] = array(
			'label' => $row['post_title'] ,
			'value' => $row['post_title']
		);
	}
}
Else
{
echo "no result";
}
// jQuery wants JSON data

echo json_encode($data);
flush();