<?php
        $image_file = "<img src=\"images/surat_jalan.jpg\" width=\"150px\" />";
        $tgl_sekarang = date("d F Y");
        $total_nominal;
        $isi_header="
        
        <table align=\"left\">
              <tr>
                <td>".$image_file."</td>
              </tr>
            </table>
            <h3 align=\"center\">Monthly Report (".$month."-".$year.")</h3>
            <h5 align=\"right\">Date Print : ".$tgl_sekarang."</h5>
            <hr>"
            ;
        

            $pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
            $pdf->SetTitle('Monthly Report');
            $pdf->SetHeaderMargin(30);
            $pdf->SetTopMargin(3);
            $pdf->setFooterMargin(20);
            $pdf->setPrintFooter(false);
            $pdf->setPrintHeader(false);
            $pdf->SetAutoPageBreak(true);
            $pdf->SetAuthor('Author');
            $pdf->SetDisplayMode('real', 'default');
            $pdf->AddPage();
            $pdf->SetFont('helvetica', '', 8);
            $i=0;
            $pdf->writeHTML($isi_header, true, false, false, false, '');
            $html='
            
            
            
                    <table cellspacing="1" bgcolor="#666666" cellpadding="2">
                    <tr bgcolor="black">
                            <th style="color:#fff" width="5%" align="center"><b>No</b></th>
                            <th style="color:#fff" width="12%" align="center"><b>ID ORDER</b></th>
                            <th style="color:#fff" width="25%" align="center"><b>NAME</b></th>
                            <th style="color:#fff" width="25%" align="center"><b>ADDRESS</b></th>
                            <th style="color:#fff" width="13%" align="center"><b>METHOD</b></th>
                            <th style="color:#fff" width="20%" align="center"><b>PRICE TOTAL</b></th>
                        </tr>';
                        $total_nominal=0;
            foreach ($data->result_array() as $row) 
                {
                $i++;
                    $nominal=$row['price_total'];
                    
                    $total_nominal+=$nominal;
                    $html.='<tr bgcolor="#ffffff">
                            <th align="center">'.$i.'</th>
                            <th>'.$row['id_order'].'</th>
                            <th>'.$row['name'].'</th>
                            <th>'.$row['address'].'</th>
                            <th>'.$row['method'].'</th>
                            <th align="right"> Rp. '.number_format($row['price_total'],0,".",".").'</th>
                        </tr>';
                }
            $html.='</table>';
            $pdf->writeHTML($html, true, false, true, false, '');
            $html='
            
            <table cellspacing="1" bgcolor="#666666" cellpadding="2">
                <tr bgcolor="#ffffff">
                <th width="80%" align="center"><b>Total</b></th>
                <th width="20%" align="right"> <strong>Rp. '.number_format($total_nominal,0,".",".").'</strong></th>
     
                </tr>
                </table>
                ';
                $pdf->writeHTML($html, true, false, true, false, '');
          
            $pdf->SetY(-20);
            $pdf->writeHTML("<hr>", true, false, false, false, '');
            $pdf->Cell(0, 10, 'Halaman '.$pdf->getAliasNumPage().' dari '.$pdf->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
            $pdf->Output('Report', 'I');
?>
		
        