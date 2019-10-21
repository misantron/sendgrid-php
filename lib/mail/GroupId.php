<?php
/**
 * This helper builds the GroupId object for a /mail/send API call
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
 * This class is used to construct a GroupId object for the /mail/send API call
 *
 * @package SendGrid\Mail
 */
class GroupId implements \JsonSerializable
{
    /** @var $group_id int The unsubscribe group to associate with this email */
    private $group_id;

    /**
     * Optional constructor
     *
     * @param int|null $group_id The unsubscribe group to associate with this email
     *
     * @throws TypeException
     */
    public function __construct($group_id = null)
    {
        if (isset($group_id)) {
            $this->setGroupId($group_id);
        }
    }

    /**
     * Add the group id to a GroupId object
     *
     * @param int $group_id The unsubscribe group to associate with this email
     * 
     * @throws TypeException
     */ 
    public function setGroupId($group_id)
    {
        Assert::integer($group_id, 'group_id');

        $this->group_id = $group_id;
    }

    /**
     * Retrieve the group id from a GroupId object
     *
     * @return int
     */
    public function getGroupId()
    {
        return $this->group_id;
    }

    /**
     * Return an array representing a GroupId object for the Twilio SendGrid API
     *
     * @return int
     */
    public function jsonSerialize()
    {
        return $this->getGroupId();
    }
}
