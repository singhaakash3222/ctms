<?php
//call the FPDF library
require('fpdf17/fpdf.php');
$con =mysqli_connect('localhost','root','','softex');
$ID=$_GET['cid'];


$sname= "";
$rname = "";
$sadd = "";
$radd = "";
$scity = "";
$sstate = "";
$scity = "";
$rcity ="" ;
$rstate ="" ;
$scountry = "";
$rcountry = "";
$rmob = "";
$smob = "";
$orderid ="";
$invoice = "";
$date = "";
$item_name = "";
$qty = "";
$gst = "";
$price = "";
$gstp= "";
$total= "";
$item_id = "";

$sum = 0;



$query=mysqli_query($con,"SELECT * FROM `tbl_order_items` WHERE `order_id`='$ID'");
while($data=mysqli_fetch_array($query)){

$con1 =mysqli_connect('localhost','root','','softex');

$query1=mysqli_query($con1,'SELECT `invoice1` FROM `invoice`');
$row=mysqli_fetch_array($query1);

	$Sname = $data["sname"];
    $Rname = $data["rname"];
    $Radd = $data["radd"];
    $Sadd=$data['sadd'];
    $Scity=$data['scity']; 
    $Rcity=$data['rcity'];
    $Sstate=$data['sstate'];
    $Rstate=$data['rstate'];
    $Scountry=$data['country'];
    $Rcountry=$data['rcountry'];
    $Rmob=$data['rmob'];
    $Smob=$data['smob'];
    $Orderid=$data['order_id'];
    $Invoice=$row['invoice1'];
    $Item_name=$data['item_name'];
    $Qty=$data['qty'];
    $Date=$data['date'];
    $Gst=$data['tax'];
    $Price=$data['price'];
    $Gstp=$data['tax_amount'];
    $Total=$data['total_amount'];
    $Item_id=$data['order_items_id'];





 $sum += $Total;

    

    
      
      $orderid = $orderid.$Orderid."\n";
      $invoice = $invoice.$Invoice."\n";
       $item_id = $item_id.$Item_id."\n";

      $item_name = $item_name.$Item_name."\n";
      $qty = $qty.$Qty."\n";
      $date = $date.$Date."\n";
      $gst = $gst.$Gst."\n";
      $price = $price.$Price."\n";
      $gstp = $gstp.$Gstp."\n";

      
      $total = $total.$Total."\n";
       
    
    
    //Sum all the Prices (TOTAL)
   
}
mysqli_close($con);


//A4 width : 219mm
//default margin : 10mm each side
//writable horizontal : 219-(10*2)=189mm

//create pdf object
$pdf = new FPDF('P','mm','A4');
$pdf->AliasNbPages('{pages}');

//add new page




//add new page
$pdf->AddPage();
//set font to arial, bold, 14pt
$pdf->SetFont('Arial','B',14);

//Cell(width , height , text , border , end line , [align] )
$pdf->image('soft.png',5,10,50);
$pdf->Cell(180,5,'SoftEx Courier Invoice Detail',0,1,'R');
$pdf->SetFont('Arial','',14);
$pdf->Cell(180,5,'(Reciever copy)',0,1,'R');



//set font to arial, regular, 12pt




//set font to arial, regular, 12pt
$pdf->SetFont('Arial','B',10);

$pdf->Cell(1 ,10,'',0,2);
$pdf->Cell(15 ,5,'From :- ',0,0);
$pdf->SetFont('Arial','',10);
$pdf->Cell(104 ,5, $Sname,0,0);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(10 ,5,'To :- ',0,0);
$pdf->SetFont('Arial','',10);
$pdf->Cell(110 ,5, $Rname,0,1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(119 ,5,'Address ',0,0);
$pdf->SetFont('Arial','',10);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(20 ,5,'Address  ',0,1);
$pdf->SetFont('Arial','',10);
$pdf->Cell(119 ,5, $Sadd,0,0);

$pdf->Cell(169 ,5, $Radd,0,1);
$pdf->Cell(119 ,5, $Scity,0,0);

$pdf->Cell(169 ,5,$Rcity,0,1);
$pdf->Cell(119 ,5, $Sstate,0,0);

$pdf->Cell(169 ,5,$Rstate,0,1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(15 ,5,'Phone :-',0,0);
$pdf->SetFont('Arial','',10);
$pdf->Cell(104 ,5,$Smob,0,0);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(15 ,5,'Phone :-',0,0);
$pdf->SetFont('Arial','',10);
$pdf->Cell(104 ,5,$Rmob,0,1);//end of line



//make a dummy empty cell as a vertical spacer
$pdf->Cell(189 ,10,'',0,1);//end of line
$pdf->SetFont('Arial','B',10);
$pdf->Cell(12 ,5,'Date:- ',0,0);
$pdf->SetFont('Arial','',10);
$pdf->Cell(107 ,5,$Date,0,0);

//billing address
$pdf->SetFont('Arial','B',10);
$pdf->Cell(15 ,5,'Bill to :- ',0,0);//end of line
$pdf->SetFont('Arial','',10);
$pdf->Cell(50 ,5,$Rname,0,1);//end of line

//add dummy cell at beginning of each line for indentation
$pdf->SetFont('Arial','B',10);
$pdf->Cell(22 ,5,'Invoice No :- ',0,0);
$pdf->SetFont('Arial','',10);
$pdf->Cell(97 ,5,$Invoice.$Orderid,0,0);

$pdf->SetFont('Arial','B',10);
$pdf->Cell(20 ,5,'Address  ',0,1);
$pdf->SetFont('Arial','',10);

$pdf->SetFont('Arial','B',10);
$pdf->Cell(20 ,5,'Order Id:- ',0,0);
$pdf->SetFont('Arial','',10);
$pdf->Cell(99 ,5,$Orderid,0,0);
$pdf->Cell(0 ,5, $Radd,0,1);
$pdf->Cell(119 ,5, '',0,0);
$pdf->Cell(169,5, $Rcity,0,1);
$pdf->Cell(119 ,5, '',0,0);
$pdf->Cell(169 ,5, $Rstate,0,1);


$pdf->Cell(119 ,5,'',0,0);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(15 ,5,'Phone :-',0,0);
$pdf->SetFont('Arial','',10);
$pdf->Cell(99 ,5,$Rmob,0,1);//end of line




$pdf->Cell(1 ,10,'',0,2);

$pdf->Cell(189 ,10,'',0,1);



//invoice contents
$Y_Fields_Name_position = 125;
//Table position, under Fields Name
$Y_Table_Position = 130;

//First create each Field Name
//Gray color filling each Field Name box

//Bold Font for Field Name
$pdf->SetFont('Arial','B',12);
$pdf->SetY($Y_Fields_Name_position);
$pdf->SetFillColor(255,255,255);
$pdf->SetX(10);
$pdf->Cell(30,6,'Item Order Id',1,0,'L');
$pdf->SetX(40);
$pdf->Cell(30,6,'Item Name',1,0,'L');
$pdf->SetX(70);
$pdf->Cell(10,6,'Qty',1,0,'L');
$pdf->SetX(80);
$pdf->Cell(15,6,'tax%',1,0,'L');
$pdf->SetX(95);
$pdf->Cell(30,6,'Amount',1,0,'L');
$pdf->SetX(125);
$pdf->Cell(40,6,'Tax Amount',1,0,'L');
$pdf->SetX(165);
$pdf->Cell(40,6,'Total Amount',1,0,'L');
$pdf->Ln();

//Now show the 3 columns
$pdf->SetFont('Arial','',12);
$pdf->SetY($Y_Table_Position);
$pdf->SetX(10);
$pdf->MultiCell(30,6,$item_id,1,2,'L');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(40);
$pdf->MultiCell(30,6,$item_name,1,2,'L');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(70);
$pdf->MultiCell(10,6,$qty,1,2,'L');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(80);
$pdf->MultiCell(15,6,$gst,1,2,'L');



$pdf->SetY($Y_Table_Position);
$pdf->SetX(95);
$pdf->MultiCell(30,6,$price,1,2,'L');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(125);
$pdf->MultiCell(40,6,$gstp,1,2,'L');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(165);
$pdf->MultiCell(40,6,$total,1,2,'L');
$pdf->Cell(1 ,2,'',0,2);




//Create lines (boxes) for each ROW (Product)
//If you don't use the following code, you don't create the lines separating each row
$pdf->SetFont('Arial','B',14);
$pdf->Cell(175,5,'Grand Total Amount:-',0,0,'R');
$pdf->SetFont('Arial','B',14);
$pdf->MultiCell(20,5,$sum,0,2);




$pdf->Output();
?>