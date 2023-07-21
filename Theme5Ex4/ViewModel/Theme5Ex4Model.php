<?php
namespace Perspective\Theme5Ex4\ViewModel;

use Exception;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Exception\NoSuchEntityException;

class Theme5Ex4Model implements \Magento\Framework\View\Element\Block\ArgumentInterface
{
    /**
     * @var Magento\Bundle\Api\ProductLinkManagementInterface
     */
    private $_productLinkManagement;

    /**
     * @var Magento\Catalog\Api\ProductRepositoryInterface
     */
    private $_productRepository;

    public function __construct(
        \Magento\Bundle\Api\ProductLinkManagementInterface $productLinkManagement,
        \Magento\Catalog\Api\ProductRepositoryInterface $productRepository
    )
    {
        $this->_productLinkManagement = $productLinkManagement;
        $this->_productRepository = $productRepository;
    }

    ############## Ex 4.1 ##############
    public function getChildrenItems()
    {
        $sku = '24-WG080'; // Dynamic SKU
        try {
            $items = $this->_productLinkManagement->getChildren($sku);
        } catch (Exception $exception) {
            throw new Exception($exception->getMessage());
        }

        return $items;
    }
    #######################################

    ############## Ex 4.2 ##############
/*     public function getChildItemsFromGroupedProduct(string $sku): array
    {
        try {
            $product = $this->_productRepository->get($sku);
        } catch (NoSuchEntityException $noEntityException) {
            throw new LocalizedException(
                __('Please correct the product SKU.'),
                $noEntityException
            );
        }
        return $product->getTypeInstance()->getAssociatedProducts($product);
    } */
    #######################################
}
