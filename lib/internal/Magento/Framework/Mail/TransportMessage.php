<?php
/**
 * Mail Message
 *
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magento\Framework\Mail;

class TransportMessage extends Message implements TransportMessageInterface
{
    /**
     * {@inheritdoc}
     */
    public function createAttachment(
        $body,
        $mimeType = self::TYPE_OCTETSTREAM,
        $disposition = self::DISPOSITION_ATTACHMENT,
        $encoding = self::ENCODING_BASE64,
        $filename = null
    ) {
        $this->createAttachment($body, $mimeType, $disposition, $encoding, $filename);
        return $this;
    }
}
