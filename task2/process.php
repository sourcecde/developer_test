<?php

## TASK2- Calculator
## CREATED BY: DEBRAJ GHOSH
## DATED : 16/11/2018

class Calc {

    public $pricerange;
    public $tax;
    public $instalments;
    public $time;
    public $date;

    public function __construct($pricerange,$tax,$instalments,$time,$date) {
        $this->pricerange = $pricerange;
        $this->tax = $tax;
        $this->instalments = $instalments;
        $this->time = $time;
        $this->date = $date;
    }

    public function carcal() {
       
       // Getting date and time of the user

	   	$userdate = date($this->date);
		$userday = strtoupper(date('l', strtotime($userdate)));

		$currentTime = (new DateTime($this->time));
		$startTime = new DateTime('15:00');
		$endTime = (new DateTime('20:00'));

		// Set baseprice according to Friday 15-20 o'clock

		$baseprice = 11;

			if(isset($userday) && $userday == 'FRIDAY')
			{
				if ($currentTime >= $startTime && $currentTime <= $endTime) {
			    	$baseprice = 13;
				}
			}

		// Actual calculation of Car Insurance calculator

	        $premium = (($this->pricerange)*$baseprice)/100;
	        $commision = ($premium*17)/100;
	        $tax = (($premium)*($this->tax))/100;
	        $total = $premium + $commision + $tax;
	        $installments = $this->instalments;
	        $premuininstallment  = $premium / $installments;
	        $commisioninstallment = $commision / $installments;
	        $taxinstallment = $tax / $installments;
	        $totalinstallment = $total / $installments;

        	$output = '';

         	$output .= '<table style="height: 243px;" border="1" width="604" align="center"><tbody>
						<tr>
							<td style="width: 144px; text-align: center;" colspan="2"><strong>POLICY</strong></td>';
							for($i =1; $i <= $installments; $i++){
			$output .=			'<td style="width: 144px;"><strong>'.$i.'installment</strong></td>';
							}
			$output .=	'</tr>
						 <tr>
							<td style="width: 144px;">VALUE</td>
							<td style="width: 144px;">'.number_format((float)$this->pricerange, 2, '.', '').'</td>';
							for($i =1; $i <= $installments; $i++){
			$output .=		'<td style="width: 144px;">&nbsp;</td>';
							}
							
			$output .=	'</tr>
						<tr>
							<td style="width: 144px;">BASE PREMIUM</td>
							<td style="width: 144px;">'.number_format((float)$premium, 2, '.', '').'</td>';
							for($i =1; $i <= $installments; $i++){
			$output .=	'<td style="width: 144px;">'.number_format((float)$premuininstallment, 2, '.', '').'</td>';
							}
			$output .=	'</tr>
						<tr>
							<td style="width: 144px;">COMMISSION</td>
							<td style="width: 144px;">'.number_format((float)$commision, 2, '.', '').'</td>';
							for($i =1; $i <= $installments; $i++){
			$output .=	'<td style="width: 144px;">'.number_format((float)$commisioninstallment, 2, '.', '').'</td>';
							}
			$output .=	'</tr>
						<tr>
							<td style="width: 144px;">TAX</td>
							<td style="width: 144px;">'.number_format((float)$tax, 2, '.', '').'</td>';
							for($i =1; $i <= $installments; $i++){
			$output .=	'<td style="width: 144px;">'.number_format((float)$taxinstallment, 2, '.', '').'</td>';
							}
			$output .=	'</tr>
						<tr>
							<td style="width: 144px;"><strong>TOTAL COST</strong></td>
							<td style="width: 144px;"><strong>'.number_format((float)$total, 2, '.', '').'</strong></td>';
							for($i =1; $i <= $installments; $i++){
			$output .=	'<td style="width: 144px;">'.number_format((float)$totalinstallment, 2, '.', '').'</td>';
							}
			$output .= '</tr>';
		 	$output .= '</tbody></table>';

    	echo $output;
    }
}

$calc = new Calc($_POST['pricerange'],$_POST['tax'],$_POST['instalments'],
				$_POST['time'],$_POST['date']);
$calc->carcal();
?>