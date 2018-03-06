<?php

namespace Playground\Streams;

require_once 'vendor/autoload.php';

function callback($notificationCode, $severity, $message, $messageCode, $bytesTransfered, $bytesMax)
{
    if ($notificationCode == STREAM_NOTIFY_FILE_SIZE_IS) {
        if ($bytesMax > 1024) {
            die("Download too big!");
        }
    }
}

$context = stream_context_create();
stream_context_set_params($context, [
    "notification" => "callback"
]);

$handle = fopen('http://www.example.com', 'r', false, $context);
fpassthru($handle);