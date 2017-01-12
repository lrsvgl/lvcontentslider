<?php
namespace TYPO3\Lvcontentslider\Tests\Unit\Controller;
/***************************************************************
 *  Copyright notice
 *
 *  (c) 2016 
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 * Test case for class TYPO3\Lvcontentslider\Controller\SliderController.
 *
 */
class SliderControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase {

	/**
	 * @var \TYPO3\Lvcontentslider\Controller\SliderController
	 */
	protected $subject = NULL;

	protected function setUp() {
		$this->subject = $this->getMock('TYPO3\\Lvcontentslider\\Controller\\SliderController', array('redirect', 'forward', 'addFlashMessage'), array(), '', FALSE);
	}

	protected function tearDown() {
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function listActionFetchesAllSlidersFromRepositoryAndAssignsThemToView() {

		$allSliders = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array(), array(), '', FALSE);

		$sliderRepository = $this->getMock('TYPO3\\Lvcontentslider\\Domain\\Repository\\SliderRepository', array('findAll'), array(), '', FALSE);
		$sliderRepository->expects($this->once())->method('findAll')->will($this->returnValue($allSliders));
		$this->inject($this->subject, 'sliderRepository', $sliderRepository);

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$view->expects($this->once())->method('assign')->with('sliders', $allSliders);
		$this->inject($this->subject, 'view', $view);

		$this->subject->listAction();
	}

	/**
	 * @test
	 */
	public function showActionAssignsTheGivenSliderToView() {
		$slider = new \TYPO3\Lvcontentslider\Domain\Model\Slider();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$this->inject($this->subject, 'view', $view);
		$view->expects($this->once())->method('assign')->with('slider', $slider);

		$this->subject->showAction($slider);
	}

	/**
	 * @test
	 */
	public function newActionAssignsTheGivenSliderToView() {
		$slider = new \TYPO3\Lvcontentslider\Domain\Model\Slider();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$view->expects($this->once())->method('assign')->with('newSlider', $slider);
		$this->inject($this->subject, 'view', $view);

		$this->subject->newAction($slider);
	}

	/**
	 * @test
	 */
	public function createActionAddsTheGivenSliderToSliderRepository() {
		$slider = new \TYPO3\Lvcontentslider\Domain\Model\Slider();

		$sliderRepository = $this->getMock('TYPO3\\Lvcontentslider\\Domain\\Repository\\SliderRepository', array('add'), array(), '', FALSE);
		$sliderRepository->expects($this->once())->method('add')->with($slider);
		$this->inject($this->subject, 'sliderRepository', $sliderRepository);

		$this->subject->createAction($slider);
	}

	/**
	 * @test
	 */
	public function editActionAssignsTheGivenSliderToView() {
		$slider = new \TYPO3\Lvcontentslider\Domain\Model\Slider();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$this->inject($this->subject, 'view', $view);
		$view->expects($this->once())->method('assign')->with('slider', $slider);

		$this->subject->editAction($slider);
	}

	/**
	 * @test
	 */
	public function updateActionUpdatesTheGivenSliderInSliderRepository() {
		$slider = new \TYPO3\Lvcontentslider\Domain\Model\Slider();

		$sliderRepository = $this->getMock('TYPO3\\Lvcontentslider\\Domain\\Repository\\SliderRepository', array('update'), array(), '', FALSE);
		$sliderRepository->expects($this->once())->method('update')->with($slider);
		$this->inject($this->subject, 'sliderRepository', $sliderRepository);

		$this->subject->updateAction($slider);
	}

	/**
	 * @test
	 */
	public function deleteActionRemovesTheGivenSliderFromSliderRepository() {
		$slider = new \TYPO3\Lvcontentslider\Domain\Model\Slider();

		$sliderRepository = $this->getMock('TYPO3\\Lvcontentslider\\Domain\\Repository\\SliderRepository', array('remove'), array(), '', FALSE);
		$sliderRepository->expects($this->once())->method('remove')->with($slider);
		$this->inject($this->subject, 'sliderRepository', $sliderRepository);

		$this->subject->deleteAction($slider);
	}
}
