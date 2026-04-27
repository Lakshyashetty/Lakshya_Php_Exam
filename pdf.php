<?php
include 'db.php';
require 'vendor/autoload.php';

$user_id = $_SESSION["id"];
$sql=$conn->prepare("select * from menu_item where user_id=?");
$sql->bind_param('i',$user_id);
$sql->execute();
$result = $sql->get_result();
$pdf=new TCPDF();
$pdf->AddPage('L');
$pdf->setFont('helvetica','B','12');
$pdf->Cell('0','12','Menu_Table','0','1','C');
$html ='

<table border="1" cellpadding="0" >

<tr style="background-color: orange;" >
<th  width="18%"align="center"  >Item_Name</th>
<th   width="34%" align="center"  >Description</th>
<th  width="14%" align="center" >Price</th>
<th  width="8%" align="center" >Category</th>
<th   width="18%" align="center" >Image</th>
</tr >
';
while ($row=$result->fetch_assoc()) {
    $html .='
    <tr>
    <td   width="18%"  align="center"  >'. $row['item_name'] .'</td>
    <td    width="34%"   >'. $row['description'] .'</td>
    <td   width="14%" align="center"   >'. $row['price'] .'</td>
    <td   width="8%" align="center"   >'. $row['category'] .'</td>
    <td    width="18%" align="center"   >'. $row['image'] .'</td>
    </tr>
    ';
}
$html .='</table> ';
$pdf->writehtml($html,true,false,true,false,'');
$pdf->Output('menu.pdf','D');

?>