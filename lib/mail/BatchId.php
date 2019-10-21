<?php
/**
 * This helper builds the BatchId object for a /mail/send API call
 *
 * PHP Version - 5.6, 7.0, 7.1, 7.2
 *
 * @package   SendGrid\Mail
 * @author    Elmer Thomas <dx@sendgrid.com>
 * @copyright 2018-19 Twilio SendGrid
 * @license   https://opensource.org/licenses/MIT The MIT License
 * @version   GIT: <git_id>
 * @link      http://packagist.org/packages/sendgrid/sendgrid
 */

namespace SendGrid\Mail;

use SendGrid\Helper\Assert;

/**
 * This class is used to construct a BatchId object for the /mail/send API call
 *
 * @package SendGrid\Mail
 */
class BatchId implements \JsonSerializable
{
    /** @var $batch_id string This ID represents a batch of emails to be sent at the same time */
    private $batch_id;

    /**
     * Optional constructor
     *
     * @param string|null $batch_id This ID represents a batch of emails to
     *                              be sent at the same time
     *
     * @throws TypeException
     */
    public function __construct($batch_id = null)
    {
        if (isset($batch_id)) {
            $this->setBatchId($batch_id);
        }
    }

    /**
     * Add the batch id to a BatchId object
     *
     * @param string $batch_id This ID represents a batch of emails to be sent
     *                         at the same time
     * 
     * @throws TypeException
     */ 
    public function setBatchId($batch_id)
    {
        Assert::string($batch_id, 'batch_id');

        $this->batch_id = $batch_id;
    }

    /**
     * Return the batch id from a BatchId object
     *
     * @return string
     */
    public function getBatchId()
    {
        return $this->batch_id;
    }

    /**
     * Return an array representing a BatchId object for the Twilio SendGrid API
     *
     * @return null|string
     */
    public function jsonSerialize()
    {
        return $this->getBatchId();
    }
}
