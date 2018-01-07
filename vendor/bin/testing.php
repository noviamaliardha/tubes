<?php
mysql_connect("localhost","root","") or die (mysql_error());
mysql_select_db("lazycooking") or die (mysql_error()); 

class tes extends PHPUnit_Framework_TestCase{
	function testPassword(){
		$sql = mysql_query("select * from tb_login where username = 'admin'");
		$user = mysql_fetch_array($sql);
		$test_user = $user['password'];
		$content = $test_user;
		$this->assertEquals('admin',$content);
	}
	function testUsername(){
		$sql = mysql_query("select * from tb_login where id_user = 1");
		$user = mysql_fetch_array($sql);
		$test_user = $user['username'];
		$content = $test_user;
		$this->assertEquals('admina',$content);
	}
}
?>