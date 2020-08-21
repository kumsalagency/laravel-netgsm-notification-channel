<?php

namespace KumsalAgency\NetGSM\Messages;

class NetGSMMessage
{
    /**
     * The message content.
     *
     * @var string
     */
    public $content;

    /**
     * The phone number the message should be sent from.
     *
     * @var string
     */
    public $from;

    /**
     * The message type.
     *
     * @var string
     */
    public $type = 'text';

    /**
     * The message language.
     *
     * @var string
     */
    public $encoding = 'TR';

    /**
     * The date you will start sending. (ddMMyyyyHHmm)
     *
     * @var string
     */
    public $startDate;

    /**
     * End date for your submissions between two dates (ddMMyyyyHHmm)
     *
     * @var string
     */
    public $stopDate;

    /**
     * If you are a reseller member, your dealer code
     *
     * @var string
     */
    public $resellerCode;

    /**
     * This parameter must take the value "1" in your message submissions that you want to apply Permission Data filter.
     *
     * @var string
     */
    public $filter = 0;

    /**
     * Create a new message instance.
     *
     * @param  string  $content
     * @return void
     */
    public function __construct($content = '')
    {
        $this->content = $content;
    }

    /**
     * Set the message content.
     *
     * @param  string  $content
     * @return $this
     */
    public function content($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Set the phone number the message should be sent from.
     *
     * @param  string  $from
     * @return $this
     */
    public function from($from)
    {
        $this->from = $from;

        return $this;
    }

    /**
     * Set the message type.
     *
     * @param  string  $encoding
     * @return $this
     */
    public function encoding($encoding)
    {
        $this->encoding = $encoding;

        return $this;
    }

    /**
     * Set the start date.
     *
     * @param  string  $startDate
     * @return $this
     */
    public function startDate($startDate)
    {
        $this->startDate = $startDate;

        return $this;
    }

    /**
     * Set the stop date.
     *
     * @param  string  $stopDate
     * @return $this
     */
    public function stopDate($stopDate)
    {
        $this->stopDate = $stopDate;

        return $this;
    }

    /**
     * Set the reseller code.
     *
     * @param  string  $resellerCode
     * @return $this
     */
    public function resellerCode($resellerCode)
    {
        $this->resellerCode = $resellerCode;

        return $this;
    }

    /**
     * Set the filter.
     *
     * @param  string  $filter
     * @return $this
     */
    public function filter($filter)
    {
        $this->filter = $filter;

        return $this;
    }
}
