<?php
$prerenderToken = 'wQq7EyOhD0jMi87GjaTI';
$prerenderServiceUrl = 'https://service.prerender.io/';
$opts = array(
  'http'=>array(
    'method'=>'GET',
    'header'=> 'X-Prerender-Token: ' . $prerenderToken  . "\r\n" .
              'User-Agent: ' . $_SERVER['HTTP_USER_AGENT'] . "\r\n",
    'follow_location' => false,
    'ignore_errors' => true
  )
);
function parseHeaders( $headers )
{
    $head = array();
    foreach( $headers as $k=>$v )
    {
        $t = explode( ':', $v, 2 );
        if( isset( $t[1] ) )
            $head[ trim($t[0]) ] = trim( $t[1] );
        else
        {
            $head[] = $v;
            if( preg_match( "#HTTP/[0-9\.]+\s+([0-9]+)#",$v, $out ) )
                $head['reponse_code'] = intval($out[1]);
        }
    }
    return $head;
}
$context = stream_context_create($opts);
$url = $prerenderServiceUrl . 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$result = file_get_contents($url, false, $context);
if ($result !== FALSE) {
    foreach($http_response_header as $headerLine) {
      header($headerLine);
    }
    http_response_code(parseHeaders($http_response_header)['response-code']);
    echo $result;
}
else
{
    $protocol = (isset($_SERVER['SERVER_PROTOCOL']) ? $_SERVER['SERVER_PROTOCOL'] : 'HTTP/1.0');
    header($protocol . ' 500 Internal Server Error');
}
?>