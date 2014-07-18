<?php
/**
 * Copyright (c) 2014 Soflomo.
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without
 * modification, are permitted provided that the following conditions
 * are met:
 *
 *   * Redistributions of source code must retain the above copyright
 *     notice, this list of conditions and the following disclaimer.
 *
 *   * Redistributions in binary form must reproduce the above copyright
 *     notice, this list of conditions and the following disclaimer in
 *     the documentation and/or other materials provided with the
 *     distribution.
 *
 *   * Neither the names of the copyright holders nor the names of the
 *     contributors may be used to endorse or promote products derived
 *     from this software without specific prior written permission.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS
 * "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT
 * LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS
 * FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE
 * COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT,
 * INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING,
 * BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES;
 * LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER
 * CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT
 * LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN
 * ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE
 * POSSIBILITY OF SUCH DAMAGE.
 *
 * @author      Jurian Sluiman <jurian@soflomo.com>
 * @copyright   2014 Soflomo.
 * @license     http://www.opensource.org/licenses/bsd-license.php  BSD License
 * @link        http://soflomo.com
 */

namespace Soflomo\Contact\Options;

use Zend\Stdlib\AbstractOptions;

class ModuleOptions extends AbstractOptions
{
    /**
     * Turn off strict options mode
     */
    protected $__strictMode__ = false;

    /**#@+
     * @var string
     */
    protected $subject;
    protected $toAddress;
    protected $toName;
    protected $fromAddress;
    protected $fromName;
    protected $useFromSender;
    protected $emailTemplateHtml;
    protected $emailTemplateText;

    /**
     * Getter for subject
     *
     * @return string
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * Setter for subject
     *
     * @param string $subject Value to set
     * @return self
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;
        return $this;
    }

    /**
     * Getter for toAddress
     *
     * @return string
     */
    public function getToAddress()
    {
        return $this->toAddress;
    }

    /**
     * Setter for toAddress
     *
     * @param string $toAddress Value to set
     * @return self
     */
    public function setToAddress($toAddress)
    {
        $this->toAddress = $toAddress;
        return $this;
    }

    /**
     * Getter for toName
     *
     * @return string
     */
    public function getToName()
    {
        return $this->toName;
    }

    /**
     * Setter for toName
     *
     * @param string $toName Value to set
     * @return self
     */
    public function setToName($toName)
    {
        $this->toName = $toName;
        return $this;
    }

    /**
     * Getter for fromAddress
     *
     * @return string
     */
    public function getFromAddress()
    {
        return $this->fromAddress;
    }

    /**
     * Setter for fromAddress
     *
     * @param string $fromAddress Value to set
     * @return self
     */
    public function setFromAddress($fromAddress)
    {
        $this->fromAddress = $fromAddress;
        return $this;
    }

    /**
     * Getter for fromName
     *
     * @return string
     */
    public function getFromName()
    {
        return $this->fromName;
    }

    /**
     * Setter for fromName
     *
     * @param string $fromName Value to set
     * @return self
     */
    public function setFromName($fromName)
    {
        $this->fromName = $fromName;
        return $this;
    }

    /**
     * Getter for useFromSender
     *
     * @return bool
     */
    public function getUseFromSender()
    {
        return $this->useFromSender;
    }

    /**
     * Setter for useFromSender
     *
     * @param bool $useFromSender Value to set
     * @return self
     */
    public function setUseFromSender($useFromSender)
    {
        $this->useFromSender = (bool) $useFromSender;
        return $this;
    }

    /**
     * Getter for emailTemplateHtml
     *
     * @return string
     */
    public function getEmailTemplateHtml()
    {
        return $this->emailTemplateHtml;
    }

    /**
     * Setter for emailTemplateHtml
     *
     * @param string $emailTemplateHtml Value to set
     * @return self
     */
    public function setEmailTemplateHtml($emailTemplateHtml)
    {
        $this->emailTemplateHtml = $emailTemplateHtml;
        return $this;
    }

    /**
     * Getter for emailTemplateText
     *
     * @return string
     */
    public function getEmailTemplateText()
    {
        return $this->emailTemplateText;
    }

    /**
     * Setter for emailTemplateText
     *
     * @param string $emailTemplateText Value to set
     * @return self
     */
    public function setEmailTemplateText($emailTemplateText)
    {
        $this->emailTemplateText = $emailTemplateText;
        return $this;
    }
}
