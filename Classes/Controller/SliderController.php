<?php
namespace TYPO3\Lvcontentslider\Controller;

/* * *************************************************************
 *  Copyright notice
 *
 *  (c) 2013
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
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
 * ************************************************************* */

/**
 * @package lvcontentslider
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 */
class SliderController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	/**
	 * sliderRepository
	 *
	 * @var \TYPO3\Lvcontentslider\Domain\Repository\SliderRepository
	 * @inject
	 */
	protected $sliderRepository = NULL;

	/**
	 * action list
	 *
	 * @return void
	 */
	public function listAction() {
		$slider = $this->sliderRepository->findAll();
		$this->view->assign('test', '// test test');
		// \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($this->settings['storagePid'],'pid');
		$this->view->assign('slider', $slider);
	}

	/**
	 * action show
	 *
	 * @param \TYPO3\Lvcontentslider\Domain\Model\Slider $slider
	 * @return void
	 */
	public function showAction(\TYPO3\Lvcontentslider\Domain\Model\Slider $slider) {
		$this->view->assign('slider', $slider);
	}

	/**
	 * action new
	 *
	 * @param \TYPO3\Lvcontentslider\Domain\Model\Slider $newSlider
	 * @dontvalidate $newSlider
	 * @return void
	 */
	public function newAction(\TYPO3\Lvcontentslider\Domain\Model\Slider $newSlider = NULL) {
		$this->view->assign('newSlider', $newSlider);
	}

	/**
	 * action create
	 *
	 * @param \TYPO3\Lvcontentslider\Domain\Model\Slider $newSlider
	 * @return void
	 */
	public function createAction(\TYPO3\Lvcontentslider\Domain\Model\Slider $newSlider) {
		$this->sliderRepository->add($newSlider);
		$this->flashMessageContainer->add('Your new Slider was created.');
		$this->redirect('list');
	}

	/**
	 * action edit
	 *
	 * @param \TYPO3\Lvcontentslider\Domain\Model\Slider $slider
	 * @return void
	 */
	public function editAction(\TYPO3\Lvcontentslider\Domain\Model\Slider $slider) {
		$this->view->assign('slider', $slider);
	}

	/**
	 * action update
	 *
	 * @param \TYPO3\Lvcontentslider\Domain\Model\Slider $slider
	 * @return void
	 */
	public function updateAction(\TYPO3\Lvcontentslider\Domain\Model\Slider $slider) {
		$this->sliderRepository->update($slider);
		$this->flashMessageContainer->add('Your Slider was updated.');
		$this->redirect('list');
	}

	/**
	 * action delete
	 *
	 * @param \TYPO3\Lvcontentslider\Domain\Model\Slider $slider
	 * @return void
	 */
	public function deleteAction(\TYPO3\Lvcontentslider\Domain\Model\Slider $slider) {
		$this->sliderRepository->remove($slider);
		$this->flashMessageContainer->add('Your Slider was removed.');
		$this->redirect('list');
	}

}