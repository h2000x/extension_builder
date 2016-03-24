{namespace k=EBT\ExtensionBuilder\ViewHelpers}<?php
namespace {extension.nameSpaceName}\Tests\Unit\Domain\Model;

/**
 * Test case.
<f:if condition="{extension.persons}"> *
<f:for each="{extension.persons}" as="person"> * @author {person.name} <f:if condition="{person.email}"><{person.email}></f:if>
</f:for></f:if> */
class {domainObject.name}Test extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var {domainObject.fullQualifiedClassName}
     */
    protected $subject = null;

    protected function setUp()
    {
        $this->subject = new {domainObject.fullQualifiedClassName}();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }
<f:if condition="{f:count(subject:domainObject.properties)} > 0">
<f:then>
<f:for each="{domainObject.properties}" as="property">

    /**
     * @test
     */
    public function get{property.name -> k:format.uppercaseFirst()}ReturnsInitialValueFor<f:if condition="{k:matchString(match:'FileReference', in:property.unqualifiedType)}"><f:then>FileReference</f:then><f:else>{f:if(condition:"{k:matchString(match:'ObjectStorage', in:property.unqualifiedType)}", then:"{property.foreignModelName}", else:"{property.unqualifiedType -> k:format.uppercaseFirst()}")}</f:else></f:if>()
    {<f:if condition="{property.unqualifiedType} == 'integer'">
        $this->assertSame(
            0,
            $this->subject->get{property.name -> k:format.uppercaseFirst()}()
        );
</f:if><f:if condition="{property.unqualifiedType} == 'float'">
        $this->assertSame(
            0.0,
            $this->subject->get{property.name -> k:format.uppercaseFirst()}()
        );
</f:if><f:if condition="{property.unqualifiedType} == 'string'">
        $this->assertSame(
            '',
            $this->subject->get{property.name -> k:format.uppercaseFirst()}()
        );
</f:if><f:if condition="{property.unqualifiedType} == 'bool'">
        $this->assertSame(
            false,
            $this->subject->get{property.name -> k:format.uppercaseFirst()}()
        );
</f:if><f:if condition="{k:matchString(match:'ObjectStorage', in:property.unqualifiedType)}"><f:then>
        $newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->assertEquals(
            $newObjectStorage,
            $this->subject->get{property.name -> k:format.uppercaseFirst()}()
        );
</f:then><f:else><f:if condition="{property.foreignModel}">
        $this->assertEquals(
            null,
            $this->subject->get{property.name -> k:format.uppercaseFirst()}()
        );
</f:if><f:if condition="{k:matchString(match:'DateTime', in:property.unqualifiedType)}">
        $this->assertEquals(
            null,
            $this->subject->get{property.name -> k:format.uppercaseFirst()}()
        );
</f:if><f:if condition="{k:matchString(match:'FileReference', in:property.unqualifiedType)}">
        $this->assertEquals(
            null,
            $this->subject->get{property.name -> k:format.uppercaseFirst()}()
        );
</f:if></f:else></f:if>
    }

    /**
     * @test
     */
    public function set{property.name -> k:format.uppercaseFirst()}For<f:if condition="{k:matchString(match:'FileReference', in:property.unqualifiedType)}"><f:then>FileReference</f:then><f:else>{f:if(condition:"{k:matchString(match:'ObjectStorage', in:property.unqualifiedType)}", then:"ObjectStorageContaining{property.foreignModelName}", else:"{property.unqualifiedType -> k:format.uppercaseFirst()}")}</f:else></f:if>Sets{property.name -> k:format.uppercaseFirst()}()
    {<f:if condition="{property.unqualifiedType} == 'string'">
        $this->subject->set{property.name -> k:format.uppercaseFirst()}('Conceived at T3CON10');

        $this->assertAttributeEquals(
            'Conceived at T3CON10',
            '{property.name}',
            $this->subject
        );
</f:if><f:if condition="{property.unqualifiedType}  == 'integer'">
        $this->subject->set{property.name -> k:format.uppercaseFirst()}(12);

        $this->assertAttributeEquals(
            12,
            '{property.name}',
            $this->subject
        );
</f:if><f:if condition="{property.unqualifiedType} == 'float'">
        $this->subject->set{property.name -> k:format.uppercaseFirst()}(3.14159265);

        $this->assertAttributeEquals(
            3.14159265,
            '{property.name}',
            $this->subject,
            '',
            0.000000001
        );
</f:if><f:if condition="{property.unqualifiedType} == 'bool'">
        $this->subject->set{property.name -> k:format.uppercaseFirst()}(true);

        $this->assertAttributeEquals(
            true,
            '{property.name}',
            $this->subject
        );
</f:if><f:if condition="{k:matchString(match:'ObjectStorage', in:property.unqualifiedType)}"><f:then>
        ${property.name -> k:singularize()} = new {k:pregReplace(match:'/^.*<(.*)>$/', replace:'\1', subject:property.unqualifiedType)}();
        $objectStorageHoldingExactlyOne{property.name -> k:format.uppercaseFirst()} = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $objectStorageHoldingExactlyOne{property.name -> k:format.uppercaseFirst()}->attach(${property.name -> k:singularize()});
        $this->subject->set{property.name -> k:format.uppercaseFirst()}($objectStorageHoldingExactlyOne{property.name -> k:format.uppercaseFirst()});

        $this->assertAttributeEquals(
            $objectStorageHoldingExactlyOne{property.name -> k:format.uppercaseFirst()},
            '{property.name}',
            $this->subject
        );
</f:then><f:else><f:if condition="{property.foreignModel}">
        ${property.name}Fixture = new {f:if(condition:"{k:matchString(match:'ObjectStorage', in:property.unqualifiedType)}", then:"ObjectStorageContaining{property.foreignModelName)}", else:"{property.foreignModel.fullQualifiedClassName}")}();
        $this->subject->set{property.name -> k:format.uppercaseFirst()}(${property.name}Fixture);

        $this->assertAttributeEquals(
            ${property.name}Fixture,
            '{property.name}',
            $this->subject
        );
</f:if><f:if condition="{k:matchString(match:'DateTime', in:property.unqualifiedType)}">
        $dateTimeFixture = new \DateTime();
        $this->subject->set{property.name -> k:format.uppercaseFirst()}($dateTimeFixture);

        $this->assertAttributeEquals(
            $dateTimeFixture,
            '{property.name}',
            $this->subject
        );
</f:if><f:if condition="{k:matchString(match:'FileReference', in:property.unqualifiedType)}">
        $fileReferenceFixture = new \TYPO3\CMS\Extbase\Domain\Model\FileReference();
        $this->subject->set{property.name -> k:format.uppercaseFirst()}($fileReferenceFixture);

        $this->assertAttributeEquals(
            $fileReferenceFixture,
            '{property.name}',
            $this->subject
        );
</f:if></f:else></f:if>
    }<f:if condition="{k:matchString(match:'ObjectStorage', in:property.unqualifiedType)}">

    /**
     * @test
     */
    public function add{property.name -> k:singularize() -> k:format.uppercaseFirst()}ToObjectStorageHolding{property.name -> k:format.uppercaseFirst()}()
    {
        ${property.name -> k:singularize()} = new {property.foreignClassName}();
        ${property.name}ObjectStorageMock = $this->getMock(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class, ['attach'], [], '', false);
        ${property.name}ObjectStorageMock->expects($this->once())->method('attach')->with($this->equalTo(${property.name -> k:singularize()}));
        $this->inject($this->subject, '{property.name}', ${property.name}ObjectStorageMock);

        $this->subject->add{property.name -> k:singularize() -> k:format.uppercaseFirst()}(${property.name -> k:singularize()});
    }

    /**
     * @test
     */
    public function remove{property.name -> k:singularize() -> k:format.uppercaseFirst()}FromObjectStorageHolding{property.name -> k:format.uppercaseFirst()}()
    {
        ${property.name -> k:singularize()} = new {property.foreignClassName}();
        ${property.name}ObjectStorageMock = $this->getMock(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class, ['detach'], [], '', false);
        ${property.name}ObjectStorageMock->expects($this->once())->method('detach')->with($this->equalTo(${property.name -> k:singularize()}));
        $this->inject($this->subject, '{property.name}', ${property.name}ObjectStorageMock);

        $this->subject->remove{property.name -> k:singularize() -> k:format.uppercaseFirst()}(${property.name -> k:singularize()});

    }</f:if></f:for></f:then><f:else>
    /**
     * @test
     */
    public function dummyTestToNotLeaveThisFileEmpty()
    {
        $this->markTestIncomplete();
    }</f:else></f:if>
}
