<?php

namespace CustomBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;

use BisonLab\CommonBundle\Controller\CommonController as CommonController;

use App\Entity\Event;
use App\Entity\PersonRoleEvent;
use App\Entity\Role;
use App\Entity\FunctionEntity;

/**
 * Event controller.
 *
 * Nothing to see, just a placeholder and example.
 */
#[Route(path: '/admin/{access}/custom_event', defaults: ['access' => 'web'], requirements: ['access' => 'web|rest|ajax'])]
class EventController extends CommonController
{
}
