<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SimPresProg2Table;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SimPresProg2Table Test Case
 */
class SimPresProg2TableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\SimPresProg2Table
     */
    protected $SimPresProg2;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.SimPresProg2',
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
        $config = TableRegistry::getTableLocator()->exists('SimPresProg2') ? [] : ['className' => SimPresProg2Table::class];
        $this->SimPresProg2 = TableRegistry::getTableLocator()->get('SimPresProg2', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->SimPresProg2);

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
