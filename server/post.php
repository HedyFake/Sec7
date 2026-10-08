<?php

declare(strict_types=1);

header(
    'Content-Type: application/json; charset=utf-8'
);


function response(
    bool $success,
    string $message = '',
    array $extra = []
): never {

    echo json_encode(
        array_merge(
            [
                'success' => $success,
                'message' => $message
            ],
            $extra
        ),
        JSON_UNESCAPED_SLASHES
    );

    exit;
}


if ($_SERVER['REQUEST_METHOD'] !== 'POST') {

    http_response_code(405);

    response(
        false,
        'Method not allowed'
    );
}


$requestId =
    $_POST['request_id'] ?? '';

if (
    !preg_match(
        '/^[a-f0-9-]{20,80}$/i',
        $requestId
    )
) {

    http_response_code(400);

    response(
        false,
        'Invalid request_id'
    );
}


if (empty($_POST['cat'])) {

    http_response_code(400);

    response(
        false,
        'Image data tidak ditemukan.'
    );
}


$imageData =
    (string) $_POST['cat'];


$prefix =
    'data:image/png;base64,';


if (
    !str_starts_with(
        $imageData,
        $prefix
    )
) {

    http_response_code(400);

    response(
        false,
        'Format gambar harus PNG.'
    );
}


$base64 =
    substr(
        $imageData,
        strlen($prefix)
    );


$imageBinary =
    base64_decode(
        $base64,
        true
    );


if ($imageBinary === false) {

    http_response_code(400);

    response(
        false,
        'Base64 image tidak valid.'
    );
}


/*
 * Batasi ukuran hasil decode.
 * Contoh: maksimum 8 MB.
 */
if (
    strlen($imageBinary) >
    8 * 1024 * 1024
) {

    http_response_code(413);

    response(
        false,
        'Ukuran gambar terlalu besar.'
    );
}


$imagesDir =
    __DIR__ .
    DIRECTORY_SEPARATOR .
    'images';


if (
    !is_dir($imagesDir) &&
    !mkdir(
        $imagesDir,
        0755,
        true
    ) &&
    !is_dir($imagesDir)
) {

    http_response_code(500);

    response(
        false,
        'Folder images gagal dibuat.'
    );
}


$timestamp =
    date('Ymd_His');


$fileName =
    $timestamp .
    '_' .
    $requestId .
    '.png';


$filePath =
    $imagesDir .
    DIRECTORY_SEPARATOR .
    $fileName;


if (
    file_put_contents(
        $filePath,
        $imageBinary,
        LOCK_EX
    ) === false
) {

    http_response_code(500);

    response(
        false,
        'Gagal menyimpan gambar.'
    );
}


/*
 * Log sederhana.
 */
$logLine =
    date('Y-m-d H:i:s') .
    " | request_id=" .
    $requestId .
    " | image=" .
    $fileName .
    PHP_EOL;


file_put_contents(
    __DIR__ .
    DIRECTORY_SEPARATOR .
    'camera.log',
    $logLine,
    FILE_APPEND | LOCK_EX
);


response(
    true,
    'Gambar berhasil disimpan.',
    [
        'request_id' => $requestId,
        'file' => $fileName
    ]
);