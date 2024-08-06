<?php

declare(strict_types=1);

namespace App\Services;

use App\Enums\EmailStatus;
use Symfony\Component\Mailer\MailerInterface;

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

            // Create a new Email object
            $emailMessage = (new \Symfony\Component\Mime\Email())
                ->from($meta["from"])
                ->to($meta["to"])
                ->subject($email->subject)
                ->text($email->text_body)
                ->html($email->html_body);

            $this->mailer->send($emailMessage); // sending the email mailhog

            $this->emailModel->markEmailSent($email->id);
        }
    }
}
