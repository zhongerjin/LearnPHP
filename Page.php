<?php
/**
 * Created by PhpStorm.
 * User: interesting
 * Date: 2017/12/7
 * Time: 14:48
 */

class Page
{
    private $pagecount;
    private $items = array();
    private $pages = array();

    public function __construct($pagecount, $items)  {
        $this->pagecount = $pagecount;
        $this->items = $items;
    }

    public function getPages() {
        for ($i=1; $i<=$this->pagecount; $i++) {
            $this->pages[] = $i;
        }
        return $this->pages;
    }

    public function setPages($pages) {
        $this->pages = $pages;
    }

    public function getPagecount() {
        return $this->pagecount;
    }

    public function setPagecount($pagecount) {
        $this->pagecount = $pagecount;
    }

    public function getItems() {
        return $this->items;
    }

    public function setItems($items) {
        $this->items = $items;
    }
}