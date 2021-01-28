<?php
// GI|RN101|G#12332|GSN|SF

if (isset($_GET['RX'])){
	$RX_from_gateway = $_GET["RX"];
	echo "<< $RX_from_gateway <br>";
}
$result = explode("|",$RX_from_gateway);
print_r($result);

?>