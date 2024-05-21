<?php
session_start();
require('fpdf186/fpdf.php');
require ('config/db.php');

$name=$_SESSION['name'];
$surname=$_SESSION['surname'];
$user_id=$_SESSION['account_number'];

$selectStmt=$db->prepare('SELECT date,debit,credit FROM bank_statement WHERE user_id=?');
$stmt = $db->prepare("SELECT balance FROM account_balance WHERE account_number = ?");
                


// Create a new PDF instance
$pdf = new FPDF();
$pdf->AddPage();

// Set the title and author
$pdf->SetTitle('Bank Statement');
$pdf->SetAuthor('Your Bank');
$pdf->SetFillColor(230,230,0);

// Add the bank logo
// $pdf->Image('path/to/logo.png',10,10,30);
// $pdf->Ln(20);

// Add the title
$pdf->SetFont('Arial','B',16);
$pdf->Cell(0,10,'Bank Statement',0,1,'C');
$pdf->Ln(10);

$stmt->bind_param("s",$user_id);
$stmt->execute();
$stmt->bind_result($balance);
$stmt->fetch();
$stmt->close();
// Add account holder details
$pdf->SetFont('Arial','B',12);
$pdf->SetTextColor(0,0,225);
$pdf->Cell(0,10,'ACCOUNT HOLDER: '. $name.' '.$surname,0,1);
$pdf->Cell(0,10,'ACCOUNT NUMBER: '.$user_id,0,1);
$pdf->Cell(0,10,'BALANCE: $'.$balance,0,1);
$pdf->Ln(10);

// Table header
$pdf->SetFont('Arial','B',12);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(50,10,'Date',1);
$pdf->Cell(70,10,'',1);
$pdf->Cell(30,10,'Debit',1);
$pdf->Cell(30,10,'Credit',1);
$pdf->Ln();

$selectStmt->bind_param("s",$user_id);
$selectStmt->execute();
$transactions=$selectStmt->get_result();


if($transactions->num_rows>0){
    $pdf->SetFont('Arial','',12);
    foreach($transactions as $transaction) {
       
        $pdf->Cell(50,10,$transaction['date'],1); 
        $pdf->Cell(70,10,'',1);        
        $pdf->Cell(30,10,$transaction['debit'],1,0,'C');
        $pdf->Cell(30,10,$transaction['credit'],1,0,'C');
        $pdf->Ln();
}
}
else{
    $pdf->SetFont('Arial','',12);
    $pdf->Cell(40,10,"nothing",1);
}

// Add transactions to the table


// Output the PDF to the browser
$pdf->Output('I', 'BankStatement.pdf'); // 'D' to download, 'I' to inline view


