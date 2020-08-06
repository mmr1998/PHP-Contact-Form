<?php 
//mail('mr.mmr1998@gmail.com', 'Test', 'This is a prelimenary testing mail', 'From: mr.mmr1998@gmail.com');
$mailto='mr.mmr1998@gmail.com';
$sub='Test';
$content='just do it!';
$head='From:rmdmosaddiqur147@gmail.com';
if (mail($mailto, $sub, $content, $head)) {
	echo "mail has been send sucessfully!";
}else{
	echo "facing problem to send mail!";
}

?>