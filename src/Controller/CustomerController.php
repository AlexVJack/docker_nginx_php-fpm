<?php

namespace App\Controller;

use App\Entity\Customer;
use App\Form\Type\CustomerType;
use App\Message\CreateCustomerMessage;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Messenger\MessageBusInterface;

class CustomerController extends AbstractApiController
{
    public function indexAction(Request $request, ManagerRegistry $doctrine)
    {
        $customers = $doctrine->getRepository(Customer::class)->findAll();

        return $this->json($customers);
    }

    public function createAction(Request $request, ManagerRegistry $doctrine, MessageBusInterface $bus)
    {
        $form = $this->buildForm(CustomerType::class);

        $form->handleRequest($request);

        if (!$form->isSubmitted() || !$form->isValid()){
            print 'Form is not valid';
            exit;
        }

        /** @var Customer $customer */
        $customer = $form->getData();

        $doctrine->getManager()->persist($customer);
        $doctrine->getManager()->flush();

        // Dispatch message after saving the customer
        $message = new CreateCustomerMessage($customer->getId());
        $bus->dispatch($message);

        return $this->json($customer);
    }
}
