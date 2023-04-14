<?php
namespace app\components;

use yii\widgets\LinkPager;

class CustomPager extends LinkPager
{
    protected function getPageRange()
    {
        $currentPage = $this->pagination->getPage();
        $pageCount = $this->pagination->getPageCount();
        $multiplier = floor($currentPage / ((int)$this->maxButtonCount - 1));

        if (($currentPage % ($this->maxButtonCount - 1)) === 0 && $currentPage !== 0) {
            $beginPage = max(0, $multiplier * ($this->maxButtonCount - 1)) - 1;
        } else {
            $beginPage = max(0, $multiplier * ($this->maxButtonCount - 1));
        }

        if (($endPage = $beginPage + $this->maxButtonCount - 1) >= $pageCount) {
            $endPage = $pageCount - 1;
            $beginPage = max(0, $endPage - $this->maxButtonCount + 1);
        }

        return [$beginPage, $endPage];
    }
}