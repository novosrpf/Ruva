<?php
  require('../utilerias/login.php');
  require('../utilerias/fpdf/fpdf.php');

  $query = "SELECT numero, rin, marca, modelo FROM tblllantas order by rin, numero";
 
  $resultado = mysql_query($query, $conexion) ;
   
  
  class PDF extends FPDF{
    
    function Header(){
    
     // $this->Image('logo.png', 10.8. 33);
      $this->SetFont('Arial', 'B', 12);
      $this->Cell(80);
      $this->Cell(30,10,'Ruvalcaba Motorsport', 0, 1, 'C');
      $this->Cell(80);
      $this->Cell(30,10,'Catalogo de llantas', 0, 0, 'C');
      $this->Ln();
    
    }
    
    function Footer(){
      
      $this->SetY(-15);
      $this->SetFont('Arial', 'I', 8);
      $this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}', 0, 0, 'R');
    }
  }
  
  $pdf = new PDF();
  $pdf->AliasNbPages();
  $pdf->AddPage();
  $pdf->SetFont('Arial', 'B', 8);

  $pdf->SetFillColor(232, 232,232);
  $pdf->SetX(10);
  $pdf->Cell(20, 4, 'Numero', 1,0,'C', 1);
  $pdf->SetX(30);
  $pdf->Cell(15, 4, 'Rin', 1,0,'C', 1);
  $pdf->SetX(45);
  $pdf->Cell(50, 4, 'Marca', 1,0,'C', 1);
  $pdf->SetX(95);
  $pdf->Cell(50, 4, 'Modelo', 1,0,'C', 1);
  $pdf->SetX(145);
  $pdf->Cell(50, 4, 'Observacion', 1,0,'C', 1);
  $pdf->Ln();


  while($row = mysql_fetch_assoc($resultado)){
    
    $pdf->SetFont('Arial', '', 9);
    $pdf->SetX(10);
    $pdf->Cell(20, 4, $row['numero'], 1, 0, 'L');
    $pdf->SetX(30);
    $pdf->Cell(15, 4, $row['rin'], 1, 0, 'R');
    $pdf->SetX(45);
    $pdf->Cell(50, 4, $row['marca'], 1, 0, 'L');
    $pdf->SetX(95);
    $pdf->Cell(50, 4, $row['modelo'], 1, 0, 'L');
    $pdf->SetX(145);
    $pdf->Cell(50, 4, "", 1, 1, 'L');

  }

  $pdf->Output();

?>

