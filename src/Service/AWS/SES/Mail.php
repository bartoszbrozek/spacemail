<?php

namespace App\Service\AWS\SES;

use App\Service\AWS\ICredentialsProvider;
use Aws\Ses\Exception\SesException;

class Mail extends AbstractSES
{
    public function getHappyMessage()
    {
        $messages = [
            'You did it! You updated the system! Amazing!',
            'That was one of the coolest updates I\'ve seen all day!',
            'Great work! Keep going!',
        ];

        $index = array_rand($messages);

        return $messages[$index];
    }

    public function sendEmail(string $sender, string $recipent, string $subject, string $body)
    {
        try {
            $result = $this->getClient()->sendEmail([
                'Destination' => [
                    'ToAddresses' => [
                        $recipent,
                    ]
                ],
                'Message' => [
                    'Body' => [
                        'Html' => [
                            'Charset' => 'UTF-8',
                            'Data' => $body,
                        ]
                    ],
                    'Subject' => [
                        'Charset' => 'UTF-8',
                        'Data' => $subject,
                    ]
                ],
                'Source' => $sender
            ]);
            $messageId = $result->get('MessageId');

            return "Email sent! Message ID: $messageId";

        } catch (SesException $error) {
            return "The email was not sent. Error message: " . $error->getAwsErrorMessage();
        }

    }
}