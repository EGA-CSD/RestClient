<?php

    require_once("../conn/RestClient.php");

    //Post OpenId
    $test3 = ega\api\conn\RestClient::init("openid.egov.go.th", "80");
    $header = array('Host: openid.egov.go.th',
        'Connection: keep-alive',
        'Content-Length: 1154',
        'Cache-Control: max-age=0',
        'Origin: http://testopenid.ega.or.th',
        'Upgrade-Insecure-Requests: 1',
        'Content-Type: application/x-www-form-urlencoded',
        'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/61.0.3163.100 Safari/537.36',
        'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8',
        'Referer: http://openid.egov.go.th/eGovernment/Login.aspx?ReturnUrl=/RestClient/ega/api/Test/loginSuccess.html',
        'Accept-Encoding: gzip, deflate',
        'Accept-Language: en-US,en;q=0.8');
    $test3->setHeader($header);
    $response = $test3->requestPOST("eGovernment/Login.aspx?ReturnUrl=/RestClient/ega/api/Test/loginSuccess.html", "__LASTFOCUS=&__EVENTTARGET=&__EVENTARGUMENT=&__VIEWSTATE=%2FwEPDwULLTE5NjUwMzc0MzAPZBYCZg9kFgICAw9kFgICBQ9kFgICAg9kFgJmD2QWAgITDxAPFgIeB0NoZWNrZWRoZGRkZBgCBR5fX0NvbnRyb2xzUmVxdWlyZVBvc3RCYWNrS2V5X18WBQUTY3RsMDAkVGhJbWFnZUJ1dHRvbgUTY3RsMDAkRW5JbWFnZUJ1dHRvbgUcY3RsMDAkbWFpbiRMb2dpbjEkUmVtZW1iZXJNZQUYY3RsMDAkbWFpbiRidG5NYWlsR29UaGFpBR1jdGwwMCRtYWluJGJ0bkZhY2Vib29rQ29ubmVjdAUoY3RsMDAkbWFpbiRPcGVuQXV0aExvZ2luJHByb3ZpZGVyRGV0YWlscw8UKwAOZGRkZGRkZBQrAAJkZAICZGRkZgL%2F%2F%2F%2F%2FD2SQlpqJ8zVmMi0bYadIirBT2Kk13g%3D%3D&__VIEWSTATEGENERATOR=A6A54BF2&__EVENTVALIDATION=%2FwEdAAygCe0k9N7V622abkbmyrypPYyl7YXOU1mAtDM%2B58KVkA83m6TbFP5IrXaiIosMfoJqTcJOLKS7ny0cVTZea0RthwhyXzhjMWFmdujMil4q9b6D%2FiTgvh%2FOfRuwHvztKz2lGrqO0FosYwtxjtKyt7nSqSkhrDT9sj7DuxVbj2yc%2BnbZgZMcj8s8WN2PzfEciNMci8aqiZCx4jthx7iikD0HKtb80OX0vRXmkRk5HIBS1pqDT2JHcVzdw%2B1HPwckPUGaS8Z%2BHeng4IJEIQeIs%2FtJwzJgmw%3D%3D&ctl00%24main%24Login1%24UserName=pepsi7959&ctl00%24main%24Login1%24Password=Acho20mkr&ctl00%24main%24Login1%24LoginButton=%E0%B9%80%E0%B8%82%E0%B9%89%E0%B8%B2%E0%B8%AA%E0%B8%B9%E0%B9%88%E0%B8%A3%E0%B8%B0%E0%B8%9A%E0%B8%9A&ctl00%24main%24fb_uid=&ctl00%24main%24hdf_ChangePassword=",false);
    echo "<pre>$response</pre></br></br>";
?>