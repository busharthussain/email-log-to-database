<?php

namespace bushart\emaillog;

use bushart\emaillog\Traits\EmailLogTrait;
use Carbon\Carbon;
use Symfony\Component\Mime\Email;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Mime\Part\DataPart;
use Illuminate\Mail\Events\MessageSending;

class EmailLog
{
    use EmailLogTrait;
    /**
     * Handle the actual logging.
     *
     * @param MessageSending $event
     * @return void
     */
    public function handle(MessageSending $event): void
    {
        $message = $event->message;

        DB::table('email_logs')->insert([
            'from' => $this->formatEmailAddressField($message, 'From'),
            'to' => $this->formatEmailAddressField($message, 'To'),
            'cc' => $this->formatEmailAddressField($message, 'Cc'),
            'subject' => $message->getSubject(),
            'bcc' => $this->formatEmailAddressField($message, 'Bcc'),
            'headers' => $message->getHeaders()->toString(),
            'attachments' => $this->saveAttachments($message),
            'date' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}