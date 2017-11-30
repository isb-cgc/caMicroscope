<?php require '../../../authenticate.php';

include_once("CamicUtils.php");

$utils = new CamicUtils($_SESSION);
$tissueId = $_GET['imageId'];

$metadata = $utils->getMetadata($tissueId);

$mppx = (float)$metadata->{'MPP-X'};
$mppy = (float)$metadata->{'MPP-Y'};
$dzi = $metadata->{'FileLocation'};
$dzi = str_replace('gs:/', '/data/images', $dzi);
$dzi .= '.dzi';

$returnArray = array(array('mpp-x'=> $mppx, 'mpp-y'=>$mppy), $dzi);
echo json_encode($returnArray);

?>
