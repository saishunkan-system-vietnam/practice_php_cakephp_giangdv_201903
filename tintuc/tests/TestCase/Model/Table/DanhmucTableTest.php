<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DanhmucTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DanhmucTable Test Case
 */
class DanhmucTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DanhmucTable
     */
    public $Danhmuc;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Danhmuc'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Danhmuc') ? [] : ['className' => DanhmucTable::class];
        $this->Danhmuc = TableRegistry::getTableLocator()->get('Danhmuc', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Danhmuc);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
