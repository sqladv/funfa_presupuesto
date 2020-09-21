<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AgruMesDetTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AgruMesDetTable Test Case
 */
class AgruMesDetTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\AgruMesDetTable
     */
    protected $AgruMesDet;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.AgruMesDet',
        'app.Mes',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('AgruMesDet') ? [] : ['className' => AgruMesDetTable::class];
        $this->AgruMesDet = TableRegistry::getTableLocator()->get('AgruMesDet', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->AgruMesDet);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
