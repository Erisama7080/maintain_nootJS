<?php
if(isset($_GET['MEMID'])){
$MEMID=$_GET['MEMID'];
$sql="DELETE FROM member WHERE mem_id='$MEMID' ";
$res=mysqli_query($con,$sql);
echo '<meta http-equiv="refresh" content="0; url=index.php?Node=showmem">';
exit;
}

?>



<div class="content-wrapper">
	<br>
	<div class="col-md-12">

            <div class="card">

              <div class="card-header">
                <h3 class="card-title">จัดการข้อมูลผู้ใช้งาน
                <a href="index.php?Node=addmem"> [เพิ่มผู้ใช้งาน] </a>
                </h3>
              </div>

              <div class="card-body p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                     <th >ลำดับ</th>
                      <th>รหัส</th>
                      <th>ชื่อ-สกุล</th>
                      <th>เบอร์โทร</th>
                      <th>แผนก</th>
                      <th>Username</th>
                      <th>Password</th>
                      <th>สิทธิ์การใช้งาน</th>
                      <th>ลบข้อมูล</th>
                    </tr>
                  </thead>
                  <tbody>
<?php
$i = 1;
$sql="SELECT member.*,department.* FROM member
LEFT OUTER JOIN department ON (member.mem_dept=department.dept_id)";
$res=mysqli_query($con,$sql);
while ($row=mysqli_fetch_assoc($res)) {
$mem_id=$row['mem_id'];
$mem_name=$row['mem_name'];
$mem_mobile=$row['mem_mobile'];
$mem_user=$row['mem_user'];
$mem_pass=$row['mem_pass'];
$mem_level=$row['mem_level'];
$mem_dept=$row['mem_dept'];
$dept_name=$row['dept_name'];

if($mem_level=='1'){$levelname="ผู้ดูแลระบบ";}
else if($mem_level=='2'){$levelname="ผู้ใช้งานทั่วไป";}
?>





                    <tr>
                      
                      <td><?php echo $i++; ?></td>
                      <td><?=$mem_dept;?></td>
                      <td><?=$dept_name;?></td>
                      <td><?=$mem_mobile;?></td>
                      <td><?=$mem_name;?></td>
                      <td><?=$mem_user;?></td>
                      <td><?=$mem_pass;?></td>
                      <td><?=$levelname;?></td>
                      

        <td>
        <span class="badge bg-danger">
        <a href="index.php?Node=showmem&MEMID=<?=$mem_id;?>" onclick="if(confirm('คุณต้องการลบรายการนี้ใช่ไหม?')) return true; else return false;">ลบ</a>
    	</span>
		</td>
                    </tr>
<?php } ?>

                  </tbody>
                </table>
              </div>

            </div>
	</div>
</div>