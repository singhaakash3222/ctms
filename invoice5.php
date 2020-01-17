<?php
//call the FPDF library
require('fpdf17/fpdf.php');
$con =mysqli_connect('localhost','root','','softex');
$ID=$_GET['cid'];

$did="";
$dest= "";



$query=mysqli_query($con,"SELECT * FROM `destinations`   WHERE `route`='$ID'");
while($data=mysqli_fetch_array($query)){

$Did= $data['did'];
$Dest=$data['destination'];
$rout=$data['route'];



    

    
      
      $did = $did.$Did."\n";
       $dest = $dest.$Dest."\n";
      
    
    
    //Sum all the Prices (TOTAL)
   
}
mysqli_close($con);


//A4 width : 219mm
//default margin : 10mm each side
//writable horizontal : 219-(10*2)=189mm

//create pdf object
$pdf = new FPDF('P','mm','A5');
$pdf->AliasNbPages('{pages}');

//add new page




//add new page
$pdf->AddPage();
//set font to arial, bold, 14pt
$pdf->SetFont('Arial','B',14);

//Cell(width , height , text , border , end line , [align] )
$pdf->image('soft.png',5,10,50);
$pdf->Cell(130,5,'SoftEx Courier Delivery Detail',0,1,'R');
$pdf->SetFont('Arial','',14);
$pdf->Cell(130,5,'(Route copy)',0,1,'R');



//set font to arial, regular, 12pt




//set font to arial, regular, 12pt
$pdf->SetFont('Arial','B',10);



$Y_Fields_Name_position1 = 25;
$pdf->SetFont('Arial','B',14);
$pdf->SetY($Y_Fields_Name_position1);
$pdf->SetFillColor(255,255,255);
$pdf->SetX(20);
$pdf->Cell(120,6,$rout,1,1,'C');
//invoice contents
$Y_Fields_Name_position = 31;
//Table position, under Fields Name
$Y_Table_Position = 37;

//First create each Field Name
//Gray color filling each Field Name box

//Bold Font for Field Name
$pdf->SetFont('Arial','B',12);
$pdf->SetY($Y_Fields_Name_position);
$pdf->SetFillColor(255,255,255);

$pdf->SetX(20);
$pdf->Cell(30,6,'Destination Id',1,0,'L');
$pdf->SetX(50);
$pdf->Cell(90,6,'Destination Name',1,0,'C');
$pdf->SetX(132);

$pdf->Ln();

//Now show the 3 columns
$pdf->SetFont('Arial','',12);
$pdf->SetY($Y_Table_Position);
$pdf->SetX(20);
$pdf->MultiCell(30,6,$did,1,1,'L');
$pdf->SetY($Y_Table_Position);
$pdf->SetX(50);
$pdf->multiCell(90,6,$dest,1,1,'C');
$pdf->SetX(140);



//Create lines (boxes) for each ROW (Product)
//If you don't use the following code, you don't create the lines separating each row




$pdf->Output();
?>