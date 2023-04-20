<?php  
//export.php  
require_once("inc/config.php");
require_once ("dompdf/autoload.inc.php");
use Dompdf\Dompdf;
extract($_POST);

if(isset($print)){
    $sql = "select * from leaves order by id desc";
    $query = mysqli_query($con, $sql);
    $html = '';
    $html .= '
    <h2 align="center">Employee Leaves Records</h2>
    <table style="width:100%; border-collapse:collapse;">
	<tr>
	<th style="border:1px solid #ddd; padding:8px; text-align:left;">#</th>
	<th style="border:1px solid #ddd; padding:8px; text-align:left;">Name</th>
	<th style="border:1px solid #ddd; padding:8px; text-align:left;">Department</th>
	<th style="border:1px solid #ddd; padding:8px; text-align:left;">Date</th>
	<th style="border:1px solid #ddd; padding:8px; text-align:left;">Reason</th>
	<th style="border:1px solid #ddd; padding:8px; text-align:left;">Status</th>
	</tr>
    ';

    if(mysqli_num_rows($query) > 0){
        $cnt = 1;
        foreach($query as $row){
            $html .='
            <tr>
            <td style="border:1px solid #ddd; padding:8px; text-align:left;">'.$cnt.'</td>
            <td style="border:1px solid #ddd; padding:8px; text-align:left;">'.$row['name'].'</td>
            <td style="border:1px solid #ddd; padding:8px; text-align:left;">'.$row['department'].'</td>
            <td style="border:1px solid #ddd; padding:8px; text-align:left;">'.$row['leavedate'].'</td>
            <td style="border:1px solid #ddd; padding:8px; text-align:left;">'.$row['leavereason'].'</td>
            <td style="border:1px solid #ddd; padding:8px; text-align:left;">'.$row['status'].'</td>
            </tr>
            ';
            $cnt++;
        }
    }else{
        $html .='
        <tr>
        <td colspan="5" style="border:1px solid #ddd; padding:8px; text-align:left;">No Data</td>
        </tr>
        ';
    }
    $html .='</table>';
    $dompdf = new DOMPDF();
    $dompdf->loadHtml($html);
    $dompdf->setPaper("A3", "portrait");
    $dompdf->render();
    $dompdf->stream("RecordOfLeaves.pdf");
}
?>
