<?php  
//export.php  
include 'config.php';
$output = '';
if(isset($_POST["export"]))
{
 $query = "SELECT * FROM student_data order by 1 desc";
 $result = mysqli_query($con, $query);
 if(mysqli_num_rows($result) > 0)
 {
  $output .= '
   <table class="table" bordered="1">  
                    <tr>  
                         <th> #№: </th>
                         <th> Талабанинг #ID рақами: </th>
                         <th> Талабанинг Исми: </th>
                         <th> Талабанинг Отасининг исми: </th>
                         <th> Талабанинг Онасининг исми: </th>
                         <th> Талабанинг Уй телефон рақами: </th>
                         <th> Талабанинг жинси: </th>
                         <th> Туғилган куни: </th>
                         <th> Талабанинг Email - Почтаси: </th>
                         <th> Талабанинг телефон рақами: </th>
                         <th> Изоҳ қолдиринг: </th>
                         <th> Талабанинг турар жой манзили: </th>
                         <th> Олий таълим: Йўналиш коди: </th>
                         <th> Рўйхатдан ўтган: </th>
                    </tr>
  ';
  $i = 0;
  while($row = mysqli_fetch_array($result))
  {
    $sl = ++$i;
   $output .= '
    <tr>  
                         <td > '.$sl.' </td>
                         <td>'.$row["u_card"].'</td>  
                         <td>'.$row["u_f_name"]  .$row["u_l_name"].'</td>  
                         <td>'.$row["u_father"].'</td>  
                         <td>'.$row["u_mother"].'</td>  
                         <td>'.$row["u_aadhar"].'</td>  
                         <td>'.$row["u_gender"].'</td> 
                         <td>'.$row["u_birthday"].'</td>  
                         <td>'.$row["u_email"].'</td>  
                         <td>'.$row["u_phone"].'</td> 
                         <td>'.$row["u_family"].'</td>  
                         <td>'.$row["u_village"] .$row["u_police"] .$row["u_dist"] .$row["u_state"] .$row["u_pincode"].'</td>  
                        <td>'.$row["staff_id"].'</td>  
                        <td>'.$row["uploaded"].'</td>
                    </tr>
   ';
  }
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=Shivshakti_all_Cards_Data.xls');
  echo $output;
 }
}
?>