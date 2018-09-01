<?php

namespace App\Service\AWS\SES;

use App\Service\AWS\ICredentialsProvider;
use Aws\Ses\Exception\SesException;

class Mail extends AbstractSES
{
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

    public function listIdentities(string $type = 'EmailAddress')
    {
        $result = $this->getClient()->listIdentities([
            'IdentityType' => $type === 'EmailAddress' ? 'EmailAddress' : 'Domain'
        ])->toArray();

        $identities = [];

        foreach ($result['Identities'] as $identity) {
            $identities[$identity] = $identity;
        }

        unset($result);

        return $identities;
    }

    public function addIdentity(string $email)
    {
        $result = $this->getClient()->verifyEmailIdentity([
            'EmailAddress' => $email
        ]);

        return $result;

    }
}