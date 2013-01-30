<script type="text/javascript" charset="utf-8" src="jquery.min.js"></script>
<script type="text/javascript" charset="utf-8" src="jquery.color.js"></script>
<script type="text/javascript" charset="utf-8">
	
	$(document).ready(function(){
		

	// $('.pixel').each();

	fan();

	for (var id=0; id < 3060; id++) {
		
		// $("#"+id).delay(1000).animate({backgroundColor:"#F00"});
		
	};
	
	$('.pixel').each(function(i) {
	    $(this).delay(i).animate({backgroundColor:"#FFF"});
	});
	$('.pixel').each(function(i) {
	    $(this).delay(i).animate({backgroundColor:"#000"});
	});

	// loop through each row of panels 
	// for each row offset
	//  	even means go left to right (nums go up)
	// 	odd means right to left (nums go down?)
	// 	
	// for each panel width, toggle even/odd
	// float right the odd pixels
	// 
	
	});	
	
	function fan() {
		var panelsper = 12;
		var pixelsper = 12;
		var pixelspacing = 4;				
		
		for (var p=0;p<panelsper;p++) {
			panel = '<div class="panel">';
			for (var x=0;x<pixelsper;x++) {	
				panel += '<div class="pixel" style=""></div>';			
				$('.fan').append(panel);
			}
			panel += '</div>';
		}
	}
	
	// function 
	
</script>
<style type="text/css" media="screen">
	/* apply a natural box layout model to all elements */
/*	* { -moz-box-sizing: border-box; -webkit-box-sizing: border-box; box-sizing: border-box; }*/
	body {
		font-size:15pt;
	}
	div.matrix {
/*		width:41.7em;*/
	}
	.matrix div.column {
		float:left;
		width:2.4em;
		border-top: 1px solid black;		
		border-left: 1px solid black;
		
	}
	.matrix div.panel {
		background:#000;
		width:2.4em;
		height:4.8em;
		display:inline-block;
		border-bottom: 1px solid black;
		border-right: 1px solid black;
		background: -webkit-linear-gradient(-45deg, #1e5799 0%,#2989d8 50%,#207cca 51%,#7db9e8 100%); /* Chrome10+,Safari5.1+ */
	}
	.matrix div.panel div.pixel {
		margin:.2em;
		width:.4em;
		height:.4em;
/*		background:#999;*/
		display:inline-block;
		/* For debugging pixel number */
/*		background: -webkit-linear-gradient(-45deg, #1e5799 0%,#2989d8 50%,#207cca 51%,#7db9e8 100%); /* Chrome10+,Safari5.1+ */
			
	}
	.matrix span.pixel_id {font-size:9px;}
	.matrix div.pixel.odd {background:#A00; float:left;}
	.matrix div.pixel.even {background:#FAF; float:right;}

	.matrix div.column.even div.pixel.odd {background:#FAF; float:right;}
	.matrix div.column.even div.pixel.even {background:#A00; float:left;}
	
	.fan .panel {
		background:black;
		height:10px;
		width:10px;
	}
</style>

<?php 

$panelx = 17;
$panely = 10;
$panelw = 3;
$panelh = 6;

$matrix = '<div class="matrix">';
$fan = '<div class="fan">';

// Loop through each column (panelx)
for ($c=0;$c<$panelx;$c++) {

	// switch odd and even based on every column (panely)
	$columnrow = "odd";
	if (($c % 2)) { $columnrow = ($columnrow == 'odd') ? "even" : "odd"; }	
	
	// Build column
	$matrix .= '<div class="column '.$columnrow.'">';
		
	$debug .= "<br /> column: ";
	
	// Loop through each panel (panely)
	for ($i=0;$i<$panely;$i++) {
		// $panelrow = 'odd';
		// if (($c % $panely)) { $columnrow = ($columnrow == 'odd') ? "even" : "odd"; }	
		
		$debug .= "<br /> panel: ";

		// Build Panel
		$panel = '<div class="panel">';			
	
		// Loop through each pixel (panelw by panelh)
		for ($j=0;$j<($panelw * $panelh);$j++) {	
			
			// Set up the id for each pixel, reversing order by each column
			$id = ($columnrow == "odd") ? (($c*$panelw*$panelh*$panely)+($i*$panelw*$panelh)+$j) : ((($c+1)*$panelw*$panelh*$panely)-($i*$panelw*$panelh)-$j-1);

			$debug .= $id.", "; ///
			
			// switch odd and even based on every pixel row (panelw)
			if (!($j % $panelw)) { $pxrow = ($pxrow == 'even') ? "odd" : "even"; }
			
			// Construct each pixel.
			$panel .= '<div class="pixel '.$pxrow.'" id="'.$id.'"><span class="pixel_id">'.'</span></div>';
					
		}
		$panel .= '</div>';
		$matrix .= $panel;

	}
	$matrix .= '</div>';

}
$matrix .= '</div>';

// echo $debug;
echo $matrix;
// echo $fan;
?>

