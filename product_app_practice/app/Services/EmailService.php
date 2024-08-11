<?php

declare(strict_types=1);

namespace App\Services;

use App\Enums\EmailStatus;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Part\DataPart;
use Symfony\Component\Mime\Part\File;

class EmailService
{
    public function __construct(
        protected \App\Models\Email $emailModel,
        protected MailerInterface $mailer
    ) {
    }

    public function sendQueuedEmails(): void
    {
        $emails = $this->emailModel->getEmailByStatus(EmailStatus::Queue);

        foreach ($emails as $email) {
            $meta = json_decode($email->meta, true);

            // var_dump($meta);
            // exit;

            // Create a new Email object
            $emailMessage = (new \Symfony\Component\Mime\Email())
                ->from($meta["from"])
                ->to($meta["to"])
                ->addPart(
                    new DataPart(
                        new File($meta["attachment"]["filePath"]),
                        $meta["attachment"]["fileName"]
                    )
                )
                ->subject($email->subject)
                ->text($email->text_body)
                ->html($email->html_body);

            $this->mailer->send($emailMessage); // sending the email mailhog

            $this->emailModel->markEmailSent($email->id);
        }
    }
}
