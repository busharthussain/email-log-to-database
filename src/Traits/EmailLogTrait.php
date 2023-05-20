<?php

namespace bushart\emaillog\Traits;
use Carbon\Carbon;
use Symfony\Component\Mime\Email;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Mime\Part\DataPart;
use Illuminate\Mail\Events\MessageSending;

trait EmailLogTrait
{
    /**
     * Format email address strings for sender, to, cc, bcc.
     *
     * @param Email $message
     * @param string $field
     * @return null|string
     */
    function formatEmailAddressField(Email $message, string $field): ?string
    {
        $headers = $message->getHeaders();

        return $headers->get($field)?->getBodyAsString();
	}

    /**
     * Collect all attachments and format them as strings.
     *
     * @param Email $message
     * @return string|null
     */
    protected function saveAttachments(Email $message): ?string
    {
        if (empty($message->getAttachments())) {
            return null;
        }
        $attachmentPaths = '';
        foreach ($message->getAttachments() as $attachment) {
            if ($attachment instanceof DataPart) {
                $filename = $attachment->getFilename();
                $attachmentPaths = $filename;
            }
        }

        return $attachmentPaths;
    }
}