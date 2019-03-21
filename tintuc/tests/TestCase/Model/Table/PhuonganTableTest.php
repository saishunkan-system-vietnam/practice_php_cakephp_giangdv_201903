<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PhuonganTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PhuonganTable Test Case
 */
class PhuonganTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PhuonganTable
     */
    public $Phuongan;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Phuongan'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Phuongan') ? [] : ['className' => PhuonganTable::class];
        $this->Phuongan = TableRegistry::getTableLocator()->get('Phuongan', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Phuongan);

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
