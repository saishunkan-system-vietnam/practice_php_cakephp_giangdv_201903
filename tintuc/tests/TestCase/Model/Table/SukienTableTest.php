<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SukienTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SukienTable Test Case
 */
class SukienTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SukienTable
     */
    public $Sukien;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Sukien'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Sukien') ? [] : ['className' => SukienTable::class];
        $this->Sukien = TableRegistry::getTableLocator()->get('Sukien', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Sukien);

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
