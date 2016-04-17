<?php
/**
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magento\Framework\Mail;

/**
 * Mail Message interface
 *
 * @api
 */
interface TransportMessageInterface extends MessageInterface
{
    const TYPE_OCTETSTREAM         = 'application/octet-stream';
    const TYPE_TEXT                = 'text/plain';
    const TYPE_HTML                = 'text/html';
    const ENCODING_7BIT            = '7bit';
    const ENCODING_8BIT            = '8bit';
    const ENCODING_QUOTEDPRINTABLE = 'quoted-printable';
    const ENCODING_BASE64          = 'base64';
    const DISPOSITION_ATTACHMENT   = 'attachment';
    const DISPOSITION_INLINE       = 'inline';
    const LINELENGTH               = 72;
    const LINEEND                  = "\n";
    const MULTIPART_ALTERNATIVE    = 'multipart/alternative';
    const MULTIPART_MIXED          = 'multipart/mixed';
    const MULTIPART_RELATED        = 'multipart/related';

    /**
     * Adds an attachment to the current message scope.
     *
     * @param  string $body
     * @param  string $mimeType
     * @param  string $disposition
     * @param  string $encoding
     * @param  string $filename A filename for the attachment
     * @return $this
     */
    public function createAttachment(
        $body,
        $mimeType = self::TYPE_OCTETSTREAM,
        $disposition = self::DISPOSITION_ATTACHMENT,
        $encoding = self::ENCODING_BASE64,
        $filename = null
    );
}
