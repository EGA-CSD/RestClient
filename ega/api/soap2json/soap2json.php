<?php
function XML2JSON($xml) {
    function normalizeSimpleXML($obj, &$result) {
        $data = $obj;
        if (is_object($data)) {
            $data = get_object_vars($data);
        }
        if (is_array($data)) {
            foreach ($data as $key => $value) {
                $res = null;
                normalizeSimpleXML($value, $res);
                if (($key == '@attributes') && ($key)) {
                    $result = $res;
                } else {
                    $result[$key] = $res;
                }
            }
        } else {
            $result = $data;
        }
    }
    normalizeSimpleXML($xml, $result);
    return json_encode($result);
}

//Default parameters
$endPoint = "http://www2.ops3.moc.go.th/tradeWebservice/ServiceImportHarmonizeProduct.asmx?WSDL";
$reqMethod = "GetImportHarmonizeProduct";
$resMethod = "GetImportHarmonizeProductResult";
$params[] = NULL;

//Called by GET Method
if( $_SERVER['REQUEST_METHOD'] == "GET" ){
    foreach( $_GET as $qStr => $val){
        switch( $qStr )
        {
            case "endPoint":
                $endPoint = $val;
            case "reqMethod":
                $reqMethod  = $val;
                break;
            default:
                $params[$qStr] = $val;
                break;
        }
    }
}

//Create result response function name.
$resMethod = $reqMethod."Result";

//Create the SOAP client object.
$soapclient = new SoapClient($endPoint);

//Set parameters to bind.
$response = $soapclient->$reqMethod($params);

//Create command to process a request.
$cmd = '$data = strstr($response->$resMethod->any, "<diffgr:diffgram");';
eval($cmd);

//Convert xml to string.
$xmlstr =simplexml_load_string($data);

//Convert XML String to json String.
$jsonStr = XML2JSON($xmlstr->DocumentElement);

//Response as json format.
echo "$jsonStr";
?>