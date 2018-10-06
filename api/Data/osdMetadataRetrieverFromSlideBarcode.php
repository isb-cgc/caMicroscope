<?php require '../../../authenticate.php';

include_once("CamicUtils.php");

$utils = new CamicUtils($_SESSION);
$tissueId = $_GET['imageId'];

$metadata = $utils->getMetadata($tissueId);

$mppx = (float)$metadata->{'MPP-X'};
$mppy = (float)$metadata->{'MPP-Y'};
$dzi = $metadata->{'FileLocation'};

if (array_key_exists('sample-barcode', $metadata)) {
    $slide_barcode = $metadata->{'slide-barcode'};
    $sample_barcode = $metadata->{'sample-barcode'};
    $case_barcode = $metadata->{'case-barcode'};
    $img_type = $metadata->{'img-type'};
    $disease_code = $metadata->{'disease-code'};
    $project = $metadata->{'project'};
} else {
    $slide_barcode = 'Not yet available';
    $sample_barcode = 'Not yet available';
    $case_barcode = 'Not available';
    $img_type = 'Not available';
    $disease_code = 'Not available';
    $project = 'Not available';
}

$returnArray = array(
    array('mpp-x'=> $mppx, 'mpp-y'=>$mppy), 
    $dzi, 
    $metadata->{ 'Height' }, 
    $metadata->{ 'Width' },
    array(
	'slide-barcode'=>$slide_barcode,
	'sample-barcode'=>$sample_barcode,
    	'case-barcode'=>$case_barcode,
    	'img-type'=>$img_type,
    	'disease-code'=>$disease_code,
    	'project'=>$project
    )
);

echo json_encode($returnArray);

?>
