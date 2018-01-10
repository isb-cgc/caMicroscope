<?php require '../../../authenticate.php';

include_once("CamicUtils.php");

$utils = new CamicUtils($_SESSION);
$tissueId = $_GET['imageId'];

$metadata = $utils->getMetadata($tissueId);

$mppx = (float)$metadata->{'MPP-X'};
$mppy = (float)$metadata->{'MPP-Y'};
$dzi = $metadata->{'FileLocation'};

$returnArray = array(array('mpp-x'=> $mppx, 'mpp-y'=>$mppy), $dzi, $metadata->{ 'Height' }, $metadata->{ 'Width' });
echo json_encode($returnArray);

?>
