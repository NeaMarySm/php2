<?php

namespace App\Controller;

use App\Entity\Customer;
use App\Entity\PhoneNumber;
use DateTimeImmutable;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;

class CustomerController extends AbstractController
{
    
    #[Route('/customer/{customer_id}', name: 'customer')]
    public function getCustomer($customer_id, ManagerRegistry $managerRegistry): Response
    {
        $manager = $managerRegistry->getRepository(Customer::class);
        $customer = $manager->find($customer_id);
        foreach($customer->getAddress() as $address){
            var_dump($address);
            die();
        }
    }

    #[Route('/customer/create_customer', name: 'create_customer')]
    public function insertCustomer(ManagerRegistry $managerRegistry)
    {
        $manager = $managerRegistry->getManager();
        $phone_num1 = new PhoneNumber();
        $phone_num2 = new PhoneNumber();
        $phone_num1->setNumber(9222331389);
        $phone_num2->setNumber(9222331386);
        
        
        $customer = new Customer();
        $customer->setEmail('email@email.com');
        $customer->setFirstName('John');
        $customer->setLastName('Smith');
        $creation_date = new DateTimeImmutable();
        $customer->setCreatedAt($creation_date);
        $customer->setPasswordHash('osme%$ssf4h%ash$');
        $customer->addPhoneNumber($phone_num1);
        $customer->addPhoneNumber($phone_num2);


        $phone_num1->setCustomer($customer);
        $phone_num2->setCustomer($customer);

        $manager->persist($customer);
        $manager->persist($phone_num1);
        $manager->persist($phone_num2);
        $manager->flush();
    }
}
