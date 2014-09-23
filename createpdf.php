<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Create Agreement</title>
</head>

<body>
    <form id = "form" name = "form" action="createpdf.php" method = "post">
            <p>Please fill the details.
            <p>Landlord Name</p>
            <input type="text" class="topcoat-text-input" placeholder="text" value="" id = "landlord" name= "landlord">
            <p>Tenant Name</p>
            <input type="text" class="topcoat-text-input" placeholder="text" value="" id = "tenant" name = "tenant">
            <p>Location</p>
            <input type="text" class="topcoat-text-input" placeholder="text" value="" id = "location" name = "location">
            <p>Day</p>
            <input type="text" class="topcoat-text-input" placeholder="text" value="" name = "day" id = "day">
            <p>Month</p>
            <input type="text" class="topcoat-text-input" placeholder="text" value="" name = "month" id = "month">
            <p>Year</p>
            <input type="text" class="topcoat-text-input" placeholder="text" value="" name = "year" id = "year">
            <hr>
            <p>Property Details</p>
            <p>Number</p>
            <input type="text" class="topcoat-text-input" placeholder="text" value="" name = "pr_no"  id = "pr_no">
            <p>Location</p>
            <input type="text" class="topcoat-text-input" placeholder="text" value="" name = "pr_location"  id = "pr_location">
            <p>Street</p>
            <input type="text" class="topcoat-text-input" placeholder="text" value="" name = "pr_str" id = "pr_str">
            <p>City</p>
            <input type="text" class="topcoat-text-input" placeholder="text" value="" name = "pr_city" id = "pr_city">
            <hr>
            <p>Term Details</p>
            <p>Begins on</p>
            <input type="text" class="topcoat-text-input" placeholder="text" value="" name = "term_beg" id = "term_beg">
            <p>Ends On</p>
            <input type="text" class="topcoat-text-input" placeholder="text" value="" name = "term_ends" id = "term_ends">
            <p>Paying Amount</p>
            <input type="text" class="topcoat-text-input" placeholder="text" value="" name = "term_amt" id = "term_amt">
            <p>Date of pay</p>
            <input type="text" class="topcoat-text-input" placeholder="text" value="" name = "term_due" id = "term_due">
            <p>Utilities offering by landlord</p>
            <textarea class="topcoat-textarea" rows="6" cols="36" placeholder="Textarea" name = "utilities" id = "utilities"></textarea>
            <p>furniture and appliances</p>
            <textarea class="topcoat-textarea" rows="6" cols="36" placeholder="Textarea" name = "furniture" id = "furniture"></textarea>
            <br>
            <p>Deposit acknowledged</p>
            <input type="text" class="topcoat-text-input" placeholder="text" value="" name = "deposit" id = "deposit">
            <input id = "submit" name="submit" type="submit" class="topcoat-button" value = "Create Agreement">
    </form>

</body>
</html>




<?php
//echo "Hai";

/*

Variables;
$landlord;
$tenant ;
$location;
$month;
$year;
$pr_no;
$pr_str;
$pr_city;
$term_beg;
$term_ends;
$term_amt;
$term_due;*/

require('fpdf/fpdf.php');

class PDF extends FPDF
{
function Header()
{
    global $title;

    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Calculate width of title and position
    $w = $this->GetStringWidth($title)+6;
    $this->SetX((210-$w)/2);
    // Colors of frame, background and text
    $this->SetDrawColor(0,80,180);
    $this->SetFillColor(230,230,230);
    $this->SetTextColor(220,50,50);
    // Thickness of frame (1 mm)
    $this->SetLineWidth(1);
    // Title
    $this->Cell($w,9,$title,1,1,'C',true);
    // Line break
    $this->Ln(10);
}

function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Text color in gray
    $this->SetTextColor(128);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo(),0,0,'C');
}

function ChapterTitle($num, $label)
{
    // Arial 12
    $this->SetFont('Arial','',12);
    // Background color
    $this->SetFillColor(200,220,255);
    // Title
    $this->Cell(0,6,"SAMPLE LEASE OR RENTAL AGREEMENT",0,1,'L',true);
    // Line break
    $this->Ln(4);
}

function ChapterEnd()
{
        // Line break
    $this->Ln();
    // Mention in italics
    $this->SetFont('','I');
    $this->Cell(0,5,'(end of agreement) ',0,1);
}

function PrintChapter($num, $title)
{
    $landlord = $_POST["landlord"];
    $tenant = $_POST["tenant"];
    $location = $_POST["location"];
    $day = $_POST["day"];
    $month = $_POST["month"];
    $year = $_POST["year"];
    $pr_no = $_POST["pr_no"];
    $pr_str = $_POST["pr_str"];
    $pr_city = $_POST["pr_city"];
    $pr_location =$_POST["pr_location"];
    $term_beg = $_POST["term_beg"];
    $term_ends = $_POST["term_ends"];
    $term_amt = $_POST["term_amt"];
    $term_due = $_POST["term_due"];
    $utilities = $_POST["utilities"];
    $furniture = $_POST["furniture"];
    echo $landlord;
    $this->AddPage();
    $this->ChapterTitle($num,$title);
    $this->Write(5,'By this agreement made at   '.$location.'   ,  on the '.$day.' day of
'.$month.', '.$year.', the Landlord '.$landlord.' and
the Tenant '.$tenant.' agree as follows:
1. PROPERTY
The landlord hereby leases to Tenant for the term of this agreement
a. the property located at:
'.$pr_location.'
No.
'.$pr_no.'
Street Name
'.$pr_str.'
City : '.$pr_city.'
State
Zip
and
b. the following furniture and appliances on that property:
'.$furniture.'

2.

TERM

The term of this lease is for '.$tenant.', beginning on '.$term_beg.', and ending on '.$term_ends.'.
At the expiration of said term, the lease will automatically be renewed for a period of one month unless
either party notifies the other of its intention to terminate the lease at least one month before its expira-
tion date.
(or)
At the expiration of said term, the lease will expire unless the tenant gives a written notice at least 15
days before the termination date of the lease. Thereafter, the lease will automatically be renewed for
periods of one month until either party notifies the other of its intention to terminate the lease. The no-
tice of termination will be in writing and will be effective on the next rental date no less than 30 days
after the date of the notice.
3.
RENT
Tenant agrees to pay rent in the amount of '.$term_amt.' per month, each payment due on the
'.$term_due.' day of each month and to be made at:

UTILITIES/SERVICES

Landlord agrees to provide the utilities and services indicated:
'.$utilities.'

DEPOSIT

Tenant has paid a deposit of '.$deposit.' of which Landlord acknowledges receipt. Upon regaining
possession of the property, Landlord shall refund to Tenant the total amount of the deposit less any
damages to the property, normal wear and tear expected, and less any unpaid rent.
6.
REFUND PROCEDURE
Forwarding Address—Tenant shall provide Landlord with a forwarding address at which the Landlord
can send him/her the deposit refund.
Landlord shall return the entire deposit to Tenant within 15 days after retaking possession; or shall re-
turn so much of the deposit as exceeds any damages done to the property during the Tenant’s resi-
dence, normal wear and tear expected, and any unpaid rent. If the Landlord returns any amount less
than the full deposit, he/she shall also provide a written itemized list of damages and charges.
Tenant maintains the right to sue Landlord for any portion of the deposit not returned to him/her which
the tenant believes he/she is entitled.
7. INVENTORY CHECKLIST
The Tenant is provided with an Inventory Move-In Checklist attached to this lease. The Tenant shall
note the conditions of each item on the checklist and return a copy to the Landlord within 10 days after
taking possessions. If the Landlord objects to inclusions of any item, he/she shall notify the Tenant in
writing within 10 days. The Tenant and Landlord shall note the condition of each item on the checklist
after the Tenant returns possession to the Landlord and shall give a copy to the other party.
The Landlord may not retain any portion of the Security Deposit for damages noted in the Move-Out
Checklist to which the Landlord did not object.
8.
THE PARTIES ALSO AGREE
A. Tenant shall not sublease nor assign the premises without the written consent of the Landlord (but
this consent shall not be withheld unreasonably).
B. The Landlord may not enter the premises without having given tenant at least 24 hours notice, ex-
cept in case of emergency. Landlord may enter to inspect, repair, or show the premises to prospec-
tive buyers or tenants if notice is given.
C. Tenant agrees to occupy the premises and shall keep the same good condition, and shall not make
any alternations thereon without the written consent of the landlord.
D. Landlord agrees to regularly maintain the building and grounds in a clean, orderly, and neat man-
ner. Landlord further agrees not to maintain a public nuisance and not to conduct business or com-
mercial activities on the premises.E. Tenant agrees not to use the premises in such a manner as to disturb the peace and quiet of other
tenants in the building. Tenant further agrees not to maintain a public nuisance and not to conduct
business or commercial activities on the premises.
F. Tenant shall, upon termination of this Agreement, vacate and return the swelling in the same condi-
tion that it was received, less reasonable wear and tear, and other damages beyond the Tenant’s
control.
G. Any alternations to this Agreement shall be in writing and signed by all parties. We, the under-
signed, agree to this Lease:
LANDLORD                                                    TENANT

_________________________                                   _________________________
    
Signature                                                   Signature 

Name _________________________                              Name _________________________

Address _________________________                           Address _________________________
        _________________________                                   _________________________
        _________________________                                   _________________________
        
');
    $this->ChapterEnd();
}
}

$pdf = new PDF();
$title = 'AGREEMENT';
$pdf->SetTitle($title);
$pdf->SetAuthor('Alrais Labs');
$pdf->PrintChapter(1,$title);
$pdf->Cell(0,5,$landlord,0,1);
// $pdf->SetXY(50,80);
//$pdf->Write(5,'Congratulations! You have generated a PDF.'.$landlord.'hai');

$filename="agreement.pdf";
$pdf->Output($filename, 'F');
echo'<a href="agreement.pdf">Download your agreement</a>';
?>