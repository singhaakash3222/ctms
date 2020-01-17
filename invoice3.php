<?php
require('fpdf17/fpdf.php');

//Connect to your database//
$con =mysqli_connect('localhost','root','','softex');

//Select the Products you want to show in your PDF file
$query=mysqli_query($con,"SELECT * FROM `tbl_order_items` ");
$number_of_products = mysqli_num_rows($query);



//Initialize the 3 columns and the total
$column_code = "";
$column_name = "";
$column_price = "";
$sname="";
$rname="";
$date="";
$rate="";
$rate1="";
$tax="";
$Sum="";
$total = 0;

$sum=0;
//For each row, add the field to the corresponding column
while($row = mysqli_fetch_array($query))
{
    $code = $row["order_id"];
    $name = substr($row["item_name"],0,20);
    $sender_name = $row["sname"];
    $Rname=$row['rname'];
    $Date=$row['date'];
    $Tax=$row['tax_amount'];
    $Rate=$row['total_amount'];
    $Rate1=$row['price'];


$sum2=$row['price'];

 $sum += $sum2;

    $price_to_show = $row["price"];

    $column_code = $column_code.$code."\n";
    $column_name = $column_name.$name."\n";
      $sname = $sname.$sender_name."\n";
      $rname = $rname.$Rname."\n";
      $date = $date.$Date."\n";
      $rate = $rate.$Rate."\n";
       $tax = $tax.$Tax."\n";
      $rate1 = $rate1.$Rate1."\n";
    
    $column_price = $column_price.$price_to_show."\n";

    //Sum all the Prices (TOTAL)
   
}
mysqli_close($con);

//Convert the Total Price to a number with (.) for thousands, and (,) for decimals.


//Create a new PDF file
$pdf=new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',14);

//Cell(width , height , text , border , end line , [align] )
$pdf->image('soft.png',5,10,50);
$pdf->Cell(180,5,'SoftEx Courier Revenue Detail',0,1,'R');
$pdf->SetFont('Arial','',14);
$pdf->Cell(180,5,'(Company copy)',0,1,'R');


$pdf->SetFillColor(255,255,255);
//set font to arial, regular, 12pt
$pdf->SetFont('Arial','B',10);

$pdf->Cell(1 ,10,'',0,2);

$pdf->Cell(189 ,10,'',0,1);//end of line

//invoice contents



//Fields Name position
$Y_Fields_Name_position = 34;
//Table position, under Fields Name
$Y_Table_Position = 40;

//First create each Field Name
//Gray color filling each Field Name box

//Bold Font for Field Name
$pdf->SetFont('Arial','B',12);
$pdf->SetY($Y_Fields_Name_position);

$pdf->SetX(10);
$pdf->Cell(20,6,'Order Id',1,0,'L');
$pdf->SetX(30);
$pdf->Cell(60,6,'Item Name',1,0,'L');
$pdf->SetX(60);
$pdf->Cell(30,6,'Sender Name',1,0,'L');
$pdf->SetX(90);
$pdf->Cell(35,6,'Reciever Name',1,0,'L');

$pdf->SetX(125);
$pdf->Cell(30,6,'Total Amount',1,0,'L');
$pdf->SetX(155);
$pdf->Cell(30,6,'Total Tax ',1,0,'L');
$pdf->SetX(185);
$pdf->Cell(20,6,'Revenue',1,0,'L');
$pdf->Ln();

//Now show the 3 columns
$pdf->SetFont('Arial','',12);
$pdf->SetY($Y_Table_Position);
$pdf->SetX(10);
$pdf->MultiCell(20,6,$column_code,1,2,'L');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(30);
$pdf->MultiCell(30,6,$column_name,1,2,'L');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(60);
$pdf->MultiCell(30,6,$sname,1,2,'L');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(90);
$pdf->MultiCell(35,6,$rname,1,2,'L');



$pdf->SetY($Y_Table_Position);
$pdf->SetX(125);
$pdf->MultiCell(30,6,$rate,1,2,'L');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(155);
$pdf->MultiCell(30,6,$tax,1,2,'L');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(185);
$pdf->MultiCell(20,6,$rate1,1,2,'L');
$pdf->Cell(1 ,2,'',0,2);



//Create lines (boxes) for each ROW (Product)
//If you don't use the following code, you don't create the lines separating each row
$pdf->SetFont('Arial','B',14);
$pdf->Cell(180,5,'Total Revenue:-',0,0,'R');
$pdf->SetFont('Arial','B',14);
$pdf->MultiCell(20,5,$sum,0,2);
$pdf->Output();
?>