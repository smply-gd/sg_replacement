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
    public function getAllItemsFromRootline($pageUid){
        $query = $this->createQuery();
        $result = [];

        $rootLineUtility = new \TYPO3\CMS\Core\Utility\RootlineUtility($pageUid);
        $rootline = $rootLineUtility->get();
        $i = 1;
        $pidsToEvaluate = [];
        foreach ($rootline as $page){
            if ($i == 1) $pidsToEvaluate[] = $page['uid'];
            $pidsToEvaluate[] = $page['pid'];
            $i++;
        }

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

    public function findAllOnAllPagesWithHiddenFields()
    {
        $query = $this->createQuery();
        $query->getQuerySettings()->setIgnoreEnableFields(true)->setEnableFieldsToBeIgnored(['hidden'])->setRespectStoragePage(false);
        return $query->execute();
    }

}