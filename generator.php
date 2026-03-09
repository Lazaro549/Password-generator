<?php

/**
 * Generate a secure random password
 *
 * @param int  $length
 * @param bool $uppercase
 * @param bool $lowercase
 * @param bool $numbers
 * @param bool $symbols
 * @return string
 */
function generatePassword(
    int $length = 12,
    bool $uppercase = true,
    bool $lowercase = true,
    bool $numbers = true,
    bool $symbols = false
): string {

    $charPool = '';

    if ($uppercase) {
        $charPool .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    }

    if ($lowercase) {
        $charPool .= 'abcdefghijklmnopqrstuvwxyz';
    }

    if ($numbers) {
        $charPool .= '0123456789';
    }

    if ($symbols) {
        $charPool .= '!@#$%^&*()-_=+[]{}<>?';
    }

    if ($charPool === '') {
        return 'Error: No character set selected.';
    }

    $password = '';
    $maxIndex = strlen($charPool) - 1;

    for ($i = 0; $i < $length; $i++) {
        $password .= $charPool[random_int(0, $maxIndex)];
    }

    return $password;
}

?>
