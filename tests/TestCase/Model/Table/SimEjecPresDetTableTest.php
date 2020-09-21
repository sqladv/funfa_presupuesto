<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SimEjecPresDetTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SimEjecPresDetTable Test Case
 */
class SimEjecPresDetTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\SimEjecPresDetTable
     */
    protected $SimEjecPresDet;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.SimEjecPresDet',
        'app.Items',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('SimEjecPresDet') ? [] : ['className' => SimEjecPresDetTable::class];
        $this->SimEjecPresDet = TableRegistry::getTableLocator()->get('SimEjecPresDet', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->SimEjecPresDet);

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
