<?php
namespace OC\BookingBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Tarif
 */
class PricelistController extends Controller
{
    /**
     * Retourne le tarif en vigeur
     *
     * @return render
     */
    public function listAction()
    {
        $repository = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('OCBookingBundle:Pricelist')
        ;
        $pricelist = $repository->findAll();
        return $this->render('OCBookingBundle:Pricelist:list.html.twig', ['pricelist' => $pricelist]);
    }
}
