<?php
ini_set('display_errors', '1');
require('AWSSDKforPHP/sdk.class.php');
function amazonSesEmail($to, $subject, $message)
{
    $amazonSes = new AmazonSES(array(
        'key' => 'AKIAIMT5T3NIZUY2PKYQ',
        'secret' => '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'
    ));
 	//$amazonSes->verify_email_address('villageexpert.info@gmail.com');
    $response = $amazonSes->send_email('villageexpert.info@gmail.com',
        array('ToAddresses' => array($to)),
        array(
            'Subject.Data' => $subject,
            'Body.Text.Data' => $message,
        )
    );
    if (!$response->isOK())
    {
        echo "BAD";
    }
    else
    {
    	echo "GOOD";
    }
}
amazonSesEmail('villageexpert.info@gmail.com', 'test email aws', 'Agar tum sath ho');
?>