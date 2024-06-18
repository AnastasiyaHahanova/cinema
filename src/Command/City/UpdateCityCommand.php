<?php

declare(strict_types=1);

namespace App\Command\City;

use App\Entity\Address\City;
use App\Manager\City\CityManagerInterface;
use App\Repository\Interfaces\City\FindAllInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(name: 'cinema:update:cities')]
class UpdateCityCommand extends Command
{
    public function __construct(
        private readonly CityManagerInterface $cityManager,
        private readonly FindAllInterface $cityRepository
    )
    {
        parent::__construct();
    }

    protected function configure(): void
    {
        parent::configure();

        $this->addOption(
            name: 'file_path',
            shortcut: 'f',
            mode: InputOption::VALUE_REQUIRED,
            description: 'Json file with cities.'
        );
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $cities = $this->cityRepository->findAll();
        foreach ($this->getData($input->getArgument('filePath')) as $cityCode => $cityData) {
            $city = $cities[$cityCode] ?? new City();
            $city->setName($cityData['city_name']);
            $city->setCountryName($cityData['country_name']);
            $city->setRegionName($cityData['region_name']);

            $cities[] = $city;
        }

        $this->cityManager->create($cities);

        return Command::SUCCESS;
    }

    private function getData(string $filePath): array
    {
        $fileData = file_get_contents($filePath);

        return json_decode($fileData, true) ?? [];
    }
}