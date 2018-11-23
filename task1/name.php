<?php

## TASK1- NAME
## Function : Binary to text conversion
## CREATED BY: DEBRAJ GHOSH
## DATED : 14/11/2018

if( !function_exists( 'is_binarystring' ) )
	{
		function is_binarystring( $str )
		{
			// Check if entered string is actually a binary string

			if( is_numeric(strlen( $str ) / 8 ))
			{
				for( $i = 0; $i < strlen( $str ); $i++ )
				{
					$char = substr( $str, $i, 1 );
					if( ( $char !== chr( 48 ) ) && ( $char !== chr( 49 ) ) )
					{	
						return FALSE;
					}
				}
				return TRUE;
			}
			else
			{
				return FALSE;
			}
		}
	}

	if( !function_exists( 'bintotext' ) )
	{
		function bintotext( $bin )
		{
			if ( is_binarystring( $bin ) )
			{
				// string for conversion
				$chars = explode( "\n", chunk_split( str_replace( "\n", '', $bin ), 8 ) );
				$char_count = count( $chars );
				$text = null;
				// converting the characters one by one
				for( $i = 0; $i < $char_count; $text .= chr( bindec( $chars[$i] ) ), $i++ );

				return "Result: " . $text;
			}
			else
			{
				//not valid binary to text string
				return "Input problems! Are we missing some ones and zeros?";
			}
		}
	}

?>

<h3>TASK 1 - Name</h3>
<p>
<form action="?" method="GET" name="binary">
	Binary Value: <input type="text" name="bin" /><input type="submit" value="Submit" />
</form>
</p>

<?php

        if (isset($_GET['bin'])) 
		{
			$bin = preg_replace('/\s+/', '', $_GET['bin']); // Used preg_replace To remove whitespace

	        	echo "<p style=\"background-color:#ddd;padding:5px;\">" . bintotext($bin) . "</p>";
	        	// print out your name with one of php loops

		        	$names = array();
				    $names[1] = 'DEBRAJ';
				    $names[2] = ' ';
				    $names[3] = 'GHOSH';

					    foreach($names as $name)
					    {
					        echo $name; 
				    	}
		}

?>