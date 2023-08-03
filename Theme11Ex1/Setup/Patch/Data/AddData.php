<?php

namespace Perspective\Theme11Ex1\Setup\Patch\Data;

use Magento\Framework\Setup\Patch\DataPatchInterface;

use Magento\Framework\Setup\Patch\PatchVersionInterface;

use Magento\Framework\Setup\ModuleDataSetupInterface;

use Perspective\Theme11Ex1\Model\ConsultationdetailsFactory;

use Perspective\Theme11Ex1\Model\ResourceModel\Consultationdetails;

class AddData implements DataPatchInterface, PatchVersionInterface

{

    private $consultationDetailsFactory;

    private $consultationDetailsResource;

    private $moduleDataSetup;

    public function __construct(

        ConsultationdetailsFactory $consultationDetailsFactory,

        Consultationdetails $consultationDetailsResource,

        ModuleDataSetupInterface $moduleDataSetup

    ) {

        $this->consultationDetailsFactory = $consultationDetailsFactory;

        $this->consultationDetailsResource = $consultationDetailsResource;

        $this->moduleDataSetup = $moduleDataSetup;
    }

    public function apply()

    {

        //Install data row into contact_details table

        $this->moduleDataSetup->startSetup();

        $consultationDTO = $this->consultationDetailsFactory->create();

/*         $consultationDTO->load(6);

        $consultation = $consultationDTO->setPricePerHour(51); */

        $consultationDTO
        ->setConsultationName('Sixth consultation')->setSessionTime(4)
        ->setDateOfConsultation('2023-06-08 14:00:00')->setClientId(2)
        ->setDiscount(0.25)->setPricePerHour(100);

        $this->consultationDetailsResource->save($consultationDTO);

        $this->moduleDataSetup->endSetup();
    }

    public static function getDependencies()

    {

        return [];
    }

    public static function getVersion()

    {

        return '1.0.1';
    }

    public function getAliases()


    {

        return [];
    }
}
