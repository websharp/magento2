<?php
/**
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Magento\Security\Test\TestCase;

use Magento\Customer\Test\Fixture\Customer;
use Magento\Customer\Test\Page\CustomerAccountCreate;
use Magento\Cms\Test\Page\CmsIndex;
use Magento\Mtf\TestCase\Injectable;

/**
 * Test Flow:
 * 1. Go to frontend.
 * 2. Click Register link.
 * 3. Fill registry form.
 * 4. Click 'Create account' button.
 * 5. Perform assertions.
 *
 * @ZephyrId MAGETWO-49044
 */
class NewFrontendCustomerPasswordTest extends Injectable
{
    /* tags */
    const MVP = 'yes';
    const DOMAIN = 'PS';
    /* end tags */

    /**
     * Customer registry page.
     *
     * @var CustomerAccountCreate
     */
    protected $customerAccountCreate;

    /**
     * Cms page.
     *
     * @var CmsIndex $cmsIndex
     */
    protected $cmsIndex;

    /**
     * Inject data.
     *
     * @param CustomerAccountCreate $customerAccountCreate
     * @param CmsIndex $cmsIndex
     * @return void
     */
    public function __inject(
        CustomerAccountCreate $customerAccountCreate,
        CmsIndex $cmsIndex
    ) {
        $this->customerAccountCreate = $customerAccountCreate;
        $this->cmsIndex = $cmsIndex;
    }

    /**
     * Create Customer account on Storefront.
     *
     * @param Customer $customer
     * @return void
     */
    public function test(Customer $customer)
    {
        // Steps
        $this->cmsIndex->open();
        $this->cmsIndex->getLinksBlock()->openLink('Create an Account');
        $this->customerAccountCreate->getRegisterForm()->registerCustomer($customer);
    }
}
