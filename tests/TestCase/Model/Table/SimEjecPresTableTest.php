<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SimEjecPresTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SimEjecPresTable Test Case
 */
class SimEjecPresTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\SimEjecPresTable
     */
    protected $SimEjecPres;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.SimEjecPres',
        'app.Items',
        'app.Progs',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('SimEjecPres') ? [] : ['className' => SimEjecPresTable::class];
        $this->SimEjecPres = TableRegistry::getTableLocator()->get('SimEjecPres', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->SimEjecPres);

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
