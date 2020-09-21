<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EjecPres2Table;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EjecPres2Table Test Case
 */
class EjecPres2TableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\EjecPres2Table
     */
    protected $EjecPres2;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.EjecPres2',
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
        $config = TableRegistry::getTableLocator()->exists('EjecPres2') ? [] : ['className' => EjecPres2Table::class];
        $this->EjecPres2 = TableRegistry::getTableLocator()->get('EjecPres2', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->EjecPres2);

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
