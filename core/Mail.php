<?php

class Mail
{
    // As this is a static method, we don't need to instantiate the class. we can use it with Mail::send()
    public static function send($to, $subject, $message)
    {
        try {
            $headers = [
                'From' => 'MentorMe <lacehutblogger@gmail.com>',
            ];
            $headersString = '';
            foreach ($headers as $key => $value) {
                $headersString .= "$key: $value\r\n";
            }

            if (!mail($to, $subject, $message, $headersString)) {
                throw new Exception('Mail sending failed.');
            }

            return true;
        } catch (Exception $e) {
            // Log the error message instead of affecting the system
            error_log('Mail error: ' . $e->getMessage());
            return false;
        }
    }
}