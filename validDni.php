<?php

class validDni
{

	public static function check($value)
	{

		$pattern = "/^[XYZ]?\d{5,8}[A-Z]$/";

		$dni = strtoupper($value);

		if(preg_match($pattern, $dni))
		{

			$number = substr($dni, 0, -1);

			$number = str_replace('X', 0, $number);
			$number = str_replace('Y', 1, $number);
			$number = str_replace('Z', 2, $number);

			$dni = substr($dni, -1, 1);

			$start = $number % 23;

			$letter = 'TRWAGMYFPDXBNJZSQVHLCKET';
			$letter = substr('TRWAGMYFPDXBNJZSQVHLCKET', $start, 1);

            //echo $letter;

			if($letter != $dni)
			{

			  echo 'Wrong ID, the letter of the NIF does not correspond';
			  return false;

			} else {
			  echo 'Correct ID';
			  return true;
			}

		}else{

			echo 'Wrong ID, invalid format';
    		return false;
		}

	}

}

validDni::check('73547889F');
