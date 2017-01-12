<?php
namespace TYPO3\Lvcontentslider\Domain\Model;

/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2015
 *
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
 ***************************************************************/

/**
 * Slider
 */
class Slider extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * bezeichnung
	 *
	 * @var string
	 * @validate NotEmpty
	 */
	protected $bezeichnung = '';

	/**
	 * titel
	 *
	 * @var string
	 * @validate NotEmpty
	 */
	protected $titel = '';

	/**
	 * text
	 *
	 * @var string
	 * @validate NotEmpty
	 */
	protected $text = '';

	/**
	 * Bild
	 *
	 * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
	 * @validate NotEmpty
	 */
	protected $bild = NULL;

	/**
	 * Returns the bezeichnung
	 *
	 * @return string $bezeichnung
	 */
	public function getBezeichnung() {
		return $this->bezeichnung;
	}

	/**
	 * Sets the bezeichnung
	 *
	 * @param string $bezeichnung
	 * @return void
	 */
	public function setBezeichnung($bezeichnung) {
		$this->bezeichnung = $bezeichnung;
	}

	/**
	 * Returns the bild
	 *
	 * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference $bild
	 */
	public function getBild() {
		return $this->bild;
	}

	/**
	 * Sets the bild
	 *
	 * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $bild
	 * @return void
	 */
	public function setBild(\TYPO3\CMS\Extbase\Domain\Model\FileReference $bild) {
		$this->bild = $bild;
	}

	/**
	 * Returns the titel
	 *
	 * @return string $titel
	 */
	public function getTitel() {
		return $this->titel;
	}

	/**
	 * Sets the titel
	 *
	 * @param string $titel
	 * @return void
	 */
	public function setTitel($titel) {
		$this->titel = $titel;
	}

	/**
	 * Returns the text
	 *
	 * @return string $text
	 */
	public function getText() {
		return $this->text;
	}

	/**
	 * Sets the text
	 *
	 * @param string $text
	 * @return void
	 */
	public function setText($text) {
		$this->text = $text;
	}

}