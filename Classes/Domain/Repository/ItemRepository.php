<?php

namespace SG\SgReplacement\Domain\Repository;

use TYPO3\CMS\Extbase\Object\ObjectManagerInterface;
use TYPO3\CMS\Extbase\Persistence\Generic\Typo3QuerySettings;
use TYPO3\CMS\Extbase\Persistence\Repository;

class ItemRepository extends Repository
{
    /**
     * @todo: Describe
     *
     * @param $pidsToEvaluate
     * @return array
     */
    public function getAllItemsFromRootline($pidsToEvaluate){
        $query = $this->createQuery();
        $result = [];

        foreach ($pidsToEvaluate as $pid){
            $query->getQuerySettings()->setStoragePageIds([$pid]);
            $rawResultItems = $query->execute();
            foreach ($rawResultItems as $rawResultItem){
                if (!isset($result[$rawResultItem->getSearchFor()])){
                    $result[$rawResultItem->getSearchFor()] = $rawResultItem;
                }
            }
        }
        return $result;
    }
}