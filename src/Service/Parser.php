<?php

namespace App\Service;
use App\Entity\Code;
use App\Entity\Price;
use Doctrine\Migrations\Tools\Console\Exception\VersionAlreadyExists;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\DomCrawler\Crawler;

class Parser
{
    const URL = 'https://vitparts.ru/search/';
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function checkPrice($firm, $code)
    {
        $price = 0;
        $crawler = new Crawler(file_get_contents(self::URL . $firm . '/' . $code));
        $crawler = $crawler
            ->filter('.searchBestOfferBlocks .searchBestOfferBlockWrapper .bestOfferPrice')
            ->first();
        if ($crawler->count() === 0) {
            $price = intval(str_replace([' ', 'руб.'], '', $crawler->text()));

        }
        return $price;
    }

    public function parseVitparts()
    {
        $details = $this->em->getRepository(Code::class)->findBy(['active' => true]);
        foreach ($details as $detail) {
            $firm = $detail->getFirm();
            $code = $detail->getCode();

            $price = $this->checkPrice($firm, $code);
            if (!$price) {
                continue;
            }

            $todayPrice = $this->em->getRepository(Price::class)->getTodayPrice($detail);
            if ($todayPrice) {
                if ($price < $todayPrice->getPrice()) {
                    $todayPrice->setPrice($price);
                    /*
                     * TO DO
                     * ПЕРЕДЕЛАТЬ ДАТУ
                     * */
                    $todayPrice->setDatetime(new \DateTime());
                    $this->em->persist($todayPrice);
                    $this->em->flush();
                }
            } else {
                $priceEntity = new Price();
                $priceEntity->setCode($detail);
                $priceEntity->setPrice($price);
                $this->em->persist($priceEntity);
                $this->em->flush();
            }
            sleep(5);
        }
    }
}