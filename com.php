
<html>
<head><center>WELCOME</center></head>
<title>www.employee.com</title>
<body bgcolor="pink">
<form action="" method=POST>
<center>
<h1><u><b>EMPLOYEE DETAILS</b></u><br>
<table>

<tr><td>EMPID</td>
<td>
<select name=empid >

<?php
$con=mysql_connect("localhost","root","");
	mysql_select_db("empdb",$con);
	$sql="select empid from emptb ";

	$result=mysql_query($sql,$con);
	while($ro=mysql_fetch_array($result))
	{
	echo "<option>$ro[empid]</option>";
	}
	?>
	</select>
	</td>
	</tr></br>
<tr><td></td><td><u>TYPE OF LEAVES</u></td></tr></br>

<tr><td>CASHLEAVE</td><td><input type="radio" name=leave value="c1"></td></tr></br>
<tr><td>MEDILEAVE</td><td><input type="radio" name=leave value="m1"></td></tr></br>

<tr><td>NUMBER OF LEAVES</td><td><input type="text" name=noleaves></td></tr></br>
<tr><td></td><td><input type="submit" name=b1></td></tr></br>

</table></h1></center>
</form>
</body>
</html>

  <?php
   if(isset($_POST["b1"]))
   {
      $con=mysql_connect("localhost","root","");
	  mysql_select_db("empdb",$con);
      if($_POST["leave"]=="c1")
      {
       $sql="select cashleave from emptb where empid=$_POST[empid]";
       $res=mysql_query($sql,$con);
       while($row = mysql_fetch_array($res))
       {
        error_reporting(0);
        $av=$row["cashleave"];
        if($av<=15 && $av>0)
     	{
	      $res=$av-$_POST['noleaves'];

          if($av >= $_POST['noleaves'])
          {
          echo"<h4>leave is allowed</h4>";
          $sql1="update emptb set cashleave = cashleave - $_POST[noleaves] where empid = $_POST[empid]";
          mysql_query($sql1,$con);
         }
         else
         {
         echo"specified leave cannot be given only".$av." leave cannot be allowed";
         $sql1="update emptb set cashleave=0 where empid=$_POST[empid]";
	     mysql_query($sql1,$con);
	    }
	   }

	   else
	   {
	   echo "Not eligible for leaves";
       }
      }
}





if($_POST["leave"]=="m1")
      {
       $sql="select medicalleave from emptb where empid=$_POST[empid]";
       $res=mysql_query($sql,$con);
       while($row = mysql_fetch_array($res))
       {

        $av=$row["medicalleave"];
        if($av<=20 && $av>0)
     	{
	      $res=$av-$_POST['noleaves'];

          if($av >= $_POST['noleaves'])
          {
          echo"<h4>leave is allowed</h4>";
          $sql1="update emptb set medicalleave = medicalleave - $_POST[noleaves] where empid = '$_POST[empid]'";
          mysql_query($sql1,$con);
         }
         else
         {
         echo"specified leave cannot be given only".$av." leave cannot be allowed";
         $sql1="update emptb set cashleave=0 where empid=$_POST[empid]";
	     mysql_query($sql1,$con);
	    }
	   }

	   else
	   {
	   echo "Not eligible for leaves";
       }
      }
}

   }
 ?>

 </body>
 </html>


