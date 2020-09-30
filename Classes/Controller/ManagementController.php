<?php

namespace SG\SgReplacement\Controller;

use SG\SgReplacement\Domain\Repository\ItemRepository;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

class ManagementController extends ActionController
{
    /**
     * @var ItemRepository
     */
    private $itemRepository;

    /**
     * @param ItemRepository $itemRepository
     */
    public function injectItemRepository(ItemRepository $itemRepository){
        $this->itemRepository = $itemRepository;
    }

    public function indexAction(){
        $id = (int)\TYPO3\CMS\Core\Utility\GeneralUtility::_GP('id');
        $this->view->assign('items', $this->itemRepository->getAllItemsFromRootline($id));
    }

    public function allitemsAction(){
        $this->view->assign('items', $this->itemRepository->findAllOnAllPagesWithHiddenFields());
    }
}