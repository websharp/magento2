<?php
/**
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Magento\Catalog\Test\Constraint;

use Magento\Catalog\Test\Fixture\Category;
use Magento\Catalog\Test\Page\Category\CatalogCategoryView;
use Magento\Catalog\Test\Page\Product\CatalogProductView;
use Magento\Cms\Test\Page\CmsIndex;
use Magento\Mtf\Constraint\AbstractConstraint;
use Magento\Mtf\Fixture\InjectableFixture;

/**
 * Checks the button on the category/product pages.
 */
class AssertAddToCartButtonPresent extends AbstractConstraint
{
    /* tags */
    const SEVERITY = 'low';
    /* end tags */

    /**
     * Assert that "Add to cart" button is present on page.
     *
     * @param InjectableFixture $product
     * @param Category $category
     * @param CmsIndex $cmsIndex
     * @param CatalogCategoryView $catalogCategoryView
     * @param CatalogProductView $catalogProductView
     *
     * @return void
     */
    public function processAssert(
        InjectableFixture $product,
        Category $category,
        CmsIndex $cmsIndex,
        CatalogCategoryView $catalogCategoryView,
        CatalogProductView $catalogProductView
    ) {
        $cmsIndex->open();
        $cmsIndex->getTopmenu()->selectCategoryByName($category->getName());

        $isProductVisible = $catalogCategoryView->getListProductBlock()->isProductVisible($product->getName());
        while (!$isProductVisible && $catalogCategoryView->getBottomToolbar()->nextPage()) {
            $isProductVisible = $catalogCategoryView->getListProductBlock()->isProductVisible($product->getName());
        }
        \PHPUnit_Framework_Assert::assertTrue($isProductVisible, 'Product is absent on category page.');

        \PHPUnit_Framework_Assert::assertTrue(
            $catalogCategoryView->getListProductBlock()->getProductItem($product)->isVisibleAddToCardButton(),
            "Button 'Add to Card' is absent on Category page."
        );

        $catalogCategoryView->getListProductBlock()->openProductViewPage($product->getName());
        \PHPUnit_Framework_Assert::assertTrue(
            $catalogProductView->getViewBlock()->isVisibleAddToCardButton(),
            "Button 'Add to Card' is absent on Product page."
        );
    }

    /**
     * Text present button "Add to Cart"  on the category/product pages.
     *
     * @return string
     */
    public function toString()
    {
        return "Button 'Add to Card' is present on Category page.";
    }
}
