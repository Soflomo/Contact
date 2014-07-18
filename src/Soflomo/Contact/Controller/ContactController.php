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

namespace Soflomo\Contact\Controller;

use Doctrine\Common\Persistence\ObjectRepository as ContactRepository;
use Soflomo\Contact\Form\ContactForm;
use Soflomo\Contact\Service\ContactService;
use Soflomo\Contact\Exception;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class ContactController extends AbstractActionController
{
    protected $repository;
    protected $form;
    protected $service;

    public function __construct(ContactRepository $repository, ContactForm $form, ContactService $service)
    {
        $this->repository = $repository;
        $this->form       = $form;
        $this->service    = $service;
    }

    public function indexAction()
    {
        $contact = $this->getContactEntity();
        $form    = $this->getForm();

        $prg = $this->prg();
        if ($prg instanceof Response) {
            return $prg;
        } elseif (false !== $prg) {
            $form->setData($prg);

            if ($form->isValid()) {
                $data = $form->getData();
                $this->getService()->send($data);

                $model = new ViewModel;
                $model->setTemplate('soflomo-contact/contact/thank-you');
                return $model;
            }
        }

        $model = new ViewModel(['form' => $form]);
        if (null !== $contact->getTemplate()) {
            $model->setTemplate($contact->getTemplate());
        }

        return $model;
    }

    protected function getRepository()
    {
        return $this->repository;
    }

    protected function getForm()
    {
        return $this->form;
    }

    protected function getService()
    {
        return $this->service;
    }

    protected function getContactEntity()
    {
        $page    = $this->getPage();
        $id      = $page->getModuleId();
        $contact = $this->getRepository()->find($id);

        if (null === $contact) {
            throw new Exception\ContactNotFoundException(sprintf(
                'Cannot find a contact with id "%s"', $id
            ));
        }

        return $contact;
    }

    protected function getPage()
    {
        return $this->getEvent()->getParam('page');
    }
}
