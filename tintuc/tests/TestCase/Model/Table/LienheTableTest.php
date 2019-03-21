<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\LienheTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LienheTable Test Case
 */
class LienheTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\LienheTable
     */
    public $Lienhe;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Lienhe'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Lienhe') ? [] : ['className' => LienheTable::class];
        $this->Lienhe = TableRegistry::getTableLocator()->get('Lienhe', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Lienhe);

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
