<?php

namespace SG\SgReplacement\Hooks;

/*
* This file is part of the TYPO3 CMS project.
*
* It is free software; you can redistribute it and/or modify it under
* the terms of the GNU General Public License, either version 2
* of the License, or any later version.
*
* For the full copyright and license information, please read the
* LICENSE.txt file that was distributed with this source code.
*
* The TYPO3 project - inspiring people to share!
*/

use SG\SgReplacement\Domain\Model\Item;
use SG\SgReplacement\Domain\Repository\ItemRepository;

class TypoScriptFrontendController
{

    /**
     * @var ItemRepository
     */
    private $itemRepository;

    /**
     * @param ItemRepository $itemRepository
     * @required
     */
    public function setItemRepository(ItemRepository $itemRepository){
        $this->itemRepository = $itemRepository;
    }

    /**
     * Search and Replace Text from TypoScriptFrontendController->content
     *
     * @param array $params
     * @param \TYPO3\CMS\Frontend\Controller\TypoScriptFrontendController $frontendController
     * @throws \TYPO3\CMS\Extbase\Object\Exception
     */
    public function contentPostProcAll(
        array &$params,
        \TYPO3\CMS\Frontend\Controller\TypoScriptFrontendController $frontendController
    ){
        // Get PIDs in Rootline
        $i = 1;
        $pidsToEvaluate = [];
        foreach ($frontendController->rootLine as $page){
            if ($i == 1) $pidsToEvaluate[] = $page['uid'];
            $pidsToEvaluate[] = $page['pid'];
            $i++;
        }

        $objectManager = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Extbase\Object\ObjectManager::class);
        $itemRepository = $objectManager->get(\SG\SgReplacement\Domain\Repository\ItemRepository::class);
        $itemsToApply = $itemRepository->getAllItemsFromRootline($pidsToEvaluate);
        if (count($itemsToApply) > 0){
            foreach ($itemsToApply as $itemToApply){
                if ($itemToApply instanceof Item && $itemToApply->getSearchFor() !== ''){
                    if ($itemToApply->isRegEx()){
                        $frontendController->content = preg_replace(
                            $itemToApply->getSearchFor(),
                            $itemToApply->getReplaceWith(),
                            $frontendController->content
                        );
                    }else{
                        $frontendController->content = str_replace(
                            $itemToApply->getSearchFor(),
                            $itemToApply->getReplaceWith(),
                            $frontendController->content
                        );
                    }
                }
            }
        }
    }

    /**
     * Search and Replace Text from TypoScriptFrontendController->content
     *
     * @param array $params
     * @param \TYPO3\CMS\Frontend\Controller\TypoScriptFrontendController $frontendController
     * @throws \TYPO3\CMS\Extbase\Object\Exception
     */
    public function contentPostProcOutput(
        array &$params,
        \TYPO3\CMS\Frontend\Controller\TypoScriptFrontendController $frontendController
    ){
        $this->contentPostProcAll($params, $frontendController);
    }
}