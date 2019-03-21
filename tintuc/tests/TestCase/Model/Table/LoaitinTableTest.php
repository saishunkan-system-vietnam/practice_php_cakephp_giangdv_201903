<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LoaitinTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LoaitinTable Test Case
 */
class LoaitinTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\LoaitinTable
     */
    public $Loaitin;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Loaitin'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Loaitin') ? [] : ['className' => LoaitinTable::class];
        $this->Loaitin = TableRegistry::getTableLocator()->get('Loaitin', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Loaitin);

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
}
