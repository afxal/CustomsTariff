<?php

namespace Apo;

use Symfony\Component\DomCrawler\Crawler;

class CustomsTariff {

    protected $url = 'http://www.customs.gov.mv/GetTariff';

    protected $filter;
    
    protected $limit;

    protected $list = array();

    protected $raw;

    public function __construct($filter = null, $limit = 30)
    {   
        $this->setLimit($limit);

        if($filter)
        {
            $this->search($filter);
        }

    }

    public function setLimit($limit)
    {
        $this->limit = $limit;
    }

    public function getList()
    {
        return $this->list;
    }

    public function toJson()
    {
        return json_encode($this->list);
    }

    public function search($search)
    {
        $this->filter = $search;
        $this->getData();
    }

    public function findCode($code)
    {
        $this->search($code);
        $this->list = $this->list[0];
    }

    private function buildUrl()
    {
        $url = [
            'rows'=>$this->limit,
            'id'=>$this->filter,
        ];

        return $this->url.'?'.http_build_query($url);
    }

    public function domCrawler($domObj)
    {
        $crawler = new Crawler();
        $crawler->addHTMLContent($domObj);

        $rows = array();
        $tr_elements = $crawler->filterXPath('//table/tr');

        foreach ($tr_elements as $i => $content) {
            $tds = array();

            $crawler = new Crawler($content);

            foreach ($crawler->filter('td') as $i => $node) {

                $tds[] = trim($node->nodeValue);

            }
            $rows[] = $tds;
        }

        return $rows;
    }

    private function getData()
    {
        $this->raw = file_get_contents($this->buildUrl());

        $this->list = $this->domCrawler($this->raw);
    }

}
