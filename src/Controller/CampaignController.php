<?php

namespace App\Controller;

use App\Entity\Campaign;
use App\Repository\CampaignRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/campaign", name="campaign_")
 */
class CampaignController extends AbstractController
{
    /**
     * @Route("", name="browse")
     */
    public function browse(CampaignRepository $campaignRepository): Response
    {
        return $this->render('campaign/index.html.twig', [
            'controller_name' => 'CampaignController',
            'campaign' => $campaignRepository->findall(),
        ]);
    }

    /**
     * @Route("/read/{id}", name="read", requirements={"id"="\d+"})
     */
    public function read(Campaign $campaign)
    {
        return $this->render('admin/movie/read.html.twig', [
            'movie' => $campaign,
        ]);
    }
}
